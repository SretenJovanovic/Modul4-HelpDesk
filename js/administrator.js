$(document).ready(function () {
  // Sidebar links [Profile,Users,Equipement]
  let links = $("#sidebar [href]");
  //   toggle myActive class and display property for Dashboard links
  links.click(function () {
    links.removeClass("myActive");

    // Dashboard links display none
    $("#userDashboard").hide();
    $("#equipementDashboard").hide();
    $("#profileDashboard").hide();

    // Dashboard links remove active class
    $("#profileDashboard a").removeClass("active");
    $("#userDashboard a").removeClass("active");
    $("#equipementDashboard a").removeClass("active");

    // adding class MyActive to targeted link
    $(this).addClass("myActive");

    if ($(this).attr("class") == "nav-link myActive") {
      if ($(this).text() == "Profile") {
        $("#profileDashboard").show();

        $('#v-pills-tab a[href="#description"]').tab("show");
      } else if ($(this).text() == "Users") {
        $("#userDashboard").show();

        $('#v-pills-tab a[href="#listOfUsers"]').tab("show");
      } else if ($(this).text() == "Equipement") {
        $("#equipementDashboard").show();

        $('#v-pills-tab a[href="#listOfEquipement"]').tab("show");
      }
    }
  });
});

// Search

// function userSearch() {
//   let tbody = document.getElementById('usersTable').children;
//   let tds = document.querySelectorAll('.rowUsername');
//   console.log(tds);
//   // Object.entries(tbody).forEach(entry => {
//   //   const [key, value] = entry;
//   //   console.log( value);
//   // });
// }
// Adding values to delete user modal
// $("#searchUser").on("keyup", function (e) {
//   e.preventDefault();
//   let inputVal = e.target.value;
//   console.log(inputVal);

//   let url = new URL(
//     "http://localhost/2023/FON/domaci_modul4/home.php?searchUsers"
//   );
//   let params = new URLSearchParams(url.search);

//   // Add a third parameter.
//   params.set("searchUsers", inputVal);
//   console.log(params.toString());
  // request = $.ajax({
  //   url: "controller/users/getUser.php",
  //   type: "post",
  //   data: { id: userId },
  // });

  // request.done(function (response, textStatus, jqXHR) {
  //   if (response) {

  //     //   dodavanje vrednosti u polja
  //     $("#deleteUsername").text(response.username);
  //     $("#deleteUserId").val(response.ID);
  //   } else {
  //     console.log("Nema podataka" + response);
  //   }
  // });
  // request.fail(function (jqXHR, textStatus, error) {
  //   console.error("Desila se greska: " + textStatus, error);
  // });
// });
