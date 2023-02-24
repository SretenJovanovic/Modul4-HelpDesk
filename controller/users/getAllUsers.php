<?php

require "../../model/db/singletonDB.php";
require "../../model/users/user.crud.php";


if (isset($_GET['search']) && !empty($_GET['search'])) {

    $search = $_GET['search'];
    $result = UserCRUD::searchByFirstOrLastName($search, $conn);
    $status = $result[0];
    $totalPages = $result[1];
    $msg = $result[2];
} else {
    $result = UserCRUD::getAllUsers($conn);
    $status = $result[0];
    $totalPages = $result[1];
    $msg = $result[2];
}

$page = $_GET['page'];

if (!$status || $status == []) {
    $allUsers = [];
} else {
    $allUsers = [];
    foreach ($status as $user) {
        $allUsers[] = new User(...$user);
    }
}

$output = '<table class="table table-sm mb-5">
<thead class="thead-dark">
    <tr id="userHeading">
        <th>ID</th>
        <th>User ID</th>
        <th>Username</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Type</th>
        <th colspan=2 class="text-center">Action</th>
    </tr>
</thead>
<tbody id="getAndSearchUsers">';
if ($allUsers == []) {
    $output .= $msg;
} else {
    foreach ($allUsers as $index => $user) :
        $id = $user->getId();
        $username = $user->getUsername();
        $firstName = $user->getFirstName();
        $lastName = $user->getLastName();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $type = $user->getType();
        $age = $user->getAge();
        $phone = $user->getPhoneNumber();
        $output .= '
        <tr class="table-secondary">
            <td class="bg-dark text-white">' . ($index += ($page * 8) - 7) . '</td>
            <td>' . $id . '</td>
            <td id="username' . $id . '">' . $username . '</td>
            <td id="firstName' . $id . '">' . $firstName . '</td>
            <td id="lastName' . $id . '">' . $lastName . '</td>
            <td id="email' . $id . '">' . $email . '</td>
            <td id="password' . $id . '">' . $password . '</td>
            <td id="type' . $id . '">' . $type . '</td>

            <td class="text-right">
                <input type="hidden" id="age' . $id . '" value="' . $age . '>">
                <input type="hidden" id="phone' . $id . '" value="' . $phone . '">

                <button type="button" class="btn btn-primary btn-block editUserModalBtn" data-toggle="modal" data-target="#editUserModal" value="' . $id . '">
                    Edit
                </button>
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
            </td>
            <td class="text-center">
                <button type="button" class="btn btn-danger deleteUserModalBtn" data-toggle="modal" data-target="#deleteUserModal" value="' . $id . '">
                    Delete
                </button>
                <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to delete user?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h5>Username: <span id="deleteUsername"></span></h5>
                                <form action="#" method="POST" id="deleteUserForm">
                                    <div class="form-check">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <input type="hidden" name="userId" id="deleteUserId">
                                        <button type="submit" class="btn btn-danger" name="submitDelete">Delete</button>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>';
    endforeach;
}

$output .= '
</tbody>
</table>';



$output2 = '';

$output2 .= '<nav aria-label="Page navigation example" id="hia">';
$output2 .= '<ul class="pagination paginationUser justify-content-center">';


$output2 .= '<li class="page-item">
                <a class="page-link pageNums" id="prevBtn" href="?page=' . $page . '">Previous</a>
            </li>';

for ($i = 1; $i <= $totalPages; $i++) {
    $active_class = '';
    $output2 .= '<li class="page-item"><a class="page-link pageNums" href="?page=' . $i . '">' . $i . '</a></li>';
}

$output2 .= '<li class="page-item">
<a class="page-link pageNums" id="nextBtn" href="?page=' . $page + 1 . '">Next</a>
</li>';
$output2 .= '</ul>
</nav>';
echo json_encode(array('output' => $output, 'output2' => $output2, 'totalPages' => $totalPages));
