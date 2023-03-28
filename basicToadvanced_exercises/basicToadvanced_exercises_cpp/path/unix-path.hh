#pragma once

#include <iostream>
#include <string>
#include <vector>

#include "path.hh"

class UnixPath : public Path
{
public:
    UnixPath();
    std::string to_string() const override;
    UnixPath& join(const std::string& tail, bool is_file = false) override;
    bool isValidFilename(const std::string& filename);

private:
    bool final_ = false;
};