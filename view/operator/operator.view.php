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
                <a class="nav-link" data-toggle="pill" href="#listOfReports" role="tab">List of Reports</a>
                <a class="nav-link" data-toggle="pill" href="#addReport">Add Report</a>
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
                <h3 class=" text-center bg-dark text-white p-5 m-3 mt-5">
                    OPERATER
                </h3>
                <p class="bg-dark text-white p-5 m-3 mt-5">
                    Operater ima mogucnost prijave kvara masine odabirom masine iz padajuceg menija i opisivanjem samog kvara.
                    <br> Klikom na "Add report" prijava se salje i ispisuje se na tabu 'List of Reports'. <br>
                    Kada Tehnicar resi kvar, ta prijava prelazi iz statusa "In progress" u status "Fixed" na tabu "List of Reports".
                <br>
                    Postoji mogucnost sortiranja i pretrage tabela po nekim parametrima.
                </p>
            </div>
            <div class="tab-pane fade" id="myProfile" role="tabpanel">
                <?php include_once('view/profile.view.php'); ?>
            </div>

            <!-- RERORTS CONTENT TABS -->
            <div class="tab-pane fade show" id="listOfReports" role="tabpanel">
                <h3>List Of Reports</h3>
                <?php include_once('view/operator/listOfReports.view.php'); ?>
            </div>
            <div class="tab-pane fade" id="addReport" role="tabpanel">
                <h3>Add Report</h3>
                <?php include_once('view/operator/failureReport.view.php'); ?>
            </div>

        </div>
    </div>
</main>


<script src="js/operator.js"></script>
<script src="js/ajax/reportsOperator.ajax.js"></script>