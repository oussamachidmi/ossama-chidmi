#include "vice-president.hh"

#include <iostream>

void VicePresident::handle_request(int amount)
{
    if (amount <= 6)
    {
        std::cout << "VicePresident handles\n";
    }
    else
    {
        forward_request(amount);
    }
}
