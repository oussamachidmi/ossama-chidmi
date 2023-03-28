#include <stdio.h>

void t_hanoi(int n, char D, char A, char I)
{
    if (n != 0)
    {
        t_hanoi(n - 1, D, I, A);
        printf("%c->%c\n", D, A);
        // t_hanoi(1, D, I, A);
        t_hanoi(n - 1, I, A, D);
    }
}

void hanoi(unsigned n)
{
    t_hanoi(n, '1', '3', '2');
}
