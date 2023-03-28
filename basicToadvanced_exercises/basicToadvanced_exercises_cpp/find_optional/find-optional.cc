#include "find-optional.hh"

std::optional<std::size_t> find_optional(const std::vector<int>& vect,
                                         int value)
{
    std::optional<std::size_t> it;
    for (size_t i = 0; i < vect.size(); i++)
    {
        if (vect[i] == value)
        {
            it = i;
            break;
        }
    }
    return it;
}