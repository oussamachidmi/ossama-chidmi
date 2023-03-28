#pragma once

#include <string>

namespace story
{
    // Forward declaration because of the recursive dependencies
    // store.hh -> node.hh -> (action|condition).hh -> store.hh
    class Node;
} // namespace story

class Store
{
public:
    virtual const story::Node* get_active_node() const;
    virtual void set_active_node(const story::Node* node);

    virtual bool has_variable(const std::string& name) const;
    virtual int get_variable(const std::string& name) const;
    virtual void set_variable(const std::string& name, int value);

private:
    const story::Node* active_node_ = nullptr;
};
