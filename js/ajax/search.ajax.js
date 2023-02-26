// SEARCH USERS BY ID, FIRST NAME, LAST NAME OR USERNAME
$("#searchUser").on("keyup", function (e) {
  var search = e.target.value;
  // Setting initial page number to 1
  page = 1;
  request = $.ajax({
    url: "controller/users/getAllUsers.php",
    type: "get",
    data: { page: page, search: search },
  });

  request.done(function (response, textStatus, jqXHR) {
    if (response) {
      var result = jQuery.parseJSON(response);
      // Inserting data to usersTableDiv
      getUsersTbody = document.getElementById("usersTableDiv");
      getUsersTbody.innerHTML = result["output"];
      // Creating pagination
      getUsersPaginationDiv = document.getElementById("paginationDiv");
      getUsersPaginationDiv.innerHTML = result["output2"];

      // Adding ACTIVE class to link
      addActiveClass(page, "pageNums");

      // Set prevBtn to page+1 number
      setPrevPage(page, "prevBtn");
      setNextPage(page, result["totalPages"], "nextBtn");
      pagination(search);
      editUser();
      deleteUser();
    } else {
      console.log("Nema podataka" + response);
    }
  });
  request.fail(function (jqXHR, textStatus, error) {
    console.error("Desila se greska: " + textStatus, error);
  });
});

// SORT USERS BY TYPE WITH PAGINATION
$("#sortUsersByType").on("click", function (e) {
  if (e.target.value == "ASC") {
    e.target.value = "DESC";
  } else {
    e.target.value = "ASC";
  }
  sort = e.target.value;
  // Setting initial page number to 1
  page = 1;
  request = $.ajax({
    url: "controller/users/getAllUsers.php",
    type: "get",
    data: { page: page, sort: sort },
  });

  request.done(function (response, textStatus, jqXHR) {
    if (response) {
      var result = jQuery.parseJSON(response);
      // Inserting data to usersTableDiv
      getUsersTbody = document.getElementById("usersTableDiv");
      getUsersTbody.innerHTML = result["output"];
      // Creating pagination
      getUsersPaginationDiv = document.getElementById("paginationDiv");
      getUsersPaginationDiv.innerHTML = result["output2"];

      // Adding ACTIVE class to link
      addActiveClass(page, "pageNums");

      // Set prevBtn to page+1 number
      setPrevPage(page, "prevBtn");
      setNextPage(page, result["totalPages"], "nextBtn");
      pagination("", sort);
      editUser();
      deleteUser();
    } else {
      console.log("Nema podataka" + response);
    }
  });
  request.fail(function (jqXHR, textStatus, error) {
    console.error("Desila se greska: " + textStatus, error);
  });
});
// SEARCH EQUIPEMENT BY ID,NAME OR MODEL
$("#searchEquipement").on("keyup", function (e) {
  var search = e.target.value;
  // Setting initial page number to 1
  page = 1;
  request = $.ajax({
    url: "controller/equipement/getAllEquipement.php",
    type: "get",
    data: { page: page, search: search },
  });
  request.done(function (response, textStatus, jqXHR) {
    if (response) {
      var result = jQuery.parseJSON(response);
      // Inserting data to usersTableDiv
      getEquipementDiv = document.getElementById("equipementTableDiv");
      getEquipementDiv.innerHTML = result["output"];
      // Creating pagination
      getEquipementPaginationDiv = document.getElementById(
        "equipementPaginationDiv"
      );
      getEquipementPaginationDiv.innerHTML = result["output2"];
      // Adding ACTIVE class to link
      addActiveClass(page, "pageNumsEq");

      // Set prevBtn to page+1 number
      setPrevPage(page, "prevBtnEq");
      setNextPage(page, result["totalPages"], "nextBtnEq");

      paginationEq(search);
      editEquipement();
      deleteEquipement();
    } else {
      console.log("Nema podataka" + response);
    }
  });
  request.fail(function (jqXHR, textStatus, error) {
    console.error("Desila se greska: " + textStatus, error);
  });
});

