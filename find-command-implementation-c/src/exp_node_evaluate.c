#include "exp_node_evaluate.h"

#include <assert.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>

#include "exp_node.h"

static bool evaluate_test_type(char file_type, struct stat *state)
{
    switch (file_type)
    {
    case 'f':
        return S_ISREG(state->st_mode);
    case 'd':
        return S_ISDIR(state->st_mode);
    case 'b':
        return S_ISBLK(state->st_mode);
    case 'c':
        return S_ISCHR(state->st_mode);
    case 'p':
        return S_ISFIFO(state->st_mode);
    case 'l':
        return S_ISLNK(state->st_mode);
        // case 's':return S_ISSOCK(state->st_mode);
    }
    err("invalid FileType");
    return false;
}

static bool evaluate_test(ExpNode *node, char *name, struct stat *state)
{
    switch (node->value.test->type)
    {
    case TEST_NAME:
        return fnmatch(node->value.test->value, name, FNM_NOESCAPE) == 0;
    case TEST_TYPE:
        return evaluate_test_type(node->value.test->value[0], state);
    case TEST_PERM: {
        int statchmod = state->st_mode & (S_IRWXU | S_IRWXG | S_IRWXO);
        int requested = strtoul(node->value.test->value, NULL, 8);
        return statchmod == requested;
    }
    break;
    case TEST_GROUP: {
        char *grpname = getgrgid(state->st_gid)->gr_name;
        char *requested = node->value.test->value;
        return strcmp(grpname, requested) == 0;
    }
    break;
    case TEST_USER: {
        char *username = getgrgid(state->st_gid)->gr_name;
        char *requested = node->value.test->value;
        return strcmp(username, requested) == 0;
    }
    break;
    }

    err("invalid TestType");
    return false;
}

static char *collect_cmd(char *buff, char *value, char *placeholder_text)
{
    char *c = value;
    int i = -1;
    int j;
    while (c[++i] != '\0')
    {
        if (c[i] == '{' && c[i + 1] == '}')
        {
            char *b = buff;
            int n = 0;
            j = -1;
            while (++j < i)
            {
                b[n++] = c[j];
            }
            j = -1;
            while (++j < (signed)strlen(placeholder_text))
            {
                b[n++] = placeholder_text[j];
            }
            j = i + 1;
            while (++j < (signed)strlen(c))
            {
                b[n++] = c[j];
            }
            b[n] = '\0';
            return b;
        }
    }
    return value;
}

static bool evaluate_action(ExpNode *node, ExpAstResponse *exp_ast_response,
                            char *name, struct stat *state, char *full_path)
{
    switch (node->value.action->type)
    {
    case ACTION_PRINT: {
        return true;
    };
    break;
    case ACTION_EXEC: {
        exp_ast_response->block_print = true;
        char buff[2048];
        char *cmd = collect_cmd(buff, node->value.action->value, full_path);
        if (cmd[strlen(cmd) - 1] == '+')
            exp_ast_response->in_line = true;
        return system(cmd) == 0;
    }
    break;
    case ACTION_EXECDIR: {
        exp_ast_response->block_print = true;
        char buff[2048];
        char *cmd = collect_cmd(buff, node->value.action->value, name);
        return system(cmd) == 0;
    }
    break;
    case ACTION_NEWER: {
        char *path = node->value.action->value;
        struct stat st;
        if (stat(path, &st))
        {
            warn(strerror(errno));
            return false;
        };
        return state->st_ctime > st.st_ctime;
    }
    break;
    case ACTION_DELETE: {
        if (remove(full_path))
        {
            warn(strerror(errno));
            return false;
        }
        exp_ast_response->block_print = true;
        printf("%s . is deleted", full_path);
        return true;
    }
    break;
    }
    err("invalid ActionType");
    return false;
}
static bool evaluate_operator(ExpNode *node, ExpAstResponse *exp_ast_response,
                              char *parent, char *name, struct stat *state,
                              char *full_path)
{
    assert(expNode_operator_is_logical(node));
    if (node->value.operator_->type == OPERATOR_NOT)
        return false;
    assert(node->value.operator_->left);
    assert(node->value.operator_->right);
    bool result_1 =
        expNode_evaluate(node->value.operator_->left, exp_ast_response, parent,
                         name, state, full_path);
    bool result_2 =
        expNode_evaluate(node->value.operator_->right, exp_ast_response, parent,
                         name, state, full_path);
    if (node->value.operator_->type == OPERATOR_AND)
        return result_1 && result_2;
    else
        return result_1 || result_2;
}

bool expNode_evaluate(ExpNode *node, ExpAstResponse *exp_ast_response,
                      char *parent, char *name, struct stat *state,
                      char *full_path)
{
    switch (node->type)
    {
    case EXP_TEST:
        return evaluate_test(node, name, state);
    case EXP_ACTION:
        return evaluate_action(node, exp_ast_response, name, state, full_path);
    case EXP_OPERATOR:
        return evaluate_operator(node, exp_ast_response, parent, name, state,
                                 full_path);
    }
    err("invalid ExpressionType");
    return false;
}
