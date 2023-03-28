package fr.epita.assistants.jws.domain.entity;

import io.quarkus.hibernate.orm.panache.PanacheEntity;
import javax.persistence.*;
import java.time.LocalDateTime;

import io.quarkus.hibernate.orm.panache.PanacheEntityBase;
import lombok.*;
@Getter
@Setter
@AllArgsConstructor
@NoArgsConstructor

public class PlayerEntity  {

    private long id;

    private LocalDateTime lastbomb;

    private LocalDateTime lastmovement;

    private Integer lives;

    private String name;

    private Integer posx;

    private Integer posy;

    private Integer position;

    private GameEntity game;

}

