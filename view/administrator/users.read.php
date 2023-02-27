<nav class="navbar navbar-light bg-light justify-content-between">
    <h3 class="navbar-brand">User List</h3>

    <nav class="navbar navbar-light bg-light">
        <button type="button" id="sortUsersByType" value="ASC" class="mr-3 mb-3 btn btn-outline-secondary">Sort by Type</button>
        <form class="form-inline">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">Search by ID,First Name, Last Name or Username</span>
                </div>
                <input id="searchUser" class="form-control mr-sm-2" type="text" aria-describedby="basic-addon3" placeholder="Search" aria-label="Search">
            </div>
        </form>
    </nav>
</nav>


<!-- Table show all users -->
<div id="usersTableDiv"></div>
<!-- Pagination all users -->
<div id="paginationDiv"></div>