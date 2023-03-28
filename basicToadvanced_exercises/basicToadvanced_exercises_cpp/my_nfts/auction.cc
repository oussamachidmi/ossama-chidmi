#include "auction.hh"

#include "person.hh"

Auction::Auction(Person& organizer, NFT nft, uint initial_bid)
    : organizer_(organizer)
    , highest_bidder_(nullptr)
    , highest_bid_(initial_bid)
{
    if (nft == nullptr)
        throw std::exception();
    else
        nft_ = std::move(nft);
}

bool Auction::bid(Person& person, uint money)
{
    if (money < highest_bid_)
    {
        return false;
    }
    if (highest_bidder_ != nullptr)
    {
        highest_bidder_->add_money(highest_bid_);
    }
    highest_bid_ = money;
    highest_bidder_ = &person;
    highest_bidder_->remove_money(money);
    return true;
}

std::string Auction::get_nft_name() const
{
    return *nft_;
}

uint Auction::get_highest_bid() const
{
    return highest_bid_;
}

Auction::~Auction()
{
    if (highest_bidder_ == nullptr)
    {
        organizer_.add_nft(std::move(nft_));
    }
    else
    {
        organizer_.add_money(highest_bid_);
        highest_bidder_->add_nft(std::move(nft_));
    }
}