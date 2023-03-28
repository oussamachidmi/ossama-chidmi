#include "arg.h"

#include <stdio.h>
#include <string.h>

#include "seq.h"

static size_t var_collect(char *out)
{
    char b[MAX_CHAR];
    size_t sz = 0;
    char c = FCursor_get_c();
    if (c != '$')
    {
        FCursor_set_c(c);
        return sz;
    }
    char c2 = FCursor_get_c();
    if (c2 == '?')
    {
        sprintf(out, "%d", Seq_rc());
        sz = strlen(out);
    }
    else
    {
        FCursor_set_c(c2);
        while (true)
        {
            char c = FCursor_get_c();
            if (!(isalpha(c) || c == '_' || (sz > 0 && isalnum(c))))
            {
                FCursor_set_c(c);
                break;
            }
            b[sz++] = c;
        }
    }
    if (sz > 0)
    {
        b[sz] = '\0';
        char *var = getenv(b);
        if (var != NULL)
        {
            strcpy(out, var);
            sz = strlen(out);
        }
    }
    return sz;
}

static bool is_op(char c)
{
    if (c == '&')
    {
        char c2 = FCursor_get_c();
        FCursor_set_c(c2);
        if (c2 == '&')
            return true;
        return false;
    }
    else
        return (c == '|' || c == '<' || c == '>');
}

size_t Arg_collect(char *out)
{
    bool sq = false;
    bool dq = false;
    size_t sz = 0;
    while (true)
    {
        sz += var_collect(out);
        char c = FCursor_get_c();
        if (c == EOF || c == '\0' || (c == '\n' && !sq && !dq))
        {
            FCursor_set_c(c);
            return sz;
        }
        if (c == '\"')
        {
            if (dq)
                return sz;
            else
                dq = true;
        }
        else if (c == '\'')
        {
            if (sq)
                return sz;
            else
                sq = true;
        }
        else if (!sq && !dq && c == ' ')
            return sz;
        else if (!sq && !sq && (c == ';' || is_op(c)))
        {
            FCursor_set_c(c);
            return sz;
        }
        else
            out[sz++] = c;
    }
    return sz;
}
