var username;
var password;
var fs = require('fs');
var files = fs.readdirSync('./users/');
function register() {
  username = document.getElementById('username').value;
  password = document.getElementById('password').value;
  for(var i = 0; i < files.length-1; i++) {
    if(username + ".usr" == files[i]) {
      alert("That username is already in use.");
    } else {
      alert("This can work")
    }
  }
}
