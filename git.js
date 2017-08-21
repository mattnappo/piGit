var currRepo = "";
var executablePath = "./scripts/getRepo.exe";
const {shell} = require('electron');
var fs = require('fs');
function setRepo(id) {
  currRepo = id;
}
function readFile(callback) {
  var xobj = new XMLHttpRequest();
  xobj.overrideMimeType("application/json");
  xobj.open('GET', './repos/info.json', true);
  xobj.onreadystatechange = function () {
    if (xobj.readyState == 4 && xobj.status == "200") {
      callback(xobj.responseText);
    }
  };
  xobj.send(null);
}
function getReposX() {
  //shell.openItem("./scripts/getRepo.exe");
  getRepos();
}
function getRepos() {
  readFile(function(response) {
    var raw = JSON.parse(response);
    for(var i = 0; i < raw.repos.length; i++) {
      document.getElementById('repos').innerHTML = document.getElementById('repos').innerHTML + '<div class="list-group-item"><a onclick="setRepo()" class="list-group-item">' + raw.repos[i] + '</a></div>';
    }
  });
}

function getSourceX() {
  //shell.openItem("./scripts/cloneRepo.exe");
  getSource();
}
function showFile(file) {
  readFile(function(response) {
    alert(response);
  });
}
function showFolder(folder) {
  alert("lol");
}
function getSource() {
  var files = fs.readdirSync("./repos/" + currRepo + "/");
  alert(files[0]);
  alert(files[1]);
  for(var i = 0; i < files.length; i++) {
    if(fs.lstatSync("./repos/" + currRepo).isDirectory()) {
      document.getElementById('workspace').innerHTML = document.getElementById('workspace').innerHTML + '<div class="list-group-item"><a onclick="showFolder(' + files[i] + ')" class="list-group-item">' + files[i] + '</a></div>';
    } else {
      document.getElementById('workspace').innerHTML = document.getElementById('workspace').innerHTML + '<div class="list-group-item"><a onclick="showFile(' + files[i] + ')" class="list-group-item">' + files[i] + '</a></div>';
    }
  }
}
