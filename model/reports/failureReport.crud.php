<?php

class FailureReportCRUD
{
    public static function getAllReports(mysqli $conn)
    {
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }


        $results_per_page = 8;
        $page_first_result = ($page - 1) * $results_per_page;

        $query = "SELECT * FROM reports";
        $result = mysqli_query($conn, $query);
        $number_of_result = mysqli_num_rows($result);

        $number_of_page = ceil($number_of_result / $results_per_page);



        $query = "SELECT * FROM reports LIMIT " . $page_first_result . ',' . $results_per_page;
        $result = mysqli_query($conn, $query);

        if ($number_of_result === 0) {
            return array('reports' => $arrayOfReports = [], 'numOfPages' => $number_of_page, 'page' => $page);
        } else {
            while ($red = $result->fetch_assoc()) {
                $arrayOfReports[] = $red;
            }
        }


        if ($page > $number_of_page) {
            header("Location:home.php?type=operator&page=1");
        }
        return  array('reports' => $arrayOfReports, 'numOfPages' => $number_of_page, 'page' => $page);
    }

    public static function getAllReportsFixed(mysqli $conn)
    {
        if (!isset($_GET['pageFixed']) || $_GET['pageFixed'] == 0) {
            $page = 1;
        } else {
            $page = $_GET['pageFixed'];
        }

        $results_per_page = 8;
        $page_first_result = ($page - 1) * $results_per_page;

        $query = "SELECT * FROM reports WHERE status='fixed';";
        $result = mysqli_query($conn, $query);
        $number_of_result = mysqli_num_rows($result);

        $number_of_page_fixed = ceil($number_of_result / $results_per_page);



        $query = "SELECT * FROM reports WHERE status='fixed' LIMIT " . $page_first_result . ',' . $results_per_page;
        $result = mysqli_query($conn, $query);



        if ($number_of_result === 0) {
            return array('reportsFixed' => $arrayOfReportsFixed = [], 'numOfPagesFixed' => $number_of_page_fixed, 'page' => $page);
        } else {
            while ($red = $result->fetch_assoc()) {
                $arrayOfReportsFixed[] = $red;
            }
        }
        if ($page > $number_of_page_fixed) {
            header("Location:home.php?type=technician&status=fixed&pageProgress=1");
        }
        return  array('reportsFixed' => $arrayOfReportsFixed, 'numOfPagesFixed' => $number_of_page_fixed, 'page' => $page);
    }

    public static function getAllReportsProgress(mysqli $conn)
    {

        if (!isset($_GET['pageProgress']) || $_GET['pageProgress'] == 0) {
            $page = 1;
        } else {
            $page = $_GET['pageProgress'];
        }


        $results_per_page = 8;
        $page_first_result = ($page - 1) * $results_per_page;

        $query = "SELECT * FROM reports WHERE status='in progress';";
        $result = mysqli_query($conn, $query);
        $number_of_result = mysqli_num_rows($result);

        $number_of_page_progress = ceil($number_of_result / $results_per_page);


        $query = "SELECT * FROM reports WHERE status='in progress' LIMIT " . $page_first_result . ',' . $results_per_page;
        $result = mysqli_query($conn, $query);

        if ($number_of_result === 0) {
            return array('reportsProgress' => $arrayOfReportsProgress = [], 'numOfPagesProgress' => $number_of_page_progress, 'page' => $page);
        } else {
            while ($red = $result->fetch_assoc()) {
                $arrayOfReportsProgress[] = $red;
            }
        }
        if ($page > $number_of_page_progress) {
            header("Location:home.php?type=technician&status=reported&pageProgress=1");
        }
        return  array('reportsProgress' => $arrayOfReportsProgress, 'numOfPagesProgress' => $number_of_page_progress, 'page' => $page);
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
        $report_date = date('Y-m-d H:i:s');
        $query = "INSERT INTO reports (ID, description, operator_id, equipement_id,report_date,status) 
        VALUES (NULL, '$description', '$operator_id', '$equipement_id','$report_date','$status');";
        return $conn->query($query);
    }
    public static function update($id, $name, $model, $manufactureDate, $serialNumber, $process, mysqli $conn)
    {
        $fixed_date = date('Y-m-d H:i:s');
        $query = "UPDATE equipement 
                    SET name = '$name', manufactureDate = '$manufactureDate', 
                    serialNumber = '$serialNumber' ,model = '$model', 
                    process = '$process', fixed_date='$fixed_date'
                    WHERE ID = $id;";
        return $conn->query($query);
    }
    public static function changeStatus($id, mysqli $conn)
    {
        $fixed_date = date('Y-m-d H:i:s');
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
