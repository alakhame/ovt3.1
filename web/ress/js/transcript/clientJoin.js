$('#pseudo').text('client');
$('#allkeys').html('');

function deleteBackWards(textCantainer, position, nbChars){
    var content = textCantainer.text();
    var left=content.substring(0,position);
    var right=content.substring(position+nbChars);
    textCantainer.text(left+right);
}

var socket = io();

socket.on('incomingChar', function(data){
    var content = $('#ttarea textarea').text();
    var pos=data.position;
    var left=content.substring(0,pos);
    var right=content.substring(pos,content.length);
    $('#ttarea textarea').text(left+data.character+right);
    //$('#ttarea textarea').caret(data.position);
    //$('#ttarea textarea').selection('insert', {text:data.character, mode: 'after'});
});

socket.on('incomingString', function(data){
    var content = $('#ttarea textarea').text();
    var pos=data.position;
    var left=content.substring(0,pos);
    var right=content.substring(pos,content.length);
    $('#ttarea textarea').text(left+data.textString+right);
});

 socket.on('deletingChar', function(data){
   /* 
    var content = $('#ttarea textarea').text();
    var pos=data.position;
    var left=content.substring(0,pos-1);
    var right=content.substring(pos,content.length);
    
    $('#ttarea textarea').text(left+right);*/
    deleteBackWards($('#ttarea textarea'),data.position,1);
});

socket.on('deletingString', function(data){
   //alert('in delStr - '+data.position+' - '+data.nbChars);
   deleteBackWards($('#ttarea textarea'),data.position,data.nbChars);
});

socket.on('workerConnected', function(data){
    $('#ttarea').css("border"," 5px inset green");
});

socket.on('workerDisconnected', function(data){
    $('#ttarea').css("border"," 5px inset red");
});