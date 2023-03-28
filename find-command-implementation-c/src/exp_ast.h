#ifndef exp_ast_h
#define exp_ast_h

#include "err_handle.h"
#include "queue.h"
#include "stack.h"
#include "exp_node.h"
#include <assert.h>
#include <stddef.h>
#include <stdio.h>
#include <string.h>

typedef struct {
	bool block_print;
	bool in_line;
}ExpAstResponse;


ExpNode * expAst_build(char ** exp_argv,int exp_argc);
void expAst_print2D(ExpNode* root);



#endif