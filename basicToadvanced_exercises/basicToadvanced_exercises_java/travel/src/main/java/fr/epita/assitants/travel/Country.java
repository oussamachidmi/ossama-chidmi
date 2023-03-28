package fr.epita.assitants.travel;

import java.util.Date;
import java.util.HashMap;
import java.io.File;
import java.io.FileReader;
import java.io.IOException;
import java.time.LocalDateTime;
import java.time.ZoneId;
import java.time.format.DateTimeFormatter;
import java.util.HashMap;
import java.util.Map;

//import org.apache.commons.csv.CSVFormat;
//import org.apache.commons.csv.CSVRecord;

public class Country {
    String countryName;
    ZoneId countryZone;
    Map<String, Integer> travelTimes;

    public Country(String countryName, String countryZone, String inputFilePath) {
        this.countryName = countryName;
        this.countryZone = ZoneId.of(countryZone);
        travelTimes = new HashMap<>();
    }

    public Map<String, Integer> initTravelTimes(String inputFilePath) throws IOException {
            FileReader fileReader = new FileReader(inputFilePath);
            Iterable<CSVRecord> rps = CSVFormat.DEFAULT.withHeader().parse(fileReader);
            for (CSVRecord pp : rps) {
                String source = pp.get("source");
                String destination = pp.get("destination");
                int travelTime = Integer.parseInt(pp.get("travel_time"));

                if (source.equals(countryName)) {
                    travelTimes.put(destination, travelTime);
                }
            }
            fileReader.close();
        return travelTimes;
    }
}

