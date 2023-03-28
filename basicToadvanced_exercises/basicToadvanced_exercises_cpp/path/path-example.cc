#include <iostream>

#include "unix-path.hh"
#include "windows-path.hh"

int main()
{
    auto windows_path = WindowsPath('E');

    std::cout << windows_path.to_string() << '\n';

    std::cout << windows_path.join("Users").join("Y*KA").join("cpp").to_string()
              << '\n'; /* E:\Users\YAKA\cpp\ */

    auto unix_path = UnixPath();

    std::cout << unix_path.to_string() << '\n';

    std::cout << unix_path.join("h|me").join("?aka").join("cpp").to_string()
              << '\n'; // /home/yaka/cpp/

    std::cout << unix_path.join("ma*in.cc", true).to_string()
              << '\n'; // /home/yaka/cpp/main.cc

    return 0;
}
