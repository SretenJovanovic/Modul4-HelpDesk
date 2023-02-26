<?php
include_once 'user.class.php';
class UserCRUD
{

    public static function getAllUsers(mysqli $conn)
    {
        $limit = 8;

        if (isset($_GET['page']) && $_GET['page'] !== '') {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $start_from = ($page - 1) * $limit;

        $query = "SELECT * FROM users LIMIT $start_from,$limit ";
        $result = mysqli_query($conn, $query);

        $number_of_result = $result->num_rows;

        $arrayOfUsers = [];
        $msg = '';
        if ($number_of_result == 0) {
            $msg = 'There is no users in DB.';
        } else {
            while ($red = $result->fetch_assoc()) {
                $arrayOfUsers[] = $red;
            }
        }
        // PAGINATION
        $query = "SELECT * FROM users";
        $result = mysqli_query($conn, $query);

        $totalRows = $result->num_rows;

        $totalPages = ceil($totalRows / $limit);

        return [$arrayOfUsers, $totalPages, $msg];
    }

    public static function sortByType($sort, mysqli $conn)
    {
        $limit = 8;

        if (isset($_GET['page']) && $_GET['page'] !== '') {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $start_from = ($page - 1) * $limit;

        $query = "SELECT * FROM users ORDER BY type $sort LIMIT $start_from,$limit ";
        $result = mysqli_query($conn, $query);

        $number_of_result = $result->num_rows;

        $arrayOfUsers = [];
        $msg = '';
        if ($number_of_result == 0) {
            $msg = 'There is no users in DB.';
        } else {
            while ($red = $result->fetch_assoc()) {
                $arrayOfUsers[] = $red;
            }
        }
        // PAGINATION
        $query = "SELECT * FROM users";
        $result = mysqli_query($conn, $query);

        $totalRows = $result->num_rows;

        $totalPages = ceil($totalRows / $limit);

        return [$arrayOfUsers, $totalPages, $msg];
    }


    //SEARCH INPUT
    public static function searchByFirstOrLastName($search, mysqli $conn)
    {
        $limit = 8;

        if (isset($_GET['page']) && $_GET['page'] !== '') {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $start_from = ($page - 1) * $limit;

        $query = "SELECT * FROM users 
        WHERE firstName LIKE '%$search%' OR lastName LIKE '%$search%' OR username LIKE '%$search%' OR ID LIKE '%$search%'
        LIMIT $start_from,$limit ";
        $result = mysqli_query($conn, $query);

        $number_of_result = $result->num_rows;

        $arrayOfUsers = [];
        $msg = '';
        if ($number_of_result == 0) {
            $msg =  'There is no users in DB.';
        } else {
            while ($red = $result->fetch_assoc()) {
                $arrayOfUsers[] = $red;
            }
        }
        // PAGINATION
        $query = "SELECT * FROM users WHERE firstName LIKE '%$search%' OR lastName LIKE '%$search%' OR username LIKE '%$search%' OR ID LIKE '%$search%'";
        $result = mysqli_query($conn, $query);

        $totalRows = $result->num_rows;

        $totalPages = ceil($totalRows / $limit);

        return [$arrayOfUsers, $totalPages, $msg];
    }


    public static function getById($id, mysqli $conn)
    {

        $query = "SELECT * FROM users WHERE ID = $id;";
        $result = $conn->query($query);

        $row = $result->fetch_assoc();
        return $row;
    }
    public static function add($username, $email, $firstName, $lastName, $age, $phone, $type, $password, mysqli $conn)
    {
        $query = "INSERT INTO users (ID, username, firstName, lastName, email, age, phone, password, type) 
        VALUES (NULL, '$username', '$firstName', '$lastName', '$email', $age, $phone, '$password', '$type');";
        return $conn->query($query);
    }
    public static function update($id, $username, $email, $firstName, $lastName, $age, $phone, $type, $password, mysqli $conn)
    {
        $query = "UPDATE users 
                    SET username = '$username', firstName = '$firstName', 
                    lastName = '$lastName' ,email = '$email', 
                    age = $age, phone = $phone, 
                    password = '$password', type = '$type'
                    WHERE ID = $id;";
        return $conn->query($query);
    }
    public static function deleteById($id, mysqli $conn)
    {

        $query = "DELETE FROM users WHERE id = $id;";
        return $conn->query($query);
    }
}
