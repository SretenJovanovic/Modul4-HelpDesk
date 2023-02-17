<?php
class User
{
    protected $id;
    protected $username;
    protected $firstName;
    protected $lastName;
    protected $age;
    protected $phoneNumber;
    protected $password;
    protected $email;
    protected $type;

    public function __construct($ID,  $username,$firstName, $lastName, $age, $phone, $password, $email, $type)
    {
        $this->id = $ID;
        $this->username = $username;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
        $this->phoneNumber = $phone;
        $this->password = $password;
        $this->email = $email;
        $this->type = $type;}
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->firstName = $id;
    }
    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }
    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }
    public function getLastname()
    {
        return $this->lastName;
    }

    public function setLastname($lastName)
    {
        $this->lastName = $lastName;
    }
    public function getAge()
    {
        return $this->age;
    }
    public function setAge($age)
    {
        $this->age = $age;
    }
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getType()
    {
        return $this->type;
    }
    public function setType($type)
    {
        $this->type = $type;
    }
}
