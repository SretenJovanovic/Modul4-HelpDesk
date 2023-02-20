<!-- NAVIGATION SIDEBAR -->
<nav id="sidebar">
    <ul class="nav mb-3 mt-3">
        <li class="nav-item" id="logo"><span>HelpDesk</span></li>
        <li class="nav-item">
            <a href="#" class="nav-link myActive"><i class="bi bi-person-fill"></i>Profile</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link"><i class="bi bi-clipboard-fill"></i></i>Reports</a>
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

    <div class="row" id="reportDashboard">
        <div class="col">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link" data-toggle="pill" href="#listOfReported" role="tab">List of Reported Defects</a>
                <a class="nav-link" data-toggle="pill" href="#listOfFixed">List of Fixed Defects</a>
                <a class="nav-link" data-toggle="pill" href="#user1">Something</a>
                <a class="nav-link" data-toggle="pill" href="#user2">Something else</a>
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
                Tehnicar ima mogucnost pregleda trenutno prijavjenih kvarova.<br>
        Klikom na dugme "Fix", prijava se prebacuje u status "Fixed" i prosledjuje u listu "List of Repaired Equipement".
                </p>
                <p class="bg-dark text-white p-5 m-3 mt-5">
                    TEHNICAR
                </p>
            </div>
            <div class="tab-pane fade" id="myProfile" role="tabpanel">
            <?php include_once('view/profile.view.php'); ?>
        </div>

            <!-- USERS CONTENT TABS -->
            <div class="tab-pane fade show" id="listOfReported" role="tabpanel">
                <h3>List of Reported Defects</h3>
                <?php include_once('listOfReported.view.php'); ?>
            </div>
            <div class="tab-pane fade" id="listOfFixed" role="tabpanel">
                <h3>List of Fixed Defects</h3>
                <?php include_once('listOfFixed.view.php'); ?>
            </div>
        </div>
    </div>
</main>
<script src="js/technician.js"></script>