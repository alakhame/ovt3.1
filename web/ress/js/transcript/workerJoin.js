$(function() {
            $('#pseudo').text('worker');
            $('#ttarea').css("border"," 5px inset red");
            
            var socket = io.connect('localhost:9090',{'sync disconnect on unload': true });
            wordBuffer='';

            function sendData(text){
                var data={'pseudo':$('#pseudo').text() , word: wordBuffer};
                socket.emit('sendingWord', data);
                wordBuffer='';
            }

            function validPrintable(keycode){
                var valid = 
                    (keycode > 47 && keycode < 58)   || // number keys
                    keycode == 32 || keycode == 13   || // spacebar & return key(s) (if you want to allow carriage returns)
                    (keycode > 64 && keycode < 91)   || // letter keys
                    (keycode > 95 && keycode < 112)  || // numpad keys
                    (keycode > 185 && keycode < 193) || // ;=,-./` (in order)
                    (keycode > 218 && keycode < 223);   // [\]' (in order)

                return valid;
            }

            var dataConnect={userID:0,saloon:"{{link}}"};
            socket.on("connect", function(){
                socket.emit('letMeJoin',dataConnect);
                $('#ttarea').css("border"," 5px inset green");
            });

            $( "#ttarea textarea" ).bind("keypress",function(e) {
                var selectionLength=$('#ttarea textarea').selection().length;
                if(selectionLength>1){
                    //alert(selectionLength);
                    data={'pseudo':$('#pseudo').text(), position :$('#ttarea textarea').caret(), nbChars:selectionLength};
                    socket.emit('deletingString', data);
                }
                        
                var key=e.keyCode;
                var pos =$('#ttarea textarea').caret();
                var data={'pseudo':$('#pseudo').text() , character:String.fromCodePoint(e.which), position :pos};
                socket.emit('sendingChar', data);
               
            });

            $( "#ttarea textarea" ).bind("keydown",function(e) {
                var key=e.keyCode;
                var pos =$('#ttarea textarea').caret();
                var data={'pseudo':$('#pseudo').text() , character:String.fromCodePoint(e.which), position :pos};
                //alert($('#ttarea textarea').selection().length+' -- '+$('#ttarea textarea').caret());
                var selectionLength=$('#ttarea textarea').selection().length;
               
                switch(key){
                    case KeyCode.BACKSPACE :
                        if(selectionLength>1){
                           // alert(selectionLength);
                            data={'pseudo':$('#pseudo').text(), position :pos, nbChars:selectionLength};
                            socket.emit('deletingString', data);
                        }else{
                            data.position=data.position-1;
                            socket.emit('deletingChar', data);
                        }
                        break;
                    case KeyCode.DEL:
                        if(selectionLength>1){
                            //alert(selectionLength);
                            data={'pseudo':$('#pseudo').text(), position :pos, nbChars:selectionLength};
                            socket.emit('deletingString', data);
                        }else{
                         socket.emit('deletingChar', data);
                        }
                        break;
                }
            
            }); 

            $( "#ttarea textarea" ).bind("cut",function(e) {
                var selectionLength=$('#ttarea textarea').selection().length;
                if(selectionLength>0){
                    //alert(selectionLength);
                    data={'pseudo':$('#pseudo').text(), position :$('#ttarea textarea').caret(), nbChars:selectionLength};
                    socket.emit('deletingString', data);
                }
            });

            $( "#ttarea textarea" ).bind("paste",function(e) {
                //console.debug(e);
                var text =e.originalEvent.clipboardData.getData('text/plain');
                //alert(text);
                
                data={'pseudo':$('#pseudo').text(), position :$('#ttarea textarea').caret(), textString:text};
                socket.emit('sendingString', data);
            });

            var heartBeat = function() {
                socket.emit('presenceFrame');
            }
            heartBeat(socket); 
            var timer = setInterval(heartBeat   ,5000);
        });