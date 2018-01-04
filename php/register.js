function hideAll() {
  document.getElementById("usernameInUse").style.display = 'none';
  document.getElementById("usernameNull").style.display = 'none';
  document.getElementById("passwordNull").style.display = 'none';
  document.getElementById("passwordMatchError").style.display = 'none';
}
function register() {
  hideAll();
}
function success() {
  document.getElementById('registerSuccess').style.display = 'none';
  window.location.href = "https://www.example.com";
}
