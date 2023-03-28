package fr.epita.assistants.loggingbasics;

import ch.qos.logback.classic.Logger;

import java.util.*;

import org.slf4j.*;

import ch.qos.logback.classic.*;


public class Trombinoscope {
    private final Logger LOGGER;
    private final HashMap<String, Long> map;


    public Trombinoscope() {
        LOGGER = (Logger) LoggerFactory.getLogger(Trombinoscope.class);
        LOGGER.setLevel(Level.TRACE);
        LOGGER.trace("Instantiating new Trombinoscope");
        map = new HashMap<>();
    }

    public Long putPerson(String name, long photoId) {
        String message = "Putting person (\"" + name + "\", " + photoId + ")";
        LOGGER.debug(message);

        Long oldPhotoId = map.put(name, photoId);

        // FIXME: Add logging here
        if (oldPhotoId == null)
        {
            LOGGER.trace("Added entry for person \"" + name + "\"");
        }
        else
            LOGGER.trace("Updated entry for person \"" + name + "\"");
        return oldPhotoId;
    }
}

