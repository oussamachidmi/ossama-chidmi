const fs = require("fs");

// id should be int and not string
function epiTinderWebServer(host, port, JSON_filename) {
  const express = require("express");
  const app = express();
  const bodyParser = require("body-parser");
  app.use(bodyParser.json());


  app.get("/", (req, res) => {
    res.json({ message: "Hello World!" });
  });
  app.get("/users", (req, res) => {
    res.json(readusersFromJSONFile(JSON_filename));
  });
  
  app.post("/users", (req, res) => {
    const ulis = readusersFromJSONFile(JSON_filename);
    const newu = req.body;
    newu.id = Math.max(...ulis.map((u) => u.id)) + 1;
    ulis.push(newu);
    writeusersToJSONFile(JSON_filename, ulis);
    res.status(201).json(newu);
  });

  app.get("/users/:id", (req, res) => {
    const users = readusersFromJSONFile(JSON_filename);
    const user = users.find((user) => user.id == req.params.id);
    if (user) {
      res.status(200).json(user);
    } else {
      res
        .status(404)
        .json({ message: `No user with id: ${req.params.id} found` });
    }
  });

  app.put("/users/:id", (req, res) => {
    const users = readusersFromJSONFile(JSON_filename);
    const user = users.find((user) => user.id == req.params.id);
    if (user) {
      const newUser = req.body;
      newUser.id = parseInt(req.params.id);
      users[req.params.id] = newUser;
      writeusersToJSONFile(JSON_filename, users);
      res.status(201).json(newUser);
    } else {
      res
        .status(404)
        .json({ message: `No user with id: ${req.params.id} found` });
    }
  });
  // let's do the delete without the splice method or counting on index of the user
  app.delete("/users/:id", (req, res) => {
    const users = readusersFromJSONFile(JSON_filename);
    const user = users.find((user) => user.id == req.params.id);
    if (user) {
      const newUsers = users.filter((user) => user.id != req.params.id);
      writeusersToJSONFile(JSON_filename, newUsers);
      res.status(200).json(user);
    } else {
      res
        .status(404)
        .json({ message: `No user with id: ${req.params.id} found` });
    }
  });

  app.use((req, res) => {
    res.status(404).json({"message": "Not found"});
  });


  return app.listen(port, host, () => {
    console.log(`Server running at http://${host}:${port}/`);
  });
  
}

function readusersFromJSONFile(JSON_filename) {
  /*
   ** Return the list of users stored in the JSON file
   ** JSON_filename: path to the JSON file
   */

  const content = fs.readFileSync(JSON_filename, (err) => {
    if (err) {
      console.error(err);
      return;
    }
  });
  return JSON.parse(content).users;
}

function writeusersToJSONFile(JSON_filename, users) {
  /*
   ** Overwrite the given JSON_filename with the given
   ** list of users.
   ** JSON_filename: path to the JSON file
   ** users : list of users objects
   */

  const usersJSON = JSON.stringify({ users: users });
  fs.writeFileSync(JSON_filename, usersJSON, (err) => {
    if (err) {
      console.error(err);
      return;
    }
  });
}

module.exports = {
  epiTinderWebServer,
  writeusersToJSONFile,
  readusersFromJSONFile
}




