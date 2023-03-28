#pragma once

constexpr unsigned long long factorial(unsigned int n)
{
    return n <= 1 ? 1 : n * factorial(n - 1);
}