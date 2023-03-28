package fr.epita.assistants.jws.presentation.rest.response;

import java.time.LocalDateTime;
import java.util.ArrayList;
import java.util.List;

import fr.epita.assistants.jws.domain.entity.GameEntity;
import fr.epita.assistants.jws.domain.entity.PlayerEntity;

//import fr.epita.assistants.jws.data.model.Player;


//import fr.epita.assistants.jws.domain.entity.Player;
import fr.epita.assistants.jws.utils.GameState;
import fr.epita.assistants.jws.utils.GameState1;
import lombok.*;


@Getter
@Setter
@NoArgsConstructor

public class GameDetailResponse {

    private long id;
    private LocalDateTime startTime;
    private GameState state;
    private List<PlayerResponse> players;
    private List map;

    public GameDetailResponse(GameEntity game) {

        this.id = game.getId();
        this.startTime = game.getStartime();
        this.state = game.getState();
        this.players = new ArrayList<>();
        for (PlayerEntity player : game.getPlayers()) {
            this.players.add(new PlayerResponse(player));
        }
        this.map = game.getMaps();
    }

}
