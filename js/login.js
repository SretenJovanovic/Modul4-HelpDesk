$("#login").submit(function (e) {
  e.preventDefault();
  console.log("login");
  const $form = $(this);
  const serijalizacija = $form.serialize();

  request = $.ajax({
    url: "controller/login.controller.php",
    type: "post",
    data: serijalizacija,
  });

  request.done(function (response, textStatus, jqXHR) {
    console.log(response);
    if (
      response == "administrator" ||
      response == "operator" ||
      response == "technician"
    ) {
      location.href = "home.php?msg=userLogged";
    } else {
      console.log("Login failed." + response);

      // dodati stil za error msg
      document.getElementById("msg").innerText = "Wrong credentials.";
    }
  });
  request.fail(function (jqXHR, textStatus, error) {
    console.error("There was an error: " + textStatus, error);
  });
});
