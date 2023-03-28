package fr.epita.assistants.jws.converter;

import fr.epita.assistants.jws.data.model.GameModel;
import fr.epita.assistants.jws.data.model.PlayerModel;
import fr.epita.assistants.jws.domain.entity.GameEntity;
import fr.epita.assistants.jws.domain.entity.PlayerEntity;

import java.util.ArrayList;
import java.util.List;

public class Modeltoentity {

    public static GameEntity toEntity(GameModel model){

    GameEntity game = new GameEntity(model.getId(), model.getStartTime(), model.getState(), null, model.getMaps());

    List<PlayerEntity> players= new ArrayList<>();

    for (PlayerModel player : model.getPlayers())
    {
        players.add(new PlayerEntity(player.getId(), player.getLastBomb(), player.getLastMovement(), player.getLives(), player.getName(), player.getPosX(), player.getPosY(), player.getPosition(), game));
    }

    game.setPlayers(players);

    return game;
}


}
