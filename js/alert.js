var url_string = window.location.href; // www.test.com?filename=test
var url = new URL(url_string);
// fetching get values from url

var paramValueMsg = url.searchParams.get("msg");

if (paramValueMsg == "loggedOut") {
  const alertLogin = document.getElementById("msg");
  message = "You have been logged out.";
  alertLogin.innerHTML = alertSuccessMsg(message);
  hideAlert();
}
if (paramValueMsg == "reportInserted") {
  const alertLogin = document.getElementById("alertMessage");
  message = "Report inserted.";
  alertLogin.innerHTML = alertSuccessMsg(message);
  hideAlert2();
}
if (paramValueMsg == "reportStatusChanged") {
  const alertLogin = document.getElementById("alertMessage");
  message = "Report status changed to fixed.";
  alertLogin.innerHTML = alertSuccessMsg(message);
  hideAlert2();
}
if (paramValueMsg == "userLogged") {
  const alertLogin = document.getElementById("alertMessage");
  message = "You are now logged in.";
  alertLogin.innerHTML = alertSuccessMsg(message);
  hideAlert2();
}
if (paramValueMsg == "equipementInserted") {
  const alertLogin = document.getElementById("alertMessage");
  message = "Succesfully inserted equipement.";
  alertLogin.innerHTML = alertSuccessMsg(message);
  hideAlert2();
}
if (paramValueMsg == "userInserted") {
  const alertLogin = document.getElementById("alertMessage");
  message = "Succesfully inserted user.";
  alertLogin.innerHTML = alertSuccessMsg(message);
  hideAlert2();
}
if (paramValueMsg == "userDeleted") {
  const alertLogin = document.getElementById("alertMessage");
  message = "User deleted.";
  alertLogin.innerHTML = alertDangerMsg(message);
  hideAlert2();
}
if (paramValueMsg == "equipementDeleted") {
  const alertLogin = document.getElementById("alertMessage");
  message = "Equipement deleted.";
  alertLogin.innerHTML = alertDangerMsg(message);
  hideAlert2();
}








// FUNCTIONS ALERT
function hideAlert() {
  setTimeout(function () {
    document.getElementById("msg").firstElementChild.remove();
  }, 4000);
}
function hideAlert2() {
  setTimeout(function () {
    document.getElementById("alertMessage").firstElementChild.remove();
  }, 4000);
}
function alertDangerMsg(msg) {
  let alertMessage =
    `<div class='alert alert-danger alert-dismissible fade show' role='alert'>
          ` +
    msg +
    `
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button></div>`;
  return alertMessage;
}
function alertSuccessMsg(msg) {
  let alertMessage =
    `<div class='alert alert-success alert-dismissible fade show' role='alert'>
            ` +
    msg +
    `
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button></div>`;
  return alertMessage;
}
