#include "bubble_sort.h"

#include <stdio.h>

void bubble_sort(int array[], size_t size)
{
    if (size != 0)
    {
        for (size_t step = 0; step < size - 1; ++step)
        {
            for (size_t i = 0; i < size - step - 1; ++i)
            {
                if (array[i] > array[i + 1])
                {
                    int temp = array[i];
                    array[i] = array[i + 1];
                    array[i + 1] = temp;
                }
            }
        }
    }
}
