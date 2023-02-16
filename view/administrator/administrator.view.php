 <!-- NAVIGATION SIDEBAR -->
 <nav id="sidebar">
     <ul class="nav mb-3 mt-3">
         <li class="nav-item" id="logo"><span>HelpDesk</span></li>
         <li class="nav-item">
             <a href="#" class="nav-link myActive"><i class="bi bi-person-fill"></i>Profile</a>
         </li>
         <li class="nav-item">
             <a href="#" class="nav-link"><i class="bi bi-people-fill"></i>Users</a>
         </li>
         <li class="nav-item">
             <a href="#" class="nav-link"><i class="bi bi-wrench-adjustable-circle-fill"></i>Equipement</a>
         </li>
     </ul>
     <div id="logout">
         <form action="./includes/logout.inc.php" method="post">
             <button type="submit" name="logoutSubmit" class="btn btn-danger btn-block">Logout <i class="bi bi-box-arrow-left"></i></button>
         </form>
     </div>
 </nav>

 <!-- DASHBOARD MENU -->
 <div id="dashboard">
     <div class="row" id="profileDashboard">
         <div class="col">
             <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                 <a class="nav-link active" data-toggle="pill" href="#description" role="tab">Description</a>
                 <a class="nav-link" data-toggle="pill" href="#myProfile" role="tab">My Profile</a>
             </div>
         </div>
     </div>

     <div class="row" id="userDashboard">
         <div class="col">
             <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                 <a class="nav-link" data-toggle="pill" href="#listOfUsers" role="tab">List of Users</a>
                 <a class="nav-link" data-toggle="pill" href="#addUser">Add User</a>
                 <a class="nav-link" data-toggle="pill" href="#user1">Something</a>
                 <a class="nav-link" data-toggle="pill" href="#user2">Something else</a>
             </div>
         </div>
     </div>

     <div class="row" id="equipementDashboard">
         <div class="col">
             <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                 <a class="nav-link" data-toggle="pill" href="#listOfEquipement">List of Equipement</a>
                 <a class="nav-link" data-toggle="pill" href="#addEquipement">Add Equipement</a>
                 <a class="nav-link" data-toggle="pill" href="#equipement1">Something</a>
                 <a class="nav-link" data-toggle="pill" href="#equipement2">Something else</a>
             </div>
         </div>
     </div>
 </div>

 <!-- MAIN CONTENT -->
 <main id="content">
     <div class="col">
         <div class="tab-content" id="v-pills-tabContent">
             <!-- PROFILE CONTENT TABS -->
             <div class="tab-pane fade show active" id="description" role="tabpanel">
                 <p class="bg-dark text-white p-5 m-3 mt-5">
                     Dodati 2 korisnika klikom na "Add user",popuniti formu i postaviti za jednog korisnika tip "Operater",
                     a za drugog tip "Tehnicar".
                     <br>
                     Proizvoljno dodati opremu klikom na "Add equipement". <br>
                     Nakon toga preko naloga "Operater" bice moguce otvaranje prijave, i resavanje iste preko naloga "Tehnicar".
                 </p>
                 <p class="bg-dark text-white p-5 m-3 mt-5">
                     Administrator ima mogucnost dodavanja novih korisnika, izmenu njihovih podataka i brisanje.<br>
                     Ima mogucnost dodavanja novih masina, izmenu njihovih podataka i brisanje.<br>
                     Logout dugme je funkcionalno.
                 </p>
             </div>
             <div class="tab-pane fade" id="myProfile" role="tabpanel"> PROFILE EDIT SHOW</div>

             <!-- USERS CONTENT TABS -->
             <div class="tab-pane fade show" id="listOfUsers" role="tabpanel">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut laborum incidunt sunt eum inventore, ipsa possimus dolor nostrum, necessitatibus dolores eaque itaque eos saepe aspernatur tempora autem mollitia amet et.</div>
             <div class="tab-pane fade" id="addUser" role="tabpanel"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Et repellendus nobis numquam assumenda minus magnam delectus, sint perspiciatis quaerat totam laborum rem expedita harum blanditiis repellat eos doloribus tempora enim.</div>
             <div class="tab-pane fade" id="user1" role="tabpanel">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
             <div class="tab-pane fade" id="user2" role="tabpanel">Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>

             <!-- EQUIPEMENT CONTENT TABS -->
             <div class="tab-pane fade show" id="listOfEquipement" role="tabpanel">Equipement LIST</div>
             <div class="tab-pane fade" id="addEquipement" role="tabpanel"> ADD EQUIPEMENT</div>
             <div class="tab-pane fade" id="equipement1" role="tabpanel">EQUIPEMENT SOMETHING</div>
             <div class="tab-pane fade" id="equipement2" role="tabpanel">EQUIPEMENT SOMETHING ELSE</div>

         </div>
     </div>
 </main>