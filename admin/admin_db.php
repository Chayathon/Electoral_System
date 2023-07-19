<?php
    SESSION_START();
    error_reporting(0);
    include("../condb.php");
    $errors = array();

    if(isset($_POST['add']))
    {
        $a_user = mysqli_real_escape_string($con, $_POST["a_user"]);
        $a_pass1 = mysqli_real_escape_string($con, $_POST["a_pass1"]);
        $a_pass2 = mysqli_real_escape_string($con, $_POST["a_pass2"]);
        $a_name = mysqli_real_escape_string($con, $_POST["a_name"]);

        $user_check = "SELECT * FROM `eltr_admin` WHERE a_user = '$a_user' OR a_name = '$a_name'";
        $query = mysqli_query($con, $user_check);
        $result_check = mysqli_fetch_assoc($query);

        if($result_check)
        {
            if($result_check['a_user'] === $a_user)
            {
                array_push($errors, "Username already exists");
            }

            if($result_check['a_name'] === $a_name)
            {
                array_push($errors, "Name already exists");
            }
        }

        if($a_pass1 != $a_pass2)
        {
            array_push($errors, "The two passwords do not match");
        }

        if(count($errors) == 0)
        {
            $a_pass = $a_pass1;

            $sql = "INSERT INTO `eltr_admin`(a_user,a_pass,a_name,a_level)
            VALUES('$a_user','$a_pass','$a_name','admin')";
            $result = mysqli_query($con,$sql) or die ("Error in query: $sql ".mysqli_error());
            
            if($result)
            {
                $_SESSION['success-add'] = "success";
                echo "<script type='text/javascript'>";
                echo "window.location='list_admin';";
                echo "</script>";
            }
        }

        if($result_check)
        {
            $_SESSION['error-name'] = "error";
            echo "<script type='text/javascript'>";
            echo "window.history.back();";
            echo "</script>";
        }
        else
        {
            $_SESSION['error-pass'] = "error";
            echo "<script type='text/javascript'>";
            echo "window.history.back();";
            echo "</script>";
        }
    }

    if(isset($_POST['update']))
    {
        $a_id = $_POST['a_id'];
        $a_user = $_POST['a_user'];
        $a_pass1 = $_POST['a_pass1'];
        $a_pass2 = $_POST['a_pass2'];
        $a_name = $_POST['a_name'];

        if($a_pass1 != $a_pass2)
        {
            array_push($errors, "The two passwords do not match");
        }

        if(count($errors) == 0)
        {
            $a_pass = $a_pass1;

            $sql = "UPDATE `eltr_admin`
            SET a_id = '$a_id',
                a_user = '$a_user',
                a_pass = '$a_pass',
                a_name = '$a_name'
            WHERE a_id = '$a_id'";
            $result = mysqli_query($con, $sql) or die ("Error in query: $sql" . mysqli_error());

            mysqli_close($con);
        
            if($result)
            {
                $_SESSION['success-update'] = "success";
                echo "<script type='text/javascript'>";
                echo "window.history.back();";
                echo "</script>";
            }
        }

        if($errors)
        {
            $_SESSION['error-pass'] = "error";
            echo "<script type='text/javascript'>";
            echo "window.history.back();";
            echo "</script>";
        }
    }

    if(isset($_POST['delete']))
    {
        $a_id = $_POST['a_id'];

        $sql = "DELETE FROM `eltr_admin` WHERE a_id = '$a_id'";
        $result = mysqli_query($con, $sql) or die ("Error in query: $sql" . mysqli_error());

        mysqli_close($con);

        if($result)
        {
            $_SESSION['success-delete'] = "success";
            echo "<script type='text/javascript'>";
            echo "window.history.back();";
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

    if(isset($_POST['mul_delete']))
    {
        if(count($_POST['ids']) > 0)
        {
            $all = implode(",", $_POST['ids']);
            
            $sql = "DELETE FROM `eltr_admin` WHERE a_id IN ($all)";
            $result = mysqli_query($con, $sql) or die ("Error in query: $sql" . mysqli_error());

            if($result)
            {
                $_SESSION['success-delete'] = "success";
                echo "<script type='text/javascript'>";
                echo "window.history.back();";
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
        else
        {
            $_SESSION['error-mul_delete'] = "error";
            echo "<script type='text/javascript'>";
            echo "window.history.back();";
            echo "</script>";
        }
    }
?>