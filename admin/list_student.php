<!DOCTYPE html>
<html lang="en">
<head>
    <title>จัดการนักเรียน/นักศึกษา | Electoral System</title>
    <?php include("head_admin.php"); ?>
    <link rel="stylesheet" href="css/datatables.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/custom.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include("navbar.php"); ?>
        <?php include('sidebar.php'); ?>

        <div class="content-wrapper pt-3">
            <div class="content">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-lg-12">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row">
                                        <h2>
                                            <i class="fas fa-user-graduate" style="font-size: 2.25rem"></i>
                                            นักเรียน/นักศึกษา
                                        </h2>
                                    </div>
                                    &nbsp;
                                    <form class="form-horizontal was-validated" enctype="multipart/form-data" method="post" action="student_db">
                                        <div class="row">
                                            <div class="col-3 form-check">
                                                &ensp;
                                                <input type="checkbox" class="form-check-input" id="select_all">
                                                <label class="form-check-label" for="select_all">เลือกทั้งหมด</label>
                                            </div>

                                            <div class="col-9" align="right">
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#mul_delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                    ลบ
                                                </button>
                                                &nbsp;
                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#status">
                                                        <i class="fas fa-times-circle"></i>
                                                        ล้างสถานะ
                                                    </button>
                                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#update-class">
                                                        <i class="fas fa-user-edit"></i>
                                                        แก้ไขห้อง
                                                    </button>
                                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#update-year">
                                                        <i class="fas fa-user-edit"></i>
                                                        แก้ไขปีการศึกษา
                                                    </button>
                                                </div>
                                                &nbsp;
                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">
                                                        <i class="fas fa-user-plus"></i>
                                                        เพิ่มข้อมูล
                                                    </button>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#upload">
                                                        <i class="fas fa-upload"></i>
                                                        อัปโหลด
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="mul_delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mul_deleteLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-body p-4 text-center">
                                                            <h3 class="mb-0"><b>ลบข้อมูลนักเรียน/นักศึกษา</b></h3><br>
                                                            <p class="mb-0">ยืนยันที่จะลบข้อมูลที่เลือก?</p>
                                                        </div>
                                                        <div class="modal-footer flex-nowrap p-0">
                                                            <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-1 border-end" data-bs-dismiss="modal">ยกเลิก</button>
                                                            <button type="submit" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-2 text-danger" name="mul_delete">ลบ</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="status" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statusLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-body p-4 text-center">
                                                            <h3 class="mb-0"><b>ล้างสถานะการลงคะแนน</b></h3><br>
                                                            <p class="mb-0">ยืนยันที่จะล้างสถานะ?</p>
                                                        </div>
                                                        <div class="modal-footer flex-nowrap p-0">
                                                            <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-1 border-end" data-bs-dismiss="modal">ยกเลิก</button>
                                                            <button type="submit" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-2 text-warning" name="status">ล้างสถานะ</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="update-class" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="update-classLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-body p-4 text-center">
                                                            <h3 class="mb-0"><b>แก้ไขข้อมูลนักเรียน/นักศึกษา</b></h3><br>
                                                            <div class="mb-2" align="left">
                                                                <input type="text" class="form-control" name="s_class" id="s_class" placeholder="ห้อง">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer flex-nowrap p-0">
                                                            <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-1 border-end" data-bs-dismiss="modal">ยกเลิก</button>
                                                            <button type="submit" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-2 text-warning" name="update-class">แก้ไข</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="update-year" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="update-yearLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-body p-4 text-center">
                                                            <h3 class="mb-0"><b>แก้ไขข้อมูลนักเรียน/นักศึกษา</b></h3><br>
                                                            <div class="mb-2" align="left">
                                                                <input type="text" class="form-control" name="s_year" id="s_year" placeholder="ปีการศึกษา">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer flex-nowrap p-0">
                                                            <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-1 border-end" data-bs-dismiss="modal">ยกเลิก</button>
                                                            <button type="submit" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-2 text-warning" name="update-year">แก้ไข</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="upload" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="uploadLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-body p-4 text-center">
                                                            <h3 class="mb-0"><b>อัปโหลดข้อมูลนักเรียน/นักศึกษา</b></h3><br>
                                                            <div class="">
                                                                <input class="form-control" type="file" name="file" id="file" accept=".xls, .xlsx">
                                                                <div class="invalid-feedback">ไฟล์ .xls, .xlsx</div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer flex-nowrap p-0">
                                                            <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-1 border-end" data-bs-dismiss="modal">ยกเลิก</button>
                                                            <button type="submit" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-2 text-success" name="upload">อัปโหลด</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2"></div>

                                    <!------------------------------------------------------------------ LIST ------------------------------------------------------------------>

                                        <?php
                                            include('../condb.php');

                                            $sql = "SELECT * FROM `eltr_student` ORDER BY 's_user' ASC";
                                            $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
                                        ?>

                                        <table class="table table-hover" id="myTable">
                                            <thead>
                                                <tr class="table table-active" align="center">
                                                    <th>เลือก</th>
                                                    <th>รหัสนักศึกษา</th>
                                                    <th>วัน/เดือน/ปี เกิด</th>
                                                    <th>ชื่อ-สกุล</th>
                                                    <th>ห้อง</th>
                                                    <th>ปีการศึกษา</th>
                                                    <th>สถานะ</th>
                                                    <th>จัดการ</th>
                                                </tr>
                                            </thead>
                                            <?php foreach($result as $row) { ?>
                                                <tr align="center">
                                                    <td>
                                                        <div>
                                                            <input type="checkbox" class="form-check-input" name="ids[]" value="<?php echo $row['s_user']; ?>">
                                                        </div>
                                                    </td>
                                                    <td><?php echo $row['s_user']; ?></td>
                                                    <td><?php echo $row['s_pass']; ?></td>
                                                    <td><?php echo $row['s_name']; ?></td>
                                                    <td><?php echo $row['s_class']; ?></td>
                                                    <td><?php echo $row['s_year']; ?></td>
                                                    <td>
                                                        <?php
                                                            if($row['s_status'] == 0)
                                                            {
                                                                echo "<img src='../img//logo/incorrect.png' width='21'>";
                                                            }
                                                            elseif($row['s_status'] == 1)
                                                            {
                                                                echo "<img src='../img//logo/correct.png' width='21'>";
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <button type="button" class="btn btn-sm btn-warning" href="student_db.php?s_user=<?php echo $row['s_user'];?>" data-bs-toggle="modal" data-bs-target="#update<?php echo $row['s_user'];?>">
                                                                <font color="black">
                                                                    <i class="far fa-edit"></i>
                                                                    แก้ไข
                                                                </font>
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-danger" href="student_db.php?s_user=<?php echo $row['s_user'];?>" data-bs-toggle="modal" data-bs-target="#delete<?php echo $row['s_user'];?>">
                                                                <font color="black">
                                                                    <i class="far fa-trash-alt"></i>
                                                                    ลบ
                                                                </font>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                    </form>

                                        <!-------------------------------------------------------------------- ADD -------------------------------------------------------------------->

                                            <div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-body p-4 text-center">
                                                            <h3 class="mb-0"><b>เพิ่มข้อมูลนักเรียน/นักศึกษา</b></h3><br>
                                                            <form class="form-floating was-validated" name="add" id="add" method="post" action="student_db.php">
                                                                <div class="form-floating mb-2">
                                                                    <input type="text" class="form-control" name="s_user" id="s_user" maxlength="11" placeholder="รหัสนักศึกษา" required>
                                                                    <label for="s_user">รหัสนักศึกษา</label>
                                                                </div>
                                                                <div class="form-floating mb-2">
                                                                    <input type="text" class="form-control" name="s_pass" id="s_pass" maxlength="10" placeholder="วัน/เดือน/ปี เกิด" required>
                                                                    <label for="s_pass">วัน/เดือน/ปี เกิด</label>
                                                                </div>
                                                                <div class="form-floating mb-2">
                                                                    <input type="text" class="form-control" name="s_name" id="s_name" placeholder="ชื่อ-สกุล" required>
                                                                    <label for="s_name">ชื่อ-สกุล</label>
                                                                </div>
                                                                <div class="form-floating mb-2">
                                                                    <input type="text" class="form-control" name="s_class" id="s_class" maxlength="7" placeholder="ห้อง" required>
                                                                    <label for="s_class">ห้อง</label>
                                                                </div>
                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control" name="s_year" id="s_year" maxlength="4" placeholder="ปีกาารศึกษา" required>
                                                                    <label for="s_year">ปีกาารศึกษา</label>
                                                                </div>
                                                        </div>
                                                                <div class="modal-footer flex-nowrap p-0">
                                                                    <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-1 border-end" data-bs-dismiss="modal">ยกเลิก</button>
                                                                    <button type="submit" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-2 text-success" name="add">เพิ่ม</button>
                                                                </div>
                                                            </form>
                                                    </div>
                                                </div>
                                            </div>

                                        <!------------------------------------------------------------------ UPDATE ------------------------------------------------------------------>
                                            
                                            <div class="modal fade" id="update<?php echo $row['s_user'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateLabel<?php echo $row['s_user'];?>" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-body p-4 text-center">
                                                            <h3 class="mb-0"><b>แก้ไขข้อมูลนักเรียน/นักศึกษา</b></h3><br>
                                                            <form class="form-floating was-validated" name="update" id="update" method="post" action="student_db.php">
                                                                <div class="form-floating mb-2" align="left">
                                                                    <input type="text" class="form-control is-valid" name="s_user" id="s_user" maxlength="11" placeholder="รหัสนักศึกษา" value="<?php echo $row['s_user'];?>" required>
                                                                    <label for="s_user">รหัสนักศึกษา</label>
                                                                    <input class="form-control" type="hidden" name="s_user_old" id="s_user_old" value="<?php echo $row['s_user'];?>">
                                                                </div>
                                                                <div class="form-floating mb-2" align="left">
                                                                    <input type="text" class="form-control is-valid" name="s_pass" id="s_pass" maxlength="10" placeholder="วัน/เดือน/ปี เกิด" value="<?php echo $row['s_pass'];?>" required>
                                                                    <label for="s_pass">วัน/เดือน/ปี เกิด</label>
                                                                </div>
                                                                <div class="form-floating mb-2" align="left">
                                                                    <input type="text" class="form-control is-valid" name="s_name" id="s_name" placeholder="ชื่อ-สกุล" value="<?php echo $row['s_name'];?>" required>
                                                                    <label for="s_name">ชื่อ-สกุล</label>
                                                                </div>
                                                                <div class="form-floating mb-2" align="left">
                                                                    <input type="text" class="form-control is-valid" name="s_class" id="s_class" maxlength="7" placeholder="ห้อง" value="<?php echo $row['s_class'];?>" required>
                                                                    <label for="s_class">ห้อง</label>
                                                                </div>
                                                                <div class="form-floating" align="left">
                                                                    <input type="text" class="form-control is-valid" name="s_year" id="s_year" maxlength="4" placeholder="ปีการศึกษา" value="<?php echo $row['s_year'];?>" required>
                                                                    <label for="s_year">ปีการศึกษา</label>
                                                                </div>
                                                        </div>
                                                                <div class="modal-footer flex-nowrap p-0">
                                                                    <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-1 border-end" data-bs-dismiss="modal">ยกเลิก</button>
                                                                    <button type="submit" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-2 text-warning" name="update">แก้ไข</button>
                                                                </div>
                                                            </form>
                                                    </div>
                                                </div>
                                            </div>

                                        <!------------------------------------------------------------------ DELETE ------------------------------------------------------------------>
                                            
                                            <div class="modal fade" id="delete<?php echo $row['s_user'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteLabel<?php echo $row['s_user'];?>" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-body p-4 text-center">
                                                            <h3 class="mb-0"><b>ลบข้อมูลนักเรียน/นักศึกษา</b></h3><br>
                                                            <form class="form-horizontal" name="delete" id="delete" method="post" action="student_db.php">
                                                                <p>ยืนยันที่จะลบข้อมูลนักศึกษา <b><?php echo $row['s_name'];?></b> ?</p>
                                                                <input class="form-control" type="hidden" name="s_user" id="s_user" value="<?php echo $row['s_user'];?>">
                                                        </div>
                                                                <div class="modal-footer flex-nowrap p-0">
                                                                    <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-1 border-end" data-bs-dismiss="modal">ยกเลิก</button>
                                                                    <button type="submit" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-2 text-danger" name="delete">ลบ</button>
                                                                </div>
                                                            </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#select_all').on('click', function() {
                if(this.checked) {
                    $('.form-check-input').each(function() {
                        this.checked = true;
                    })
                } else {
                    $('.form-check-input').each(function() {
                        this.checked = false;
                    })
                }
            })
            $('.form-check-input').on('click', function() {
                if($('.form-check-input:checked').length == $('.form-check-input').length) {
                    $('#select_all').prop('checked', true);
                } else {
                    $('#select_all').prop('checked', false);
                }
            })
        })
    </script>

    <?php
        echo '
        <script src="../js/jquery-3.6.1.min.js"></script>
        <script src="../js/sweetalert2.all.min.js"></script>
        <link rel="stylesheet" href="../css/sweetalert2.min.css">
        ';

        if(isset($_SESSION['success-add']))
        {
            echo "
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'เรียบร้อย!',
                        text: 'เพิ่มข้อมูลเรียบร้อยแล้ว',
                        showConfirmButton: false,
                        timer: 2000
                    })
                </script>
            ";
        }
        elseif(isset($_SESSION['success-update']))
        {
            echo "
                <script>
                Swal.fire({
                    icon: 'success',
                    title: 'เรียบร้อย!',
                    text: 'แก้ไขข้อมูลเรียบร้อยแล้ว',
                    showConfirmButton: false,
                    timer: 2000
                })
                </script>
            ";
        }
        elseif(isset($_SESSION['success-delete']))
        {
            echo "
                <script>
                Swal.fire({
                    icon: 'success',
                    title: 'เรียบร้อย!',
                    text: 'ลบข้อมูลเรียบร้อยแล้ว',
                    showConfirmButton: false,
                    timer: 2000
                })
                </script>
            ";
        }
        elseif(isset($_SESSION['success-status']))
        {
            echo "
                <script>
                Swal.fire({
                    icon: 'success',
                    title: 'เรียบร้อย!',
                    text: 'ล้างสถานะเรียบร้อยแล้ว',
                    showConfirmButton: false,
                    timer: 2000
                })
                </script>
            ";
        }
        elseif(isset($_SESSION['success-upload']))
        {
            echo "
                <script>
                Swal.fire({
                    icon: 'success',
                    title: 'เรียบร้อย!',
                    text: 'อัปโหลดไฟล์เรียบร้อยแล้ว',
                    showConfirmButton: false,
                    timer: 2000
                })
                </script>
            ";
        }
        elseif(isset($_SESSION['error-std']))
        {
            echo "
                <script>
                Swal.fire({
                    icon: 'error',
                    title: 'ไม่สำเร็จ!',
                    text: 'รหัสนักศึกษานี้ลงทะเบียนไปแล้ว',
                    showConfirmButton: false,
                    timer: 2000
                })
                </script>
            ";
        }
        elseif(isset($_SESSION['error-mul_delete']))
        {
            echo "
                <script>
                Swal.fire({
                    icon: 'error',
                    title: 'ไม่สำเร็จ!',
                    text: 'กรุณาเลือกข้อมูล',
                    showConfirmButton: false,
                    timer: 2000
                })
                </script>
            ";
        }
        elseif(isset($_SESSION['error-upload']))
        {
            echo "
                <script>
                Swal.fire({
                    icon: 'error',
                    title: 'ไม่สำเร็จ!',
                    text: 'กรุณาอัปโหลดไฟล์ Excel',
                    showConfirmButton: false,
                    timer: 2000
                })
                </script>
            ";
        }
        elseif(isset($_SESSION['error']))
        {
            echo "
                <script>
                Swal.fire({
                    icon: 'error',
                    title: 'ไม่สำเร็จ!',
                    showConfirmButton: false,
                    timer: 2000
                })
                </script>
            ";
        }
        unset($_SESSION['success-add']);
        unset($_SESSION['success-update']);
        unset($_SESSION['success-delete']);
        unset($_SESSION['success-status']);
        unset($_SESSION['success-upload']);
        unset($_SESSION['error-std']);
        unset($_SESSION['error-mul_delete']);
        unset($_SESSION['error-upload']);
        unset($_SESSION['error']);
    ?>
    
    <script src="../js/jquery-3.6.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="js/datatables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
</body>
</html>