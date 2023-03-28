template <class InputIt, class UnaryFunction>
UnaryFunction my_foreach(InputIt first, InputIt last, UnaryFunction f)
{
    for (auto it = first; it != last; ++it)
    {
        f(*it);
    }
    return f;
}

template <typename Iterator, typename Func>
void my_foreach(Iterator begin, Iterator end, Func func)
{
    while (begin != end)
    {
        func(*begin);
        ++begin;
    }
}
template <typename InputIt, typename UnaryFunction>
UnaryFunction my_foreach(InputIt first, InputIt last, UnaryFunction func)
{
    for (auto it = first; it != last; ++it)
    {
        func(*it);
    }
    return func;
}

#include <iostream>

template <unsigned N, unsigned D>
struct is_divisible
{
    static constexpr bool value =
        (N % D == 0) ? true : is_divisible<N, D - 1>::value;
};

template <unsigned N>
struct is_divisible<N, 2>
{
    static constexpr bool value = (N % 2 == 0);
};

template <unsigned N, unsigned D = N - 1>
struct is_prime
{
    static constexpr bool value =
        !is_divisible<N, D>::value && is_prime<N, D - 1>::value;
};

template <unsigned N>
struct is_prime<N, 1>
{
    static constexpr bool value = true;
};

#include <iostream>

template <int N, int D>
struct Frac
{
    static const int num = N;
    static const int den = D;
};

template <int N, int D1, int D2>
struct AddImpl
{
    typedef Frac<N * D2 + D1 * Frac<N, D1>::den, D1 * D2> result;
};

template <int N, int D1, int D2>
struct SubImpl
{
    typedef Frac<N * D2 - D1 * Frac<N, D1>::den, D1 * D2> result;
};

template <int N, int D1, int D2>
struct MulImpl
{
    typedef Frac<N * Frac<N, D1>::num * D2, D1 * Frac<N, D1>::den * D2> result;
};

template <int N, int D1, int D2>
struct DivImpl
{
    typedef Frac<N * Frac<D2, N>::den, D1 * Frac<D2, N>::num> result;
};

template <typename Frac>
void print()
{
    std::cout << Frac::num << "/" << Frac::den << '\n';
}

template <int N, int D>
struct Frac
{
    static const int num = N;
    static const int den = D;
};

template <int N, int D1, int D2>
struct AddImpl
{
    typedef Frac<N * D2 + D1 * Frac<N, D1>::den, D1 * D2> result;
};

template <int N, int D1, int D2>
struct SubImpl
{
    typedef Frac<N * D2 - D1 * Frac<N, D1>::den, D1 * D2> result;
};

template <int N, int D1, int D2>
struct MulImpl
{
    typedef Frac<N * Frac<N, D1>::num * D2, D1 * Frac<N, D1>::den * D2> result;
};

template <int N, int D1, int D2>
struct DivImpl
{
    typedef Frac<N * Frac<D2, N>::den, D1 * Frac<D2, N>::num> result;
};

template <typename Frac>
void print()
{
    std::cout << Frac::num << "/" << Frac::den << '\n';
}
