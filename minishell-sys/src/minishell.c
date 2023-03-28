
#include "minishell.h"

static int run_one()
{
    int rc = Seq_exec();
    FCursor_flush_all();
    return rc;
}

static int run_loop()
{
    int rc = 0;
    while (true)
    {
        printf("minishell$ ");
        FCursor_flush_all();
        rc = run_one();
        FCursor_reset();
    }
    return rc;
}

static int run_sh(char *s)
{
    int rc = FCursor_in_open(s, O_RDONLY);
    if (rc != 0)
        return rc;
    rc = run_one();
    FCursor_in_reset();
    return rc;
}

int main(int argc, char *argv[])
{
    FCursor_reset();
    if (!isatty(STDIN_FILENO))
        return run_one();
    if (argc >= 2)
        return run_sh(argv[1]);
    return run_loop();
}
