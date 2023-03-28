#include "str_revert.h"

#include <stdio.h>

void str_revert(char str[])
{
    int n = 0;
    while (str[n] != '\0')
    {
        n++;
    }

    int j = n - 1, t;
    for (int i = 0; i < n / 2; i++)
    {
        if (i <= j)
        {
            t = str[i];
            str[i] = str[j];
            str[j] = t;
            j--;
        }
    }
}
