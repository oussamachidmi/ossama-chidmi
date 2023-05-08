package fr.epita.assistants.streamstudent;

import org.junit.jupiter.api.Test;

import java.util.Iterator;
import java.util.List;
import java.util.stream.Stream;




import static org.junit.jupiter.api.Assertions.*;

public class StreamStudentTest {
    static void assertStreamEquals(Stream<Pair<Integer, String>> expectedStream,
                                   Stream<Pair<Integer, String>> actualStream) {
        // Get iterators from stream
        Iterator<Pair<Integer, String>> iterator1 = expectedStream.iterator();
        Iterator<Pair<Integer, String>> iterator2 = actualStream.iterator();

        while (iterator1.hasNext() && iterator2.hasNext()) {
            // Get next objects
            Pair<Integer, String> login1 = iterator1.next();
            Pair<Integer, String> login2 = iterator2.next();

            // Check if pairs are equal
            assertEquals(login1, login2);
        }

        assertTrue(!iterator1.hasNext() && !iterator2.hasNext(),
                "Streams do not have the same length");

    }



    // Add your own tests here
}
