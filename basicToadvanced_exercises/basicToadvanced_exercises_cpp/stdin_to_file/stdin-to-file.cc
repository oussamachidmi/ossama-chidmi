#include "stdin-to-file.hh"

#include <fstream>
#include <iostream>

void stdin_to_file()
{
    std::string line;
    std::ofstream file_out;
    file_out.open("file.out");
    while (std::cin >> line)
    {
        file_out << line << '\n';
    }
}
