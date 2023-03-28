#include <stdio.h>
#include <stdlib.h>

void *my_calloc(size_t n, size_t size)
{
    char *p = (char *)malloc(n * size);
    if (p == (char *)NULL)
    {
        return (void *)NULL;
    }
    else
    {
        for (size_t i = 0; i < n * size; i++)
        {
            *(p + i) = 0;
        }
        return (void *)p;
    }
}
