<?php
include_once 'failureReport.class.php';
include_once 'failureReport.class.php';
class FailureReportCRUD
{
    public static function getAllReports(mysqli $conn)
    {
        $query = "SELECT * FROM reports;";
        $result = $conn->query($query);

        if ($result->num_rows === 0) {
            return;
        } else {
            while ($red = $result->fetch_assoc()) {
                $arrayOfReports[] = $red;
            }
        }
        return  $arrayOfReports;
    }


    public static function getById($id, mysqli $conn)
    {

        $query = "SELECT * FROM equipement WHERE id = $id;";
        $result = $conn->query($query);

        $row = $result->fetch_assoc();
        return $row;
    }
    public static function add($description, $operator_id, $equipement_id, $status, mysqli $conn)
    {
        $report_date = date('d-m-y h:i:s');
        $query = "INSERT INTO reports (ID, description, operator_id, equipement_id,report_date,status) 
        VALUES (NULL, '$description', '$operator_id', '$equipement_id','$report_date','$status');";
        return $conn->query($query);
    }
    public static function update($id, $name, $model, $manufactureDate, $serialNumber, $process, mysqli $conn)
    {
        $fixed_date = date('d-m-y h:i:s');
        $query = "UPDATE equipement 
                    SET name = '$name', manufactureDate = '$manufactureDate', 
                    serialNumber = '$serialNumber' ,model = '$model', 
                    process = '$process', fixed_date='$fixed_date'
                    WHERE ID = $id;";
        return $conn->query($query);
    }
    public static function changeStatus($id, mysqli $conn)
    {
        $fixed_date = date('d-m-y h:i:s');
        $query = "UPDATE reports 
                    SET status = 'fixed',
                    fixed_date='$fixed_date'
                    WHERE ID = $id;";
        return $conn->query($query);
    }
    public static function deleteById($id, mysqli $conn)
    {

        $query = "DELETE FROM equipement WHERE id = $id;";
        return $conn->query($query);
    }
}
