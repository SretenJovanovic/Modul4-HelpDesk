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
  
    var userId = $('#deleteUserId').val();
    
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


