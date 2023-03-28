#include "read-info.hh"

bool read_info(std::istream& input, DirectoryInfo& info)
{
    std::string l;
    std::getline(input, l);
    std::istringstream s(l);
    s >> info.name_ >> info.size_ >> std::oct >> info.rights_ >> info.owner_;
    if (s.eof() && !info.owner_.empty())
    {
        return true;
    }
    else
    {
        return false;
    }
    return false;
}