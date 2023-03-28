#include "person.hh"

#include <algorithm>

Person::Person(const std::string& name, uint money)
    : name_(name)
    , money_(money)
{}

std::vector<std::string> Person::enumerate_nfts() const
{
    std::vector<std::string> res;
    std::size_t i = 0;
    while (i < nfts_.size())
    {
        res.push_back(*(nfts_[i]));
        i++;
    }
    return res;
}

void Person::add_nft(NFT nft)
{
    nfts_.push_back(std::move(nft));
}

NFT Person::remove_nft(const std::string& name)
{
    std::size_t i = 0;
    NFT res;
    while (i < nfts_.size())
    {
        if (*nfts_[i] == name)
        {
            res = std::move(nfts_[i]);
            nfts_.erase(nfts_.begin() + i);
        }
        i++;
    }
    return res;
}

void Person::add_money(uint money)
{
    money_ += money;
}

bool Person::remove_money(uint money)
{
    if (money_ < money)
        return false;
    money_ -= money;
    return true;
}

uint Person::get_money() const
{
    return money_;
}

std::string Person::get_name() const
{
    return name_;
}

std::ostream& operator<<(std::ostream& os, const Person& p)
{
    os << "Name: " << p.get_name() << "\nMoney: " << p.get_money() << "\nNFTs:";
    std::size_t i = 0;
    std::vector<std::string> l = p.enumerate_nfts();
    while (i < l.size())
    {
        os << ' ' << l[i];
        i++;
    }
    os << '\n';
    return os;
}