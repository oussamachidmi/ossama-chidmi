package fr.epita.assistants.jws.data.model;


import javax.persistence.*;
import java.time.LocalDateTime;
import java.util.ArrayList;
import java.util.List;

import fr.epita.assistants.jws.utils.GameState;
import fr.epita.assistants.jws.utils.GameState1;
import io.quarkus.hibernate.orm.panache.PanacheEntityBase;
import lombok.*;

@Getter
@Setter
@AllArgsConstructor
@NoArgsConstructor
@Entity
public class GameModel extends PanacheEntityBase {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private long id;

    @Column(name = "starttime")
    private LocalDateTime startTime;

    @Enumerated(EnumType.STRING)
    private GameState state;

    @OneToMany(cascade = CascadeType.ALL)
    public List<PlayerModel> players = new ArrayList<>();

//    @OneToOne
//    private GameMap gameMap ;


    @ElementCollection
    @CollectionTable(name = "game_map", joinColumns = @JoinColumn(name = "gamemodel_id"))
    @Column(name = "map", length = 255)
    private List<String> maps;

//    @ElementCollection
//    @CollectionTable(name = "game_player", joinColumns = @JoinColumn(name = "gamemodel_id"))
//    @Column(name = "map", length = 255)
//    private List<String> game_players;

}
