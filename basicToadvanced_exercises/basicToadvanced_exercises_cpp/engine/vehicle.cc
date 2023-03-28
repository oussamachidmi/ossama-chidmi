#include "vehicle.hh"

Vehicle::Vehicle(const std::string& ml, int fl)
    : model_{ ml }
    , engine_{ fl }
{}

bool Vehicle::start()
{
    return engine_.start();
}

void Vehicle::stop() const
{
    engine_.stop();
}

void Vehicle::cruise(int fl)
{
    engine_.use(fl);
}

void Vehicle::fill(int fl)
{
    engine_.fill(fl);
}
