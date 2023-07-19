<?php
    SESSION_START();
    error_reporting(0);
    include("../condb.php");
    $errors = array();

    if(isset($_POST['add']))
    {
        $c_number = mysqli_real_escape_string($con, $_POST["c_number"]);
        $c_stdid = mysqli_real_escape_string($con, $_POST["c_stdid"]);
        $c_name = mysqli_real_escape_string($con, $_POST["c_name"]);
        $c_class = mysqli_real_escape_string($con, $_POST["c_class"]);
        $c_major = mysqli_real_escape_string($con, $_POST["c_major"]);
        $c_year = mysqli_real_escape_string($con, $_POST["c_year"]);
        $c_policy = mysqli_real_escape_string($con, $_POST["c_policy"]);
        $c_img = (isset($_POST['c_img']) ? $_POST['c_img']: '');

        $user_check = "SELECT * FROM `eltr_candidate` WHERE c_stdid = '$c_stdid'";
        $query = mysqli_query($con, $user_check);
        $result_check = mysqli_fetch_assoc($query);

        if($result_check)
        {
            if($result_check['c_stdid'] === $c_stdid)
            {
                array_push($errors, "รหัสนักศึกษานี้ลงทะเบียนไปแล้ว");
            }
        }

        if(count($errors) == 0)
        {
            $numrand = (mt_rand());
            $upload = $_FILES["c_img"];
            
            if($upload != '')
            {
                $path = "img/policy/";
                $type = strrchr($_FILES["c_img"]["name"], ".");
                $newname = "policy".$numrand.$type;
                $path_copy = $path.$newname;
                $path_link = "c_img/".$newname;

                move_uploaded_file($_FILES["c_img"]["tmp_name"],$path_copy);
            }

            $sql = "INSERT INTO `eltr_candidate`(c_number,c_stdid,c_name,c_class,c_major,c_year,c_policy,c_img)
            VALUES('$c_number','$c_stdid','$c_name','$c_class','$c_major','$c_year','$c_policy','$newname')";
            $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
            
            if($result)
            {
                $_SESSION['success-add'] = "success";
                echo "<script type='text/javascript'>";
                echo "window.location='list_candidate';";
                echo "</script>";
            }
        }

        if($result_check)
        {
            $_SESSION['error-std'] = "error";
            echo "<script type='text/javascript'>";
            echo "window.history.back();";
            echo "</script>";
        }
    }

    if(isset($_POST['update']))
    {
        $c_number_old = $_POST['c_number_old'];
        $c_number = $_POST['c_number'];
        $c_stdid = $_POST['c_stdid'];
        $c_name = $_POST['c_name'];
        $c_class = $_POST['c_class'];
        $c_major = $_POST['c_major'];
        $c_year = $_POST['c_year'];
        $c_policy = $_POST['c_policy'];
        $c_img = (isset($_POST['c_img']) ? $_POST['c_img']: '');

        if(count($errors) == 0)
        {
            $numrand = (mt_rand());
            $upload = $_FILES["c_img"];
            
            if($upload != '')
            {
                $path = "img/policy/";
                $type = strrchr($_FILES["c_img"]["name"], ".");
                $newname = "policy".$numrand.$type;
                $path_copy = $path.$newname;
                $path_link = "c_img/".$newname;

                move_uploaded_file($_FILES["c_img"]["tmp_name"],$path_copy);
            }

            $sql = "UPDATE `eltr_candidate`
            SET c_number = '$c_number',
                c_stdid = '$c_stdid',
                c_name = '$c_name',
                c_class = '$c_class',
                c_major = '$c_major',
                c_year = '$c_year',
                c_policy = '$c_policy',
                c_img = '$newname'
            WHERE c_number = '$c_number_old'";
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
            $_SESSION['error'] = "error";
            echo "<script type='text/javascript'>";
            echo "window.history.back();";
            echo "</script>";
        }
    }

    if(isset($_POST['clear_score']))
    {
        
        $sql = "UPDATE `eltr_candidate`
        SET c_score = 0";
        $result = mysqli_query($con, $sql) or die ("Error in query: $sql" . mysqli_error());

        if($result)
        {
            $_SESSION['success-clear'] = "success";
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

    if(isset($_POST['delete']))
    {
        $c_number = $_POST['c_number'];

        $sql = "DELETE FROM `eltr_candidate` WHERE c_number = '$c_number'";
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
            
            $sql = "DELETE FROM `eltr_candidate` WHERE c_number IN ($all)";
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