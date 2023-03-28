#include "windows-path.hh"

WindowsPath::WindowsPath(char letter)
    : Path()
    , letter_(letter)
{}

std::string WindowsPath::to_string() const
{
    std::string line;
    line += letter_;
    line += ":\\";
    for (std::string p : path_)
    {
        line += p;
        if (p.compare(path_.back()))
            line += "\\";
    }
    if (!final_ && !path_.empty())
    {
        line += "\\";
    }
    return line;
};

WindowsPath& WindowsPath::join(const std::string& tail, bool is_file)
{
    if (final_)
    {
        return *this;
    }
    if (isValidFilename(tail))
    {
        if (is_file)
        {
            path_.push_back(tail);
            final_ = true;
        }
        else
        {
            path_.push_back(tail);
        }
    }

    return *this;
}

bool WindowsPath::isValidFilename(const std::string& filename)
{
    // Check if filename is empty or too long
    if (filename.empty() || filename.size() > 255)
    {
        return false;
    }

    // Check if filename contains any invalid characters
    const std::string invalidChars = "\\/:*?\"<>|";
    for (const char& c : filename)
    {
        if (invalidChars.find(c) != std::string::npos)
        {
            return false;
        }
    }

    // Check if filename ends with a dot or a space
    const char lastChar = filename.back();
    if (lastChar == '.' || lastChar == ' ')
    {
        return false;
    }

    // All checks passed, filename is valid
    return true;
}