#include "closer-to.hh"

#include <algorithm>

CloserTo::CloserTo(int target)
    : i_(target)
{}

bool CloserTo::operator()(const int& a, const int& b) const
{
    auto rr = a - i_;
    auto pp = b - i_;
    auto dt = std::abs(rr);
    auto td = std::abs(pp);
    if (dt != td)
    {
        return dt < td;
    }
    else
    {
        return a < b;
    }
}
