// GET ALL USERS WHEN DOCUMENT IS FINISHED LOADING
// Setting initial page number to 1

page = 1;
request = $.ajax({
  url: "controller/reports/getAllReports.php",
  type: "get",
  data: { page: page},
});

request.done(function (response, textStatus, jqXHR) {
  if (response) {
    var result = jQuery.parseJSON(response);

    // Inserting data to usersTableDiv
    getReportsTbody = document.getElementById("reportsTableDiv");
    getReportsTbody.innerHTML = result["output"];
    // Creating pagination
    getReportsPaginationDiv = document.getElementById("paginationReportDiv");
    getReportsPaginationDiv.innerHTML = result["output2"];

    // Adding ACTIVE class to link
    addActiveClass(page, "pageNumsReport");
    // Set prevBtn to page+1 number
    setPrevPage(page, "prevBtnReport");

    setNextPage(page, result["totalPages"], "nextBtnReport");
    paginationReport();
  } else {
    console.log("Nema podataka" + response);
  }
});
request.fail(function (jqXHR, textStatus, error) {
  console.error("Desila se greska: " + textStatus, error);
});
