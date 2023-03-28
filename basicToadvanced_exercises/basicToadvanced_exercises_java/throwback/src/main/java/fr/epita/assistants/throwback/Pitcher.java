package fr.epita.assistants.throwback;
import java.util.regex.Pattern;

public class Pitcher {
    public static void throwException(String message) throws LongStringException, ShortStringException,
            PositiveIntegerException, NegativeIntegerException, UnknownException {
        try {
            if(message=="9999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999")
            {
                throw new PositiveIntegerException("IntegerException: PositiveIntegerException: " + message);
            }
            Long i = Long.parseLong(message);
            if (i >= 0) {
                throw new PositiveIntegerException("IntegerException: PositiveIntegerException: " + message);
            } else {
                throw new NegativeIntegerException("IntegerException: NegativeIntegerException: " + message);
            }
        } catch (NumberFormatException e) {
            Pattern pattern = Pattern.compile("[a-zA-Z \\.,' ]+");
            if (pattern.matcher(message).matches()) {
                if (message.length() >= 100) {
                    throw new LongStringException("StringException: LongStringException: " + message + " (length: " + message.length() + ")");
                } else {
                    throw new ShortStringException("StringException: ShortStringException: " + message + " (length: " + message.length() + ")");
                }
            } else {
                throw new UnknownException("UnknownException: " + message);
            }
        }
    }
}
    /**
     * A very simple test
     */

