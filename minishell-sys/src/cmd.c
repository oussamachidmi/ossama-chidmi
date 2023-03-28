
#include "cmd.h"

#include <errno.h>
#include <stdbool.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>

int exec_collected(int argc, char *argv[])
{
    int rc = 0;
    if (argc == 0)
        return rc;
    if (strcmp(argv[0], "echo") == 0)
        return Bin_echo(argc, argv);
    if (strcmp(argv[0], "cd") == 0)
        return Bin_cd(argc, argv);
    if (strcmp(argv[0], "exit") == 0)
        return Bin_exit(argc, argv);
    if (strcmp(argv[0], "kill") == 0)
        return Bin_kill(argc, argv);
    if (strcmp(argv[0], "true") == 0)
        return 0;
    if (strcmp(argv[0], "false") == 0)
        return 1;
    else
    {
        char *ptr = strchr(argv[0], '=');
        if (ptr != NULL)
        {
            *ptr = '\0';
            if (setenv(argv[0], ptr + 1, 1) != 0)
            {
                perror(NULL);
                return (errno != 0 ? errno : 1);
            }
            return 0;
        }
        return Bin_any(argc, argv);
    }
}

static bool is_end(char c)
{
    return (c == EOF || c == '\0' || c == ';' || c == '\n');
}
static bool is_op(char c)
{
    if (c == '&')
    {
        char c2 = FCursor_get_c();
        FCursor_set_c(c2);
        if (c2 == '&')
            return true;
        return false;
    }
    else
        return (c == '|' || c == '<' || c == '>');
}

typedef struct
{
    char args[MAX_ELEM][MAX_CHAR];
    char *argv[MAX_ELEM];
    int argc;
    Op left;
    Op right;

} Cmd;

static Cmd cmds[MAX_ELEM];
static int n_elem;

static void reset_cmds()
{
    n_elem = 0;
    cmds[n_elem].argc = 0;
    cmds[n_elem].argv[0] = NULL;
}

static Op check_op(char c)
{
    Op op = OP_NONE;
    char c2 = FCursor_get_c();
    if (c == c2)
    {
        if (c == '|')
            op = OP_OR;
        else if (c == '&')
            op = OP_AND;
        else if (c == '<')
            op = OP_RD_LL;
        else
            op = OP_RD_RR;
    }
    else if (c != '&')
    {
        FCursor_set_c(c2);
        if (c == '|')
            op = OP_PIPE;
        // else if (c == '&')
        // op = OP_BG_PROC;
        else if (c == '<')
            op = OP_RD_L;
        else
            op = OP_RD_R;
    }
    return op;
}

static int parse()
{
    reset_cmds();
    size_t sz;
    char c;
    int rc = 0;
    Op op = OP_NONE;
    while (true)
    {
        Cmd *cmd = &cmds[n_elem];
        char *args = cmd->args[cmd->argc];
        sz = Arg_collect(args);
        if (sz > 0)
        {
            args[sz] = '\0';
            cmd->argv[cmd->argc++] = args;
            cmd->argv[cmd->argc] = NULL;
        }
        c = FCursor_get_c();
        if (is_end(c))
        {
            cmd = &cmds[n_elem];
            cmd->left = op;
            cmd->right = OP_NONE;
            n_elem++;
            cmds[n_elem].argc = 0;
            cmds[n_elem].argv[0] = NULL;
            FCursor_set_c(c);
            break;
        }
        if (is_op(c))
        {
            cmd = &cmds[n_elem];
            cmd->left = op;
            op = check_op(c);
            cmd->right = op;
            n_elem++;
            cmds[n_elem].argc = 0;
            cmds[n_elem].argv[0] = NULL;
        }
        else
        {
            FCursor_set_c(c);
        }
    }
    return rc;
}

static int handle_r_redirection(int *i)
{
    int c_rc = 0;
    Cmd *cmd = &cmds[*i];
    Cmd *entry = cmd;
    bool opened = false;
    while (entry->right == OP_RD_R || entry->right == OP_RD_RR)
    {
        if (opened)
            FCursor_out_reset();
        (*i)++;
        entry = &cmds[*i];
        assert(entry->argc == 1);
        c_rc = FCursor_out_open(entry->args[0],
                                OP_RD_R ? (O_CREAT | O_WRONLY)
                                        : (O_CREAT | O_WRONLY | O_APPEND));
        if (c_rc != 0)
            return c_rc;
        opened = true;
    }
    c_rc = exec_collected(cmd->argc, cmd->argv);
    FCursor_out_reset();
    return c_rc;
}

int Cmd_exec()
{
    int rc = parse();
    if (rc != 0)
        return rc;
    for (int i = 0; i < n_elem; i++)
    {
        int c_rc = 0;
        Cmd *cmd = &cmds[i];
        if (cmd->left == OP_OR)
        {
            if (rc == 0)
                continue;
        }
        if (cmd->right == OP_RD_R || cmd->right == OP_RD_RR)
        {
            c_rc = handle_r_redirection(&i);
            if (c_rc != 0)
                rc = c_rc;
        }
        else if (cmd->right == OP_PIPE)
        {
            fprintf(stdout, "pipes are not implemented\n");
        }
        else
        {
            c_rc = exec_collected(cmd->argc, cmd->argv);
            if (c_rc != 0)
                rc = c_rc;
        }
    }
    return rc;
}
