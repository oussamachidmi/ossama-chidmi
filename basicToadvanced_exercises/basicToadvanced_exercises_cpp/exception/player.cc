#include "player.hh"

#include <iostream>
#include <string>

Player::Player(const std::string& name, unsigned int age)
{
    if (age > 150)
    {
        throw InvalidArgumentException("Sorry gramp, too old to play.");
    }
    if (name.empty())
    {
        throw InvalidArgumentException("Name can't be empty.");
    }
}
