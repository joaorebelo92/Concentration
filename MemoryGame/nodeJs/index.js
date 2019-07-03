var app = require('express')();
var http = require('http').Server(app);
var port = 3000;
var io = require('socket.io')(http);
var gameMod = require('./game_model');


//start http
/*
var server = http.createServer(function(req, res){ 
});

server.listen(port);
console.log('Server listening on port ' + port);

*/

// -------------------------------------------------
// Web Socket --------------------------------------
// -------------------------------------------------

var games = [];
var gamesCount = 0;

/*
var io = io.listen(server, {
        log: false,
        agent: false,
        origins: '*:*'
        // 'transports': ['websocket', 'htmlfile', 'xhr-polling', 'jsonp-polling']
    });
*/

io.on('connection', function(socket){
  socket.on('chat message', function(msg){
     console.log('message: ' + msg);
    io.emit('chat message', msg);
  });
});

/*
io.on('connection', function(socket){
  socket.on('startGame', function(msg){
     console.log('startGame: ' + msg);
    io.emit('startGame', msg);
  });
});*/

http.listen(3000, function(){
  console.log('listening on *:3000');
});



io.on('connection', function(socket){ 
    console.log('\n----------------------------------------------------\n');
    console.log('Connection to client established');

    // Success!  Now listen to messages to be received

    // StartGame is invoked with the gameId defined on input field on the client
    socket.on('startGame',function(numberLine,numberCols,gameMaker,type){ 
      console.log('\n----------------------------------------------------\n');
        console.log('Client requested "startGame" - gameId = ' + gamesCount); 
        console.log('Client requested "startGame" -  = ' + numberLine + " " + numberCols+ " " +gameMaker+ " " +type);

        //console.log(io().id);
        socket.join(gamesCount);

        games[gamesCount] = gameMod.gameStart(gamesCount, numberLine, numberCols, gameMaker,type);

        console.log(games);
        io.in(gamesCount).emit('refreshGame', games[gamesCount]);
        //console.log('Games ', games);
        gamesCount++;
    });
/*
    // joinGame is invoked with the gameId defined on input field on the client
    socket.on('joinGame',function(gameId){ 
        console.log('\n----------------------------------------------------\n');
        console.log('Client requested "joinGame" - gameId = ' + gameId);       

        socket.join(gameId);

        io.in(gameId).emit('refreshGame', games[gameId]);
        console.log('Games ', games);
    });

*/


/*
    // Messages have information about the room (id)
    
    socket.on('playMove',function(gameId, move){ 
        console.log('\n----------------------------------------------------\n');
      console.log('Client requested "playMove" - gameId = ' + gameId + ' move= ', move);

        gameMod.playMove(games[gameId], move.numPlayer, move.position);

        io.in(gameId).emit('refreshGame', games[gameId]);
        console.log('Games ', games);
    });
*/

/*
    //chat global
    socket.on('chat message',function(playerName, chatMsg){ 
        console.log('\n----------------------------------------------------\n');
        console.log('Client send a chat message = ' + playerName+ ' - '+chatMsg);       

        io.emit('newChatMsg', playerName, chatMsg);
    });*/
/*
    //chat individual
    socket.on('msgChatGame',function(gameId, playerName, chatMsg){ 
        console.log('\n----------------------------------------------------\n');
        console.log('Client send a chat message = "' + chatMsg + '" to room ' + gameId);       

        io.in(gameId).emit('newChatMsg', playerName, chatMsg);
    });

    socket.on('disconnect',function(){
        console.log('\n----------------------------------------------------\n');
        console.log('Disconnect');
    });  
    */   
});

