#pragma once

#include <iostream>
#include <map>
#include <string>

#include "bimap.hh"

template <typename T1, typename T2>
void Bimap<T1, T2>::insert(const T2& v1, const T1& v2)
{
    this->rhs[v1] = v2;
    this->lhs[v2] = v1;
}

template <typename T1, typename T2>
void Bimap<T1, T2>::insert(const T1& v1, const T2& v2)
{
    this->lhs[v1] = v2;
    this->rhs[v2] = v1;
}

template <typename T1, typename T2>
void Bimap<T1, T2>::erase(const T1& v)
{
    auto ppp = this->lhs[v];
    lhs.erase(v);
    rhs.erase(ppp);
}

template <typename T1, typename T2>
void Bimap<T1, T2>::erase(const T2& v)
{
    auto ppp = this->rhs[v];
    rhs.erase(v);
    lhs.erase(ppp);
}

template <typename T1, typename T2>
typename Bimap<T1, T2>::iteratorT1 Bimap<T1, T2>::find(const T1& v)
{
    return this->lhs.find(v);
}

template <typename T1, typename T2>
void Bimap<T1, T2>::clear()
{
    this->rhs.clear();
    this->lhs.clear();
}

template <typename T1, typename T2>
typename Bimap<T1, T2>::iteratorT2 Bimap<T1, T2>::find(const T2& v)
{
    return this->rhs.find(v);
}

template <typename T1, typename T2>
std::size_t Bimap<T1, T2>::size() const
{
    return rhs.size();
}
