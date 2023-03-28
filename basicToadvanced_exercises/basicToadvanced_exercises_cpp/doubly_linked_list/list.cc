#include "list.hh"

List::List()
    : nb_elts_(0)
    , first_(nullptr)
    , last_(nullptr)
{}

void List::push_front(int i)
{
    auto nd = std::make_shared<Node>(i);
    if (length() == 0)
    {
        last_ = nd;
    }
    else
    {
        nd->next_set(first_);
        first_->prev_set(nd);
    }
    first_ = nd;
    nb_elts_++;
}

void List::push_back(int i)
{
    auto new_node = std::make_shared<Node>(i);
    if (nb_elts_ == 0)
    {
        first_ = new_node;
        last_ = new_node;
    }
    else
    {
        new_node->prev_set(last_);
        last_->next_set(new_node);
        last_ = new_node;
    }
    ++nb_elts_;
}

std::optional<int> List::pop_front()
{
    if (length() != 0)
    {
        int val = first_->val_get();
        first_ = first_->next_get();
        if (first_)
        {
            first_->prev_set(nullptr);
            --nb_elts_;
        }
        else
        {
            last_ = nullptr;
            --nb_elts_;
        }
        return val;
    }
    else
    {
        return std::nullopt;
    }
}

std::optional<int> List::pop_back()
{
    if (nb_elts_ == 0)
    {
        return std::nullopt;
    }
    int val = last_->val_get();
    if (first_ == last_)
    {
        first_ = nullptr;
        last_ = nullptr;
    }
    else
    {
        last_ = last_->prev_get();
        last_->next_set(nullptr);
    }
    --nb_elts_;
    return val;
}

void List::print(std::ostream& op) const
{
    auto node = first_;
    while (node)
    {
        op << node->val_get();
        node = node->next_get();
        if (node)
        {
            op << " ";
        }
    }
}

int List::length() const
{
    return nb_elts_;
}
