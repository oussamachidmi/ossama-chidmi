
#include "fcursor.h"

static int orig_in = -1;
static int orig_out = -1;
static int out = -1;
static int in = -1;

char d[3];
int line;

void FCursor_reset()
{
    d[0] = 0;
    line = 1;
}

int FCursor_line()
{
    return line;
}

int FCursor_out_open(char *filename, int oflags)
{
    out = open(filename, oflags, 0666);
    if (out == -1)
    {
        perror(NULL);
        return errno;
    }
    fflush(stdout);
    orig_out = dup(fileno(stdout));
    if (dup2(out, fileno(stdout)) == -1)
    {
        perror(NULL);
        return errno;
    }
    return 0;
}

int FCursor_in_open(char *filename, int oflags)
{
    in = open(filename, oflags);
    if (in == -1)
    {
        perror(NULL);
        return errno;
    }
    fflush(stdin);
    orig_in = dup(fileno(stdin));
    if (dup2(in, fileno(stdin)) == -1)
    {
        perror(NULL);
        return errno;
    }
    return 0;
}

void FCursor_out_reset()
{
    fflush(stdout);
    close(out);
    dup2(orig_out, fileno(stdout));
    close(orig_out);
    orig_out = -1;
    out = -1;
}

void FCursor_in_reset()
{
    fflush(stdin);
    close(in);
    dup2(orig_in, fileno(stdin));
    close(orig_in);
    orig_in = -1;
    in = -1;
}

char FCursor_get_c()
{
    char c;
    if (d[0] > 0)
    {
        c = d[1];
        d[1] = d[2];
        d[0]--;
    }
    else
        c = (char)fgetc(stdin);
    if (c == '\n')
        line++;
    return c;
}
void FCursor_set_c(char c)
{
    assert(d[0] < 2);
    if (d[0] == 0)
    {
        d[1] = c;
    }
    else
    {
        d[2] = c;
    }
    d[0]++;
    if (c == '\n')
        line--;
}

void FCursor_flush_all()
{
    fflush(stdin);
    fflush(stdout);
    fflush(stderr);
}
