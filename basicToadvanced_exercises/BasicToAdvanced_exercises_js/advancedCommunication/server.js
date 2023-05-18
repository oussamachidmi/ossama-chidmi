const WebSocket = require("ws");


function startServer() {
    let userId = 0;
    let total =0;
    const wss = new WebSocket.Server({ port: 8080 });
    var list= new Array();
    var pp= new Array();

    wss.on("connection", (ws, request) => {

        const userName = request.url.split('=')[1];
        userId++;
        total++;

        ws.on('close', function close(code, reason) {
            pp.forEach(function each(client) {
                if (client.userName==userName) 
                    {   
                        if(code==1008)
                        {

                        console.log(`[${total}] Disconnected: [${code}] ${reason}`); 

                        }
                        else{
                            console.log(`[${client.userId}] Disconnected: [${code}] ${reason}`); 
                        }
                        
                    }
                    if(code!=1008){
                        client.ws.send(`${userName} disconnected`);
                    }

                   
            });
        });

        ws.on('message', function incoming(data) {
            console.log(`[${userId}] ${data}`);
        });

        
        if (!list.includes(userName)) {
            ws.send(`Welcome ${userName}`);
            list.push(userName);
            pp.push({ws,userName,userId,userId});
        }
        else
        {
            ws.close(1008,`Username: "${userName}" is already taken`);
            return;
        }

        if (total === 1) {
            ws.send(`${userName}, you are the only player connected`);
        }else if (userId<5){
            ws.send(`${userId} players are connected`);
        }
        if (userId < 5) {
        pp.forEach(function each(client) {
            if (client.userName!=userName) {
                client.ws.send(`${userName} connected`); 
            }
        });
        }
        
        if (total < 4) {
        wss.clients.forEach(function each(client) {
            client.send(`Waiting for ${4 - total} other players to start the game`);
        });
        }else if(userId == 4){
            pp.forEach(function each(client){
                client.ws.send(`Match will start soon, disconnecting ${client.userName} from the lobby`);
                client.ws.close(1000, `Match is starting`);
                list.splice(0, list.length);
                total=0;
        })
        }
        else{
       
        }
       
    
       
    
    });
    
    
    console.log('Websocket server is running on port 8080.');
    return wss;

}

module.exports = {
    startServer,
};