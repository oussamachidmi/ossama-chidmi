#ifndef stack_h
#define stack_h

#include <stdio.h>
#include <stdbool.h>
#include <stdlib.h>
#include <assert.h>

#include "err_handle.h"

typedef struct Stack Stack;
struct Stack {
	void **cells; // array of void *
	int top;
	int capacity;
};

Stack *stack_create(int max_size);
void stack_delete(Stack **);
void stack_push(Stack *s, void * e);
bool stack_isempty(Stack *s);
void stack_pop(Stack *s);
void *stack_top(Stack *s);
bool stack_overflow(Stack *s);
void stack_dump(FILE *f, Stack *s, void(*dumpfunction)(FILE *f, void *e));

#endif
