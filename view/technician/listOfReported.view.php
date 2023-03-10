<nav class="navbar navbar-light bg-light justify-content-between">
    <h3 class="navbar-brand">List of Reported Defects</h3>

    <nav class="navbar navbar-light bg-light">
        <button type="button" id="sortReportsProgressByOperatorId" value="ASC" class=" mr-3 mb-3 btn btn-outline-secondary">Sort by Operator ID</button>
        <form class="form-inline">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">Search by Operator Id or Year</span>
                </div>
                <input id="searchReportsProgress" class="form-control mr-sm-2" type="text" aria-describedby="basic-addon3" placeholder="Search" aria-label="Search">
            </div>
        </form>
    </nav>
</nav>

<!-- Table show in progress reports -->
<div id="listOfReportedDiv"></div>
<!-- Pagination in progress reports -->
<div id="reportedPaginationDiv"></div>