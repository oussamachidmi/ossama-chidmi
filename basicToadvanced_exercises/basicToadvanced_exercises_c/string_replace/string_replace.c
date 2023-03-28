#include "string_replace.h"

#include <stdio.h>
#include <stdlib.h>

char *string_replace(char c, const char *str, const char *pattern)
{
    if (str == NULL)
    {
        return NULL;
    }
    int len = 0, lc = 0, lp = 0;
    char *cp = NULL;
    while (str[len] != '\0')
    {
        len++;
    }
    while (pattern[lp] != '\0')
    {
        lp++;
    }

    for (int i = 0; i < len; i++)
    {
        if (str[i] == c)
        {
            lc++;
        }
    }

    cp = (char *)malloc(sizeof(char) * ((len + (lp * lc) - lc)));
    int i = 0;

    for (int j = 0; j < len; j++)
    {
        if (str[j] == c)
        {
            for (int j = 0; j < lp; j++)
            {
                cp[i + j] = pattern[j];
            }
            i += lp - 1;
        }
        else
        {
            cp[i] = str[j];
        }
        i++;
    }

    cp[(len + (lp * lc)) - lc + 1] = '\0';
    return cp;
}
