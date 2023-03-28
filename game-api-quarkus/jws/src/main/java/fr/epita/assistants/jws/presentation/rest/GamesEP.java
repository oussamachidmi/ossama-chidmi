package fr.epita.assistants.jws.presentation.rest;

import fr.epita.assistants.jws.data.repository.GameRepository;
import fr.epita.assistants.jws.data.repository.PlayerRepository;
import fr.epita.assistants.jws.domain.entity.GameEntity;
import fr.epita.assistants.jws.domain.service.GameService;
import fr.epita.assistants.jws.presentation.rest.request.CreateGameRequest;
import fr.epita.assistants.jws.presentation.rest.request.JoinGameRequest;
import fr.epita.assistants.jws.presentation.rest.response.GameDetailResponse;
import fr.epita.assistants.jws.presentation.rest.response.GameListResponse;

import javax.inject.Inject;
import javax.transaction.Transactional;
import javax.ws.rs.*;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;
import java.util.List;
import javax.persistence.EntityManager;

@Path("/")
public class GamesEP {

    @Inject
    EntityManager entityManager;

    @Inject
    GameRepository gameR;

    @Inject
    PlayerRepository PlayerR;


    @Inject
    GameService gameService;

    public static long cmp=1;

    @GET
    @Path("/games")
    @Consumes(MediaType.APPLICATION_JSON)
    @Produces(MediaType.APPLICATION_JSON)
    @Transactional
    public List<GameListResponse> getGames() {
        List<GameListResponse> list = gameService.getAll();
        return list;
    }

    @POST
    @Path("/games")
    public Response createGame(CreateGameRequest request)
    {
        if(request==null||request.getName()==null)
        {
            return Response.status(400).build();
        }
        GameEntity game = gameService.createGame(request);
        return Response.ok(new GameDetailResponse(game)).build();
    }


    @GET
    @Path("/games/{gameId}")
    @Consumes(MediaType.APPLICATION_JSON)
    @Produces(MediaType.APPLICATION_JSON)
    public Response getGame(@PathParam("gameId") Long gameId) {
        if(gameId==0||gameId==null)
        {
            return Response.status(404).build();
        }
        GameEntity game = gameService.getById(gameId);
        if (game == null) {
            return Response.status(404).build();
        }
        GameDetailResponse response = new GameDetailResponse(game);
        return Response.ok(response).build();
    }

    @PATCH
    @Path("/games/{gameId}/start")
    @Consumes(MediaType.APPLICATION_JSON)
    @Produces(MediaType.APPLICATION_JSON)
    public Response startGame(@PathParam("gameId") Long gameId) {
        GameEntity game = gameService.updateState(gameId);
        if (game==null) {
            return Response.status(404).build();
        }
        return Response.ok(game).build();
    }
    @POST
    @Path("/games/{gameId}")
    @Consumes(MediaType.APPLICATION_JSON)
    @Produces(MediaType.APPLICATION_JSON)
    public Response joinGame(@PathParam("gameId") Long gameId , JoinGameRequest request) {
        if(request==null||request.getName()==null || cmp>4)
        {
            return Response.status(400).build();
        }
        GameService gameservice = new GameService();
        GameEntity game = gameservice.joinGame(gameId,request.getName(),cmp);
        if(game==null)
        {
            return Response.status(404).build();
        }
        return Response.ok(game).build();
    }

}
