// path.hh
#ifndef PATH_HH
#    define PATH_HH

#    include <string>

class Path
{
public:
    virtual std::string to_string() const = 0;
    virtual Path& join(const std::string& tail, bool is_file = false) = 0;
};

#endif // PATH_HH

// unix-path.hh
#ifndef UNIX_PATH_HH
#    define UNIX_PATH_HH

#    include "path.hh"

class UnixPath : public Path
{
public:
    UnixPath();
    std::string to_string() const override;
    UnixPath& join(const std::string& tail, bool is_file = false) override;

private:
    std::string path_;
    bool final_ = false;
};

#endif // UNIX_PATH_HH

// windows-path.hh
#ifndef WINDOWS_PATH_HH
#    define WINDOWS_PATH_HH

#    include "path.hh"

class WindowsPath : public Path
{
public:
    explicit WindowsPath(char drive_letter);
    std::string to_string() const override;
    WindowsPath& join(const std::string& tail, bool is_file = false) override;

private:
    std::string path_;
    bool final_ = false;
};

#endif // WINDOWS_PATH_HH

// path.cc
#include "path.hh"

// no implementation needed for abstract class

// unix-path.cc
#include "unix-path.hh"

UnixPath::UnixPath()
    : path_("/")
{}

std::string UnixPath::to_string() const
{
    return path_;
}

UnixPath& UnixPath::join(const std::string& tail, bool is_file)
{
    if (final_)
    {
        return *this;
    }
    if (is_file)
    {
        path_ += tail;
        final_ = true;
    }
    else
    {
        if (path_.back() != '/')
        {
            path_ += '/';
        }
        path_ += tail;
    }
    return *this;
}

// windows-path.cc
#include <algorithm>
#include <cctype>

#include "windows-path.hh"

WindowsPath::WindowsPath(char drive_letter)
    : path_(std::string(1, drive_letter) + ":\\")
{}

std::string WindowsPath::to_string() const
{
    return path_;
}

WindowsPath& WindowsPath::join(const std::string& tail, bool is_file)
{
    if (final_)
    {
        return *this;
    }
    if (std::any_of(tail.begin(), tail.end(), [](char c) {
            return c == ':' || c == '\"' || c == '|' || c == '?' || c == '*';
        }))
    {
        return *this;
    }
    if (is_file)
    {
        path_ += tail;
        final_ = true;
    }
    else
    {
        if (path_.back() != '\\')
        {
            path_ += '\\';
        }
        path_ += tail;
    }
    return *this;
}

WindowsPath& WindowsPath::join(const std::string& tail, bool is_file)
{
    if (final_)
    {
        return *this;
    }
    std::string invalid_chars = R"(:"\/|?*)";
    if (tail.find_first_of(invalid_chars) != std::string::npos)
    {
        return *this;
    }
    if (path_.empty())
    {
        if (tail.size() >= 2 && std::isalpha(tail[0]) && tail[1] == ':')
        {
            path_ += tail;
        }
        else
        {
            path_ += drive_ + ":\\";
            path_ += tail;
        }
    }
    else
    {
        if (path_.back() != '\\')
        {
            path_ += '\\';
        }
        path_ += tail;
    }
    if (is_file)
    {
        final_ = true;
    }
    return *this;
}
WindowsPath& WindowsPath::join(const std::string& tail, bool is_file)
{
    if (!final_ && !tail.empty()
        && tail.find_first_of(":\"|?*") == std::string::npos)
    {
        if (!is_file && !path_.empty() && path_.back() != '\\')
        {
            path_ += '\\';
        }
        path_ += tail;
    }
    return *this;
}