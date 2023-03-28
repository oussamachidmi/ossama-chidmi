#pragma once

#include <iostream>
#include <string>

struct ContactDetails
{
public:
    ContactDetails(const std::string& telephone_number,
                   const std::string& personal_email);
    friend std::ostream& operator<<(std::ostream& os,
                                    const ContactDetails& details);

private:
    std::string number;
    std::string email;
};

inline std::ostream& operator<<(std::ostream& os, const ContactDetails& details)
{
    os << details.number << ", " << details.email;
    return os;
}