#include "address-book.hh"

bool AddressBook::add(const std::string& full_name, const std::string& email,
                      const std::string& number)
{
    if (full_name.empty())
    {
        return false;
    }
    try
    {
        book_.insert(std::make_pair(full_name, ContactDetails(number, email)));
        return true;
    }
    catch (const std::exception& e)
    {
        return false;
    }
}

std::vector<ContactDetails> AddressBook::find(const std::string& full_name)
{
    std::vector<ContactDetails> cnt;
    for (const auto& [name, contact] : book_)
    {
        if (name == full_name)
        {
            cnt.push_back(contact);
        }
    }
    return cnt;
}

std::size_t AddressBook::count(const std::string& full_name)
{
    return book_.count(full_name);
}

bool AddressBook::remove(const std::string& full_name, std::size_t index)
{
    auto cmp = this->count(full_name);
    if (cmp <= index)
    {
        return false;
    }
    std::multimap<std::string, ContactDetails>::iterator it = book_.begin();
    for (size_t i = 0; it != book_.end(); it++)
    {
        if (it->first != full_name)
        {
            continue;
        }
        else
        {
            if (i == index)
            {
                book_.erase(it);
                return true;
            }
            i++;
        }
    }
    return false;
}

void AddressBook::remove_all(const std::string& full_name)
{
    book_.erase(full_name);
}
