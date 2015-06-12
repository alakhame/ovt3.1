
var channel = window.hash_link;
var sender = Math.round(Math.random() * 999999999) + 999999999;

var SIGNALING_SERVER = 'http://localhost:8880/';
io.connect(SIGNALING_SERVER).emit('new-channel', {
    channel: channel,
    sender: sender
});
var socket = io.connect(SIGNALING_SERVER + channel);
socket.on('connect', function () {
    // setup peer connection & pass socket object over the constructor!
});
socket.send = function (message) {
    socket.emit('message', {
        sender: sender,
        data: message
    });
};
// var peer = new PeerConnection('http://socketio-signaling.jit.su:80');
var peer = new PeerConnection(socket);
peer.onUserFound = function(userid) {
    if (document.getElementById(userid)) return;
    peer.sendParticipationRequest(userid);
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

peer.userid = document.querySelector('#your-name').value;
 

var videosContainer = document.getElementById('remoteVideos')  ;  

 

// you need to capture getUserMedia yourself!
function getUserMedia(callback) {
    var hints = {audio:true,video:{
        optional: [],
        mandatory: {}
    }};
    navigator.getUserMedia(hints,function(stream) {
        //if (!document.getElementById(peer.userid)) {
            var video = document.createElement('video');
            video.setAttribute("id",peer.userid);
            video.src = URL.createObjectURL(stream);
            //video.controls = true;
            video.muted = true;
       // }
        
        peer.onStreamAdded({
            mediaElement: video,
            userid: peer.userid,
            stream: stream
        });
        
        callback(stream);
    });
} 