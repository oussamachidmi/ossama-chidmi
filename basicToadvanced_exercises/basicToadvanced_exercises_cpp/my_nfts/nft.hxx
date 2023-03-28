#pragma once

#include <memory>

#include "nft.hh"

inline NFT create_nft(const std::string& name)
{
    auto a = std::make_unique<std::string>(name);
    return a;
}

inline NFT create_empty_nft()
{
    return nullptr;
}