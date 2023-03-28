package fr.epita.assistants.jws.errors;


class InvalidRequestParametersException extends RuntimeException {
    private final String errorCode = "ERR-001";
    private final String message = "Invalid request parameters";
    private final String details = "Please check your request parameters and try again";

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
