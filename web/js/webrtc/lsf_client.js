
var channel = window.hash_link;
var sender = window.ownID;

var SIGNALING_SERVER = window.sig_server; 
io.connect(SIGNALING_SERVER).emit('new-channel', {
    channel: channel,
    sender: sender
});
var socket = io.connect(SIGNALING_SERVER + channel);
socket.on('connect', function () {
	console.log('connected');
});
socket.send = function (message) { 
    socket.emit('message', {
        sender: sender,
        data: message
    });
};
// var peer = new PeerConnection('http://socketio-signaling.jit.su:80');
var peer = new PeerConnection(socket);
  console.log(socket);
peer.onUserFound = function(userid) {
    console.log('peer found');
    if (document.getElementById(userid)) return;
    peer.sendParticipationRequest(userid);
    $('#ttarea').css("border"," 5px inset green");
    var dataConnect={userID: sender,  saloon: channel };
    socket.emit('clientPresenceACK',dataConnect); 
};

peer.onStreamAdded = function(e) {
    var video = e.mediaElement;
    video.setAttribute('width', 600);
    videosContainer.insertBefore(video, videosContainer.firstChild);
    video.play(); 
};

peer.onStreamEnded = function(e) {
    var video = e.mediaElement;
    if (video) {
        video.style.opacity = 0; 
        setTimeout(function() {
            video.parentNode.removeChild(video); 
        }, 1000);
    }
};

peer.userid = sender  ;

var videosContainer = document.getElementById('remoteVideos')  ;  


    
 