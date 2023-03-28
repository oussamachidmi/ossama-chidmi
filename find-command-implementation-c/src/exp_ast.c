#include "exp_ast.h"

#include <assert.h>
#include <stdbool.h>
#include <stddef.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>

#include "exp_node.h"
#include "exp_node_operator.h"
#include "queue.h"
#include "stack.h"

static bool infix_parse_operator(char c, ExpNode **exp_node)
{
    switch (c)
    {
    case '!':
        *exp_node = expNode_create_operator(OPERATOR_NOT);
        break; // not implemeted
    case '(':
        *exp_node = expNode_create_operator(OPERATOR_PAR_LEFT);
        break;
    case ')':
        *exp_node = expNode_create_operator(OPERATOR_PAR_RIGHT);
        break;
    case 'a':
        *exp_node = expNode_create_operator(OPERATOR_AND);
        break;
    case 'o':
        *exp_node = expNode_create_operator(OPERATOR_OR);
        break;
    default:
        return false;
    }
    return true;
}
static bool infix_parse_exec_actions(char **exp_argv, int exp_argc, int *i,
                                     ExpNode **exp_node)
{
    if (((*i) + 1) >= exp_argc
        || (strcmp(exp_argv[*i], "-exec") != 0
            && strcmp(exp_argv[*i], "-execdir") != 0))
        return false;
    ActionType a_type;
    if (strcmp(exp_argv[*i], "-execdir") == 0)
        a_type = ACTION_EXECDIR;
    else
        a_type = ACTION_EXEC;
    char buff[2048];
    int len = 0;
    size_t explen;
    do
    {
        (*i)++;
        explen = strlen(exp_argv[*i]);
        for (unsigned int k = 0; k < explen; k++)
        {
            if (exp_argv[*i][k] != ';')
                buff[len++] = exp_argv[*i][k];
        }
        buff[len++] = ' ';
    } while (
        exp_argv[*i][explen - 1] != ';' && (*i + 1) < exp_argc
        && (exp_argv[*i + 1][0] != ';' || strcmp(exp_argv[*i + 1], ";") != 0));
    buff[len] = '\0';
    *exp_node = expNode_create_action(a_type, buff);
    return true;
}

static bool infix_parse_actions_and_tests(char **exp_argv, int exp_argc, int *i,
                                          ExpNode **exp_node)
{
    (void)exp_argc;
    if (strcmp(exp_argv[*i], "-print") == 0)
    {
        *exp_node = expNode_create_action(ACTION_PRINT, NULL);
        return true;
    }
    if (((*i) + 1) >= exp_argc)
        return false;
    // multiple items
    if (strcmp(exp_argv[*i], "-name") == 0)
        *exp_node = expNode_create_test(TEST_NAME, exp_argv[++(*i)]);
    else if (strcmp(exp_argv[*i], "-type") == 0)
        *exp_node = expNode_create_test(TEST_TYPE, exp_argv[++(*i)]);
    else if (strcmp(exp_argv[*i], "-user") == 0)
        *exp_node = expNode_create_test(TEST_USER, exp_argv[++(*i)]);
    else if (strcmp(exp_argv[*i], "-group") == 0)
        *exp_node = expNode_create_test(TEST_GROUP, exp_argv[++(*i)]);
    else if (strcmp(exp_argv[*i], "-perm") == 0)
        *exp_node = expNode_create_test(TEST_PERM, exp_argv[++(*i)]);
    else if (strcmp(exp_argv[*i], "-newer") == 0)
        *exp_node = expNode_create_action(ACTION_NEWER, exp_argv[++(*i)]);
    else if (strcmp(exp_argv[*i], "-delete") == 0)
        *exp_node = expNode_create_action(ACTION_DELETE, exp_argv[++(*i)]);
    else
        return false;
    return true;
}

static Queue *build_infix(char **exp_argv, int exp_argc)
{
    Queue *infix = queue_create();
    ExpNode *exp_node;
    ExpNode *last_node = NULL;
    for (int i = 0; i < exp_argc; i++)
    {
        exp_node = NULL;
        if (exp_argv[i][0] == '-')
        {
            if (strlen(exp_argv[i]) == 1)
                err("invalid expression");
            if (!infix_parse_operator(exp_argv[i][1], &exp_node))
                if (!infix_parse_actions_and_tests(exp_argv, exp_argc, &i,
                                                   &exp_node))
                    if (!infix_parse_exec_actions(exp_argv, exp_argc, &i,
                                                  &exp_node))
                        err("invalid expression");
            assert(exp_node);
            if (expNode_operator_is_logical(exp_node)
                && exp_node->value.operator_->type != OPERATOR_NOT)
                if (last_node == NULL || (i + 1) >= exp_argc
                    || (expNode_operator_is_logical(last_node)
                        && last_node->value.operator_->type != OPERATOR_NOT))
                    err("invalid expression");

            if (last_node != NULL && expNode_is_action_or_test(exp_node)
                && expNode_is_action_or_test(last_node))
                queue_push(infix, expNode_create_operator(OPERATOR_AND));
            last_node = exp_node;
            queue_push(infix, exp_node);
        }
    }
    return infix;
}

