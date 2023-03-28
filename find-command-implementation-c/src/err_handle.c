#include "err_handle.h"

static int status = OK;

int err(const char *err_msg)
{
    status = ERR;
    fprintf(stderr, "myfind: %s\n", err_msg);
    exit(status);
    return status;
}

int warn(const char *warn_msg)
{
    status = ERR;
    fprintf(stderr, "myfind: %s\n", warn_msg);
    return status;
}
void assert_cond(bool cond_result, const char *msg)
{
    if (!cond_result)
        err(msg); // exit
}

int get_exit_status()
{
    return status;
}