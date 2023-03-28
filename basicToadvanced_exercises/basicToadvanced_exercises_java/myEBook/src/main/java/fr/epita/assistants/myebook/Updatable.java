package fr.epita.assistants.myebook;

interface Updatable
{
    // Return the current firmware version of the device.
    double getVersion();

    // Update the device to a newer firmware. If called with
// an older firmware, should do nothing.
    void update(double version);
}