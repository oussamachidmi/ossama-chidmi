
#include "seq.h"

#include <assert.h>
#include <ctype.h>
#include <stdio.h>

#include "cmd.h"
#include "def.h"
#include "fcursor.h"

static int last_rc = 0;

int Seq_rc()
{
    return last_rc;
}

static int Rc(int rc)
{
    last_rc = rc;
    return last_rc;
}

int Seq_exec()
{
    int rc = 0;
    char c;
    while (true)
    {
        rc = Cmd_exec();
        c = FCursor_get_c();
        if (c == EOF || c == '\0' || c == '\n')
        {
            FCursor_set_c(c);
            return Rc(rc);
        }
        if (c != ';')
        {
            rc = 2;
            return Rc(rc);
        }
    }
    return Rc(rc);
}
