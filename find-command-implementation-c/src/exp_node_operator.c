#include "exp_node_operator.h"

bool expNode_operator_is_logical(ExpNode *oper)
{
    return expNode_is_operator(oper)
        && (oper->value.operator_->type == OPERATOR_AND
            || oper->value.operator_->type == OPERATOR_OR
            || oper->value.operator_->type == OPERATOR_NOT);
}

bool expNode_operator_is_parenthese(ExpNode *oper)
{
    return expNode_is_operator(oper)
        && (oper->value.operator_->type == OPERATOR_PAR_LEFT
            || oper->value.operator_->type == OPERATOR_PAR_RIGHT);
}

bool expNode_operator_is_left_parenthese(ExpNode *oper)
{
    return expNode_is_operator(oper)
        && oper->value.operator_->type == OPERATOR_PAR_LEFT;
}
bool expNode_operator_is_right_parenthese(ExpNode *oper)
{
    return expNode_is_operator(oper)
        && oper->value.operator_->type == OPERATOR_PAR_RIGHT;
}

ExpNode *expNode_bind(ExpNode *oper_node, ExpNode *exp_node_left,
                      ExpNode *exp_node_right)
{
    assert(expNode_operator_is_logical(oper_node));
    // assert(expNode_is_action_or_test(exp_node_1));
    // assert(expNode_is_action_or_test(exp_node_2));
    oper_node->value.operator_->left = exp_node_left;
    oper_node->value.operator_->right = exp_node_right;
    return oper_node;
}

int expNode_get_operator_priority(ExpNode *oper_node)
{
    assert(expNode_is_operator(oper_node));
    switch (oper_node->value.operator_->type)
    {
    case OPERATOR_PAR_LEFT:
    case OPERATOR_PAR_RIGHT:
        return 1;
    case OPERATOR_NOT:
        return 2;
    case OPERATOR_AND:
        return 11;
    case OPERATOR_OR:
        return 12;
    default:
        return -1;
    }
}
bool expNode_operator_is_left_associative(ExpNode *oper_node)
{
    assert(expNode_is_operator(oper_node));
    if (oper_node->value.operator_->type == OPERATOR_NOT)
        return false;
    return true;
}