<!DOCTYPE html>
<html lang="en">
<head>
    <title>นักเรียน/นักศึกษาที่ลงคะแนนแล้ว | Electoral System</title>
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
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-fill-check align-text-top" viewBox="0 0 16 16">
                                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
                                            </svg>
                                            นักเรียน/นักศึกษาที่ลงคะแนนแล้ว
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
                                        <div class="mb-2"></div>

                                    <!------------------------------------------------------------------ LIST ------------------------------------------------------------------>

                                        <?php
                                            include('../condb.php');

                                            $sql = "SELECT * FROM `eltr_student` WHERE s_status LIKE '1' ORDER BY 's_user' ASC";
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

                                        <!------------------------------------------------------------------ UPDATE ------------------------------------------------------------------>
                                            
                                            <div class="modal fade" id="update<?php echo $row['s_user'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateLabel<?php echo $row['s_user'];?>" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-body p-4 text-center">
                                                            <h3 class="mb-0"><b>แก้ไขข้อมูลนักเรียน/นักศึกษา</b></h3><br>
                                                            <form class="form-floating was-validated" name="update" id="update" method="post" action="student_db.php">
                                                                <div class="form-floating mb-2" align="left">
                                                                    <input type="text" class="form-control is-valid" name="s_user" id="s_user" placeholder="รหัสนักศึกษา" value="<?php echo $row['s_user'];?>" required>
                                                                    <label for="s_user">รหัสนักศึกษา</label>
                                                                    <input class="form-control" type="hidden" name="s_user_old" id="s_user_old" value="<?php echo $row['s_user'];?>">
                                                                </div>
                                                                <div class="form-floating mb-2" align="left">
                                                                    <input type="text" class="form-control is-valid" name="s_pass" id="s_pass" placeholder="วัน/เดือน/ปี เกิด" value="<?php echo $row['s_pass'];?>" required>
                                                                    <label for="s_pass">วัน/เดือน/ปี เกิด</label>
                                                                </div>
                                                                <div class="form-floating mb-2" align="left">
                                                                    <input type="text" class="form-control is-valid" name="s_name" id="s_name" placeholder="ชื่อ-สกุล" value="<?php echo $row['s_name'];?>" required>
                                                                    <label for="s_name">ชื่อ-สกุล</label>
                                                                </div>
                                                                <div class="form-floating mb-2" align="left">
                                                                    <input type="text" class="form-control is-valid" name="s_class" id="s_class" placeholder="ห้อง" value="<?php echo $row['s_class'];?>" required>
                                                                    <label for="s_class">ห้อง</label>
                                                                </div>
                                                                <div class="form-floating" align="left">
                                                                    <input type="text" class="form-control is-valid" name="s_year" id="s_year" placeholder="ปีการศึกษา" value="<?php echo $row['s_year'];?>" required>
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

        if(isset($_SESSION['success-update']))
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
        unset($_SESSION['success-update']);
        unset($_SESSION['success-delete']);
        unset($_SESSION['success-status']);
        unset($_SESSION['error-std']);
        unset($_SESSION['error-mul_delete']);
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