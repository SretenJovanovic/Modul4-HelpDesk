$(document).ready(function () {

  //Dodavanje vrednosti u edit user modal
  var url_string = window.location.href; // www.test.com?filename=test
  var url = new URL(url_string);

    
  // fetching get values from url

  var paramValueMsg = url.searchParams.get("msg");
  var paramValuePage = url.searchParams.get("page");
  var paramValueType = url.searchParams.get("type");
  var paramValueStatus = url.searchParams.get("status");
  
  const regEx = /^\d*(\.\d+)?$/;
  // const regExFixed= /[a-z]*[1-9]/g;
  if (paramValuePage == null) {
    paramValuePage = "";
  }
  if (paramValuePage == null) {
    paramValuePage = "";
  }
  if (paramValueType == null) {
    paramValueType = "";
  }
  var tabs = $("#sidebar ul li a");

  if (
    paramValueMsg == "userUpdated" ||
    paramValueMsg == "userDeleted" ||
    paramValueMsg == "userInserted"
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
  if (
    paramValueMsg == "equipementUpdated" ||
    paramValueMsg == "equipementDeleted" ||
    paramValueMsg == "equipementInserted"
  ) {
    tabs.removeClass("myActive");
    tabs[2].classList.add("myActive");

    $("#userDashboard").hide();
    $("#equipementDashboard").hide();
    $("#profileDashboard").hide();
    $("#profileDashboard a").removeClass("active");
    $("#userDashboard a").removeClass("active");
    $("#equipementDashboard a").removeClass("active");
    $("#equipementDashboard").show();
    $('#v-pills-tab a[href="#listOfEquipement"]').tab("show");
  }
  if (
    paramValueMsg == "reportInserted" ||
    (paramValuePage.match(regEx) && paramValueType == "operator")
  ) {
    tabs.removeClass("myActive");
    tabs[1].classList.add("myActive");

    $("#profileDashboard").hide();
    $("#reportDashboard").hide();
    $("#equipementDashboard").hide();

    $("#profileDashboard a").removeClass("active");
    $("#reportDashboard a").removeClass("active");
    $("#equipementDashboard a").removeClass("active");

    $("#reportDashboard").show();
    $('#v-pills-tab a[href="#listOfReports"]').tab("show");
  }
  if (
    paramValueMsg == "reportStatusChanged" ||
    (paramValueStatus == "fixed" &&
      paramValuePage.match(regEx) &&
      paramValueType == "technician")
  ) {
    tabs.removeClass("myActive");
    tabs[1].classList.add("myActive");

    $("#profileDashboard").hide();
    $("#reportDashboard").hide();
    $("#equipementDashboard").hide();

    $("#profileDashboard a").removeClass("active");
    $("#reportDashboard a").removeClass("active");
    $("#equipementDashboard a").removeClass("active");

    $("#reportDashboard").show();
    $('#v-pills-tab a[href="#listOfFixed"]').tab("show");
  }
  if (
    paramValueStatus == "reported" &&
    paramValuePage.match(regEx) &&
    paramValueType == "technician"
  ) {
    tabs.removeClass("myActive");
    tabs[1].classList.add("myActive");

    $("#profileDashboard").hide();
    $("#reportDashboard").hide();
    $("#equipementDashboard").hide();

    $("#profileDashboard a").removeClass("active");
    $("#reportDashboard a").removeClass("active");
    $("#equipementDashboard a").removeClass("active");

    $("#reportDashboard").show();
    $('#v-pills-tab a[href="#listOfReported"]').tab("show");
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