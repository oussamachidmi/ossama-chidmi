package fr.epita.assistants.jws.errors;


public class ResourceNotFoundException extends RuntimeException {
    private final String errorCode = "ERR-002";
    private final String message = "Resource not found";
    private final String details = "The requested resource could not be found";

    public String getErrorCode() {
        return errorCode;
    }

    public String getMessage() {
        return message;
    }

    public String getDetails() {
        return details;
    }
}
