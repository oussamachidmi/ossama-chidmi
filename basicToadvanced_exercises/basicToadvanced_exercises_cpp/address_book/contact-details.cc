#include "address-book.hh"

ContactDetails::ContactDetails(const std::string& telephone_number,
                               const std::string& personal_email)
{
    if (telephone_number.find_first_not_of("0123456789") != std::string::npos)
    {
        throw std::invalid_argument("Incorrect number.");
    }
    number = telephone_number;
    if (personal_email.find("@") == std::string::npos)
    {
        throw std::invalid_argument("Incorrect email.");
    }
    email = personal_email;
}
