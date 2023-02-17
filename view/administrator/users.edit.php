<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit user: <span id="titleID"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <form action="#" id="editUserForm" method="POST" class="mb-3">
                <input type="hidden" name="userId" id="euserId">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="username">Username</label>
                            <input type="text" id="eusername" class="form-control" name="username">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="eemail">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstName">First name</label>
                            <input type="text" id="efirstName" class="form-control" name="firstName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastName">Last Name</label>
                            <input type="text" id="elastName" class="form-control" name="lastName">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="age">Age</label>
                            <input type="number" class="form-control" name="age" id="eage">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="ephone">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="type">Type: </label>
                            <select class="form-control" name="type" id="etype">
                                <option value="administrator">Admin</option>
                                <option value="operator">Operator</option>
                                <option value="technician">Technician</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" name="password" id="epassword">
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary btn-block" name="submitEdit">Edit</button>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>