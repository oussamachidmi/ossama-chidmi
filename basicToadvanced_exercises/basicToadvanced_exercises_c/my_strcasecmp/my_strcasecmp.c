#include "my_strcasecmp.h"

#include <stdio.h>

int my_strcasecmp(const char *s1, const char *s2)
{
    size_t ln1 = 0;
    size_t ln2 = 0;
    char c1, c2;
    while (s1[ln1] != '\0')
    {
        ln1++;
    }
    while (s2[ln2] != '\0')
    {
        ln2++;
    }
    if (ln1 > ln2)
    {
        size_t t = ln2;
        ln2 = ln1;
        ln1 = t;
    }
    for (size_t i = 0; i < ln1 + 1; i++)
    {
        if (s1[i] >= 'A' && s1[i] <= 'Z')
        {
            c1 = s1[i] + 32;
        }
        else
        {
            c1 = s1[i];
        }
        if (s2[i] >= 'A' && s2[i] <= 'Z')
        {
            c2 = s2[i] + 32;
        }
        else
        {
            c2 = s2[i];
        }
        if (c1 != c2)
        {
            if (c1 - c2 > 0)
            {
                return 1;
            }
            else
            {
                return -1;
            }
        }
    }
    return 0;
}
