#include "word-count.hh"

#include <fstream>
#include <iostream>

ssize_t word_count(const std::string& filename)
{
    std::ifstream file_in(filename);
    std::string token;
    ssize_t count = 0;

    if (!file_in.is_open())
    {
        return -1;
    }
    while (file_in >> token)
        count++;

    return count;
}