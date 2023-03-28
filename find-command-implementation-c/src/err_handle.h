#ifndef err_handle_h
#define err_handle_h

#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>
#include <errno.h>

#define OK  0
#define ERR 1

int err(const char * err_msg);

int warn(const char * warn_msg);

void assert_cond(bool cond_result,const char * msg);

int get_exit_status();


#endif