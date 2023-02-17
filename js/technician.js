$(document).ready(function () {
    // Sidebar links [Profile,Users,Equipement]
    let links = $("#sidebar [href]");
    //   toggle myActive class and display property for Dashboard links
    links.click(function () {
      links.removeClass("myActive");
  
      // Dashboard links display none
      $("#profileDashboard").hide();
      $("#reportDashboard").hide();
      $("#equipementDashboard").hide();
  
      // Dashboard links remove active class
      $("#profileDashboard a").removeClass("active");
      $("#reportDashboard a").removeClass("active");
      $("#equipementDashboard a").removeClass("active");
  
      $(this).addClass("myActive");
  
      if ($(this).attr("class") == "nav-link myActive") {
        if ($(this).text() == "Profile") {
          $("#profileDashboard").show();
  
          $('#v-pills-tab a[href="#description"]').tab("show");
        } else if ($(this).text() == "Reports") {
          $("#reportDashboard").show();
  
          $('#v-pills-tab a[href="#listOfReported"]').tab("show");
        } else if ($(this).text() == "Equipement") {
          $("#equipementDashboard").show();
  
          $('#v-pills-tab a[href="#listOfEquipement"]').tab("show");
        }
      }
    });
  });
  