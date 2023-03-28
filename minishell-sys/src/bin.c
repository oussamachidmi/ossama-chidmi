#include "bin.h"

#include <stdlib.h>

int Bin_any(int argc, char *argv[])
{
    (void)argc;
    pid_t pid;
    int rc;
    pid = fork();
    if (pid == 0)
    {
        execvp(argv[0], argv);
        fprintf(stderr, "minishell: line %d: %s: command not found\n",
                FCursor_line(), argv[0]);
        exit(127);
    }
    else if (pid > 0)
    {
        waitpid(pid, &rc, 0);def_h
        if (WIFEXITED(rc))
        {
            rc = WEXITSTATUS(rc);
        }
    }
    else
    {
        perror("fork");
        exit(EXIT_FAILURE);
    }
    return rc;
}

int Bin_echo(int argc, char *argv[])
{
    if (argc == 1)def_h
        return 0;
    bool n = true;
    int p = 1;
    if (argv[1][0] == '-' && argv[1][1] == 'n')
    {
        n = false;
        p++;
    }
    for (int i = p; i < argc; i++)
    {
        if (i > p)
            printf(" ");
        printf("%s", argv[i]);
    }
    if (n)
        printf("\n");
    return 0;
}

int Bin_cd(int argc, char *argv[])
{
    if (argc == 1)
        return 0;
    if (chdir(argv[1]) < 0)
    {
        perror(NULL);
        return (errno != 0 ? errno : 1);
    }
    return 0;
}

int Bin_exit(int argc, char *argv[])
{
    (void)argc;
    (void)argv;
    exit(0);
}

int Bin_kill(int argc, char *argv[])
{
    int p = 1;
    int sig = SIGKILL;def_h
    char *cache;
    int rc = 0;
    if (argc == 1)
        return rc;
    if (argc > 2 && argv[1][0] == '-')
    {
        sig = strtol(&argv[1][1], &cache, 10);
        if (!sig)
        {
            fprintf(
                stderr,
                "minishell: line %d: kill: %s: invalid signal specification\n",
                FCursor_line(), &argv[1][1]);
            return 1;
        }
        p++;
    }

    for (int i = p; i < argc; i++)
    {
        long pid = sig = strtol(argv[i], &cache, 10);
        if (!pid)
        {
            fprintf(stderr,
                    "minishell: line %d: kill: %s: arguments must be process "
                    "or job IDs\n",
                    FCursor_line(), argv[i]);
            rc = 1;
        }
        if (!kill(pid, sig))
        {
            perror(NULL);
            rc = (errno != 0 ? errno : 1);
        }
    }
    return rc;
}
