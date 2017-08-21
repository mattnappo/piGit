var username;
var password;
var password2;
var fs = require('fs');
var files = fs.readdirSync('./users/');
function saveUser(user, pass) {
  var loc = "/users/" + user + ".usr"
  var content = user + ":" + pass;
  fs.writeFile(loc, content, (err) => {
    if(err) {
      alert("Could not create user: " + err.message);
    } else {
      alert("User " + user + " has been created successfully.");
    }
  })
}

function register() {
  username = document.getElementById('username').value;
  password = document.getElementById('password').value;
  password2 = document.getElementById('password2').value;
  if(password == password2) {
    alert("lol yea");
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
