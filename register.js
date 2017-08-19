var username;
var password;
var fs = require('fs');
var files = fs.readdirSync('./users/');
function saveUser(user, pass) {
  var loc = "/users/" + user + ".usr"
  var xFile = fopen(loc, 3);
  alert("skip");
  if(xFile!=-1) {
    var str = user + ":" + pass;
    fwrite(xFile, str);
    fclose(xFile);
  }
}

function register() {
  username = document.getElementById('username').value;
  password = document.getElementById('password').value;
  var password2 = document.getElementById('password2').value;
  if(password == password2) {
    for(var i = 0; i < files.length-1; i++) {
      if(username + ".usr" == files[i]) {
        alert("That username is already in use.");
      } else {
        saveUser(username, password);
      }
    }
  } else {
    alert("Passwords must match.");
  }
}
