//var app = require('express')();
var crypto = require('crypto'), httpUtils = require('http');
//var http = require('http').Server(app);
//var io = require('socket.io')(http);

var config = require('getconfig');
var uuid = require('node-uuid');
var port = parseInt(process.env.PORT || config.server.port, 10);

var workersTAB= [];
var clientsTAB= [];
var SERVER_ROOT_DOMAIN="http://localhost/ovt3.1/web/app_dev.php/";

var io = require('socket.io').listen(port);

/*if (config.logLevel) {
    io.set('log level', config.logLevel);
}*/


function describeRoom(name) {
    var clients = io.sockets.clients(name);
    var result = {
        clients: {}
    };
    clients.forEach(function (client) {
        result.clients[client.id] = client.resources;
    });
    return result;
}

function safeCb(cb) {
    if (typeof cb === 'function') {
        return cb;
    } else {
        return function () {};
    }
}


function updateDB(sessionID,position,content){
    var link = SERVER_ROOT_DOMAIN+"API/session/addString/"+sessionID+"?position="+position+"&content="+content;
    httpUtils.get(link, function(res) {
        console.log("Got response: " + res.statusCode); 
    }).on('error', function(e) { 
        console.log("Got error: " + e.message);
    });
}

function newMessageToDB(data){
    var link = SERVER_ROOT_DOMAIN+"API/chatmessage/add/new?session="+data.session+"&sender="+data.sender+
                                                      "&content="+data.content+"&receiver="+data.receiver;
    httpUtils.get(link, function(res) {
        console.log("Got response: " + res.statusCode); 
        console.log(link); 
    }).on('error', function(e) { 
        console.log("Got error: " + e.message);
    });
}

function retrieveSocketPosition(tab, socket){
    var i=0;
   for(i=0; i<tab.length;i++){
        console.log('TAB CONATAINS : '+tab[i]);
        var tab_i=JSON.parse(tab[i]);
        console.log("comparing "+tab_i.socket+" ----- "+socket.id);
        if(tab_i.socket==socket.id) 
            return i;
        else console.log("NO E B :")
    }
    return -1;
}

function authentificate(socket, data, userType){ 
    var link = SERVER_ROOT_DOMAIN+"API/sessionAuth?hash="+data.saloon+"&type="+userType+"&uID="+data.userID;
    var creds;
    httpUtils.get(link, function(res) {
        var body = '';
        res.on('data', function(chunk) {
            body += chunk;
        });
        res.on('end', function() {
            creds = JSON.parse(body);
            console.log("Got response: ",link );
            if(creds.access=='granted'){
                socket.join(data.saloon); 
                console.log(' -- user with id:'+data.userID+' logged on saloon :'+data.saloon);
                var newsoc={"socket":socket.id,"saloon":data.saloon};
                //console.log(newsoc);
                if(userType=='worker'){
                    socket.broadcast.to(data.saloon).emit('workerConnected'); 
                    workersTAB=[];
                    workersTAB.push(JSON.stringify(newsoc));
                    console.log('WORKER to push : '+ workersTAB);

                } else if(userType=='client'){
                    socket.broadcast.to(data.saloon).emit('clientConnected');  
                    clientsTAB=[];
                    clientsTAB.push(JSON.stringify(newsoc));
                    console.log('CLIENT to push: '+ clientsTAB);
                }
                io.to(socket.id).emit('accessGranted',socket.id) ; 
            }else{
               io.to(socket.id).emit('accessDenied',socket.id);
            }  
        });
    }).on('error', function(e) { 
        console.log("Got error: " + e.message);return 0;
    });
    
}

