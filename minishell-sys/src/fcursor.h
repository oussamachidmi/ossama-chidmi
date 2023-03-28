#ifndef fcursor_h
#define fcursor_h

#include <assert.h>
#include <errno.h>
#include <fcntl.h>
#include <stdio.h>
#include <unistd.h>

void FCursor_reset();
int FCursor_line();
int FCursor_out_open(char *filename, int oflags);
void FCursor_out_reset();
int FCursor_in_open(char *filename, int oflags);
void FCursor_in_reset();
char FCursor_get_c();
void FCursor_set_c(char c);
void FCursor_flush_all();

#endif /* fcursor_h */
