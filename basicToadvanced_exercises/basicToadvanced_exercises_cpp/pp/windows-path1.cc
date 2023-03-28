#include <iostream>
#include <map>
#include <stdexcept>
#include <vector>

struct ContactDetails
{
    ContactDetails(const std::string& telephone_number,
                   const std::string& personal_email)
    {
        // Check if the phone number contains only digits
        if (telephone_number.find_first_not_of("0123456789")
            != std::string::npos)
        {
            throw std::invalid_argument("Incorrect number.");
        }
        number = telephone_number;
        // Check if the email contains the "@" character
        if (personal_email.find("@") == std::string::npos)
        {
            throw std::invalid_argument("Incorrect email.");
        }
        email = personal_email;
    }
    std::string number;
    std::string email;

    friend std::ostream& operator<<(std::ostream& os,
                                    const ContactDetails& details)
    {
        os << details.number << ", " << details.email << std::endl;
        return os;
    }
};

class AddressBook
{
public:
    bool add(const std::string& full_name, const std::string& email,
             const std::string& number)
    {
        if (full_name.empty())
        {
            return false;
        }
        auto result = book_.insert(
            std::make_pair(full_name, ContactDetails(number, email)));
        return result.second;
    }

    std::vector<ContactDetails> find(const std::string& full_name)
    {
        std::vector<ContactDetails> results;
        auto range = book_.equal_range(full_name);
        for (auto it = range.first; it != range.second; ++it)
        {
            results.push_back(it->second);
        }
        return results;
    }

    std::size_t count(const std::string& full_name)
    {
        auto range = book_.equal_range(full_name);
        return std::distance(range.first, range.second);
    }

    bool remove(const std::string& full_name, std::size_t index)
    {
        auto range = book_.equal_range(full_name);
        auto it = range.first;
        std::advance(it, index);
        if (it == range.second)
        {
            return false;
        }
        book_.erase(it);
        return true;
    }

    void remove_all(const std::string& full_name)
    {
        book_.erase(full_name);
    }

    friend std::ostream& operator<<(std::ostream& os, const AddressBook& book)
    {
        os << book.book_.size() << " contact(s) in the address book."
           << std::endl;
        for (const auto& contact : book.book_)
        {
            os << "- " << contact.first << ": " << contact.second;
        }
        return os;
    }

private:
    std::multimap<std::string, ContactDetails> book_;
};

#include <iostream>
#include <map>
#include <stdexcept>
#include <string>
#include <vector>

struct ContactDetails
{
    ContactDetails(const std::string& telephone_number,
                   const std::string& personal_email)
    {
        if (!std::all_of(telephone_number.begin(), telephone_number.end(),
                         ::isdigit))
        {
            throw std::invalid_argument("Incorrect number.");
        }
        if (personal_email.find('@') == std::string::npos)
        {
            throw std::invalid_argument("Incorrect email.");
        }
        number = telephone_number;
        email = personal_email;
    }
    std::string number;
    std::string email;
    friend std::ostream& operator<<(std::ostream& os,
                                    const ContactDetails& details)
    {
        os << details.number << ", " << details.email;
        return os;
    }
};

class AddressBook
{
public:
    bool add(const std::string& full_name, const std::string& email,
             const std::string& number)
    {
        if (full_name.empty())
        {
            return false;
        }
        try
        {
            book_.emplace(full_name, ContactDetails(number, email));
            return true;
        }
        catch (std::invalid_argument&)
        {
            return false;
        }
    }
    std::vector<ContactDetails> find(const std::string& full_name)
    {
        std::vector<ContactDetails> contacts;
        auto range = book_.equal_range(full_name);
        for (auto it = range.first; it != range.second; ++it)
        {
            contacts.push_back(it->second);
        }
        return contacts;
    }
    std::size_t count(const std::string& full_name)
    {
        return book_.count(full_name);
    }
    bool remove(const std::string& full_name, std::size_t index)
    {
        auto range = book_.equal_range(full_name);
        auto it = range.first;
        while (index-- > 0 && it != range.second)
        {
            ++it;
        }
        if (it == range.second)
        {
            return false;
        }
        book_.erase(it);
        return true;
    }
    void remove_all(const std::string& full_name)
    {
        book_.erase(full_name);
    }
    friend std::ostream& operator<<(std::ostream& os, const AddressBook& book)
    {
        os << book.book_.size() << " contact(s) in the address book.\n";
        for (const auto& [name, details] : book.book_)
        {
            os << "- " << name << ": " << details << std::endl;
        }
        return os;
    }

private:
    std::multimap<std::string, ContactDetails> book_;
};
#include <iostream>
#include <map>
#include <stdexcept>
#include <vector>

struct ContactDetails
{
    ContactDetails(const std::string& telephone_number,
                   const std::string& personal_email)
        : number(telephone_number)
        , email(personal_email)
    {
        // Check if telephone_number is valid
        if (!std::all_of(number.begin(), number.end(), ::isdigit))
        {
            throw std::invalid_argument("Incorrect number.");
        }
        // Check if personal_email is valid
        if (email.find('@') == std::string::npos)
        {
            throw std::invalid_argument("Incorrect email.");
        }
    }

    std::string number;
    std::string email;

    friend std::ostream& operator<<(std::ostream& os,
                                    const ContactDetails& contact)
    {
        os << contact.number << ", " << contact.email;
        return os;
    }
};

class AddressBook
{
public:
    bool add(const std::string& full_name, const std::string& email,
             const std::string& number)
    {
        if (full_name.empty())
        {
            return false;
        }

        auto contact = std::make_pair(full_name, ContactDetails(number, email));
        auto result = book_.insert(contact);

        return result.second;
    }

    std::vector<ContactDetails> find(const std::string& full_name)
    {
        std::vector<ContactDetails> found_contacts;

        auto range = book_.equal_range(full_name);
        for (auto it = range.first; it != range.second; ++it)
        {
            found_contacts.push_back(it->second);
        }

        return found_contacts;
    }

    std::size_t count(const std::string& full_name)
    {
        auto range = book_.equal_range(full_name);
        return std::distance(range.first, range.second);
    }

    bool remove(const std::string& full_name, std::size_t index)
    {
        auto range = book_.equal_range(full_name);
        auto it = range.first;

        // Advance to the contact to be removed
        std::advance(it, index);

        if (it == range.second)
        {
            return false;
        }

        book_.erase(it);
        return true;
    }

    void remove_all(const std::string& full_name)
    {
        book_.erase(full_name);
    }

    friend std::ostream& operator<<(std::ostream& os, const AddressBook& book)
    {
        os << book.book_.size() << " contact(s) in the address book.\n";

        for (const auto& contact : book.book_)
        {
            os << "- " << contact.first << ": " << contact.second << "\n";
        }

        return os;
    }

private:
    std::multimap<std::string, ContactDetails> book_;
};
