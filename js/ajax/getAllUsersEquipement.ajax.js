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
      setNextPage(page, result["totalPages"], "nextBtn");

      pagination();
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
      setNextPage(page, result["totalPages"], "nextBtnEq");

      paginationEq();
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

