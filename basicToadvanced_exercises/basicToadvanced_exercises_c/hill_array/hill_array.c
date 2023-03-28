#include "hill_array.h"

#include <stdio.h>

size_t check_neg(int tab[], size_t len)
{
    for (size_t i = 0; i < len; i++)
    {
        if (tab[i] < 0)
        {
            return 0;
        }
    }
    return 1;
}
size_t index_max_left(int tab[], size_t len)
{
    int max = tab[0];
    size_t index = 0;
    for (size_t i = 0; i < len; i++)
    {
        if (max < tab[i])
        {
            max = tab[i];
            index = i;
        }
    }
    return index;
}
size_t index_max_right(int tab[], size_t len)
{
    int max = tab[0];
    size_t index = 0;
    for (size_t i = 0; i < len; i++)
    {
        if (max <= tab[i] && tab[i] >= 0)
        {
            max = tab[i];
            index = i;
        }
    }
    return index;
}

int vif_left(int tab[], size_t index)
{
    size_t cp = 0;
    for (size_t i = 0; i < index; i++)
    {
        if (tab[i] <= tab[i + 1] && tab[i] >= 0)
        {
            cp++;
        }
    }
    if (cp == index)
    {
        return 1;
    }
    else
    {
        return 0;
    }
}

int vif_right(int tab[], size_t len)
{
    size_t cp = 0;
    size_t index = index_max_right(tab, len);

    for (size_t i = len - 1; i > index; i--)
    {
        if (tab[i] <= tab[i - 1])
        {
            cp++;
        }
    }
    if (cp == len - 1 - index)
    {
        return 1;
    }
    else
    {
        return 0;
    }
}

int top_of_the_hill(int tab[], size_t len)
{
    if (!check_neg(tab, len))
    {
        return -1;
    }
    if (len == 1)
    {
        return 0;
    }

    size_t top_l = index_max_left(tab, len);
    size_t top_r = index_max_right(tab, len);

    if (tab[0] == tab[len - 1] && tab[0] == tab[top_l])
    {
        return -1;
    }

    for (size_t i = top_l; i < top_r; i++)
    {
        if (tab[i] < tab[top_l])
        {
            return -1;
        }
    }

    if (top_l == 0 || top_r == len - 1)
    {
        if (top_l == 0 && vif_right(tab, len))
        {
            return top_l;
        }
        if (top_r == len - 1 && vif_left(tab, len))
        {
            return top_r;
        }
    }

    if (vif_left(tab, index_max_left(tab, len)) && vif_right(tab, len))
    {
        return index_max_left(tab, len);
    }
    return -1;
}
