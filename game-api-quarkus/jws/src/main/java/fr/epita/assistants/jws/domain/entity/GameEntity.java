package fr.epita.assistants.jws.domain.entity;

import fr.epita.assistants.jws.utils.GameState;
import fr.epita.assistants.jws.utils.GameState1;
import io.quarkus.hibernate.orm.panache.PanacheEntity;

import java.time.LocalDateTime;
import java.util.ArrayList;
import java.util.List;

import io.quarkus.hibernate.orm.panache.PanacheEntityBase;
import lombok.*;

@Getter
@Setter
@AllArgsConstructor
@NoArgsConstructor
public class GameEntity  {

    private long id;
    private LocalDateTime startime;

    private GameState state;

    private List<PlayerEntity> players = new ArrayList<>();

    private List<String> maps =new ArrayList<>();

}
