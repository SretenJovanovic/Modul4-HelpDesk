<?php
include_once 'user.class.php';
class UserCRUD
{
    public static function getAllUsers(mysqli $conn)
    {
        $query = "SELECT * FROM users;";
        $result = $conn->query($query);
        if ($result->num_rows === 0) {
            return $result = 'There is no users';
        }
        while ($red = $result->fetch_assoc()) {
            $arrayOfUsers[] = new User(...$red);
        }
        return  $arrayOfUsers;
    }


    public static function getById($id, mysqli $conn)
    {

        $query = "SELECT * FROM users WHERE id = $id;";
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
