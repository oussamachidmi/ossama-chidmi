#include "is_set.h"

#include <stdio.h>

unsigned int is_set(unsigned int value, unsigned char n)
{
    unsigned int flag = 1 << (n - 1);
    unsigned int rs = value & flag;
    if (rs > 0)
    {
        return 1;
    }
    else
    {
        return 0;
    }
}
