#pragma once

template <typename InputIt, typename UnaryFunction>
UnaryFunction my_foreach(InputIt first, InputIt last, UnaryFunction func)
{
    for (auto pp = first; pp != last; ++pp)
    {
        func(*pp);
    }
    return func;
}
