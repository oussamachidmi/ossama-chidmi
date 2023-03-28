package fr.epita.assistants.jws.domain.service;

//import fr.epita.assistants.jws.data.model.Game;
//import fr.epita.assistants.jws.data.model.Player;
import fr.epita.assistants.jws.domain.entity.GameEntity;
import fr.epita.assistants.jws.domain.entity.PlayerEntity;
import io.quarkus.hibernate.orm.panache.PanacheRepository;

import javax.enterprise.context.ApplicationScoped;
import javax.transaction.Transactional;
import java.time.LocalDateTime;
import java.util.List;

@ApplicationScoped
public class PlayerService implements PanacheRepository<PlayerEntity> {

    public List<PlayerEntity> getAll() {
        return listAll();
    }

    public PlayerEntity getById(Long id) {
        return findById(id);
    }

    @Transactional
    public PlayerEntity createPlayer(GameEntity game, String playerName) {
        // Create the player
        PlayerEntity player = new PlayerEntity();
        player.setName(playerName);
        player.setLives(3);
        player.setPosition(0);
        player.setPosx(0);
        player.setPosy(0);
        player.setLastbomb(LocalDateTime.now());
        player.setLastmovement(LocalDateTime.now());
        player.setGame(game);
        game.getPlayers().add(player);

        persistAndFlush(player);

        return player;
    }
    @Transactional
    public PlayerEntity updatePosition(Long id, Integer position) {
        PlayerEntity player = getById(id);
        player.setPosition(position);
        return player;
    }

    @Transactional
    public boolean deleteById(Long id) {
        return deleteById(id);
    }

}
