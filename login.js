var username;
var password;
var cUsername;
var cPassword;

var fs = require('fs');
var files = fs.readdirSync('./users/');
const remote = require('electron').remote
const main = remote.require('./main.js')

//Find a way to check if a file exists
function validate() {
  username = document.getElementById('username').value;
  password = document.getElementById('password').value;

  getLogin("./users/" + username + ".usr");
  if(username == cUsername && password == cPassword) {
    main.gitWindow();
  } else {
    alert("bye");
  }

}
//Open register window
function register() {
  main.regWindow();
}
//Read from the file
function getLogin(file) {
  var rawFile = new XMLHttpRequest();
  rawFile.open("GET", file, false);
  rawFile.onreadystatechange = function () {
    if(rawFile.readyState === 4) {
      if(rawFile.status === 200 || rawFile.status == 0) {
        var text = rawFile.responseText;
        cUsername = text.split(":")[0];
        cPassword = text.split(":")[1];
      }
    }
  }
  rawFile.send(null);
}
