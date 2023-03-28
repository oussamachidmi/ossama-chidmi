#pragma once

template <unsigned n>
constexpr bool is_prime()
{
    if (n <= 1)
    {
        return false;
    }
    for (unsigned i = 2; i < n; i++)
    {
        if (n % i == 0)
        {
            return false;
        }
    }
    return true;
}