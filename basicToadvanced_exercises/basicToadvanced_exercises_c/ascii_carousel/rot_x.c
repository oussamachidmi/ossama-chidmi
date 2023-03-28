#include <stdio.h>

void rot_x(char str[], int shift)
{
    int i;
    char ch;
    for (i = 0; str[i] != '\0'; ++i)
    {
        ch = str[i];
        if (ch >= 'a' && ch <= 'z')
        {
            ch = ch + shift;
            if (ch > 'z')
            {
                ch = ch - 'z' + 'a' - 1;
            }
            if (ch < 'a')
            {
                ch = ch + 'z' - 'a' + 1;
            }
            str[i] = ch;
        }
        else if (ch >= 'A' && ch <= 'Z')
        {
            ch = ch + shift;
            if (ch > 'Z')
            {
                ch = ch - 'Z' + 'A' - 1;
            }
            if (ch < 'A')
            {
                ch = ch + 'Z' - 'A' + 1;
            }
            str[i] = ch;
        }
    }
}
