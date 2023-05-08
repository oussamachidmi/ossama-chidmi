package fr.epita.assistants.streamstudent;

import java.util.Comparator;
import java.util.Optional;
import java.util.stream.Stream;
import java.util.zip.ZipEntry;

public class Streamer {

  public Stream<Pair<Integer, String>> validator(
    Stream<Pair<Integer, String>> stream
  ) {
    return stream.filter(pair -> {
      if (pair.getKey() > -1 && pair.getKey() < 101 && pair.getValue().matches("[a-zA-Z]*[._][a-zA-Z]*")) {
        return true;
      } else {
        return false;
      }
      });
  }


  public Stream<Pair<Integer, String>> orderGrade(
    Stream<Pair<Integer, String>> stream
  ) {
    return stream.sorted(
      Comparator
        .comparing(Pair<Integer, String>::getKey)
        .thenComparing(Pair<Integer, String>::getValue)
    );
  }

  public Stream<Pair<Integer, String>> lowercase(
    Stream<Pair<Integer, String>> stream
  ) {
    return stream.map(pair -> {
      if (pair.getValue().equals(pair.getValue().toLowerCase())) {
        return pair;
      } else {
        return new Pair<Integer, String>(
          pair.getKey() / 2,
          pair.getValue().toLowerCase()
        );
      }
    });
  }



  public Optional<Pair<Integer, String>> headOfTheClass(
    Stream<Pair<Integer, String>> stream
  ) {
    return stream.reduce((pair1, pair2) -> {
      if (pair1.getKey() > pair2.getKey()) {
        return pair1;
      } else if (pair1.getKey() < pair2.getKey()) {
        return pair2;
      } else {
        if (pair1.getValue().compareTo(pair2.getValue()) < 0) {
          return pair1;
        } else {
          return pair2;
        }
      }
    });
  }

  public Stream<Pair<Integer, String>> quickFix(
    Stream<Pair<Integer, String>> stream
  ) {
    return stream.map(pair -> {
      if (
        pair.getValue().toLowerCase().startsWith("ma") ||
        (
          pair.getValue().toLowerCase().startsWith("l") &&
          pair.getValue().toLowerCase().endsWith("x")
        )
      ) {
        if (pair.getKey() * 2 > 100) {
          Pair<Integer, String> pt = new Pair<Integer, String>(
            100,
            pair.getValue()
          );
          return pt;
        } else {
          Pair<Integer, String> pr = new Pair<Integer, String>(
            pair.getKey() * 2,
            pair.getValue()
          );
          return pr;
        }
      } else {
        return pair;
      }
    });
  }

  public Stream<Pair<Integer, String>> encryption(
    Stream<Pair<Integer, String>> stream
  ) {
    return stream.map(s -> {
      int q = s.getValue().length();
      String premiere = s.getValue().substring(0,  q / 2);
      String fin = s.getValue().substring( q / 2, q);
      return new Pair<>(s.getKey(), fin + premiere);
    });
  }





}
