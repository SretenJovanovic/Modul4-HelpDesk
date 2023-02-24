<?php
include_once 'equipement.class.php';
class EquipementCRUD
{


    public static function getAllEquipement(mysqli $conn)
    {
        $limit = 8;

        if (isset($_GET['page']) && $_GET['page'] !== '') {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $start_from = ($page - 1) * $limit;

        $query = "SELECT * FROM equipement LIMIT $start_from,$limit ";
        $result = mysqli_query($conn, $query);

        $number_of_result = $result->num_rows;

        $arrayOfEquipement = [];
        $msg = '';
        if ($number_of_result == 0) {
            $msg = 'There is no equipement in DB.';
        } else {
            while ($red = $result->fetch_assoc()) {
                $arrayOfEquipement[] = $red;
            }
        }
        // PAGINATION
        $query = "SELECT * FROM equipement";
        $result = mysqli_query($conn, $query);

        $totalRows = $result->num_rows;

        $totalPages = ceil($totalRows / $limit);

        return [$arrayOfEquipement, $totalPages, $msg];
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
