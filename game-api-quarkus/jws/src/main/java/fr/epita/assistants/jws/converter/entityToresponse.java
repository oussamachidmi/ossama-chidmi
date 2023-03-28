package fr.epita.assistants.jws.converter;

import fr.epita.assistants.jws.data.model.GameModel;
import fr.epita.assistants.jws.domain.entity.GameEntity;
import fr.epita.assistants.jws.domain.entity.GameEntity;
import fr.epita.assistants.jws.presentation.rest.response.GameListResponse;

import java.util.ArrayList;
import java.util.List;

public class entityToresponse {

    public static List<GameListResponse> toGameListResponse(List<GameModel> games) {
        List<GameListResponse> gameListResponses = new ArrayList<>();
        for (GameModel gameModel : games) {
            GameListResponse gameListResponse = new GameListResponse();
            gameListResponse.setId(gameModel.getId());
            gameListResponse.setPlayers(gameModel.getPlayers().size());
            gameListResponse.setState(gameModel.getState());
            gameListResponses.add(gameListResponse);
        }
        return gameListResponses;
    }
}
