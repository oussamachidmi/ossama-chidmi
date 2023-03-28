
#ifndef cmd_h
#define cmd_h

#include <assert.h>
#include <errno.h>
#include <stdbool.h>
#include <stddef.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>

#include "arg.h"
#include "bin.h"
#include "def.h"
#include "fcursor.h"

typedef enum
{
    OP_NONE,
    OP_AND,
    OP_OR,
    OP_PIPE,
    OP_RD_L,
    OP_RD_LL,
    OP_RD_R,
    OP_RD_RR,
    OP_BG_PROC,
} Op;

int Cmd_exec();

#endif /* cmd_h */
