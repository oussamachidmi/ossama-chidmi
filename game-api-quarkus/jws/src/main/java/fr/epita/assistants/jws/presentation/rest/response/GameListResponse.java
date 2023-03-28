package fr.epita.assistants.jws.presentation.rest.response;

//import fr.epita.assistants.jws.data.model.Game;
//import fr.epita.assistants.jws.data.model.Game.GameState;
import fr.epita.assistants.jws.domain.entity.GameEntity;
import fr.epita.assistants.jws.utils.GameState;
import fr.epita.assistants.jws.utils.GameState1;
import lombok.*;

import java.util.*;

@AllArgsConstructor
@NoArgsConstructor
@Setter
@Getter
public class GameListResponse{

    private Long id;
    private Integer players;
    private GameState state;

    public GameListResponse(GameEntity game) {
        this.id = game.getId();
        this.players = game.getPlayers().size();
        this.state = game.getState();
    }
}