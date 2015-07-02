
var channel = window.hash_link;
var sender = window.ownID;

var SIGNALING_SERVER = window.sig_server;
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

var peer = new PeerConnection(socket);
 
peer.onStreamAdded = function(e) {
    var video = e.mediaElement;
    video.setAttribute('width', 600);
    video.controls=false;
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
       // }
        
        peer.onStreamAdded({
            mediaElement: video,
            userid: peer.userid,
            stream: stream
        });
        
        callback(stream);
    });
} 


function initiateVisio(){
    getUserMedia(function(stream) {
        peer.addStream(stream);
        peer.startBroadcasting(); 
    }); 

}

peer.userid =  sender;
var videosContainer = document.getElementById('localVideo')  ;  



var loop = setInterval(function(){
socket.emit('workerConnected',{userID: sender,  saloon: channel });
},3000);

 
