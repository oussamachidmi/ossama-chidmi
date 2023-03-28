package fr.epita.assistants.singleton;
import fr.epita.assistants.logger.Logger;

public class StaticSingletonLogger implements Logger {
    private int anInt;
    private int warc;
    private int error;
    private StaticSingletonLogger() {}

    private static class InstanceHolder {
        private static final StaticSingletonLogger _INSTANCE = new StaticSingletonLogger();
    }

    public static StaticSingletonLogger getInstance() {
        return InstanceHolder._INSTANCE;
    }

    @Override
    public void log(Level level, String message) {
        if (level == level.INFO) {
            System.err.println("[INFO] " + message);
            anInt++;
        } else if (level == level.WARN) {
            System.err.println("[WARN] " + message);
            warc++;
        } else if (level == level.ERROR) {
            System.err.println("[ERROR] " + message);
            error++;
        }

    }

    public int getInfoCounter() {
        return this.anInt;
    }

    public int getWarnCounter() {
        return this.warc;
    }


    public int getErrorCounter() {
        return this.error;
    }

    public void reset() {
        anInt = 0;
        warc = 0;
        error = 0;
    }
}
