package fr.epita.assistants.practicelombok;

import lombok.*;

@Data
public class Falcon {
    String name = new String();
    String nickname = new String();
    int speed;
}