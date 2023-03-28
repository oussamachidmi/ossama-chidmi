package fr.epita.assistants.jws.presentation.rest.response;

//import fr.epita.assistants.jws.domain.entity.Player;
import fr.epita.assistants.jws.domain.entity.PlayerEntity;
import lombok.*;

@Getter
@Setter
public class PlayerResponse {
    private long id;
    private String name;
    private int posX;
    private int posY;
    private int lives;


    private int Position;
    public PlayerResponse(PlayerEntity player) {
        this.id = player.getId();
        this.name = player.getName();
        this.lives = player.getLives();
        this.posX = player.getPosx();
        this.posY = player.getPosy();
    }
}
