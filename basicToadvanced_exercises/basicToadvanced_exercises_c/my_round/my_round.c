#include <stdio.h>

int my_round(float n)
{
    float rs;
    if (n > 0)
    {
        rs = n - (int)n;
        if (rs >= 0.5)
        {
            return n - rs + 1;
        }
        else
        {
            return n - rs;
        }
    }
    else
    {
        rs = -(n - (int)n);
        if (rs < 0.5)
        {
            return n + rs;
        }
        else
        {
            return n + rs - 1;
        }
    }
}
