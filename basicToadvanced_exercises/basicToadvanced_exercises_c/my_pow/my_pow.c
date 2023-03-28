#include <stdio.h>
int my_pow(int a, int b)
{
    int res = 1;
    if (a == 0)
    {
        return 0;
    }
    else if (b == 0)
    {
        return 1;
    }
    else
    {
        if (b % 2 == 0)
        {
            for (int i = 0; i < (b / 2); i++)
            {
                res = res * a;
            }
            return res * res;
        }
        else if (b % 2 != 0)
        {
            for (int i = 0; i < b / 2; i++)
            {
                res = res * a;
            }
            return res * res * a;
        }
        else
        {
            return 0;
        }
    }
}
