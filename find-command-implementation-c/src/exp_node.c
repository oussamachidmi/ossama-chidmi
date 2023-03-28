
#include "exp_node.h"

#include <assert.h>
#include <errno.h>
#include <fnmatch.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <sys/stat.h>

#include "err_handle.h"

ExpNode *expNode_create_action(ActionType t, char *e)
{
    ExpNode *node = malloc(sizeof(ExpNode));
    assert(node);
    Action *action = malloc(sizeof(Action));
    assert(action);
    node->type = EXP_ACTION;
    node->value.action = action;
    action->type = t;
    if (e != NULL)
    {
        action->value = malloc(strlen(e) + 1);
        assert(action->value);
        strcpy(action->value, e);
    }
    else
        action->value = NULL;
    return node;
}

ExpNode *expNode_create_test(TestType t, char *e)
{
    ExpNode *node = malloc(sizeof(ExpNode));
    assert(node);
    node->type = EXP_TEST;
    Test *test = malloc(sizeof(Test));
    assert(test);
    node->value.test = test;
    test->type = t;
    if (e != NULL)
    {
        test->value = malloc(strlen(e) + 1);
        assert(test->value);
        strcpy(test->value, e);
    }
    else
        test->value = NULL;
    return node;
}

ExpNode *expNode_create_operator(OperatorType t)
{
    ExpNode *node = malloc(sizeof(ExpNode));
    assert(node);
    Operator *operator_ = malloc(sizeof(Operator));
    assert(operator_);
    node->type = EXP_OPERATOR;
    node->value.operator_ = operator_;

    operator_->type = t;
    operator_->left = NULL;
    operator_->right = NULL;
    return node;
}

void expNode_delete(ExpNode **node)
{
    assert(node);
    assert(*node);
    switch ((*node)->type)
    {
    case EXP_TEST: {
        switch ((*node)->value.test->type)
        {
        case TEST_NAME: {
            free((*node)->value.test->value);
            free((*node)->value.test);
        }
        break;
        case TEST_TYPE:
            break;
        default:
            err("invalid TestType");
            return;
        }
    }
    break;
    case EXP_ACTION: {
        if ((*node)->value.action->value != NULL)
        {
            free((*node)->value.action->value);
            (*node)->value.action->value = NULL;
        }
        free((*node)->value.action);
    }
    break;
    case EXP_OPERATOR: {
        if ((*node)->value.operator_->left != NULL)
            expNode_delete(&(*node)->value.operator_->left);
        if ((*node)->value.operator_->right != NULL)
            expNode_delete(&(*node)->value.operator_->right);
        free((*node)->value.operator_);
    }
    break;
    default:
        err("invalid ExpressionType");
        return;
    }
    free(*node);
    *node = NULL;
}

bool expNode_is_action(ExpNode *node)
{
    assert(node);
    return node->type == EXP_ACTION;
}
bool expNode_is_test(ExpNode *node)
{
    assert(node);
    return node->type == EXP_TEST;
}
bool expNode_is_operator(ExpNode *node)
{
    assert(node);
    return node->type == EXP_OPERATOR;
}
bool expNode_is_action_or_test(ExpNode *node)
{
    assert(node);
    return (node->type == EXP_TEST || node->type == EXP_ACTION);
}