static bool postfix_magic_condition(Stack *stack, ExpNode *exp_node_1,
                                    ExpNode **exp_node_2)
{
    return (!stack_isempty(stack) && (*exp_node_2 = (ExpNode *)stack_top(stack))
            && expNode_operator_is_left_parenthese(*exp_node_2)
            && (expNode_get_operator_priority(*exp_node_2)
                    > expNode_get_operator_priority(exp_node_1)
                || (expNode_get_operator_priority(*exp_node_2)
                        == expNode_get_operator_priority(exp_node_1)
                    && expNode_operator_is_left_associative(exp_node_1))));
}

static Queue *build_postfix_shuntingYard(Queue *infix)
{
    assert(infix);
    ExpNode *exp_node_1, *exp_node_2;
    Queue *postfix = queue_create();
    Stack *stack = stack_create(32);
    while (!queue_isempty(infix))
    {
        exp_node_1 = (ExpNode *)queue_top(infix);
        queue_pop(infix);
        if (expNode_is_action_or_test(exp_node_1))
            queue_push(postfix, exp_node_1);
        else if (expNode_is_operator(exp_node_1)
                 && expNode_operator_is_logical(exp_node_1))
        {
            while (postfix_magic_condition(stack, exp_node_1, &exp_node_2))
            {
                queue_push(postfix, exp_node_2);
                stack_pop(stack);
            }
            stack_push(stack, exp_node_1);
        }
        else if (expNode_operator_is_left_parenthese(exp_node_1))
            stack_push(stack, exp_node_1);
        else if (expNode_operator_is_right_parenthese(exp_node_1))
        {
            assert(!stack_isempty(stack));
            while ((exp_node_2 = (ExpNode *)stack_top(stack))
                   && expNode_operator_is_left_parenthese(exp_node_2))
            {
                queue_push(postfix, exp_node_2);
                stack_pop(stack);
            }
            assert(expNode_operator_is_parenthese(exp_node_2));
            stack_top(stack);
        }
    }
    while (!stack_isempty(stack) && (exp_node_2 = (ExpNode *)stack_top(stack)))
    {
        assert(!expNode_operator_is_parenthese(exp_node_2));
        queue_push(postfix, exp_node_2);
        stack_pop(stack);
    }
    if (queue_isempty(postfix))
    {
        queue_delete(&postfix);
        return NULL;
    }
    return postfix;
}

/*
static void p_q(Queue*q){
    printf("infix size %d\n",queue_size(q));
    while(!queue_isempty(q)){
        ExpNode * n=queue_top(q);
        queue_pop(q);
        expNode_print(n);
        printf("\n");
    }
}*/

ExpNode *expAst_build(char **exp_argv, int exp_argc)
{
    Queue *infix = build_infix(exp_argv, exp_argc);
    ;
    if (infix == NULL)
        return NULL;
    // p_q(infix);
    Queue *postfix = build_postfix_shuntingYard(infix);
    queue_delete(&infix);
    ExpNode *exp_node;
    ExpNode *exp_node_left;
    ExpNode *exp_node_right;
    Stack *stack = stack_create(32); // temporary stack
    ExpNode *exp_node_result;
    while (!queue_isempty(postfix))
    {
        exp_node = queue_top(postfix);
        queue_pop(postfix);
        if (expNode_operator_is_logical(exp_node))
        {
            exp_node_left = stack_top(stack);
            stack_pop(stack);
            exp_node_right = stack_top(stack);
            stack_pop(stack);
            exp_node_result =
                expNode_bind(exp_node, exp_node_left, exp_node_right);
            stack_push(stack, exp_node_result);
        }
        else
        {
            stack_push(stack, exp_node);
        }
    }
    exp_node_result = stack_top(stack);
    stack_pop(stack);

    // free
    stack_delete(&stack);
    queue_delete(&postfix);
    return exp_node_result;
}
