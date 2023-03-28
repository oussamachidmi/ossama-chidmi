#include "my_atoi.h"

#include <stdio.h>

int my_atoi(char *str)
{
    int res = 0, len1 = 0, len2 = 0, len = 0;
    for (int i = 0; str[i] != '\0'; ++i)
    {
        if ((str[i] < 48 || str[i] > 57) && str[i] != '+' && str[i] != '-'
            && str[i] != ' ')
        {
            return 0;
        }
        else
        {
            len++;
        }
    }

    if (str[len - 1] == ' ')
    {
        return 0;
    }

    for (int i = 0; str[i] != '\0'; ++i)
    {
        if (str[i] == '+' || str[i] == '-')
        {
            if (str[i + 1] == ' ')
            {
                return 0;
            }
        }
        if (str[i] == '+')
        {
            len1++;
        }
        if (str[i] == '-')
        {
            len2++;
        }
    }
    if (len1 > 1 || len2 > 1)
    {
        return 0;
    }

    for (int i = 0; str[i] != '\0'; ++i)
    {
        if (str[i] != ' ' && str[i] != '+' && str[i] != '-')
        {
            res = res * 10 + str[i] - '0';
        }
    }
    if (str[0] == '-')
    {
        res = -res;
    }
    return res;
}
