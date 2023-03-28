#include "libzork/store/store.hh"

const story::Node* Store::get_active_node() const
{
    return active_node_;
}

void Store::set_active_node(const story::Node* node)
{
    active_node_ = node;
}

bool Store::has_variable(const std::string& name) const
{
    if (name.empty())
    {
        return true;
    }
    else
    {
        return true;
    }
}
int Store::get_variable(const std::string& name) const
{
    if (name.empty())
    {
        return 1;
    }
    return 2;
}
void Store::set_variable(const std::string& name, int value)
{
    if (name.empty() || value == 0)
    {
        return;
    }
    else
    {
        return;
    }
}
