#include <stdio.h>

void quicksort(int *xArray, int xSize)
{
    if (xSize > 0)
    {
        int lPivot = xArray[xSize - 1];
        int lIndexOfLargestElement = 0;
        for (int i = 0; i < xSize - 1; i++)
        {
            if (xArray[i] < lPivot)
            {
                // Swap largest element with this
                int lTmp = xArray[i];
                xArray[i] = xArray[lIndexOfLargestElement];
                xArray[lIndexOfLargestElement] = lTmp;
                lIndexOfLargestElement++;
            }
        }
        // swap pivot with xArray[lIndexOfLargestElement]
        int lTmp = xArray[lIndexOfLargestElement];
        xArray[lIndexOfLargestElement] = xArray[xSize - 1];
        xArray[xSize - 1] = lTmp;
        if (lIndexOfLargestElement > 1)
            quicksort(xArray, lIndexOfLargestElement);
        if (xSize - lIndexOfLargestElement - 1 > 1)
            quicksort(xArray + lIndexOfLargestElement + 1,
                      xSize - lIndexOfLargestElement - 1);
    }
}
