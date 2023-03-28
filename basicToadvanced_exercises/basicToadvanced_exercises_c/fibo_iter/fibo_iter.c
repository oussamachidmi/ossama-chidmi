#include <stdio.h>

unsigned long fibo_iter(unsigned long n)
{
    unsigned long t1 = 0, t2 = 1;
    unsigned long nt = t1 + t2;
    if (n != 0)
    {
        for (unsigned long i = 3; i <= n; ++i)
        {
            t1 = t2;
            t2 = nt;
            nt = t1 + t2;
        }

        return nt;
    }
    else
    {
        return 0;
    }
}
