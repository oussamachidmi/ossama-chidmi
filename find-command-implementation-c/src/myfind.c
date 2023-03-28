#include "myfind.h"

#include <stdio.h>

static void merge_path(char *buff, char *left, char *right)
{
    if (left == NULL)
        strcpy(buff, right);
    else
    {
        strcpy(buff, left);
        strcat(buff, "/");
        strcat(buff, right);
    }
}

static int dir_tree_iterator(char *parent, char *name, ExpNode *exp_node_root)
{
    DIR *dir_ptr;
    struct dirent *entry;
    struct stat state, state2;
    char dir_path[2048], entry_path[2048];
    ExpAstResponse exp_ast_response;
    merge_path(dir_path, parent, name);
    if (stat(dir_path, &state))
        return warn(strerror(errno));
    exp_ast_response.block_print = false;
    exp_ast_response.in_line = false;
    if (exp_node_root == NULL
        || (expNode_evaluate(exp_node_root, &exp_ast_response, parent, name,
                             &state, dir_path)
            && !exp_ast_response.block_print))
        printf("%s%s", dir_path, exp_ast_response.in_line ? "\t" : "\n");
    if (!(dir_ptr = opendir(dir_path)))
        return warn(strerror(errno));
    while ((entry = readdir(dir_ptr)) != NULL)
    {
        if (strcmp(entry->d_name, "..") == 0 || strcmp(entry->d_name, ".") == 0)
            continue;
        merge_path(entry_path, dir_path, entry->d_name);
        if (stat(entry_path, &state2))
        {
            warn(strerror(errno));
            continue;
        }
        if (S_ISDIR(state2.st_mode))
            dir_tree_iterator(dir_path, entry->d_name, exp_node_root);
        else
        {
            exp_ast_response.block_print = false;
            exp_ast_response.in_line = false;
            if (exp_node_root == NULL
                || (expNode_evaluate(exp_node_root, &exp_ast_response, dir_path,
                                     entry->d_name, &state2, entry_path)
                    && !exp_ast_response.block_print))
                printf("%s%s", entry_path,
                       exp_ast_response.in_line ? "\t" : "\n");
        }
    }
    if (closedir(dir_ptr))
        return warn(strerror(errno));
    return OK;
}

int main(int argc, char **argv)
{
    // skip program name
    int consumed_args = 1;
    // consume all options and take the last one
    /*char symbolic_option=0;
    while(argc>0 && *argv[0]=='-' && (argv[0][1]=='d' || argv[0][1]=='H' ||
    argv[0][1]=='L' || argv[0][1]=='P')){ symbolic_option=argv[0][1]; argc--;
        (*argv)++;
    }*/
    bool has_dir = (argc - consumed_args > 0 && argv[consumed_args][0] != '-');
    char *default_dir = ".";
    char *dir;
    if (has_dir)
        dir = argv[consumed_args++];
    else
        dir = default_dir;
    //(void) symbolic_option;
    ExpNode *node;
    if (argc - consumed_args > 0)
        node = expAst_build(&argv[consumed_args], argc - consumed_args);
    else
        node = NULL;

    // expAst_print2D(node);

    dir_tree_iterator(NULL, dir, node);

    return get_exit_status();
}