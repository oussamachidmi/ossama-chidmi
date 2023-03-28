#include "forward-multiplication.hh"

// using lambda_type = std::function<std::function<int(int)>(int)>;

lambda_type create_lambda()
{
    return [](int x) -> std::function<int(int)> {
        return [x](int y) -> int { return x * y; };
    };
}