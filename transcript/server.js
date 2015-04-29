var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);

var workers= [];

app.get('/', function(req, res){
  res.sendFile(__dirname + '/index.html');
})
.get('/img/:image', function(req, res){
  res.sendFile(__dirname +'/img/'+req.param('image'));
})
.get('/css/:style', function(req, res){
  res.sendFile(__dirname +'/css/'+req.param('style'));
})
.get('/js/:js', function(req, res){
  res.sendFile(__dirname +'/js/'+req.param('js'));
})
.get('/worker', function(req, res){
  res.sendFile(__dirname + '/worker.html');
});


io.on('connection', function(socket){

  socket.on('sendingWord', function(data){
    socket.broadcast.emit('incomingWord', data);
  });

   socket.on('presenceFrame', function(){
    console.log('receiving presenceFrame ... ');
    workers.push(socket);
    socket.broadcast.emit('workerConnected');
  });

  socket.on('sendingChar', function(data){
    //server stuff
    console.log('sending ' +data.character +' at pos : '+data.position);
    socket.broadcast.emit('incomingChar', data);
  });

  socket.on('sendingString', function(data){
    //server stuff
    console.log('sending String "' +data.textString +'" at pos : '+data.position);
    socket.broadcast.emit('incomingString', data);
  });
 
  socket.on('deletingChar', function(data){
    //server stuff
    console.log('deleting char  at pos : '+data.position);
    socket.broadcast.emit('deletingChar', data);
  });

  socket.on('deletingString', function(data){
    //server stuff
    console.log('deleting String  at pos : '+data.position+' with length : '+data.nbChars);
    socket.broadcast.emit('deletingString', data);
  });

  socket.on('disconnect', function () {
    var i = workers.indexOf(socket);
    socket.broadcast.emit('workerDisconnected');
    workers.splice(i,1);
  });

  socket.on('workerConnected',function(){
    workers.push(socket);
    socket.broadcast.emit('workerConnected');
  });

   
});

http.listen(9090, function(){
  console.log('listening on *:9090');
});
