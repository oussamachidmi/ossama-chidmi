#include <stdio.h>

int main(int argc, char **argv)
{
    if (argc == 3)
    {
        if (((*argv[2] - '0') > 0) && ((*argv[2] - '0') <= 9))
        {
            for (int i = 0; i < (*argv[2] - '0'); i++)
            {
                puts(argv[1]);
            }
            return 0;
        }
        else
        {
            return 0;
        }
    }
    else
    {
        return 1;
    }
}
