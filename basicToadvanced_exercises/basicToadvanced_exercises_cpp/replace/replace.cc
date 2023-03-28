#include "replace.hh"

#include <fstream>
#include <iostream>
#include <string>

void replace(const std::string& input_filename,
             const std::string& output_filename, const std::string& src_token,
             const std::string& dst_token)
{
    std::ifstream file_in;
    std::string token;

    file_in.open(input_filename);
    if (!file_in.is_open())
    {
        std::cerr << "Cannot open input file\n";
        return;
    }

    std::ofstream file_out;
    file_out.open(output_filename);
    if (!file_out.is_open())
    {
        std::cerr << "Cannot write output file\n";
        return;
    }

    std::string line;
    // Read until eof or an error occurs
    while (std::getline(file_in, line))
    {
        size_t r = 0;
        while ((r = line.find(src_token, r)) != std::string::npos)
        {
            line.replace(r, src_token.length(), dst_token);
            r = r + dst_token.length();
        }
        file_out << line << "\n";
    }
    file_in.close();
    file_out.close();
}
