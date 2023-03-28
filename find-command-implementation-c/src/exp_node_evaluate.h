#ifndef exp_node_evaluate_h
#define exp_node_evaluate_h

#include "exp_node.h"
#include "exp_node_operator.h"
#include "exp_ast.h"
#include <pwd.h>
#include <grp.h>


bool expNode_evaluate(ExpNode * node,ExpAstResponse * exp_ast_response,char * parent,char * name, struct stat  *state,char* full_path);


#endif