// SORT EQUIPEMENT BY NAME WITH PAGINATION
$("#sortEquipementByName").on("click", function (e) {
  if (e.target.value == "ASC") {
    e.target.value = "DESC";
  } else {
    e.target.value = "ASC";
  }
  sort = e.target.value;
  // Setting initial page number to 1
  page = 1;
  request = $.ajax({
    url: "controller/equipement/getAllEquipement.php",
    type: "get",
    data: { page: page, sort: sort },
  });
  request.done(function (response, textStatus, jqXHR) {
    if (response) {
      var result = jQuery.parseJSON(response);
      // Inserting data to usersTableDiv
      getEquipementDiv = document.getElementById("equipementTableDiv");
      getEquipementDiv.innerHTML = result["output"];
      // Creating pagination
      getEquipementPaginationDiv = document.getElementById(
        "equipementPaginationDiv"
      );
      getEquipementPaginationDiv.innerHTML = result["output2"];
      // Adding ACTIVE class to link
      addActiveClass(page, "pageNumsEq");

      // Set prevBtn to page+1 number
      setPrevPage(page, "prevBtnEq");
      setNextPage(page, result["totalPages"], "nextBtnEq");

      paginationEq("", sort);
      editEquipement();
      deleteEquipement();
    } else {
      console.log("Nema podataka" + response);
    }
  });
  request.fail(function (jqXHR, textStatus, error) {
    console.error("Desila se greska: " + textStatus, error);
  });
});

// SEARCH REPORTS BY ID OR DATE
$("#searchReports").on("keyup", function (e) {
  var search = e.target.value;
  // Setting initial page number to 1

  page = 1;
  request = $.ajax({
    url: "controller/reports/getAllReports.php",
    type: "get",
    data: { page: page, search: search },
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
      paginationReport(search);
    } else {
      console.log("Nema podataka" + response);
    }
  });
  request.fail(function (jqXHR, textStatus, error) {
    console.error("Desila se greska: " + textStatus, error);
  });
});

// SORT REPORTS BY NAME WITH PAGINATION
$("#sortReportsByStatus").on("click", function (e) {
  if (e.target.value == "ASC") {
    e.target.value = "DESC";
  } else {
    e.target.value = "ASC";
  }
  sort = e.target.value;
  // Setting initial page number to 1
  page = 1;
  request = $.ajax({
    url: "controller/reports/getAllReports.php",
    type: "get",
    data: { page: page, sort: sort },
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
      paginationReport("", sort);
    } else {
      console.log("Nema podataka" + response);
    }
  });
  request.fail(function (jqXHR, textStatus, error) {
    console.error("Desila se greska: " + textStatus, error);
  });
});

// SEARCH REPORTS IN PROGRESS BY ID OR DATE
$("#searchReportsProgress").on("keyup", function (e) {
  var search = e.target.value;
  // Setting initial page number to 1

  var statusProgress = "in progress";
  page = 1;
  request = $.ajax({
    url: "controller/reports/getAllReportsTechnician.php",
    type: "get",
    data: { page: page, status: statusProgress, search: search },
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

      paginationTechnician(search);

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

// SORT REPORTS IN PROGRESS BY NAME WITH PAGINATION
$("#sortReportsProgressByOperatorId").on("click", function (e) {
  var statusProgress = "in progress";
  if (e.target.value == "ASC") {
    e.target.value = "DESC";
  } else {
    e.target.value = "ASC";
  }
  sort = e.target.value;
  // Setting initial page number to 1
  page = 1;
  request = $.ajax({
    url: "controller/reports/getAllReportsTechnician.php",
    type: "get",
    data: { page: page, status: statusProgress, sort: sort },
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

      paginationTechnician("", sort);

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
// SEARCH REPORTS FIXED BY ID OR DATE
$("#searchReportsProgress").on("keyup", function (e) {
  var search = e.target.value;
  // Setting initial page number to 1

  var statusProgress = "in progress";
  page = 1;
  request = $.ajax({
    url: "controller/reports/getAllReportsTechnician.php",
    type: "get",
    data: { page: page, status: statusProgress, search: search },
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

      paginationTechnician(search);

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

// SORT REPORTS IN PROGRESS BY NAME WITH PAGINATION
$("#sortReportsFixedByOperatorId").on("click", function (e) {
  var statusFixed = "fixed";
  if (e.target.value == "ASC") {
    e.target.value = "DESC";
  } else {
    e.target.value = "ASC";
  }
  sort = e.target.value;
  // Setting initial page number to 1
  page = 1;
  request = $.ajax({
    url: "controller/reports/getAllReportsTechnician.php",
    type: "get",
    data: { page: page, status: statusFixed, sort: sort },
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

      paginationTechnicianFixed("", sort);

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
