
#ifndef exp_node_operator_h
#define exp_node_operator_h
#include "exp_node.h"

//operators methods
bool expNode_operator_is_logical(ExpNode * oper);
bool expNode_operator_is_parenthese(ExpNode * oper);
bool expNode_operator_is_left_parenthese(ExpNode * oper);
bool expNode_operator_is_right_parenthese(ExpNode * oper);
ExpNode * expNode_bind(ExpNode *oper_node,ExpNode *exp_node_1,ExpNode *exp_node_2);
int expNode_get_operator_priority(ExpNode *oper_node);
bool expNode_operator_is_left_associative(ExpNode *oper_node);


#endif