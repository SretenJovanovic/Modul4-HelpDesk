<form id="registerUserForm" action="#" method="POST" class="mb-3">
    <h3>Register</h3>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="username">Username</label>
            <input type="text" id="username" class="form-control" name="username" placeholder="Username">
        </div>
        <div class="form-group col-md-4">
            <label for="firstName">First name</label>
            <input type="text" id="firstName" class="form-control" name="firstName" placeholder="First name">
        </div>
        <div class="form-group col-md-4">
            <label for="lastName">Last Name</label>
            <input type="text" id="lastName" class="form-control" name="lastName" placeholder="Last name">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
        </div>
        <div class="form-group col-md-2">
            <label for="age">Age</label>
            <input type="number" class="form-control" name="age" id="age" placeholder="Age">
        </div>
        <div class="form-group col-md-3">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone number">
        </div>
        <div class="form-group col-md-3">
            <label for="type">Type</label>
            <select class="form-control" name="type" id="type">
                <option value="administrator" selected>Admin</option>
                <option value="operator">Operator</option>
                <option value="technician">Technician</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
        <div class="form-group col-md-6">
            <label for="passwordRepeat">Re-enter password</label>
            <input type="password" class="form-control" name="passwordRepeat" id="passwordRepeat" placeholder="Re-enter password">
        </div>
    </div>
    <button id="registerUser" type="submit" class="btn btn-primary btn-block" name="registerSubmit">Sign Up</button>

</form>