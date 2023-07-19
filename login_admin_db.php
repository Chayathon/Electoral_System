<?php
    SESSION_START();
    include("condb.php");

    if(isset($_POST['login']))
    {
        $user = mysqli_real_escape_string($con, $_POST['user']);
        $pass = mysqli_real_escape_string($con, $_POST['pass']);

        $sql = "SELECT * FROM `eltr_admin` WHERE a_user LIKE '$user' AND a_pass LIKE '$pass'";
        $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

        if(mysqli_num_rows($result))
        {
            $row = mysqli_fetch_array($result);
            $_SESSION["ID"] = $row["a_id"];
            $_SESSION["username"] = $row["a_name"];
            $_SESSION["success"] = "success";
        
            header("location: admin/home");
        }
        else
        {
            $_SESSION['login-error'] = "error";
            echo "<script type='text/javascript'>";
            echo "window.history.back();";
            echo "</script>";
        }
    }
?>