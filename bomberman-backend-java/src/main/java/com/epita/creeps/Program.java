package com.epita.creeps;

import com.epita.creeps.given.exception.NoReportException;
import com.epita.creeps.given.json.Json;
import static com.epita.creeps.given.json.Json.*;
import com.epita.creeps.given.vo.geometry.Point;
import com.epita.creeps.given.vo.parameter.FireParameter;
import com.epita.creeps.given.vo.report.SpawnReport;
import com.epita.creeps.given.vo.response.CommandResponse;
import com.epita.creeps.given.vo.response.InitResponse;
import com.mashape.unirest.http.HttpResponse;
import com.mashape.unirest.http.JsonNode;
import com.mashape.unirest.http.Unirest;
import com.mashape.unirest.http.exceptions.UnirestException;
import org.json.JSONObject;

import java.awt.*;
import java.util.concurrent.CompletableFuture;
import java.util.concurrent.ExecutionException;
import java.util.concurrent.TimeUnit;
import java.util.spi.TimeZoneNameProvider;

public class Program {

    public static void main(String[] args) throws UnirestException, InterruptedException, ExecutionException {
        System.out.println("Hello World!");
        HttpResponse<JsonNode> a = Unirest.post("http://" + args[0] + ":" + args[1] + "/init/" + args[2]).body("{}").asJson();
//        JSONObject object = (JSONObject) a.getBody().getObject().get("householdCoordinates");
//        int x = Integer.parseInt(object.get("x").toString());
//        int y = Integer.parseInt(object.get("y").toString());
//        var b = Unirest.get("http://" + args[0] + ":" + args[1] + "/statistics/").asJson().getBody().toString();
        InitResponse res = Json.parse(a.getBody().toString(), InitResponse.class);

        int i=0;
       while (i<100)
        {
            var e = Unirest.post("http://" + args[0] + ":" + args[1] + "/command/" + args[2] + "/" + res.citizen1Id + "/move:left").body("{}").asJson();

            TimeUnit.SECONDS.sleep(5);

            var z = Unirest.post("http://" + args[0] + ":" + args[1] + "/command/" + args[2] + "/" + res.citizen1Id + "/gather").body("{}").asJson();

            TimeUnit.SECONDS.sleep(10);
            i++;
        }



//        CompletableFuture.runAsync(() -> {
//                    try {
//                        var v6 = Unirest.post("http://" + args[0] + ":" + args[1] + "/command/" + args[2] + "/" + a.getBody().getObject().getString("citizen1Id") + "/fire:turret").body("{}").asJson();
//
//                    } catch (UnirestException e) {
//                        throw new RuntimeException(e);
//                    }
//                }, CompletableFuture.delayedExecutor(2000, TimeUnit.MILLISECONDS))
//                .get();



    }

}
