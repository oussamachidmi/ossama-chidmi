package fr.epita.assistants.jws.data.model;


import javax.persistence.*;
import java.time.LocalDateTime;

import io.quarkus.hibernate.orm.panache.PanacheEntity;
import io.quarkus.hibernate.orm.panache.PanacheEntityBase;
import io.quarkus.hibernate.orm.panache.PanacheRepositoryBase;
import lombok.*;

@Getter
@Setter
@AllArgsConstructor
@NoArgsConstructor
@Entity
public class PlayerModel extends PanacheEntityBase {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private long id;

    @Column(name = "lastbomb")
    private LocalDateTime lastBomb;

    @Column(name = "lastmovement")
    private LocalDateTime lastMovement;

    @Column(name = "lives")
    private Integer lives;

    @Column(name = "name", length = 255)
    private String name;

    @Column(name = "posx")
    private Integer posX;

    @Column(name = "posy")
    private Integer posY;

    @Column(name = "position")
    private Integer position;

    @ManyToOne
    @JoinColumn(name = "game_id")
    private GameModel game;
}
