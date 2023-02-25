// GET ALL USERS WHEN DOCUMENT IS FINISHED LOADING
// Setting initial page number to 1
var statusProgress = "in progress";
page = 1;
request = $.ajax({
  url: "controller/reports/getAllReports.php",
  type: "get",
  data: { page: page, status: statusProgress, type: "technician" },
});

request.done(function (response, textStatus, jqXHR) {
  if (response) {
    var result = jQuery.parseJSON(response);
    // Inserting data to usersTableDiv

    getReportedDiv = document.getElementById("listOfReportedDiv");
    getReportedDiv.innerHTML = result["output"];
    // Creating pagination
    getReportedPaginationDiv = document.getElementById("reportedPaginationDiv");
    getReportedPaginationDiv.innerHTML = result["output2"];

    // Adding ACTIVE class to link
    addActiveClass(page, "pageNumsReport");

    addActiveClass(1, "pageNumsReportFixed");
    const totalPages = result["totalPages"];
    setNextPage(page, totalPages, "nextBtnReport");
    // Set prevBtn to page+1 number
    setPrevPage(page, "prevBtnReport");

    pagination(page, result["output"]);

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
var statusFixed = "fixed";
request = $.ajax({
  url: "controller/reports/getAllReports.php",
  type: "get",
  data: { page: page, status: statusFixed, type: "technician" },
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

    pagination(page, result["output"]);
  } else {
    console.log("Nema podataka" + response);
  }
});
request.fail(function (jqXHR, textStatus, error) {
  console.error("Desila se greska: " + textStatus, error);
});

// ###########
// ###########
// ###########
// FUNCTIONS
// ###########
// ###########
// ###########

// Adding ACTIVE class to link
function addActiveClass(page, linkClass) {
  let numberLinks = document.querySelectorAll("." + linkClass);

  for (let i = 0; i < numberLinks.length; i++) {
    if (numberLinks[i].textContent == page) {
      numberLinks[i].parentElement.classList.add("active");
    }
  }
}

// Set nextBtn to page+1 number
function setNextPage(page, totalPages, nextBtn) {
  nextPage = page + 1;
  nextBtn = document.getElementById(nextBtn);
  nextBtn.href = "?page=" + nextPage;
  if (nextPage > totalPages) {
    nextBtn.parentElement.classList.add("disabled");
    nextBtn.parentElement.classList.remove("active");
  } else {
    nextBtn.parentElement.classList.remove("disabled");
    nextBtn.parentElement.classList.remove("active");
  }
}

// Set prevBtn to page+1 number
function setPrevPage(page, prevId) {
  prevPage = page - 1;
  prevBtn = document.getElementById(prevId);
  prevBtn.href = "?page=" + prevPage;
  if (page == 1) {
    prevBtn.parentElement.classList.add("disabled");
    prevBtn.parentElement.classList.remove("active");
  } else {
    prevBtn.parentElement.classList.remove("disabled");
    prevBtn.parentElement.classList.remove("active");
  }
}

// PAGINATION
function pagination(lastPage, lastData) {
  $("a.pageNumsReportFixed,a.pageNumsReport").on("click", function (e) {
    e.preventDefault();
    var links = document.querySelectorAll(".paginationReport li");

    links.forEach((link) => {
      link.classList.remove("active");
    });
    this.parentElement.classList.add("active");

    // Getting page number from href attribute
    var href = e.target.getAttribute("href"); // returning href

    var page = Number(href.replace(/\D/g, "")); // regular expression - returns numbers

    let linkReported = document.querySelector('a[href="#listOfReported"]');
    let linkFixed = document.querySelector('a[href="#listOfFixed"]');
    if (linkReported.classList == "nav-link getReports active") {
      var status = "in progress";
    } else if (linkFixed.classList == "nav-link getReports active") {
      var status = "fixed";
    }
    request = $.ajax({
      url: "controller/reports/getAllReports.php",
      type: "get",
      data: { page: page, status: status, type: "technician" },
    });

    request.done(function (response, textStatus, jqXHR) {
      if (response) {
        try {
          var result = jQuery.parseJSON(response);
          // Table with trow of all users
          let reportsTable = result["output"];
          let status = result["status"];
          // Total pages of users in DB and number of links
          const totalPages = result["totalPages"];

          // Adding ACTIVE class to link

          // Inserting table from response into usersTableDiv
          if (status == false) {
            addActiveClass(page, "pageNumsReport");
            // Set next and prev page href and class
            setNextPage(page, totalPages, "nextBtnReport");
            setPrevPage(page, "prevBtnReport");
            getReportedDiv = document.getElementById("listOfReportedDiv");
            getReportedDiv.innerHTML = reportsTable;
          } else {
            addActiveClass(page, "pageNumsReportFixed");
            // Set next and prev page href and class
            setNextPage(page, totalPages, "nextBtnReportFixed");
            setPrevPage(page, "prevBtnReportFixed");
            getFixedDiv = document.getElementById("listOfFixedDiv");
            getFixedDiv.innerHTML = reportsTable;
          }
        } catch (error) {
          console.log(error);
        }

        // Request after submiting change report status form
        changeReportStatus();
      } else {
        console.log("Nema podataka" + response);
      }
    });
    request.fail(function (jqXHR, textStatus, error) {
      console.error("Desila se greska: " + textStatus, error);
    });
  });
}

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
