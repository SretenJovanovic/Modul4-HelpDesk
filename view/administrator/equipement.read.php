<nav class="navbar navbar-light bg-light justify-content-between">
    <h3 class="navbar-brand">Equipement List</h3>

    <nav class="navbar navbar-light bg-light">
        <button type="button" id="sortEquipementByName" value="ASC" class=" mr-3 mb-3 btn btn-outline-secondary">Sort by Name</button>
        <form class="form-inline">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">Search by ID,Name or Model</span>
                </div>
                <input id="searchEquipement" class="form-control mr-sm-2" type="text" aria-describedby="basic-addon3" placeholder="Search" aria-label="Search">
            </div>
        </form>
    </nav>
</nav>

<!-- Table show all equipement -->
<div id="equipementTableDiv"></div>
<!-- Pagination all equipement -->
<div id="equipementPaginationDiv"></div>