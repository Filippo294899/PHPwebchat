package com.chat.server;


import static spark.Spark.*;
import java.util.*;

import spark.Filter;

public class App {
    private static List<String> messages = new ArrayList<>();

    public static void main(String[] args) {
        port(4567);

        
        options("/*", (request, response) -> {
            String accessControlRequestHeaders = request.headers("Access-Control-Request-Headers");
            if (accessControlRequestHeaders != null) {
                response.header("Access-Control-Allow-Headers", accessControlRequestHeaders);
            }

            String accessControlRequestMethod = request.headers("Access-Control-Request-Method");
            if (accessControlRequestMethod != null) {
                response.header("Access-Control-Allow-Methods", accessControlRequestMethod);
            }

            return "OK";
        });

        before((request, response) -> {
            response.header("Access-Control-Allow-Origin", "*");
            response.header("Access-Control-Request-Method", "*");
            response.header("Access-Control-Allow-Headers", "*");
            response.type("text/plain");
        });

        // Rotte
        post("/send", (req, res) -> {
            messages.add(req.body());
            return "OK";
        });

        get("/messages", (req, res) -> String.join("\n", messages));
    }
}
