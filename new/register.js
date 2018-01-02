function hideAll() {
  document.getElementById("usernameInUse").style.display = 'none';
  document.getElementById("usernameNull").style.display = 'none';
  document.getElementById("passwordNull").style.display = 'none';
  document.getElementById("passwordMatchError").style.display = 'none';
}
function checkInUse() {
  hideAll();
  var username = document.getElementById('username').value;
  var password = document.getElementById('password').value;
  var confirmpw = document.getElementById('confirmpw').value;
  //alert("username: " + username + ". password: " + password + ". confirm: " + confirmpw)

  if(username != "" && password != "" && password == confirmpw) {
    //if username is not in use {
      alert("ready");
    //} else {document.getElementById("usernameInUse").style.display = 'block';}

  } else {
    if(username == "") {
      document.getElementById("usernameNull").style.display = 'block';
    }
    if(password == "") {
      document.getElementById("passwordNull").style.display = 'block';
    }
    if(password != confirmpw) {
      document.getElementById("passwordMatchError").style.display = 'block';
    }
  }


}
