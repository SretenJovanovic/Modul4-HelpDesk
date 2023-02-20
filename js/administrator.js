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
