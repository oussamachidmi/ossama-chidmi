
#ifndef exp_node_h
#define exp_node_h

#include "err_handle.h"
#include <assert.h>
#include <stdbool.h>
#include <time.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <fnmatch.h>
#include <dirent.h>
#include <sys/stat.h>

typedef struct ExpNode ExpNode;

typedef enum {
	TEST_NAME,
	TEST_TYPE,
	TEST_PERM,
	TEST_GROUP,
	TEST_USER
}TestType;

typedef struct{
	TestType type;
	char * value;
} Test;

typedef enum {
	ACTION_PRINT,
	ACTION_EXEC,
	ACTION_EXECDIR,
	ACTION_NEWER,
	ACTION_DELETE
} ActionType;

typedef struct{
	ActionType type;
	char * value;
} Action;

typedef enum {
	OPERATOR_PAR_LEFT,//'('
	OPERATOR_PAR_RIGHT,//')'
	OPERATOR_AND,// a
	OPERATOR_OR, // o
	OPERATOR_NOT,// !
} OperatorType;


typedef struct {
	OperatorType type;
	ExpNode * left;
	ExpNode * right;
} Operator;







typedef enum {
	EXP_TEST,
	EXP_ACTION,
	EXP_OPERATOR
}ExpressionType;


struct ExpNode{
	ExpressionType type;
	union {
			Action *action;
			Test *test;
			Operator *operator_;
	}value;
};



// constructors
ExpNode * expNode_create_action(ActionType t,char * e);
ExpNode * expNode_create_test(TestType t,char * e);
ExpNode * expNode_create_operator(OperatorType t);

//deconstructor
void expNode_delete(ExpNode **node);

// shared methods
bool expNode_is_action(ExpNode *node);
bool expNode_is_test(ExpNode *node);
bool expNode_is_operator(ExpNode *node);
bool expNode_is_action_or_test(ExpNode * node);






#endif