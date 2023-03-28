#include "merge-sort.hh"

void merge_sort(iterator_type begin, iterator_type end)
{
    if (end - begin >= 2)
    {
        auto middle = begin + (end - begin) / 2;
        merge_sort(begin, middle);
        merge_sort(middle, end);
        std::inplace_merge(begin, middle, end);
    }
}