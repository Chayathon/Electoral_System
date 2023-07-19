<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        SESSION_START();
        include("../condb.php");

        if(!isset($_SESSION['ID']))
        {
            $_SESSION['error-path'] = "error";
            HEADER('Location: ../index');
        }

        $ID = $_SESSION['ID'];

        $sql_name = "SELECT * FROM `eltr_admin` WHERE a_id = '$ID'";
        $result_name = mysqli_query($con,$sql_name) or die ("Error in query: $sql_name" . mysqli_error());
    
        while($row = mysqli_fetch_array($result_name))
        {
            $name = $row['a_name'];
        }
    ?>
</head>
<body>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="home" class="brand-link">
            <img src="../img/logo/logo.png" alt="Logo" class="brand-image elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Electoral System</span>
        </a>
        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a href="list_admin" class="d-block">
                        <i class="fas fa-user-circle align-text-top" style="font-size: 1.5rem"></i>
                        &nbsp;<?php echo $name; ?>
                    </a>
                </div>
            </div>

            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="ค้นหา..." aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="list_admin" class="nav-link">
                            <i class="fas fa-user-cog" style="font-size: 1.25rem"></i>
                            &nbsp;
                            <p>
                                จัดการผู้ดูแลระบบ
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="list_student" class="nav-link">
                            <i class="fas fa-user-graduate" style="font-size: 1.25rem"></i>
                            &nbsp;
                            <p>
                                จัดการนักเรียน/นักศึกษา
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="list_candidate" class="nav-link">
                            <i class="fas fa-user-times" style="font-size: 1.25rem"></i>
                            &nbsp;
                            <p>
                                จัดการผู้ลงสมัคร
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
</body>
</html>