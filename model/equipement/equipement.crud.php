<?php
include_once 'equipement.class.php';
class EquipementCRUD
{
    public static function getAllEquipement(mysqli $conn)
    {
        $query = "SELECT * FROM equipement;";
        $result = $conn->query($query);
        $arrayOfEquipement = [];
        if ($result->num_rows === 0) {
            return;
        } else {
            while ($red = $result->fetch_assoc()) {
                $arrayOfEquipement[] = new Equipement(...$red);
            }
        }
        return  $arrayOfEquipement;
    }


    public static function getById($id, mysqli $conn)
    {

        $query = "SELECT * FROM equipement WHERE id = $id;";
        $result = $conn->query($query);

        $row = $result->fetch_assoc();
        return $row;
    }
    public static function add($name, $model, $manufactureDate, $serialNumber, $process, mysqli $conn)
    {
        $query = "INSERT INTO equipement (ID, name, manufactureDate, serialNumber, model, process) 
        VALUES (NULL, '$name', '$manufactureDate', '$serialNumber', '$model', '$process');";
        return $conn->query($query);
    }
    public static function update($id, $name, $model, $manufactureDate, $serialNumber, $process, mysqli $conn)
    {
        $query = "UPDATE equipement 
                    SET name = '$name', manufactureDate = '$manufactureDate', 
                    serialNumber = '$serialNumber' ,model = '$model', 
                    process = '$process'
                    WHERE ID = $id;";
        return $conn->query($query);
    }
    public static function deleteById($id, mysqli $conn)
    {

        $query = "DELETE FROM equipement WHERE id = $id;";
        return $conn->query($query);
    }
}
