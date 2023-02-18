<?php
include_once 'users/user.class.php';
class Login
{
    public static function login($username_email, $password, mysqli $conn)
    {
        $query = "SELECT * FROM users WHERE email='$username_email'OR username = '$username_email' AND password='$password' LIMIT 1;";
        $result =  $conn->query($query);
        if ($result->num_rows === 0) {
            return null;
        }else {

            $row = $result->fetch_assoc();
            $row = new User(...$row);
            return $row;
        }
    }
}
