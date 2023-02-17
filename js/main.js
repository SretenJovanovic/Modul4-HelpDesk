$(document).ready(function () {
  //Dodavanje vrednosti u edit user modal

  var location = document.location.href.substring(
    document.location.href.lastIndexOf("/") + 1,
    document.location.href.length
  );
  var tabs = $("#sidebar ul li a");
  var nav = $(".nav-pills a");

  if (
    location == "home.php?msg=userUpdated" ||
    location == "home.php?msg=userDeleted" ||
    location == "home.php?msg=userInserted"
  ) {
    tabs.removeClass("myActive");
    tabs[1].classList.add("myActive");

    $("#userDashboard").hide();
    $("#equipementDashboard").hide();
    $("#profileDashboard").hide();
    $("#profileDashboard a").removeClass("active");
    $("#userDashboard a").removeClass("active");
    $("#equipementDashboard a").removeClass("active");
    $("#userDashboard").show();
    $('#v-pills-tab a[href="#listOfUsers"]').tab("show");
  }
  //  else if (location == 'home.php?msg=userAddedSuccessfully' ||
  //     location == 'home.php?msg=userDeleted' ||
  //     location == 'home.php?msg=userUpdated'
  // ) {
  //     tabs[2].classList.add("active");
  //     tabs[2].classList.add("show");
  //     tabs[0].classList.remove("active");
  //     tabs[1].classList.remove("active");
  //     tabs[3].classList.remove("active");
  //     tabs[4].classList.remove("active");

  //     nav[2].children[0].classList.add("active");
  //     nav[0].children[0].classList.remove("active");
  //     nav[1].children[0].classList.remove("active");
  //     nav[3].children[0].classList.remove("active");
  //     nav[4].children[0].classList.remove("active");
  // } else if (location == 'home.php?msg=equipementAddedSuccessfully' ||
  //     location == 'home.php?msg=equipementDeleted' ||
  //     location == 'home.php?msg=equipementUpdated'
  // ) {
  //     tabs[4].classList.add("active");
  //     tabs[4].classList.add("show");
  //     tabs[0].classList.remove("active");
  //     tabs[1].classList.remove("active");
  //     tabs[3].classList.remove("active");
  //     tabs[2].classList.remove("active");

  //     nav[4].children[0].classList.add("active");
  //     nav[0].children[0].classList.remove("active");
  //     nav[1].children[0].classList.remove("active");
  //     nav[3].children[0].classList.remove("active");
  //     nav[2].children[0].classList.remove("active");
  // } else if (location == 'home.php?msg=equipementEmptyFields') {
  //     tabs[3].classList.add("active");
  //     tabs[3].classList.add("show");
  //     tabs[0].classList.remove("active");
  //     tabs[1].classList.remove("active");
  //     tabs[4].classList.remove("active");
  //     tabs[2].classList.remove("active");

  //     nav[3].children[0].classList.add("active");
  //     nav[0].children[0].classList.remove("active");
  //     nav[1].children[0].classList.remove("active");
  //     nav[4].children[0].classList.remove("active");
  //     nav[2].children[0].classList.remove("active");
  // };
});
