
const WebSocket = require("ws");

function addClient(userName) {
  const ws = new WebSocket('ws://localhost:8080?username=' + userName);
  ws.on('open', function open() {
    ws.send(`${userName}: trying to establish connection`);
  });
  ws.on('message', function incoming(data) {
    console.log(`<server to ${userName}>: ${data}`);
  });
  ws.on('close', function close(code, reason) {
    console.log(`<server to ${userName}>: Connection has been closed: [${code}] ${reason}`);
  });

   ws.on('error', function error(error) {
    console.log(`<server to ${userName}>: Error: ${error}`);
    });

  return ws;
}



module.exports = {
    addClient,
};
