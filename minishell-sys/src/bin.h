#ifndef bin_h
#define bin_h

#include <errno.h>
#include <signal.h>
#include <stdbool.h>
#include <stdio.h>
#include <stdlib.h>
#include <sys/types.h>
#include <sys/wait.h>
#include <unistd.h>

#include "def.h"
#include "fcursor.h"

int Bin_any(int argc, char *argv[]);
int Bin_echo(int argc, char *argv[]);
int Bin_cd(int argc, char *argv[]);
int Bin_kill(int argc, char *argv[]);
int Bin_exit(int argc, char *argv[]);

#endif /* bin_h */
