// GET ALL USERS WHEN DOCUMENT IS FINISHED LOADING
$(document).ready(function (e) {
  // Setting initial page number to 1
  page = 1;
  request = $.ajax({
    url: "controller/users/getAllUsers.php",
    type: "get",
    data: { page: page },
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

      pagination();
    } else {
      console.log("Nema podataka" + response);
    }
  });
  request.fail(function (jqXHR, textStatus, error) {
    console.error("Desila se greska: " + textStatus, error);
  });
});

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
function pagination() {
  $("a.pageNums").on("click", function (e) {
    e.preventDefault();
    console.log("LINK JE KLIKNUT");

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
      data: { page: page },
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

// LIST OF EQUIPEMENT AND PAGINATION
// LIST OF EQUIPEMENT AND PAGINATION
// LIST OF EQUIPEMENT AND PAGINATION
$(document).ready(function () {
  // Setting initial page number to 1
  page = 1;
  request = $.ajax({
    url: "controller/equipement/getAllEquipement.php",
    type: "get",
    data: { page: page },
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

      paginationEq();
    } else {
      console.log("Nema podataka" + response);
    }
  });
  request.fail(function (jqXHR, textStatus, error) {
    console.error("Desila se greska: " + textStatus, error);
  });
});

function paginationEq() {
  $("a.pageNumsEq").on("click", function (e) {
    e.preventDefault();
    console.log("LINK JE KLIKNUT EQ");

    var links = document.querySelectorAll(".paginationEq li");

    console.log(links);
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
      data: { page: page },
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
      } else {
        console.log("Nema podataka" + response);
      }
    });
    request.fail(function (jqXHR, textStatus, error) {
      console.error("Desila se greska: " + textStatus, error);
    });
  });
}
