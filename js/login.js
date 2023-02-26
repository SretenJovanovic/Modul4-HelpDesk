$("#login").submit(function (e) {
  e.preventDefault();
  
  const $form = $(this);
  const serijalizacija = $form.serialize();
  var inputs = document.querySelectorAll("#login input");

  if (!checkIfValidLogin(inputs)) {
    return;
  }
  request = $.ajax({
    url: "controller/login.controller.php",
    type: "post",
    data: serijalizacija,
  });

  request.done(function (response, textStatus, jqXHR) {
    if (
      response == "administrator" ||
      response == "operator" ||
      response == "technician"
    ) {
      location.href = "home.php?msg=userLogged";
    } else if (response == "Failed") {
      const alertLogin = document.getElementById("msg");
      message = "Wrong credentials.";
      alertLogin.innerHTML = alertDangerMsg(message);
      hideAlert();
    } else {
      console.log(response);
    }
  });
  request.fail(function (jqXHR, textStatus, error) {
    console.error("There was an error: " + textStatus, error);
  });
});

function checkIfValidLogin(inputs) {
  const alertLogin = document.getElementById("msg");
  var status = true;
  if (inputs[0].value == "" && inputs[1].value == "") {
    message = "Please fill out all fields.";
    alertLogin.innerHTML = alertDangerMsg(message);
    hideAlert();
    status = false;
    return status;
  } else {
    for (var i = 0; i < inputs.length; i++) {
      if (inputs[i].value == "" && inputs[i].name == "email_username") {
        message = "<b>Email/Username</b> is required.";
        alertLogin.innerHTML = alertDangerMsg(message);
        hideAlert();
        status = false;
        return status;
      } else if (inputs[i].value == "" && inputs[i].name == "password") {
        message = "<b>Password</b> is required.";
        alertLogin.innerHTML = alertDangerMsg(message);
        hideAlert();
        status = false;
        return status;
      }
    }
  }
  return status;
}
