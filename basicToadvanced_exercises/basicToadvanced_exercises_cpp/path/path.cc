#include "path.hh"

Path& Path::join(const std::string& tail, bool is_file)
{
    if (final_)
    {
        return *this;
    }
    if (is_file)
    {
        path_.push_back(tail);
        final_ = true;
    }
    else
    {
        path_.push_back(tail);
    }
    return *this;
}
