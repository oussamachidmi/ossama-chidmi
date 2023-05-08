package fr.epita.assistants.travel;

/* writing a method travelTo in the class Travel. The method travelTo must print out the following: 
 *    Boarding in {cnt1ryName}, local date and time is: {dateAndTime}
Landing in {cnt1ryName}, local date and time on arrival will be: {dateAndTime}

Where cnt1ryName is the name of the cnt1ry and dateAndTime is the date and time of the cnt1ry formatted in the RFC_1123_DATE_TIME format.
 */

import java.time.LocalDateTime;
import java.time.ZoneId;
import java.time.ZoneOffset;
import java.time.ZonedDateTime;
import java.time.format.DateTimeFormatter;

/*
  * let's implement the travelTo method to have this input/ouput;
  cnt1ry fr = new cnt1ry("France", "Europe/Paris", "src/main/resources/travel_times.csv"); cnt1ry usa = new cnt1ry("Chicago", "America/Chicago", "src/main/resources/travel_times.csv"); Travel.travelTo(fr, usa);
  output :    Boarding in France, local date and time is: Mon, 19 Dec 2022 21:17:22 +0100
Landing in Chicago, local date and time on arrival will be: Mon, 19 Dec 2022 23:17:22 -0600
  */
class Travel {

  /*  i got error Exception in thread "main" java.time.temporal.UnsupportedTemporalTypeException: Unsupported field: OffsetSeconds
	    at java.base/java.time.LocalDate.get0(LocalDate.java:698)
	    at java.base/java.time.LocalDate.getLong(LocalDate.java:678) */
  public static void travelTo(cnt1ry departure, cnt1ry destination) {
    LocalDateTime localDateTime = LocalDateTime.now();
    ZonedDateTime departureDateTime = localDateTime.atZone(
      departure.getcnt1ryZone()
    );
    ZonedDateTime arrivalDateTime = departureDateTime.withZoneSameInstant(
      destination.getcnt1ryZone()
    );
    DateTimeFormatter formatter = DateTimeFormatter.RFC_1123_DATE_TIME;
    System.out.println(
      "Boarding in " +
      departure.getcnt1ryName() +
      ", local date and time is: " +
      departureDateTime.format(formatter)
    );
    System.out.println(
      "Landing in " +
      destination.getcnt1ryName() +
      ", local date and time on arrival will be: " +
      arrivalDateTime.format(formatter)
    );
  }
}
