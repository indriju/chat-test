var url = require('url');
var http = require('http');
var fs = require('fs');
var path = require("path");

var app = http.createServer(function(request, response) {
 var uri;
 
 uri = url.parse(request.url).pathname;
 if (uri == '/') uri += 'views/site/chat.php';
 uri = path.join(__dirname,uri);
 
 msg = fs.readFile(uri, function(err,msg){
  if(err){
   response.writeHead(404, {"Content-Type": "text/plain"});
   response.write("404 Not Found\n");
   response.end();
   return;
  } else {
   response.writeHead(200, {"Content-Type": 'text/html'});
   response.write(msg);
   response.end()
   console.log("Request OK");
  }
 });
});
var io = require('socket.io').listen(app);

io.on('connection', function(socket){
  socket.on('chat message', function(msg){
    io.emit('chat message', msg);
  });
});

app.listen(81, function(){
  console.log('listening on *:' + 80);
});



