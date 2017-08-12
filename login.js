var fs = require('fs');
var homeDir = Titanium.Filesystem.getUserDirectory();

username = document.getElementById('username').value;
password = document.getElementById('password').value;
var cUsername;
var cPassword;

var rawFile;
var files = fs.readdirSync('./users/');
alert(files);
var text;

function validate() {
  var usrInfo = Titanium.Filesystem.getFile(homeDir, "./users/" + username + ".usr");
  alert("sup");
  if(usrInfo.exists()) {
    getLogin("./users/" + username + ".usr");
    if(username == cUsername && password == cPassword) {
        alert("hi");
    } else {
      alert("bye");
    }
  }
}
function register() {
  var usrInfo = Titanium.Filesystem.getFile(homeDir, "./users/" + username + ".usr");
  for(var i = 0; i < files.length(); i++) {
    if(usrInfo.exists()) {
      alert("That username is already in use.");
    }
  }

}
function getLogin(file) {
    rawFile = new XMLHttpRequest();
    rawFile.open("GET", file, false);
    rawFile.onreadystatechange = function () {
        if(rawFile.readyState === 4) {
            if(rawFile.status === 200 || rawFile.status == 0) {
                text = rawFile.responseText;
                cUsername = text.split(":")[0];
                cPassword = text.split(":")[1];
            }
        }
    }
    rawFile.send(null);
}
