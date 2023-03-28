#pragma once

#include "shared-pointer.hh"

template <typename T>
SharedPointer<T>::SharedPointer(element_type* p)
{
    data_ = p;
    count_ = new long;
    *count_ = 1;
}

template <typename T>
SharedPointer<T>::SharedPointer(const SharedPointer<element_type>& other)
{
    data_ = other.data_;
    count_ = other.count_;
    *count_ += 1;
}

template <typename T>
SharedPointer<T>::~SharedPointer()
{
    *count_ -= 1;
    if (*count_ == 0)
    {
        delete count_;
        delete data_;
    }
}

template <typename T>
void SharedPointer<T>::reset(element_type* p)
{
    if (p == data_)
        return;

    *count_ -= 1;

    if (*count_ != 0)
    {
        count_ = new long;
        *count_ = 1;
    }

    else
    {
        *count_ = 1;
        delete data_;
    }

    data_ = p;
}

template <typename T>
SharedPointer<T> SharedPointer<T>::operator=(const SharedPointer& other)
{
    *count_ -= 1;

    if (*count_ == 0)
    {
        delete data_;
        delete count_;
    }

    data_ = other.data_;
    count_ = other.count_;
    *count_ += 1;

    return *this;
}

template <typename T>
T& SharedPointer<T>::operator*() const
{
    return *data_;
}

template <typename T>
T* SharedPointer<T>::operator->() const
{
    return data_;
}

template <typename T>
template <typename U>
bool SharedPointer<T>::operator==(const SharedPointer<U>& rhs) const
{
    return data_ == rhs.data_;
}

template <typename T>
template <typename U>
bool SharedPointer<T>::operator!=(const SharedPointer<U>& rhs) const
{
    return data_ != rhs.data_;
}

template <typename T>
bool SharedPointer<T>::operator==(const element_type* p) const
{
    return p == data_;
}

template <typename T>
bool SharedPointer<T>::operator!=(const element_type* p) const
{
    return p != data_;
}

template <typename T>
SharedPointer<T>::operator bool() const
{
    return data_;
}

template <typename T>
template <typename U>
bool SharedPointer<T>::is_a() const
{
    return dynamic_cast<U*>(data_) != nullptr;
}
