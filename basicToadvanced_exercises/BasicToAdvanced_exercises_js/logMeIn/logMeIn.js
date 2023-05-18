const express = require("express");
const bodyParser = require("body-parser");
const app = express();
const axios = require("axios");
const jwt = require("jsonwebtoken");

const key =  process.env.JWT_SECRET_KEY

async function logMeIn(host, port) {
  app.use(express.json());
  app.get("/", (req, res) => {
    res.status(200).json({ message: "Hello World!" });
  });
  
  app.post("/login", (req, res) => {
    console.log(req.body);
    const { username, password } = req.body;
    if (username === "xavier.login" && password === "1234") {
      const token = jwt.sign({ username :username, password :password },key );
      res.status(200).json({ jwt :  token });
    } else {
      res.status(401).json({ error: "Invalid username or password" });
    }
  });
  

  app.get("/secret", (req, res) => {
    const header = req.headers.authorization;
    if (header && header.startsWith('Bearer ')) {
      const token = header.split(' ')[1];
      try {
        const decoded = jwt.verify(token, key);
        res.status(200).json({ message: "Access granted" });
      } catch (err) {
        res.status(401).json({ error: "Unauthorized" });
      }
    } else {
      res.status(401).json({ error: "Unauthorized" });
    }
  });

  return app.listen(port, host, () => {
    console.log(`Server running at http://${host}:${port}/`);
  });
}





module.exports = {
  logMeIn,
};
