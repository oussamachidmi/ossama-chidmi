#include "shared-pointer.hh"

int main()
{
    // Lifetime of the data
    {
        SharedPointer<int> p2;
        {
            SharedPointer<int> p1(new int(5));
            p2 = p1; // Now both SharedPointers own the memory
        }
        // p1 is freed, but the int pointer remains
        // Memory still exists, due to p2
        std::cout << "Value of p2: " << *p2 << std::endl; // Output: 5
    }
    // p2 is freed, and since no one else owns the memory,
    // the int pointer is freed too

    return 0;
}
