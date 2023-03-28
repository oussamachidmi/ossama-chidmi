package fr.epita.assitants.travel;

import java.time.LocalDateTime;
import java.time.format.DateTimeFormatter;

public class Travel {
    public static void travelTo(Country source, Country destination) {
        LocalDateTime src = LocalDateTime.now(source.countryZone);
        LocalDateTime dest = src.plusHours(source.travelTimes.get(destination.countryName));
        DateTimeFormatter formatter = DateTimeFormatter.ofPattern("E, dd MMM yyyy HH:mm:ss Z");
        System.out.println("Boarding in " + source.countryName + ", local date and time is: " + src.format(formatter));
        System.out.println("Landing in " + destination.countryName + ", local date and time on arrival will be: " + dest.format(formatter));
    }
}