package fr.epita.assistants.streamstudent;


import java.util.Comparator;
import java.util.Optional;

import java.util.stream.Stream;

public class Streamer {

    public Stream<Pair<Integer, String>> validator(Stream<Pair<Integer, String>> stream) {
        Stream<Pair<Integer, String>> pairStream = stream.filter(pair -> {
            int gr = pair.getKey();
            String login = pair.getValue();
            int ct_pt = login.length() - login.replace(".", "").length();
            int ct_un = login.length() - login.replace("_", "").length();
            return (ct_pt + ct_un == 1) && gr > -1 && gr < 101;
        });
        return pairStream;
    }

//    public Stream<Pair<Integer, String>> orderGrade(Stream<Pair<Integer, String>> stream) {
//        return stream.sorted((a, b) -> {
//            int gradeDiff = a.getKey().compareTo(b.getKey());
//            if (gradeDiff != 0) {
//                return gradeDiff;
//            } else {
//                return a.getValue().compareTo(b.getValue());
//            }
//        });
//    }

    public Stream<Pair<Integer, String>> lowercase(Stream<Pair<Integer, String>> stream) {
        Stream<Pair<Integer, String>> lower =stream.filter(pair -> {
            String pattern = "[A-Z]";
            return  pair.getValue().chars().anyMatch(c -> Character.isUpperCase(c));
        }).map(pair -> {
            pair.setValue(pair.getValue().toLowerCase());
            pair.setKey(pair.getKey()/2);
            return pair;
        });
        return lower;
    }
//    public Optional<Pair<Integer, String>> headOfTheClass(Stream<Pair<Integer, String>> stream) {
//        Optional<Pair<Integer, String>> integerStringPair = stream.max(Comparator.comparingInt(Pair::getKey)
//                        .thenComparing(Pair::getValue))
//                .map(Optional::of)
//                .orElse(Optional.empty());
//        return integerStringPair;
//    }

    public Stream<Pair<Integer, String>> encryption(Stream<Pair<Integer, String>> stream) {
        return stream.map(s -> {
            String login = s.getValue();
            int n = login.length();
            int mid = n / 2;
            String firstPart = login.substring(0, mid);
            String secondPart = login.substring(mid, n);
            String encryptedLogin = secondPart + firstPart;
            return new Pair<>(s.getKey(), encryptedLogin);
        });
    }
}

