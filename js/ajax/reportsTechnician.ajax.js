// GET ALL USERS WHEN DOCUMENT IS FINISHED LOADING
// Setting initial page number to 1
$(document).ready(function () {
  var statusProgress = "in progress";
  page = 1;
  request = $.ajax({
    url: "controller/reports/getAllReportsTechnician.php",
    type: "get",
    data: { page: page, status: statusProgress },
  });

  request.done(function (response, textStatus, jqXHR) {
    if (response) {
      var result = jQuery.parseJSON(response);
      // Inserting data to usersTableDiv

      getReportedDiv = document.getElementById("listOfReportedDiv");
      getReportedDiv.innerHTML = result["output"];
      // Creating pagination
      getReportedPaginationDiv = document.getElementById(
        "reportedPaginationDiv"
      );
      getReportedPaginationDiv.innerHTML = result["output2"];

      // Adding ACTIVE class to link
      addActiveClass(page, "pageNumsReport");

      const totalPages = result["totalPages"];
      setNextPage(page, totalPages, "nextBtnReport");
      // Set prevBtn to page+1 number
      setPrevPage(page, "prevBtnReport");

      paginationTechnician();

      // Request after submiting change report status form
      changeReportStatus();
    } else {
      console.log("Nema podataka" + response);
    }
  });
  request.fail(function (jqXHR, textStatus, error) {
    console.error("Desila se greska: " + textStatus, error);
  });

  var statusFixed = "fixed";
  page = 1;
  request = $.ajax({
    url: "controller/reports/getAllReportsTechnician.php",
    type: "get",
    data: { page: page, status: statusFixed },
  });

  request.done(function (response, textStatus, jqXHR) {
    if (response) {
      var result = jQuery.parseJSON(response);
      // Inserting data to usersTableDiv

      getFixedDiv = document.getElementById("listOfFixedDiv");
      getFixedDiv.innerHTML = result["output"];
      // Creating pagination
      getFixedPaginationDiv = document.getElementById("fixedPaginationDiv");
      getFixedPaginationDiv.innerHTML = result["output2"];

      // Adding ACTIVE class to link
      addActiveClass(page, "pageNumsReportFixed");

      const totalPages = result["totalPages"];
      setNextPage(page, totalPages, "nextBtnReportFixed");
      // Set prevBtn to page+1 number
      setPrevPage(page, "prevBtnReportFixed");

      paginationTechnicianFixed();

      // Request after submiting change report status form
      changeReportStatus();
    } else {
      console.log("Nema podataka" + response);
    }
  });
  request.fail(function (jqXHR, textStatus, error) {
    console.error("Desila se greska: " + textStatus, error);
  });
  // Setting initial page number to 1
});
// ###########
// ###########
// ###########
// FUNCTIONS
// ###########
// ###########
// ###########

// Request after submiting change report status form
function changeReportStatus() {
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
}
