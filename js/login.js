function hideAll() {
  document.getElementById("passwordNull").style.display = 'block';
  document.getElementById("usernameNull").style.display = 'block';
}
function login() {
  hideAll();
  var username = document.getElementById('username').value;
  var password = document.getElementById('password').value;
  //alert("username: " + username + ". password: " + password);

  if(username != "" && password != "") {
    alert("ready");
    // do stuff
  } else {
    if(username == "") {
      document.getElementById("usernameNull").style.display = 'block';
    }
    if(password == "") {
      document.getElementById("passwordNull").style.display = 'block';
    }
  }
}
