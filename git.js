var repos = [];
var executablePath = "./scripts/getRepo.exe";
var SSHConnection = require('ssh2');
var fs = require('fs');
function readFile(callback, fileName) {
  var xobj = new XMLHttpRequest();
  xobj.overrideMimeType("application/json");
  xobj.open('GET', './repos/'+ fileName, true);
  xobj.onreadystatechange = function () {
    if (xobj.readyState == 4 && xobj.status == "200") {
      callback(xobj.responseText);
    }
  };
  xobj.send(null);
}
function repoGrab() {
  getRepos(function(response) {
    for(var i = 0; i < response.repos.length; i++) {
      repos.push(response.repos[i]);
      document.getElementById('repos').innerHTML = document.getElementById('repos').innerHTML + '<div class="list-group-item"><a onclick="setRepo()" class="list-group-item">' + repos[i] + '</a></div>';
    }
  });
}
function getRepos(callback) {
  var repos = "";
  var c = new SSHConnection();
  c.on('connect', function() {
    console.log('Connection :: connect');
  });
  c.on('ready', function() {
    console.log('Connection :: ready');
    c.exec('python getRepos.py;cat repos.json', function(err, stream) {
      if (err) throw err;
      stream.on('data', function(data) {
        repos = JSON.parse(data.toString());
      });

      stream.on('close', function() {
        callback(repos);
      });
    });
  });
  c.on('error', function(err) {
    console.log('Connection :: error :: ' + err);
  });
  c.on('end', function() {
    console.log('Connection :: end');
  });
  c.on('close', function(had_error) {
    console.log('Connection :: close');
  });
  c.connect({
    host: 'mattnappo.ddns.net',
    port: 22,
    username: 'pi',
    password: 'eatsleepoverclock'
  });
}

function showFile(file) {
  readFile(function(response) {
    alert(response);
  });
}
function showFolder(folder) {
  alert("lol");
}
function getSource(repo) {
  var files = fs.readdirSync("./repos/" + repo + "/");
  alert(files[0]);
  alert(files[1]);
  for(var i = 0; i < files.length; i++) {
    if(fs.lstatSync("./repos/" + repo).isDirectory()) {
      document.getElementById('workspace').innerHTML = document.getElementById('workspace').innerHTML + '<div class="list-group-item"><a onclick="showFolder(' + files[i] + ')" class="list-group-item">' + files[i] + '</a></div>';
    } else {
      document.getElementById('workspace').innerHTML = document.getElementById('workspace').innerHTML + '<div class="list-group-item"><a onclick="showFile(' + files[i] + ')" class="list-group-item">' + files[i] + '</a></div>';
    }
  }
}
