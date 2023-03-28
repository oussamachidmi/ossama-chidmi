#include <stdio.h>

unsigned int digit(int n, int k)
{
    int i = 1;
    while (i < k && n >= 0)
    {
        n = n / 10;
        i++;
    }
    if (n <= 0 || k <= 0)
        return 0;
    else
        return n % 10;
}
