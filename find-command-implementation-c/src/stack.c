#include "stack.h"

#define STACK_SIZE 32

Stack *stack_create(int max_size)
{
    Stack *stack;
    size_t capacity = (max_size > 0 ? max_size : STACK_SIZE);
    stack = malloc(sizeof(Stack));
    assert(stack);
    stack->cells = malloc(sizeof(void *) * capacity);
    assert(stack->cells);
    stack->capacity = capacity;
    stack->top = -1;
    return stack;
}

void stack_delete(Stack **stack)
{
    assert(stack);
    assert(*stack);
    free((*stack)->cells);
    free(*stack);
    *stack = NULL;
}

bool stack_isempty(Stack *stack)
{
    assert(stack);
    return (stack->top == -1);
}

void stack_push(Stack *stack, void *e)
{
    assert(stack);
    assert(stack->top < stack->capacity);
    stack->cells[++(stack->top)] = e;
}

static void assert_notempty(Stack *stack)
{
    assert(!stack_isempty(stack));
}

void stack_pop(Stack *stack)
{
    assert_notempty(stack);
    --(stack->top);
}
void *stack_top(Stack *stack)
{
    assert_notempty(stack);
    return stack->cells[stack->top];
}
