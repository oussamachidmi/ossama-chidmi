#include "handler.hh"

#include <iostream>

void Handler::set_successor(Handler* h)
{
    next_ = h;
}

Handler::Handler(Handler* next)
{
    this->next_ = next;
}

void Handler::forward_request(int level)
{
    if (this->next_)
    {
        this->next_->handle_request(level);
    }
    else
    {
        std::cout << "Nobody can handle this request\n";
    }
}
