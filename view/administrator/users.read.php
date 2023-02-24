<nav class="navbar navbar-light bg-light justify-content-between">
    <h3 class="navbar-brand">User List</h3>
    <form class="form-inline" id="searchUserForm" action="#" method="POST">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <form class="form-inline" id="sortByUserForm" action="#" method="POST">
        <select name="sortBy" id="sortBy">
            <option value="ID">ID</option>
            <option value="username">Username</option>
            <option value="email">Email</option>
            <option value="type">Type</option>
        </select>
        <button class="btn m-2 btn-outline-primary my-2 my-sm-0" type="submit">Sort</button>
    </form>
</nav>


<div id="usersTableDiv"></div>
<div id="paginationDiv"></div>