io.sockets.on('connection', function(socket){ 
    
    socket.resources = {
        screen: false,
        video: true,
        audio: false
    };

    socket.on('workerJoin',function(data) {
        console.log('worker to be auth : ');
        authentificate(socket,data,"worker") ;
      
    });
  
    socket.on('clientJoin',function(data) { 
        console.log('client to be auth : ');
        authentificate(socket,data,"client");
        
    });

    socket.on('presenceFrame', function(data){
        console.log('receiving presenceFrame ... ');
        socket.broadcast.to(data.saloon).emit('workerConnected');
    });

    socket.on('clientPresence', function(data){
        console.log('receiving client presence  ... ');
        socket.broadcast.to(data.saloon).emit('clientConnected');
    });

    socket.on('workerPresence', function(data){
        console.log('receiving worker presence  ... ');
        socket.broadcast.to(data.saloon).emit('workerConnected');
    });

    socket.on('clientPresenceACK', function(data){
        console.log('receiving client presence (ACK) ... ');
        socket.broadcast.to(data.saloon).emit('clientConnectedACK');
    });

    socket.on('workerPresenceACK', function(data){
        console.log('receiving worker presence ACK ... ');
        socket.broadcast.to(data.saloon).emit('workerConnectedACK');
    });

    socket.on('sendingString', function(data){ 
        //updateDB(data.session, data.position,data.textString);
        console.log('sending String "' +data.textString +'" at pos : '+data.position);
        socket.broadcast.to(data.saloon).emit('incomingString', data);
    });

    socket.on('deletingString', function(data){
        //server stuff
        console.log('deleting String  at pos : '+data.position+' with length : '+data.nbChars);
        socket.broadcast.to(data.saloon).emit('deletingString', data);
    });


    /// working with webRTC 

    socket.on('message', function (details) {
        if (!details) return;

        var otherClient = io.sockets.sockets[details.to];
        if (!otherClient) return;

        details.from = socket.id;
        otherClient.emit('message', details);
    });

    socket.on('shareScreen', function () {
        socket.resources.screen = true;
    });

    socket.on('unshareScreen', function (type) {
        socket.resources.screen = false;
        removeFeed('screen');
    });

    socket.on('join', join);

    function removeFeed(type) {
        if (socket.room) {
            io.sockets.in(socket.room).emit('remove', {
                id: socket.id,
                type: type
            });
            if (!type) {
                socket.leave(socket.room);
                socket.room = undefined;
            }
        }
    }

    function join(name, cb) {
        // sanity check
        if (typeof name !== 'string') return;
        // leave any existing rooms
        removeFeed();
        safeCb(cb)(null, describeRoom(name));
        socket.join(name);
        socket.room = name;
    }
 
    socket.on('leave', function () {
        removeFeed();
    });

    socket.on('create', function (name, cb) {
        if (arguments.length == 2) {
            cb = (typeof cb == 'function') ? cb : function () {};
            name = name || uuid();
        } else {
            cb = name;
            name = uuid();
        }
        // check if exists
        if (io.sockets.clients(name).length) {
            safeCb(cb)('taken');
        } else {
            join(name);
            safeCb(cb)(null, name);
        }
    });

    // tell client about stun and turn servers and generate nonces
    socket.emit('stunservers', config.stunservers || []);


    // create shared secret nonces for TURN authentication
    // the process is described in draft-uberti-behave-turn-rest
    var credentials = [];
    config.turnservers.forEach(function (server) {
        var hmac = crypto.createHmac('sha1', server.secret);
        // default to 86400 seconds timeout unless specified
        var username = Math.floor(new Date().getTime() / 1000) + (server.expiry || 86400) + "";
        hmac.update(username);
        credentials.push({
            username: username,
            credential: hmac.digest('base64'),
            url: server.url
        });
    });
    socket.emit('turnservers', credentials);




    /// end WEBRTC

    socket.on('disconnect', function () {
         var i = retrieveSocketPosition(workersTAB,socket);
        console.log('INTO DISCONNECT for' +socket.id+' *************** i='+i);
        if(i!=-1){
            console.log('EMITING WD to ** '+JSON.parse(workersTAB[i]).saloon);
            socket.broadcast.to(JSON.parse(workersTAB[i]).saloon).emit('workerDisconnected');
            workersTAB=[];
        }else{
            i = retrieveSocketPosition(clientsTAB,socket);
            if(i!=-1){
                console.log('EMITING CD');
                socket.broadcast.to(JSON.parse(clientsTAB[i]).saloon).emit('clientDisconnected');
                clientsTAB=[];
            }else{
                console.log('VOID');
            }
        }
        socket.leave();
        removeFeed();
    });

    socket.on('workerConnected',function(){
        workersTAB.push(socket);
        socket.broadcast.emit('workerConnected');
    });  

    ////// CHAT HANDLERS 
    socket.on('newChatMessage', function(data){
        console.log('new chat message from : '+data.sender);
        socket.broadcast.to(data.saloon).emit('newChatMessage', data);
        newMessageToDB(data);
    });
 

});





/*http.listen(port, function(){
    console.log('listening on *:'+port);
});*/


if (config.uid) process.setuid(config.uid);
console.log(' -- signal master is running at: http://localhost:' + port);
