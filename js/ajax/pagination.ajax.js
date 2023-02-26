// ############
// ############
// FUNCTIONS
// ############
// ############

function addActiveClass(page, linkClass) {
  // Adding ACTIVE class to link
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
function pagination(search, sort) {
  $("a.pageNums").on("click", function (e) {
    e.preventDefault();
    

    var links = document.querySelectorAll(".paginationUser li");

    links.forEach((link) => {
      link.classList.remove("active");
    });
    this.parentElement.classList.add("active");

    // Getting page number from href attribute
    var href = e.target.getAttribute("href"); // returning href

    var page = Number(href.replace(/\D/g, "")); // regular expression - returns numbers

    request = $.ajax({
      url: "controller/users/getAllUsers.php",
      type: "get",
      data: { page: page, search: search, sort: sort },
    });

    request.done(function (response, textStatus, jqXHR) {
      if (response) {
        try {
          var result = jQuery.parseJSON(response);
          // Table with trow of all users
          let usersTable = result["output"];
          // Total pages of users in DB and number of links
          const totalPages = result["totalPages"];

          // Adding ACTIVE class to link
          addActiveClass(page, "pageNums");
          // Set next and prev page href and class
          setNextPage(page, totalPages, "nextBtn");
          setPrevPage(page, "prevBtn");
          // Inserting table from response into usersTableDiv

          getUsersTbody = document.getElementById("usersTableDiv");
          getUsersTbody.innerHTML = usersTable;
          editUser();
          deleteUser();
        } catch (error) {
          console.log(error);
        }
      } else {
        console.log("Nema podataka" + response);
      }
    });
    request.fail(function (jqXHR, textStatus, error) {
      console.error("Desila se greska: " + textStatus, error);
    });
  });
}

// PAGINATION EQUIPEMENT
function paginationEq(search, sort) {
  $("a.pageNumsEq").on("click", function (e) {
    e.preventDefault();

    var links = document.querySelectorAll(".paginationEq li");

    links.forEach((link) => {
      link.classList.remove("active");
    });
    this.parentElement.classList.add("active");

    // Getting page number from href attribute
    var href = e.target.getAttribute("href"); // returning href

    var page = Number(href.replace(/\D/g, "")); // regular expression - returns numbers

    request = $.ajax({
      url: "controller/equipement/getAllEquipement.php",
      type: "get",
      data: { page: page, search: search, sort: sort },
    });

    request.done(function (response, textStatus, jqXHR) {
      if (response) {
        try {
          var result = jQuery.parseJSON(response);
          // Table with trow of all users
          let usersTable = result["output"];
          // Total pages of users in DB and number of links
          const totalPages = result["totalPages"];

          // Adding ACTIVE class to link
          addActiveClass(page, "pageNumsEq");
          // Set next and prev page href and class
          setNextPage(page, totalPages, "nextBtnEq");
          setPrevPage(page, "prevBtnEq");
          // Inserting table from  response into usersTableDiv

          getEquipementDiv = document.getElementById("equipementTableDiv");
          getEquipementDiv.innerHTML = result["output"];
        } catch (error) {
          console.log(error);
        }
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
}
// PAGINATION REPORTS
function paginationReport(search, sort) {
  $("a.pageNumsReport").on("click", function (e) {
    e.preventDefault();
    var links = document.querySelectorAll(".paginationReport li");

    links.forEach((link) => {
      link.classList.remove("active");
    });
    this.parentElement.classList.add("active");

    // Getting page number from href attribute
    var href = e.target.getAttribute("href"); // returning href

    var page = Number(href.replace(/\D/g, "")); // regular expression - returns numbers

    request = $.ajax({
      url: "controller/reports/getAllReports.php",
      type: "get",
      data: { page: page, search: search, sort: sort },
    });

    request.done(function (response, textStatus, jqXHR) {
      if (response) {
        try {
          var result = jQuery.parseJSON(response);
          // Table with trow of all users
          let reportsTable = result["output"];
          // Total pages of users in DB and number of links
          const totalPages = result["totalPages"];
          // Adding ACTIVE class to link
          addActiveClass(page, "pageNumsReport");
          // Set next and prev page href and class
          setNextPage(page, totalPages, "nextBtnReport");
          setPrevPage(page, "prevBtnReport");
          // Inserting table from response into usersTableDiv

          getReportsTbody = document.getElementById("reportsTableDiv");
          getReportsTbody.innerHTML = reportsTable;
        } catch (error) {
          console.log(error);
        }
      } else {
        console.log("Nema podataka" + response);
      }
    });
    request.fail(function (jqXHR, textStatus, error) {
      console.error("Desila se greska: " + textStatus, error);
    });
  });
}

// PAGINATION TECHNICIAN- REPORTS IN PROGRESS
function paginationTechnician(search, sort) {
  $("a.pageNumsReport").on("click", function (e) {
    e.preventDefault();
    var statusProgress = "in progress";
    var links = document.querySelectorAll(".paginationReport li");

    links.forEach((link) => {
      link.classList.remove("active");
    });
    this.parentElement.classList.add("active");

    // Getting page number from href attribute
    var href = e.target.getAttribute("href"); // returning href

    var page = Number(href.replace(/\D/g, "")); // regular expression - returns numbers

    request = $.ajax({
      url: "controller/reports/getAllReportsTechnician.php",
      type: "get",
      data: { page: page, status: statusProgress, search: search, sort: sort },
    });

    request.done(function (response, textStatus, jqXHR) {
      if (response) {
        try {
          var result = jQuery.parseJSON(response);

          // Total pages of users in DB and number of links
          const totalPages = result["totalPages"];
          // Adding ACTIVE class to link
          addActiveClass(page, "pageNumsReport");
          // Set next and prev page href and class
          setNextPage(page, totalPages, "nextBtnReport");
          setPrevPage(page, "prevBtnReport");
          // Inserting table from response into usersTableDiv

          getReportedDiv = document.getElementById("listOfReportedDiv");
          getReportedDiv.innerHTML = result["output"];
        } catch (error) {
          console.log(error);
        }
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
// PAGINATION TECHNICIAN- REPORTS FIXED
function paginationTechnicianFixed(search, sort) {
  $("a.pageNumsReportFixed").on("click", function (e) {
    e.preventDefault();
    var statusFixed = "fixed";
    var links = document.querySelectorAll(".paginationReportFixed li");

    links.forEach((link) => {
      link.classList.remove("active");
    });
    this.parentElement.classList.add("active");

    // Getting page number from href attribute
    var href = e.target.getAttribute("href"); // returning href

    var page = Number(href.replace(/\D/g, "")); // regular expression - returns numbers

    request = $.ajax({
      url: "controller/reports/getAllReportsTechnician.php",
      type: "get",
      data: { page: page, status: statusFixed, search: search, sort: sort },
    });

    request.done(function (response, textStatus, jqXHR) {
      if (response) {
        try {
          var result = jQuery.parseJSON(response);

          // Total pages of users in DB and number of links
          const totalPages = result["totalPages"];
          // Adding ACTIVE class to link
          addActiveClass(page, "pageNumsReportFixed");
          // Set next and prev page href and class
          setNextPage(page, totalPages, "nextBtnReportFixed");
          setPrevPage(page, "prevBtnReportFixed");
          // Inserting table from response into usersTableDiv

          getFixedDiv = document.getElementById("listOfFixedDiv");
          getFixedDiv.innerHTML = result["output"];
        } catch (error) {
          console.log(error);
        }
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

// EDITING USER AJAX
function editUser() {
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
}

// DELETING USER AJAX
function deleteUser() {
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
}

// EDITING EQUIPEMENT AJAX
function editEquipement() {
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
}

// DELETING EQUIPEMENT AJAX
function deleteEquipement() {
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
}
