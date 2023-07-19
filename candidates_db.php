<?php
    SESSION_START();
    include('condb.php');
    
    if(isset($_POST['vote']))
    {
        $c_number = $_POST['c_number'];
        $s_user = $_POST['s_user'];

        $sql_candidate = "UPDATE `eltr_candidate`
        SET c_score = c_score + 1
        WHERE c_number = $c_number";
        $result_candidate = mysqli_query($con, $sql_candidate) or die ("Error in query: $sql_candidate" . mysqli_error());

        $sql_student = "UPDATE `eltr_student`
        SET s_status = '1'
        WHERE s_user = $s_user";
        $result_student = mysqli_query($con, $sql_student) or die ("Error in query: $sql_student" . mysqli_error());

        if($result_student)
        {
            $_SESSION['success-vote'] = "success";
            echo "<script type='text/javascript'>";
            echo "window.location='candidates';";
            echo "</script>";
        }
        else
        {
            $_SESSION['error'] = "error";
            echo "<script type='text/javascript'>";
            echo "window.history.back();";
            echo "</script>";
        }
    }

    if(isset($_POST['notvote']))
    {
        $s_user = $_POST['s_user'];

        $sql_candidate = "UPDATE `eltr_candidate`
        SET c_score = c_score + 1
        WHERE c_number = 0";
        $result_candidate = mysqli_query($con, $sql_candidate) or die ("Error in query: $sql_candidate" . mysqli_error());

        $sql_student = "UPDATE `eltr_student`
        SET s_status = '1'
        WHERE s_user = $s_user";
        $result_student = mysqli_query($con, $sql_student) or die ("Error in query: $sql_student" . mysqli_error());

        if($result_student)
        {
            $_SESSION['success-notvote'] = "success";
            echo "<script type='text/javascript'>";
            echo "window.location='candidates';";
            echo "</script>";
        }
        else
        {
            $_SESSION['error'] = "error";
            echo "<script type='text/javascript'>";
            echo "window.history.back();";
            echo "</script>";
        }
    }
?>

<script src="js/jquery-3.6.1.min.js"></script>