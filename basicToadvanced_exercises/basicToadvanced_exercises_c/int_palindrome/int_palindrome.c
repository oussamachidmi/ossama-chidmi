#include <stdio.h>

int int_palindrome(int n)
{
    if (n >= 0)
    {
        int rev = 0, rm, ori = n;
        while (n != 0)
        {
            rm = n % 10;
            rev = rev * 10 + rm;
            n /= 10;
        }
        if (ori == rev)
        {
            return 1;
        }
        else
            return 0;
    }
    else
        return 0;
}
