<?php
    header('Content-Type: application/json');

    require_once '../condb.php';

    $sql = "SELECT * FROM eltr_candidate ORDER BY c_number";
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql" . mysqli_error());

    $data = array();

    foreach($result as $row) {
        $data[] = $row;
    }

    mysqli_close($con);

    echo json_encode($data);
?>