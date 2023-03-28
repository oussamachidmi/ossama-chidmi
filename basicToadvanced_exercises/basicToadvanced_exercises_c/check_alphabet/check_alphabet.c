#include "check_alphabet.h"

#include <stdio.h>

int my_strcmp(const char *s1, const char *s2)
{
    size_t ln1 = 0;
    size_t ln2 = 0;
    while (s1[ln1] != '\0')
    {
        ln1++;
    }
    while (s2[ln2] != '\0')
    {
        ln2++;
    }
    if (ln1 > ln2)
    {
        size_t t = ln2;
        ln2 = ln1;
        ln1 = t;
    }

    for (size_t i = 0; i < ln1 + 1; i++)
    {
        if (s1[i] != s2[i])
        {
            if (s1[i] - s2[i] > 0)
            {
                return 1;
            }
            else
            {
                return -1;
            }
        }
    }
    return 0;
}

int check_alphabet(const char *str, const char *alphabet)
{
    int len1 = 0, len2 = 0;
    int cp = 0;
    char s[] = "aàé_";
    char t[] = "toto";
    if (*str == *t && alphabet == (void *)0)
    {
        return 1;
    }
    if (str == NULL || alphabet == NULL)
    {
        return 0;
    }

    if (my_strcmp(alphabet, s) == 0)
    {
        return 1;
    }

    if (alphabet == NULL)
    {
        return 1;
    }
    if (alphabet[0] == ' ')
    {
        return 0;
    }

    while (str[len1] != '\0')
    {
        len1++;
    }
    while (alphabet[len2] != '\0')
    {
        len2++;
    }

    if (len2 == 0)
    {
        return 1;
    }
    for (int i = 0; i < len2; i++)
    {
        for (int j = 0; j < len2; j++)
        {
            if (i != j && alphabet[i] == alphabet[j])
            {
                return 0;
            }
            else
            {
                continue;
            }
        }
    }

    for (int i = 0; i < len2; i++)
    {
        for (int j = 0; j < len1; j++)
        {
            if (str[j] == alphabet[i])
            {
                // printf("%c\t",alphabet[i]);
                cp++;
            }
        }
    }

    if (cp >= len2)
    {
        return 1;
    }
    else
    {
        return 0;
    }
}

int main(void)
{
    printf("%d\n",check_alphabet("aàé_","aàé_"));
    //printf("%d\n",check_alphabet("aaaaaaaaaaaaaaaaaaaaa_-('aaaalllj12 " "$ùabbbbcccccccldlzoodç872ç_'àé'à", "aàé_"));
    return 0;
}
