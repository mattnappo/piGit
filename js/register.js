function hideAll() {
  document.getElementById("usernameInUse").style.display = 'none';
  document.getElementById("usernameNull").style.display = 'none';
  document.getElementById("passwordNull").style.display = 'none';
  document.getElementById("passwordMatchError").style.display = 'none';
}




function test() {
  var http = new XMLHttpRequest();
  var url = "new.txt";
  var params = "lorem=ipsum&name=binny";
  http.open("POST", url, true);

  //Send the proper header information along with the request
  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  http.onreadystatechange = function() {//Call a function when the state changes.
    if(http.readyState == 4 && http.status == 200) {
      alert(http.responseText);
    }
  }
  http.send(params);
}




function loadDoc(url, cFunction) {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      cFunction(this);
    }
  };
  xhttp.open("GET", url, true);
  xhttp.send();
}
function call(xhttp) {

  var username = document.getElementById('username').value;
  var password = document.getElementById('password').value;
  var confirmpw = document.getElementById('confirmpw').value;

  if(username != "" && password != "" && password == confirmpw) {

    var response = xhttp.responseText;
    var obj = JSON.parse(response);

    var usernames = Object.keys(obj["users"]);
    var passwords = Object.values(obj["users"]);

    for(var i in usernames) {
      if(username == usernames[i]) {
        document.getElementById("usernameInUse").style.display = 'block';
        XMLHttpRequest.abort()
      }
    }

    var newJSON = response.slice(0, -3) + ',"' + username + '":"' + password + '"}}'

    alert(newJSON);

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
function register() {
  hideAll();
  loadDoc('users/users.json', call);
      /*
      if(username is not in use) {
        mkdir "users/" + username
        append '" + username + "' + ':' + '" + hash(password) + "' to users.json
        go to login page
      } else {
        document.getElementById("usernameInUse").style.display = 'block';
      }
      */
}
