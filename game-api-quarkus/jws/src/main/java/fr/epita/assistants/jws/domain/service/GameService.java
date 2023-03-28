
package  fr.epita.assistants.jws.domain.service;

import fr.epita.assistants.jws.converter.Modeltoentity;
import fr.epita.assistants.jws.data.model.GameModel;
import fr.epita.assistants.jws.data.model.PlayerModel;
import fr.epita.assistants.jws.data.repository.GameRepository;
import fr.epita.assistants.jws.data.repository.PlayerRepository;
import fr.epita.assistants.jws.domain.entity.GameEntity;
import fr.epita.assistants.jws.presentation.rest.request.CreateGameRequest;
//import fr.epita.assistants.jws.domain.entity.Game;
import fr.epita.assistants.jws.presentation.rest.response.GameListResponse;
import fr.epita.assistants.jws.utils.GameState;
import fr.epita.assistants.jws.utils.GameState1;
import io.quarkus.hibernate.orm.panache.PanacheRepository;
import org.eclipse.microprofile.config.inject.ConfigProperty;

import javax.enterprise.context.ApplicationScoped;
import javax.inject.Inject;
import javax.persistence.EntityManager;
import javax.transaction.Transactional;
import java.io.IOException;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.time.LocalDateTime;
import java.util.ArrayList;
import java.util.List;

import static fr.epita.assistants.jws.converter.entityToresponse.toGameListResponse;

//import static fr.epita.assistants.jws.converter.entityToresponse.toGameListResponse;

@ApplicationScoped
public class GameService {

    @Inject
    PlayerService playerService;

    @Inject
    GameRepository gameRepository;

    @Inject
    PlayerRepository playerRepository;

    @Inject
    EntityManager entityManager;

    @ConfigProperty(name ="JWS_MAP_PATH") String pathMap;

    public List<GameListResponse> getAll() {
        return toGameListResponse(gameRepository.listAll());
    }

    public GameEntity getById(Long id) {
        return Modeltoentity.toEntity(gameRepository.findById(id));
    }



    @Transactional
    public boolean deleteById(Long id) {
        return deleteById(id);
    }

    @Transactional
    public GameEntity updateState(long id)
    {
        GameModel game = gameRepository.findById(id);
        if(game==null)
        {
            return null;
        }
        game.setState(GameState.RUNNING);
        return Modeltoentity.toEntity(game);
    }

    @Transactional
    public GameEntity createGame(CreateGameRequest request)
    {
        List<String> list = new ArrayList<>();
        String file = System.getenv("JWS_MAP_PATH");
        Path file1=Paths.get(file);
        try {
            list=Files.readAllLines(file1);
        }catch (IOException e)
        {
            e.printStackTrace();
        }
        GameModel game = new GameModel(1,LocalDateTime.now(),GameState.STARTING,new ArrayList<>(),list);
        PlayerModel player = new PlayerModel();
        player.setGame(game);
        player.setLastBomb(null);
        player.setLives(3);
        player.setPosX(1);
        player.setPosX(1);
        player.setPosition(1);
        player.setLastMovement(null);
        game.players.add(player);
        playerRepository.persist(player);
        gameRepository.persist(game);
        return Modeltoentity.toEntity(game);
    }


    @Transactional
    public GameEntity joinGame(long id,String name,long pos)
    {
        GameModel game = gameRepository.findById(id);

        if(game==null)
        {
            return null;
        }
        if (pos==1) {
            PlayerModel player = new PlayerModel(pos+1,null,null,3,name,15,1,1,game);
            playerRepository.persist(player);
        } else if (pos==2) {
            PlayerModel player = new PlayerModel(pos+1,null,null,3,name,15,13,1,game);
            playerRepository.persist(player);
        } else if (pos==3) {
            PlayerModel player = new PlayerModel(pos+1,null,null,3,name,1,13,1,game);
            playerRepository.persist(player);
        }
        if(pos<5)
        {
            pos++;
        }

        return Modeltoentity.toEntity(game);
    }

}
