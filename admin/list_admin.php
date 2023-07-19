<!DOCTYPE html>
<html lang="en">
<head>
    <title>จัดการผู้ดูแลระบบ | Electoral System</title>
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
                                            <i class="fas fa-user-cog" style="font-size: 2.25rem"></i>
                                            ผู้ดูแลระบบ
                                        </h2>
                                    </div>
                                    &nbsp;
                                    <form class="was-validated" method="post" action="admin_db">
                                        <div class="row">
                                            <div class="col-6 form-check">
                                                &ensp;
                                                <input type="checkbox" class="form-check-input" id="select_all">
                                                <label class="form-check-label" for="select_all">เลือกทั้งหมด</label>
                                            </div>

                                            <div class="col-6" align="right">
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#mul_delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                    ลบ
                                                </button>
                                                &nbsp;
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">
                                                    <i class="fas fa-user-plus"></i>
                                                    เพิ่มข้อมูล
                                                </button>
                                            </div>

                                            <div class="modal fade" id="mul_delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mul_deleteLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-body p-4 text-center">
                                                            <h3 class="mb-0"><b>ลบข้อมูลผู้ดูแลระบบ</b></h3><br>
                                                            <p class="mb-0">ยืนยันที่จะลบข้อมูลที่เลือก?</p>
                                                        </div>
                                                        <div class="modal-footer flex-nowrap p-0">
                                                            <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-1 border-end" data-bs-dismiss="modal">ยกเลิก</button>
                                                            <button type="submit" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-2 text-danger" name="mul_delete">ลบ</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2"></div>

                                        <!------------------------------------------------------------------ LIST ------------------------------------------------------------------>

                                        <?php
                                            include('../condb.php');

                                            $sql = "SELECT * FROM `eltr_admin` WHERE a_level LIKE 'admin' ORDER BY 'a_id' ASC";
                                            $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
                                        ?>

                                        <table class="table table-hover" id="myTable">
                                            <thead>
                                                <tr class="table table-active" align="center">
                                                    <th>เลือก</th>
                                                    <th>ไอดี</th>
                                                    <th>ชื่อผู้ใช้</th>
                                                    <th>รหัสผ่าน</th>
                                                    <th>ชื่อเล่น</th>
                                                    <th>จัดการ</th>
                                                </tr>
                                            </thead>
                                            <?php foreach($result as $row) { ?>
                                                <tr align="center">
                                                    <td>
                                                        <div>
                                                            <input type="checkbox" class="form-check-input" name="ids[]" value="<?php echo $row['a_id']; ?>">
                                                        </div>
                                                    </td>
                                                    <td><?php echo $row['a_id']; ?></td>
                                                    <td><?php echo $row['a_user']; ?></td>
                                                    <td><?php echo $row['a_pass']; ?></td>
                                                    <td><?php echo $row['a_name']; ?></td>
                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <button type="button" class="btn btn-sm btn-warning" href="admin_db.php?a_id=<?php echo $row['a_id'];?>" data-bs-toggle="modal" data-bs-target="#update<?php echo $row['a_id'];?>">
                                                                <font color="black">
                                                                    <i class="far fa-edit"></i>
                                                                    แก้ไข
                                                                </font>
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-danger" href="admin_db.php?a_id=<?php echo $row['a_id'];?>" data-bs-toggle="modal" data-bs-target="#delete<?php echo $row['a_id'];?>">
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
                                                                <h3 class="mb-0"><b>เพิ่มข้อมูลผู้ดูแลระบบ</b></h3><br>
                                                                <form class="form-floating was-validated" name="add" id="add" method="post" action="admin_db.php">
                                                                    <div class="form-floating mb-2">
                                                                        <input type="text" class="form-control" name="a_user" id="a_user" placeholder="ชื่อผู้ใช้" required>
                                                                        <label for="a_user">ชื่อผู้ใช้</label>
                                                                    </div>
                                                                    <div class="form-floating mb-2">
                                                                        <input type="password" class="form-control" name="a_pass1" id="a_pass1" placeholder="รหัสผ่าน" required>
                                                                        <label for="a_pass1">รหัสผ่าน</label>
                                                                    </div>
                                                                    <div class="form-floating mb-2">
                                                                        <input type="password" class="form-control" name="a_pass2" id="a_pass2" placeholder="ยืนยันรหัสผ่าน" required>
                                                                        <label for="a_pass2">ยืนยันรหัสผ่าน</label>
                                                                    </div>
                                                                    <div class="form-floating">
                                                                        <input type="text" class="form-control" name="a_name" id="a_name" placeholder="ชื่อเล่น" required>
                                                                        <label for="a_name">ชื่อเล่น</label>
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
                                                
                                                <div class="modal fade" id="update<?php echo $row['a_id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateLabel<?php echo $row['a_id'];?>" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-body p-4 text-center">
                                                                <h3 class="mb-0"><b>แก้ไขข้อมูลผู้ดูแลระบบ</b></h3><br>
                                                                <form class="form-floating was-validated" name="update" id="update" method="post" action="admin_db.php">
                                                                    <div class="form-floating mb-2">
                                                                        <input type="text" class="form-control is-valid" name="a_user" id="a_user" placeholder="ชื่อผู้ใช้" value="<?php echo $row['a_user'];?>" required>
                                                                        <label for="a_user">ชื่อผู้ใช้</label>
                                                                        <input class="form-control" type="hidden" name="a_id" id="a_id" value="<?php echo $row['a_id'];?>">
                                                                    </div>
                                                                    <div class="form-floating mb-2">
                                                                        <input type="password" class="form-control is-valid" name="a_pass1" id="a_pass1" placeholder="รหัสผ่าน" value="<?php echo $row['a_pass'];?>" required>
                                                                        <label for="a_pass1">รหัสผ่าน</label>
                                                                    </div>
                                                                    <div class="form-floating mb-2">
                                                                        <input type="password" class="form-control is-valid" name="a_pass2" id="a_pass2" placeholder="ยืนยันรหัสผ่าน" value="<?php echo $row['a_pass'];?>" required>
                                                                        <label for="a_pass2">ยืนยันรหัสผ่าน</label>
                                                                    </div>
                                                                    <div class="form-floating">
                                                                        <input type="text" class="form-control is-valid" name="a_name" id="a_name" placeholder="ชื่อเล่น" value="<?php echo $row['a_name'];?>" required>
                                                                        <label for="a_name">ชื่อเล่น</label>
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
                                                
                                                <div class="modal fade" id="delete<?php echo $row['a_id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteLabel<?php echo $row['a_id'];?>" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-body p-4 text-center">
                                                                <h3 class="mb-0"><b>ลบข้อมูลผู้ดูแลระบบ</b></h3><br>
                                                                <form class="form-horizontal" name="delete" id="delete" method="post" action="admin_db.php">
                                                                    <p class="mb-0">ยืนยันที่จะลบข้อมูล <b><?php echo $row['a_name'];?></b> ?</p>
                                                                    <input class="form-control" type="hidden" name="a_id" id="a_id" value="<?php echo $row['a_id'];?>">
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
        elseif(isset($_SESSION['error-name']))
        {
            echo "
                <script>
                Swal.fire({
                    icon: 'error',
                    title: 'ไม่สำเร็จ!',
                    text: 'ชื่อผู้ใช้นี้ลงทะเบียนไปแล้ว',
                    showConfirmButton: false,
                    timer: 2000
                })
                </script>
            ";
        }
        elseif(isset($_SESSION['error-pass']))
        {
            echo "
                <script>
                Swal.fire({
                    icon: 'error',
                    title: 'ไม่สำเร็จ!',
                    text: 'รหัสผ่านไม่ตรงกัน',
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
        unset($_SESSION['success-add']);
        unset($_SESSION['success-update']);
        unset($_SESSION['success-delete']);
        unset($_SESSION['error-name']);
        unset($_SESSION['error-pass']);
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