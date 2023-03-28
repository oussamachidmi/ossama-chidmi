#include "engine.hh"

#include <iostream>

Engine::Engine(int fuel)
    : fuel_(fuel)
{}

bool Engine::start()
{
    if (fuel_ > 0)
    {
        fuel_--;
        std::cout << "Engine starts with " << fuel_ << " units of fuel" << '\n';
        return true;
    }
    else
    {
        return false;
    }
}

void Engine::use(int cmv)
{
    if (cmv > fuel_)
    {
        std::cout << "Engine uses " << fuel_ << " fuel units" << '\n';
        fuel_ = 0;
    }
    else
    {
        std::cout << "Engine uses " << cmv << " fuel units" << '\n';
        fuel_ -= cmv;
    }
}

void Engine::stop() const
{
    std::cout << "Stop Engine" << '\n';
}

void Engine::fill(int f)
{
    fuel_ += f;
    std::cout << "Engine now has " << fuel_ << " fuel units" << '\n';
}
