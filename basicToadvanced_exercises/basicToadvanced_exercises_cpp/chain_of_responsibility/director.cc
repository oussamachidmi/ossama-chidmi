#include "director.hh"

#include <iostream>

void Director::handle_request(int amount)
{
    if (amount <= 3)
    {
        std::cout << "Director handles\n";
    }
    else
    {
        this->forward_request(amount);
    }
}
