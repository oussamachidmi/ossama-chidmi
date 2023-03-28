#include "my_memmove.h"

#include <stdio.h>

void *my_memmove(void *dest, const void *src, size_t n)
{
    char *d = dest;
    const char *s = src;

    if (s + n > d && s < d)
    {
        char *i = NULL;
        char *dfirst = dest;
        char *dlast = dest;
        const char *slast = src;
        dlast += n - 1;
        slast += n - 1;
        char c;
        for (i = dlast; i >= dfirst; i--)
        {
            c = *slast;
            *i = c;
            slast--;
        }
    }
    else
    {
        size_t nl = 0;
        while (nl < n)
        {
            d[nl] = s[nl];
            nl++;
        }
    }

    return d;
}
