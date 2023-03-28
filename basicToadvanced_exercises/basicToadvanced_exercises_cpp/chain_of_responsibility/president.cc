#include "president.hh"

#include <iostream>

void President::handle_request(int amount)
{
    if (amount <= 9)
    {
        std::cout << "President handles\n";
    }
    else
    {
        forward_request(amount);
    }
}
