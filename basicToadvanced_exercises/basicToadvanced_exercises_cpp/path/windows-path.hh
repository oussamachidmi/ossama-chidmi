#pragma once

#include "path.hh"

class WindowsPath : public Path
{
public:
    explicit WindowsPath(char letter);
    std::string to_string() const override;
    WindowsPath& join(const std::string& tail, bool is_file = false) override;
    bool isValidFilename(const std::string& filename);

private:
    char letter_;
    bool final_ = false;
};