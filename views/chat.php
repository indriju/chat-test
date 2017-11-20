<!doctype html>
<html>
<head>
<script src="https://cdn.socket.io/socket.io-1.4.5.js">
</script>

<script src="http://code.jquery.com/jquery-1.11.1.js"></script>

<script>
  $(function () {
    var socket = io();
    $('form').submit(function(){
      socket.emit('chat message', $('#m').val());
      $('#m').val('');
      return false;
    });
    socket.on('chat message', function(msg){
      $('#messages').append($('<li>').text(msg));
    });
  });
</script>

<style>
*{margin:0; padding:0; box-sizing: border-box;}
body{font:13px Helvetika, Arial;}
form{background: #000;padding:3px; position: fixed; bottom:0; width:100%;}
form input{border:0; padding:10px; width:90%; margin-rigth: .5%}
form button{width:9%;background: rgb(130, 224, 255); border:none; padding:10px;}
#messages { list-style-type: none; margin:0; padding:0;}
#messages li{padding:5px 10 px;}
#messages li:nth-child(odd) {background: #eee;} 

</style>
</head>
<body>
hhhh
<ul id="messages"></ul>
    <form action="">
      <input id="m" autocomplete="off" /><button>Send</button>
    </form>


</body>
</html>