// Request after submiting add user form
$(document).ready(function () {
  // Add User
  $("#registerUserForm").submit(function (e) {
    e.preventDefault();

    const $form = $(this);
    const serijalizacija = $form.serialize();

    request = $.ajax({
      url: "controller/users/addUser.php",
      type: "post",
      data: serijalizacija,
    });

    request.done(function (response, textStatus, jqXHR) {
      if (response === "Success") {
        location.href = "home.php?msg=userInserted";
      } else {
        console.log("Update failed." + response);
      }
    });
    request.fail(function (jqXHR, textStatus, error) {
      console.error("There was an error: " + textStatus, error);
    });
  });

  // Request after submiting edit profile form
  $("#editProfileForm").submit(function (e) {
    e.preventDefault();

    const $form = $(this);
    const serijalizacija = $form.serialize();
    request = $.ajax({
      url: "controller/users/editProfile.php",
      type: "post",
      data: serijalizacija,
    });

    request.done(function (response, textStatus, jqXHR) {
      if (response === "Success") {
        location.href = "includes/logout.inc.php";
      } else {
        console.log("Update failed." + response);
      }
    });
    request.fail(function (jqXHR, textStatus, error) {
      console.error("There was an error: " + textStatus, error);
    });
  });

  // EQUIPEMENT
  // AJAX
  // REQUESTS
  // Add Equipement

  // Request after submiting add equipement form
  $("#registerEquipementForm").submit(function (e) {
    e.preventDefault();

    console.log("radi");
    const $form = $(this);
    const serijalizacija = $form.serialize();

    request = $.ajax({
      url: "controller/equipement/addEquipement.php",
      type: "post",
      data: serijalizacija,
    });

    request.done(function (response, textStatus, jqXHR) {
      if (response === "Success") {
        location.href = "home.php?msg=equipementInserted";
      } else {
        console.log("Update failed." + response);
      }
    });
    request.fail(function (jqXHR, textStatus, error) {
      console.error("There was an error: " + textStatus, error);
    });
  });

  // REPORTS
  // AJAX
  // REQUESTS
  // Add Report

  // Request after submiting add report form
  $("#addReportForm").submit(function (e) {
    e.preventDefault();

    const $form = $(this);
    const serijalizacija = $form.serialize();

    request = $.ajax({
      url: "controller/reports/addReport.php",
      type: "post",
      data: serijalizacija,
    });

    request.done(function (response, textStatus, jqXHR) {
      console.log(jqXHR);
      if (response === "Success") {
        location.href = "home.php?msg=reportInserted";
      } else {
        console.log("Update failed." + response);
      }
    });
    request.fail(function (jqXHR, textStatus, error) {
      console.error("There was an error: " + textStatus, error);
    });
  });
});
