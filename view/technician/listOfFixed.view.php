<nav class="navbar navbar-light bg-light justify-content-between">
    <h3 class="navbar-brand">List of Fixed Defects</h3>

    <nav class="navbar navbar-light bg-light">
        <button type="button" id="sortReportsFixedByOperatorId" value="ASC" class=" mr-3 mb-3 btn btn-outline-secondary">Sort by Operator ID</button>
        <form class="form-inline">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">Search by Id or Year</span>
                </div>
                <input id="searchReportsFixed" class="form-control mr-sm-2" type="text" aria-describedby="basic-addon3" placeholder="Search" aria-label="Search">
            </div>
        </form>
    </nav>
</nav>
<div id="listOfFixedDiv"></div>
<div id="fixedPaginationDiv"></div>