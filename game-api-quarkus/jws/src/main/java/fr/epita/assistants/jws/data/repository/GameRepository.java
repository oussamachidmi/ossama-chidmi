package fr.epita.assistants.jws.data.repository;

import fr.epita.assistants.jws.data.model.*;
import io.quarkus.hibernate.orm.panache.PanacheRepository;
import io.quarkus.hibernate.orm.panache.PanacheRepositoryBase;

import javax.enterprise.context.ApplicationScoped;
import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;

@ApplicationScoped
public class GameRepository implements PanacheRepositoryBase<GameModel,Long> {
    @PersistenceContext
    EntityManager em;

    public void update(GameModel game) {
        em.merge(game);
    }

}


//endpoint -> service ->reposi -> model -> service -> endpoint

//model -> entity
//entity ->reponse
