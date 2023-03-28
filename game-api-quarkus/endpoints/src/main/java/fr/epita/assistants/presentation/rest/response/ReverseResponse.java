package fr.epita.assistants.presentation.rest.response;

import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.Setter;
import lombok.NoArgsConstructor;


@Getter
@Setter
public class ReverseResponse {

    private String original;
    private String reversed;

    public ReverseResponse() {
        this.original="";
    }

    public ReverseResponse(String ori) {
        this.original = ori;
    }

}
