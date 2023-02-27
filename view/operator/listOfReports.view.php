<nav class="navbar navbar-light bg-light justify-content-between">
    <h3 class="navbar-brand">List of Reports</h3>

    <nav class="navbar navbar-light bg-light">
        <button type="button" id="sortReportsByStatus" value="ASC" class=" mr-3 mb-3 btn btn-outline-secondary">Sort by Status</button>
        <form class="form-inline">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">Search by Id or Year</span>
                </div>
                <input id="searchReports" class="form-control mr-sm-2" type="text" aria-describedby="basic-addon3" placeholder="Search" aria-label="Search">
            </div>
        </form>
    </nav>
</nav>

<!-- Table show all reports -->
<div id="reportsTableDiv"></div>
<!-- Pagination all reports -->
<div id="paginationReportDiv"></div>