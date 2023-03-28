#include "int-container.hh"

MyIntContainer::MyIntContainer(size_t size)
    : current_size_(0)
    , max_size_(size)
    , elems_(new int[size])
{}

void MyIntContainer::print() const
{
    for (size_t i = 0; i < current_size_; ++i)
    {
        if (i == current_size_ - 1)
        {
            std::cout << elems_[i];
        }
        else
        {
            std::cout << elems_[i] << " | ";
        }
    }
    std::cout << '\n';
}

size_t MyIntContainer::get_len() const
{
    return current_size_;
}

bool MyIntContainer::add(int elem)
{
    if (current_size_ >= max_size_)
    {
        return false;
    }
    elems_[current_size_++] = elem;
    return true;
}

std::optional<int> MyIntContainer::pop()
{
    if (current_size_ > 0)
    {
        return elems_[--current_size_];
    }
    else
    {
        return std::nullopt;
    }
}

std::optional<int> MyIntContainer::get(size_t position) const
{
    if (position >= current_size_)
    {
        return std::nullopt;
    }
    else
    {
        return elems_[position];
    }
}

std::optional<size_t> MyIntContainer::find(int elem) const
{
    for (size_t i = 0; i < current_size_; ++i)
    {
        if (elems_[i] == elem)
        {
            return i;
        }
    }
    return std::nullopt;
}

void MyIntContainer::sort()
{
    std::sort(elems_.get(), elems_.get() + current_size_);
}

bool MyIntContainer::is_sorted() const
{
    for (size_t i = 1; i < current_size_; ++i)
    {
        if (elems_[i] < elems_[i - 1])
        {
            return false;
        }
    }
    return true;
}