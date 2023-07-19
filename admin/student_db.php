<?php
    SESSION_START();
    error_reporting(0);
    include("../condb.php");
    $errors = array();

    if(isset($_POST['add']))
    {
        $s_user = mysqli_real_escape_string($con, $_POST["s_user"]);
        $s_pass = mysqli_real_escape_string($con, $_POST["s_pass"]);
        $s_name = mysqli_real_escape_string($con, $_POST["s_name"]);
        $s_class = mysqli_real_escape_string($con, $_POST["s_class"]);
        $s_year = mysqli_real_escape_string($con, $_POST["s_year"]);

        $user_check = "SELECT * FROM `eltr_student` WHERE s_user = '$s_user'";
        $query = mysqli_query($con, $user_check);
        $result_check = mysqli_fetch_assoc($query);

        if($result_check)
        {
            if($result_check['s_user'] === $s_user)
            {
                array_push($errors, "รหัสนักศึกษานี้ลงทะเบียนไปแล้ว");
            }
        }

        if(count($errors) == 0)
        {
            $sql = "INSERT INTO `eltr_student`(s_user,s_pass,s_name,s_class,s_year)
            VALUES('$s_user','$s_pass','$s_name','$s_class','$s_year')";
            $result = mysqli_query($con, $sql) or die ("Error in query: $sql ".mysqli_error());
            
            if($result)
            {
                $_SESSION['success-add'] = "success";
                echo "<script type='text/javascript'>";
                echo "window.location='list_student';";
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
        $s_user_old = $_POST['s_user_old'];
        $s_user = $_POST['s_user'];
        $s_pass = $_POST['s_pass'];
        $s_name = $_POST['s_name'];
        $s_class = $_POST['s_class'];
        $s_year = $_POST['s_year'];

        if(count($errors) == 0)
        {
            $sql = "UPDATE `eltr_student`
            SET s_user = '$s_user',
                s_pass = '$s_pass',
                s_name = '$s_name',
                s_class = '$s_class',
                s_year = '$s_year'
            WHERE s_user = '$s_user_old'";
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

    if(isset($_POST['update-class']))
    {
        if(count($_POST['ids']) > 0)
        {
            $all = implode(",", $_POST['ids']);
            $s_class = $_POST['s_class'];

            $sql = "UPDATE `eltr_student`
            SET s_class = '$s_class'
            WHERE s_user IN ($all)";
            $result = mysqli_query($con, $sql) or die ("Error in query: $sql" . mysqli_error());

            mysqli_close($con);
        
            if($result)
            {
                $_SESSION['success-update'] = "success";
                echo "<script type='text/javascript'>";
                echo "window.history.back();";
                echo "</script>";
            }
            else
            {
                $_SESSION['error-mul_delete'] = "error";
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

    if(isset($_POST['update-year']))
    {
        if(count($_POST['ids']) > 0)
        {
            $all = implode(",", $_POST['ids']);
            $s_year = $_POST['s_year'];

            $sql = "UPDATE `eltr_student`
            SET s_year = '$s_year'
            WHERE s_user IN ($all)";
            $result = mysqli_query($con, $sql) or die ("Error in query: $sql" . mysqli_error());

            mysqli_close($con);
        
            if($result)
            {
                $_SESSION['success-update'] = "success";
                echo "<script type='text/javascript'>";
                echo "window.history.back();";
                echo "</script>";
            }
            else
            {
                $_SESSION['error-mul_delete'] = "error";
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

    if(isset($_POST['status']))
    {
        if(count($_POST['ids']) > 0)
        {
            $all = implode(",", $_POST['ids']);

            $sql = "UPDATE `eltr_student`
            SET s_status = '0'
            WHERE s_user IN ($all)";
            $result = mysqli_query($con, $sql) or die ("Error in query: $sql" . mysqli_error());

            mysqli_close($con);
        
            if($result)
            {
                $_SESSION['success-status'] = "success";
                echo "<script type='text/javascript'>";
                echo "window.history.back();";
                echo "</script>";
            }
            else
            {
                $_SESSION['error-mul_delete'] = "error";
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

    if(isset($_POST['delete']))
    {
        $s_user = $_POST['s_user'];

        $sql = "DELETE FROM `eltr_student` WHERE s_user = '$s_user'";
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
            
            $sql = "DELETE FROM `eltr_student` WHERE s_user IN ($all)";
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

    if(isset($_POST["upload"]))
    {
        require_once('php-excel-reader/excel_reader2.php');
        require_once('SpreadsheetReader.php');
        
        $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

        if(in_array($_FILES["file"]["type"],$allowedFileType)){

                $targetPath = 'uploads/'.$_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
                
                $Reader = new SpreadsheetReader($targetPath);
                
                $sheetCount = count($Reader->sheets());
                
                for($i = 0; $i < $sheetCount; $i++)
                {
                    $Reader->ChangeSheet($i);
                    
                    foreach ($Reader as $Row)
                    {
                
                        $s_user = "";//ฟิว 1
                        if(isset($Row[0])) {
                            $s_user = mysqli_real_escape_string($con, $Row[0]);
                        }//ฟิว 1
                        
                        $s_pass = "";//ฟิว 2
                        if(isset($Row[1])) {
                            $s_pass = mysqli_real_escape_string($con, $Row[1]);
                        }//ฟิว 2

                        $s_name = "";//ฟิว 3
                        if(isset($Row[2])) {
                            $s_name = mysqli_real_escape_string($con, $Row[2]);
                        }//ฟิว 3

                        $s_class = "";//ฟิว 4
                        if(isset($Row[3])) {
                            $s_class = mysqli_real_escape_string($con, $Row[3]);
                        }//ฟิว 4

                        $s_year = "";//ฟิว 5
                        if(isset($Row[4])) {
                            $s_year = mysqli_real_escape_string($con, $Row[4]);
                        }//ฟิว 5

                        if (!empty($s_user) || 
                            !empty($s_pass) ||
                            !empty($s_name) ||
                            !empty($s_class) ||
                            !empty($s_year)) {

                            $query = "insert into eltr_student
                                    (s_user,s_pass,s_name,s_class,s_year) 
                                    values('".$s_user."',
                                            '".$s_pass."',
                                            '".$s_name."',
                                            '".$s_class."',
                                            '".$s_year."')";
                            $result = mysqli_query($con, $query);
                        

                        
                            if (!empty($result))
                            {
                                $_SESSION['success-upload'] = "success";
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
                    }
                
                }
        }
        else
        { 
            $_SESSION['error-upload'] = "error";
            echo "<script type='text/javascript'>";
            echo "window.history.back();";
            echo "</script>";
        }
    }
?>