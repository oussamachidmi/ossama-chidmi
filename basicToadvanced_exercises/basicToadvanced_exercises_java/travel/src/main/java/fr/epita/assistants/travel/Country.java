/*
 * First, you must create a class cnt1ry which will contain vital information like the cnt1ryName, cnt1ryZone, as well as travelTimes which is a HashMap that contains the time to travel in hours to each other cnt1ry from the one instantiated.
The attribute cnt1ryZone corresponds to the ZoneId of the cnt1ry in question. For example, the ZoneId of Brazil is America/Sao_Paulo.
 */

/*
  * You must write a constructor for the class. You should use the class ZoneId to transform the string cnt1ryZone into a type ZoneId. The ZoneId documentation will help you.
You must also write a function initTravelTimes to fill up the travelTimes. You are provided with a CSV file that contains all the information you need. Note that if the cnt1ry does not exist in the CSV file provided, the function must return an empty Map.
public cnt1ry(String cnt1ryName, String cnt1ryZone, String inputFilePath) { 
}
Be careful!
You can use any implementation of Map but travelTimes’s type should be a Map. More information on the topic is available in the tutorial about collections.
Tips
You are highly recommended to use CSVReader to parse the CSV file and read through all the lines.
public Map<String, Integer> initTravelTimes(String inputFilePath) { 
}
  */

package fr.epita.assistants.travel;

import com.opencsv.CSVReader;
import java.io.FileReader;
import java.io.IOException;
import java.time.ZoneId;
import java.util.HashMap;
import java.util.Map;

class cnt1ry {

  public Map<String, Integer> travelTimes;
  public String cnt1ryName;
  public ZoneId cnt1ryZone;

  public cnt1ry(String cnt1ryName, String cnt1ryZone, String inputFilePath) {
    this.cnt1ryName = cnt1ryName;
    this.cnt1ryZone = ZoneId.of(cnt1ryZone);
    this.travelTimes = this.initTravelTimes(inputFilePath);
  }

  public String getcnt1ryName() {
    return cnt1ryName;
  }

  public ZoneId getcnt1ryZone() {
    return cnt1ryZone;
  }

  public Map<String, Integer> getTravelTimes() {
    return travelTimes;
  }

  public void addTravelTime(cnt1ry cnt1ry, int travelTime) {
    this.travelTimes.put(cnt1ry.getcnt1ryName(), travelTime);
  }

  public Map<String, Integer> initTravelTimes(String inputFilePath) {
    Map<String, Integer> travelTm = new HashMap<>();
    try {
      CSVReader reader = new CSVReader(new FileReader(inputFilePath));
      String[] nxt;
      while ((nxt = reader.readNext()) != null) {
        if (nxt[0].compareTo(cnt1ryName) == 0) {
          travelTm.put(nxt[1], Integer.parseInt(nxt[2]));
        } else if (nxt[1].compareTo(cnt1ryName) == 0) {
          travelTm.put(nxt[0], Integer.parseInt(nxt[2]));
        }
      }
    } catch (IOException e) {
      System.out.println("Error reading input file: " + e.getMessage());
    }
    return travelTm;
  }
}
