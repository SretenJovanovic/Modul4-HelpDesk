// Request after submiting add user form
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

// Adding values to edit user modal
$(".editUserModalBtn").click(function (e) {
  e.preventDefault();

  let userId = $(this).val();

  request = $.ajax({
    url: "controller/users/getUser.php",
    type: "post",
    data: { id: userId },
  });

  request.done(function (response, textStatus, jqXHR) {
    if (response) {
      response = jQuery.parseJSON(response);

      $("#titleID").text(response.username);
      //   dodavanje vrednosti u polja
      $("#euserId").val(response.ID);
      $("#eusername").val(response.username);
      $("#efirstName").val(response.firstName);
      $("#elastName").val(response.lastName);
      $("#eage").val(response.age);
      $("#ephone").val(response.phone);
      $("#eemail").val(response.email);
      $("#epassword").val(response.password);
      $("#etype").val(response.type);
    } else {
      console.log("Nema podataka" + response);
    }
  });
  request.fail(function (jqXHR, textStatus, error) {
    console.error("Desila se greska: " + textStatus, error);
  });
});

// Request after submiting edit user form
$("#editUserForm").submit(function (e) {
  e.preventDefault();

  const $form = $(this);
  const serijalizacija = $form.serialize();

  request = $.ajax({
    url: "controller/users/editUser.php",
    type: "post",
    data: serijalizacija,
  });

  request.done(function (response, textStatus, jqXHR) {
    if (response === "Success") {
      location.href = "home.php?msg=userUpdated";
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

// Adding values to delete user modal
$(".deleteUserModalBtn").click(function (e) {
  e.preventDefault();

  let userId = $(this).val();

  request = $.ajax({
    url: "controller/users/getUser.php",
    type: "post",
    data: { id: userId },
  });

  request.done(function (response, textStatus, jqXHR) {
    if (response) {
      response = jQuery.parseJSON(response);

      //   dodavanje vrednosti u polja
      $("#deleteUsername").text(response.username);
      $("#deleteUserId").val(response.ID);
    } else {
      console.log("Nema podataka" + response);
    }
  });
  request.fail(function (jqXHR, textStatus, error) {
    console.error("Desila se greska: " + textStatus, error);
  });
});
// Request after submiting delete user form
$("#deleteUserForm").submit(function (e) {
  e.preventDefault();

  var userId = $("#deleteUserId").val();

  request = $.ajax({
    url: "controller/users/deleteUser.php",
    type: "post",
    data: { id: userId },
  });

  request.done(function (response, textStatus, jqXHR) {
    if (response) {
      location.href = "home.php?msg=userDeleted";
    } else {
      console.log("Nema podataka" + response);
    }
  });
  request.fail(function (jqXHR, textStatus, error) {
    console.error("Desila se greska: " + textStatus, error);
  });
});

// EQUIPEMENT
// AJAX
// REQUESTS

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

// Adding values to edit equipement modal
$(".editEquipementModalBtn").click(function (e) {
  e.preventDefault();

  let equipementId = $(this).val();

  request = $.ajax({
    url: "controller/equipement/getEquipement.php",
    type: "post",
    data: { id: equipementId },
  });

  request.done(function (response, textStatus, jqXHR) {
    if (response) {
      response = jQuery.parseJSON(response);

      $("#editID").text(response.ID);
      //   dodavanje vrednosti u polja
      $("#eequipementId").val(response.ID);
      $("#ename").val(response.name);
      $("#emodel").val(response.model);
      $("#emanufactureDate").val(response.manufactureDate);
      $("#eserialNumber").val(response.serialNumber);
      $("#eprocess").val(response.process);
    } else {
      console.log("Nema podataka" + response);
    }
  });
  request.fail(function (jqXHR, textStatus, error) {
    console.error("Desila se greska: " + textStatus, error);
  });
});

// Request after submiting edit equipement form
$("#editEquipementForm").submit(function (e) {
  e.preventDefault();

  const $form = $(this);
  const serijalizacija = $form.serialize();

  console.log(serijalizacija);
  request = $.ajax({
    url: "controller/equipement/editEquipement.php",
    type: "post",
    data: serijalizacija,
  });

  request.done(function (response, textStatus, jqXHR) {
    if (response === "Success") {
      location.href = "home.php?msg=equipementUpdated";
    } else {
      console.log("Update failed." + response);
    }
  });
  request.fail(function (jqXHR, textStatus, error) {
    console.error("There was an error: " + textStatus, error);
  });
});

// Adding values to delete equipement modal
$(".deleteEquipementModalBtn").click(function (e) {
  e.preventDefault();

  let equipementId = $(this).val();

  request = $.ajax({
    url: "controller/equipement/getEquipement.php",
    type: "post",
    data: { id: equipementId },
  });
  request.done(function (response, textStatus, jqXHR) {
    if (response) {
      response = jQuery.parseJSON(response);

      //   dodavanje vrednosti u polja
      $("#deleteEqName").text(response.name);
      $("#deleteEqId").val(response.ID);
    } else {
      console.log("Nema podataka" + response);
    }
  });
  request.fail(function (jqXHR, textStatus, error) {
    console.error("Desila se greska: " + textStatus, error);
  });
});
// Request after submiting delete equipement form
$("#deleteEquipementForm").submit(function (e) {
  e.preventDefault();

  var equipementId = $("#deleteEqId").val();
  request = $.ajax({
    url: "controller/equipement/deleteEquipement.php",
    type: "post",
    data: { id: equipementId },
  });

  request.done(function (response, textStatus, jqXHR) {
    if (response) {
      location.href = "home.php?msg=equipementDeleted";
    } else {
      console.log("Nema podataka" + response);
    }
  });
  request.fail(function (jqXHR, textStatus, error) {
    console.error("Desila se greska: " + textStatus, error);
  });
});

// REPORTS
// AJAX
// REQUESTS

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

// Request after submiting change report status form
$(".changeReportStatusForm").submit(function (e) {
  e.preventDefault();

  const $form = $(this);
  const serijalizacija = $form.serialize();
  request = $.ajax({
    url: "controller/reports/changeStatus.php",
    type: "post",
    data: serijalizacija,
  });
  request.done(function (response, textStatus, jqXHR) {
    if (response === "Success") {
      location.href = "home.php?msg=reportStatusChanged";
    } else {
      console.log("Update failed." + response);
    }
  });
  request.fail(function (jqXHR, textStatus, error) {
    console.error("There was an error: " + textStatus, error);
  });
});
