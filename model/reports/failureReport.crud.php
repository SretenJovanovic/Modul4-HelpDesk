<?php
include_once 'failureReport.class.php';
class FailureReportCRUD
{
    public static function getAllReports(mysqli $conn)
    {
        $limit = 8;

        if (isset($_GET['page']) && $_GET['page'] !== '') {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $start_from = ($page - 1) * $limit;

        $query = "SELECT * FROM reports LIMIT $start_from,$limit ";
        $result = mysqli_query($conn, $query);

        $number_of_result = $result->num_rows;

        $arrayOfReports = [];
        $msg = '';
        if ($number_of_result == 0) {
            $msg = 'There are no reports in DB.';
        } else {
            while ($red = $result->fetch_assoc()) {
                $arrayOfReports[] = $red;
            }
        }
        // PAGINATION
        $query = "SELECT * FROM reports";
        $result = mysqli_query($conn, $query);

        $totalRows = $result->num_rows;

        $totalPages = ceil($totalRows / $limit);

        return [$arrayOfReports, $totalPages, $msg];
    }

    public static function getAllReportsProgress(mysqli $conn)
    {
        $limit = 8;

        if (isset($_GET['page']) && $_GET['page'] !== '') {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }


        $start_from = ($page - 1) * $limit;

        $query = "SELECT * FROM reports WHERE status='in progress' LIMIT $start_from,$limit ";
        $result = mysqli_query($conn, $query);

        $number_of_result = $result->num_rows;

        $arrayOfReports = [];
        $msg = '';
        if ($number_of_result == 0) {
            $msg = 'There are no reports in DB.';
        } else {
            while ($red = $result->fetch_assoc()) {
                $arrayOfReports[] = $red;
            }
        }
        // PAGINATION
        $query = "SELECT * FROM reports WHERE status='in progress'";
        $result = mysqli_query($conn, $query);

        $totalRows = $result->num_rows;

        $totalPages = ceil($totalRows / $limit);

        return [$arrayOfReports, $totalPages, $msg];
    }
    public static function getAllReportsFixed(mysqli $conn)
    {
        $limit = 8;

        if (isset($_GET['page']) && $_GET['page'] !== '') {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }


        $start_from = ($page - 1) * $limit;

        $query = "SELECT * FROM reports WHERE status='fixed' LIMIT $start_from,$limit ";
        $result = mysqli_query($conn, $query);

        $number_of_result = $result->num_rows;

        $arrayOfReports = [];
        $msg = '';
        if ($number_of_result == 0) {
            $msg = 'There are no reports in DB.';
        } else {
            while ($red = $result->fetch_assoc()) {
                $arrayOfReports[] = $red;
            }
        }
        // PAGINATION
        $query = "SELECT * FROM reports WHERE status='fixed'";
        $result = mysqli_query($conn, $query);

        $totalRows = $result->num_rows;

        $totalPages = ceil($totalRows / $limit);

        return [$arrayOfReports, $totalPages, $msg];
    }
    public static function sortByStatus($sort, mysqli $conn)
    {
        $limit = 8;

        if (isset($_GET['page']) && $_GET['page'] !== '') {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $start_from = ($page - 1) * $limit;

        $query = "SELECT * FROM reports ORDER BY status $sort LIMIT $start_from,$limit ";
        $result = mysqli_query($conn, $query);

        $number_of_result = $result->num_rows;

        $arrayOfReports = [];
        $msg = '';
        if ($number_of_result == 0) {
            $msg = 'There are no reports in DB.';
        } else {
            while ($red = $result->fetch_assoc()) {
                $arrayOfReports[] = $red;
            }
        }
        // PAGINATION
        $query = "SELECT * FROM reports";
        $result = mysqli_query($conn, $query);

        $totalRows = $result->num_rows;

        $totalPages = ceil($totalRows / $limit);

        return [$arrayOfReports, $totalPages, $msg];
    }

    public static function sortByOperatorId($sort, mysqli $conn)
    {
        $limit = 8;

        if (isset($_GET['page']) && $_GET['page'] !== '') {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $start_from = ($page - 1) * $limit;

        $query = "SELECT * FROM reports WHERE status = 'in progress' ORDER BY operator_id $sort LIMIT $start_from,$limit ";
        $result = mysqli_query($conn, $query);

        $number_of_result = $result->num_rows;

        $arrayOfReports = [];
        $msg = '';
        if ($number_of_result == 0) {
            $msg = 'There are no reports in DB.';
        } else {
            while ($red = $result->fetch_assoc()) {
                $arrayOfReports[] = $red;
            }
        }
        // PAGINATION
        $query = "SELECT * FROM reports WHERE status = 'in progress' ORDER BY operator_id $sort";
        $result = mysqli_query($conn, $query);

        $totalRows = $result->num_rows;

        $totalPages = ceil($totalRows / $limit);

        return [$arrayOfReports, $totalPages, $msg];
    }
    public static function sortFixedByOperatorId($sort, mysqli $conn)
    {
        $limit = 8;

        if (isset($_GET['page']) && $_GET['page'] !== '') {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $start_from = ($page - 1) * $limit;

        $query = "SELECT * FROM reports WHERE status = 'fixed' ORDER BY operator_id $sort LIMIT $start_from,$limit ";
        $result = mysqli_query($conn, $query);

        $number_of_result = $result->num_rows;

        $arrayOfReports = [];
        $msg = '';
        if ($number_of_result == 0) {
            $msg = 'There are no reports in DB.';
        } else {
            while ($red = $result->fetch_assoc()) {
                $arrayOfReports[] = $red;
            }
        }
        // PAGINATION
        $query = "SELECT * FROM reports WHERE status = 'fixed' ORDER BY operator_id $sort";
        $result = mysqli_query($conn, $query);

        $totalRows = $result->num_rows;

        $totalPages = ceil($totalRows / $limit);

        return [$arrayOfReports, $totalPages, $msg];
    }
    //SEARCH INPUT
    public static function searchByIdDate($search, mysqli $conn)
    {
        $limit = 8;

        if (isset($_GET['page']) && $_GET['page'] !== '') {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $start_from = ($page - 1) * $limit;
        $query = "SELECT * FROM reports 
        WHERE ID LIKE '%$search%' OR CONVERT(report_date,DATETIME) LIKE '%$search%' OR CONVERT(fixed_date,DATETIME) LIKE '%$search%'
        LIMIT $start_from,$limit ";
        $result = mysqli_query($conn, $query);

        $number_of_result = $result->num_rows;

        $arrayOfReports = [];
        $msg = '';
        if ($number_of_result == 0) {
            $msg =  'There are no reports in DB.';
        } else {
            while ($red = $result->fetch_assoc()) {
                $arrayOfReports[] = $red;
            }
        }
        // PAGINATION
        $query = "SELECT * FROM reports WHERE ID LIKE '%$search%' OR CONVERT(report_date,DATETIME) LIKE '%$search%' OR CONVERT(fixed_date,DATETIME) LIKE '%$search%'";
        $result = mysqli_query($conn, $query);

        $totalRows = $result->num_rows;

        $totalPages = ceil($totalRows / $limit);

        return [$arrayOfReports, $totalPages, $msg];
    }
    public static function searchProgressByOperatorIdDate($search, mysqli $conn)
    {
        $limit = 8;

        if (isset($_GET['page']) && $_GET['page'] !== '') {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $start_from = ($page - 1) * $limit;
        $query = "SELECT * FROM reports 
        WHERE status='in progress' AND (operator_id LIKE '%$search%' OR CONVERT(report_date,DATETIME) LIKE '%$search%')
        LIMIT $start_from,$limit ";
        $result = mysqli_query($conn, $query);

        $number_of_result = $result->num_rows;

        $arrayOfReports = [];
        $msg = '';
        if ($number_of_result == 0) {
            $msg =  'There are no reports in DB.';
        } else {
            while ($red = $result->fetch_assoc()) {
                $arrayOfReports[] = $red;
            }
        }
        // PAGINATION
        $query = "SELECT * FROM reports WHERE status='in progress' AND (operator_id LIKE '%$search%' OR CONVERT(report_date,DATETIME) LIKE '%$search%')";
        $result = mysqli_query($conn, $query);

        $totalRows = $result->num_rows;

        $totalPages = ceil($totalRows / $limit);

        return [$arrayOfReports, $totalPages, $msg];
    }
    public static function searchFixedByOperatorIdDate($search, mysqli $conn)
    {
        $limit = 8;

        if (isset($_GET['page']) && $_GET['page'] !== '') {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $start_from = ($page - 1) * $limit;
        $query = "SELECT * FROM reports 
        WHERE status='fixed' AND (operator_id LIKE '%$search%' OR CONVERT(report_date,DATETIME) LIKE '%$search%')
        LIMIT $start_from,$limit ";
        $result = mysqli_query($conn, $query);

        $number_of_result = $result->num_rows;

        $arrayOfReports = [];
        $msg = '';
        if ($number_of_result == 0) {
            $msg = 'There are no reports in DB.';
        } else {
            while ($red = $result->fetch_assoc()) {
                $arrayOfReports[] = $red;
            }
        }
        // PAGINATION
        $query = "SELECT * FROM reports WHERE status='fixed' AND (operator_id LIKE '%$search%' OR CONVERT(report_date,DATETIME) LIKE '%$search%')";
        $result = mysqli_query($conn, $query);

        $totalRows = $result->num_rows;

        $totalPages = ceil($totalRows / $limit);

        return [$arrayOfReports, $totalPages, $msg];
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
