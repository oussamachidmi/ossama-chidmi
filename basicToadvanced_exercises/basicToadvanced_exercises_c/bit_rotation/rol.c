#include <stdio.h>

unsigned char rol(unsigned char value, unsigned char roll)
{
    if (roll > 8)
    {
        roll -= 8;
    }
    unsigned char vl1 = value >> (8 - roll);
    unsigned char vl2 = value << roll;
    unsigned char rs = vl1 | vl2;

    return rs;
}
