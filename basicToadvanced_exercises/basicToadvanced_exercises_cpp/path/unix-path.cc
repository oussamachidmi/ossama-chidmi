#include "unix-path.hh"

UnixPath::UnixPath()
    : Path()
{}

std::string UnixPath::to_string() const
{
    std::string line;
    line += "/";

    for (std::string p : path_)
    {
        line += p;
        if (p.compare(path_.back()))
        {
            line += "/";
        }
    }
    if (!final_ && !path_.empty())
    {
        line += "/";
    }
    return line;
};

UnixPath& UnixPath::join(const std::string& tail, bool is_file)
{
    // Check if the file name matches the regular expression
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
