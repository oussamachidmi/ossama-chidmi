package fr.epita.assistants.presentation.rest;

import javax.ws.rs.*;
import javax.ws.rs.core.MediaType;

import fr.epita.assistants.presentation.rest.request.ReverseRequest;
import fr.epita.assistants.presentation.rest.response.HelloResponse;
import fr.epita.assistants.presentation.rest.response.ReverseResponse;
import fr.epita.assistants.presentation.rest.response.*;
import fr.epita.assistants.presentation.rest.request.*;


import javax.ws.rs.core.Response;

@Path("/")
@Produces(MediaType.APPLICATION_JSON)
@Consumes(MediaType.APPLICATION_JSON)
public class Endpoints {
    @GET
    @Path("/hello/{name}")
    public Response hello(@PathParam("name") String name) {
        HelloResponse response = new HelloResponse("hello " + name);
        return Response.ok(response).build();
    }
    @POST
    @Path("/reverse")
    public Response reverse(ReverseRequest request) {
        if (request.getContent() == null || request.getContent().isEmpty())
            return Response.status(400).build();

        ReverseResponse response = new ReverseResponse();
        String res = new StringBuilder(request.getContent()).reverse().toString();
        response.setOriginal(request.getContent());
        response.setReversed(res);
        return Response.ok(response).build();
    }
}

