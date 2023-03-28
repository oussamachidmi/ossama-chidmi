#pragma once

#include "exist.hh"

template <class T>
bool Exist<T>::operator()(const T& vl)
{
    if (snv.count(vl) == 0)
    {
        snv.insert(vl);
        return false;
    }
    return true;
}