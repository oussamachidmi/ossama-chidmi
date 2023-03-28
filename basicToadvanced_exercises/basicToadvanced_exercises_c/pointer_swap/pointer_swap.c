#include <stdio.h>

void pointer_swap(int **a, int **b)
{
    int *t = NULL;
    t = *a;
    *a = *b;
    *b = t;
}
