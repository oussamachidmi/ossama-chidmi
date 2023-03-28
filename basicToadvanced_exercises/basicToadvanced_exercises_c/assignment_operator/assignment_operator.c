#include <stdio.h>

void plus_equal(int *a, int *b)
{
    if (a != NULL && b != NULL)
    {
        *a = *a + *b;
    }
}
void minus_equal(int *a, int *b)
{
    if (a != NULL && b != NULL)
    {
        *a = *a - *b;
    }
}
void mult_equal(int *a, int *b)
{
    if (a != NULL && b != NULL)
    {
        *a = (*a) * (*b);
    }
}
int div_equal(int *a, int *b)
{
    if (b != NULL && a != NULL && *b != 0)
    {
        int n = *a;
        *a = *a / (*b);
        return n % (*b);
    }
    else
    {
        return 0;
    }
}
