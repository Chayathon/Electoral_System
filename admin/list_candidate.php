<!DOCTYPE html>
<html lang="en">
<head>
    <title>จัดการผู้ลงสมัคร | Electoral System</title>
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
                                            <i class="fas fa-user-times" style="font-size: 2.25rem"></i>
                                            ผู้ลงสมัคร
                                        </h2>
                                    </div>
                                    &nbsp;
                                    <form class="was-validated" method="post" enctype="multipart/form-data" action="candidate_db">
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
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#clear_score">
                                                    <i class="fas fa-times-circle"></i>
                                                    ล้างคะแนนทั้งหมด
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
                                                            <h3 class="mb-0"><b>ลบข้อมูลผู้ลงสมัคร</b></h3><br>
                                                            <p class="mb-0">ยืนยันที่จะลบข้อมูลที่เลือก?</p>
                                                        </div>
                                                        <div class="modal-footer flex-nowrap p-0">
                                                            <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-1 border-end" data-bs-dismiss="modal">ยกเลิก</button>
                                                            <button type="submit" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-2 text-danger" name="mul_delete">ลบ</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="clear_score" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="clear_scoreLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-body p-4 text-center">
                                                            <h3 class="mb-0"><b>ล้างคะแนนของผู้ลงสมัคร</b></h3><br>
                                                            <p class="mb-0">ยืนยันที่จะล้างคะแนนทั้งหมด?</p>
                                                        </div>
                                                        <div class="modal-footer flex-nowrap p-0">
                                                            <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-1 border-end" data-bs-dismiss="modal">ยกเลิก</button>
                                                            <button type="submit" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-2 text-warning" name="clear_score">ล้าง</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2"></div>

                                        <!------------------------------------------------------------------ LIST ------------------------------------------------------------------>

                                        <?php
                                            include('../condb.php');

                                            $sql = "SELECT * FROM `eltr_candidate` WHERE c_number >= 1 ORDER BY 'c_number' ASC";
                                            $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
                                        ?>

                                        <table class="table table-hover" id="myTable">
                                            <thead>
                                                <tr class="table table-active" align="center">
                                                    <th>เลือก</th>
                                                    <th>เบอร์</th>
                                                    <th>รหัสนักศึกษา</th>
                                                    <th>ชื่อ-สกุล</th>
                                                    <th>ระดับชั้น</th>
                                                    <th>สาขาวิชา</th>
                                                    <th>ปีการศึกษา</th>
                                                    <th>คะแนน</th>
                                                    <th>ข้อมูล</th>
                                                    <th>จัดการ</th>
                                                </tr>
                                            </thead>
                                            <?php foreach($result as $row) { ?>
                                                <tr align="center">
                                                    <td>
                                                        <div>
                                                            <input type="checkbox" class="form-check-input" name="ids[]" value="<?php echo $row['c_number']; ?>">
                                                        </div>
                                                    </td>
                                                    <td><?php echo $row['c_number']; ?></td>
                                                    <td><?php echo $row['c_stdid']; ?></td>
                                                    <td><?php echo $row['c_name']; ?></td>
                                                    <td><?php echo $row['c_class']; ?></td>
                                                    <td><?php echo $row['c_major']; ?></td>
                                                    <td><?php echo $row['c_year']; ?></td>
                                                    <td><?php echo $row['c_score']; ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detail<?php echo $row['c_number'];?>">
                                                            <i class="fas fa-search"></i>
                                                            รายละเอียด
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <button type="button" class="btn btn-sm btn-warning" href="candidate_db.php?c_number=<?php echo $row['c_number'];?>" data-bs-toggle="modal" data-bs-target="#update<?php echo $row['c_number'];?>">
                                                                <font color="black">
                                                                    <i class="far fa-edit"></i>
                                                                    แก้ไข
                                                                </font>
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-danger" href="candidate_db.php?c_number=<?php echo $row['c_number'];?>" data-bs-toggle="modal" data-bs-target="#delete<?php echo $row['c_number'];?>">
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
                                                                <h3 class="mb-0"><b>เพิ่มข้อมูลผู้ลงสมัคร</b></h3><br>
                                                                <form class="form-floating was-validated" name="add" id="add" method="post" enctype="multipart/form-data" action="candidate_db.php">
                                                                    <div class="form-floating mb-2">
                                                                        <input type="text" class="form-control" name="c_number" id="c_number" maxlength="2" placeholder="เบอร์" required>
                                                                        <label for="c_number">เบอร์</label>
                                                                    </div>
                                                                    <div class="form-floating mb-2">
                                                                        <input type="text" class="form-control" name="c_stdid" id="c_stdid" maxlength="11" placeholder="รหัสนักศึกษา" required>
                                                                        <label for="c_stdid">รหัสนักศึกษา</label>
                                                                    </div>
                                                                    <div class="form-floating mb-2">
                                                                        <input type="text" class="form-control" name="c_name" id="c_name" placeholder="ชื่อ-สกุล" required>
                                                                        <label for="c_stdid">ชื่อ-สกุล</label>
                                                                    </div>
                                                                    <div class="form-floating mb-2">
                                                                        <input type="text" class="form-control" name="c_class" id="c_class" maxlength="5" placeholder="ระดับชั้น" required>
                                                                        <label for="c_stdid">ระดับชั้น</label>
                                                                    </div>
                                                                    <div class="form-floating mb-2">
                                                                        <input type="text" class="form-control" name="c_major" id="c_major" placeholder="สาขาวิชา" required>
                                                                        <label for="c_stdid">สาขาวิชา</label>
                                                                    </div>
                                                                    <div class="form-floating mb-2">
                                                                        <input type="text" class="form-control" name="c_year" id="c_year" maxlength="4" placeholder="ปีการศึกษา" required>
                                                                        <label for="c_stdid">ปีการศึกษา</label>
                                                                    </div>
                                                                    <div class="form-floating mb-2">
                                                                        <textarea class="form-control" name="c_policy" id="c_policy" placeholder="นโยบาย" style="height: 150px" required></textarea>
                                                                        <label for="c_stdid">นโยบาย</label>
                                                                        <div class="valid-feedback">กรณีต้องการขึ้นบรรทัดใหม่ให้ใส่ <b>"< br >"</b> หลังบรรทัด</div>
                                                                    </div>
                                                                    <div class="">
                                                                        <input class="form-control" type="file" name="c_img" id="c_img" required>
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

                                                <!------------------------------------------------------------------ DETAIL ------------------------------------------------------------------>

                                                <div class="modal fade" id="detail<?php echo $row['c_number'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="detailLabel<?php echo $row['c_number'];?>" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-body p-4 text-center">
                                                                <h3 class="mb-0"><b>ข้อมูลผู้ลงสมัคร</b></h3><br>
                                                                <div class="row">
                                                                    <div class="col-md-6" align="center">
                                                                        <b>รูปภาพ</b><br><br>
                                                                        <?php echo "<img src='img/policy/" .$row["c_img"]. "' width='300' >"; ?>
                                                                    </div>
                                                                    <div class="col-md-6" align="center">
                                                                        <b>นโยบาย</b><br><br>
                                                                        <p align="left"><?php echo $row['c_policy']; ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer flex-nowrap p-0">
                                                                <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-12 m-0 rounded-0" data-bs-dismiss="modal">ปิด</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!------------------------------------------------------------------ UPDATE ------------------------------------------------------------------>
                                                
                                                <div class="modal fade" id="update<?php echo $row['c_number'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateLabel<?php echo $row['c_number'];?>" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-body p-4 text-center">
                                                                <h3 class="mb-0"><b>แก้ไขข้อมูลผู้ลงสมัคร</b></h3><br>
                                                                <form class="form-floating was-validated" name="update" id="update" method="post" enctype="multipart/form-data" action="candidate_db.php">
                                                                    <div class="form-floating mb-2">
                                                                        <input type="text" class="form-control is-valid" name="c_number" id="c_number" maxlength="2" placeholder="เบอร์" value="<?php echo $row['c_number'];?>" required>
                                                                        <label for="c_number">เบอร์</label>
                                                                        <input class="form-control" type="hidden" name="c_number_old" id="c_number_old" value="<?php echo $row['c_number'];?>">
                                                                    </div>
                                                                    <div class="form-floating mb-2">
                                                                        <input type="text" class="form-control is-valid" name="c_stdid" id="c_stdid" maxlength="11" placeholder="รหัสนักศึกษา" value="<?php echo $row['c_stdid'];?>" required>
                                                                        <label for="c_stdid">รหัสนักศึกษา</label>
                                                                    </div>
                                                                    <div class="form-floating mb-2">
                                                                        <input type="text" class="form-control is-valid" name="c_name" id="c_name" placeholder="ชื่อ-สกุล" value="<?php echo $row['c_name'];?>" required>
                                                                        <label for="c_name">ชื่อ-สกุล</label>
                                                                    </div>
                                                                    <div class="form-floating mb-2">
                                                                        <input type="text" class="form-control is-valid" name="c_class" id="c_class" maxlength="5" placeholder="ระดับชั้น" value="<?php echo $row['c_class'];?>" required>
                                                                        <label for="c_class">ระดับชั้น</label>
                                                                    </div>
                                                                    <div class="form-floating mb-2">
                                                                        <input type="text" class="form-control is-valid" name="c_major" id="c_major" placeholder="สาขาวิชา" value="<?php echo $row['c_major'];?>" required>
                                                                        <label for="c_major">สาขาวิชา</label>
                                                                    </div>
                                                                    <div class="form-floating mb-2">
                                                                        <input type="text" class="form-control is-valid" name="c_year" id="c_year" maxlength="4" placeholder="ปีการศึกษา" value="<?php echo $row['c_year'];?>" required>
                                                                        <label for="c_year">ปีการศึกษา</label>
                                                                    </div>
                                                                    <div class="form-floating mb-4">
                                                                        <textarea class="form-control is-valid" name="c_policy" id="c_policy" placeholder="นโยบาย" style="height: 150px" required><?php echo $row['c_policy'];?></textarea>
                                                                        <label for="c_year">นโยบาย</label>
                                                                        <div class="valid-feedback">กรณีต้องการขึ้นบรรทัดใหม่ให้ใส่ <b>"< br >"</b> หลังบรรทัด</div>
                                                                    </div>
                                                                    <center><?php echo "<img src='img/policy/" .$row["c_img"]. "' width='200' >"; ?></center><br>
                                                                    <div class="">
                                                                        <input type="file" class="form-control" name="c_img" id="c_img" required>
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
                                            
                                            <div class="modal fade" id="delete<?php echo $row['c_number'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteLabel<?php echo $row['c_number'];?>" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-body p-4 text-center">
                                                            <h3 class="mb-0"><b>ลบข้อมูลผู้ลงสมัคร</b></h3><br>
                                                            <form class="form-horizontal" name="delete" id="delete" method="post" action="candidate_db.php">
                                                                <p>ยืนยันที่จะลบข้อมูล เบอร์ <b><?php echo $row['c_number']; ?> <?php echo $row['c_name'];?></b> ?</p>
                                                                <input class="form-control" type="hidden" name="c_number" id="c_number" value="<?php echo $row['c_number'];?>">
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
        elseif(isset($_SESSION['success-clear']))
        {
            echo "
                <script>
                Swal.fire({
                    icon: 'success',
                    title: 'เรียบร้อย!',
                    text: 'ล้างคะแนนเรียบร้อยแล้ว',
                    showConfirmButton: false,
                    timer: 2000
                })
                </script>
            ";
        }
        elseif(isset($_SESSION['error-num']))
        {
            echo "
                <script>
                Swal.fire({
                    icon: 'error',
                    title: 'ไม่สำเร็จ!',
                    text: 'เบอร์นี้ลงทะเบียนไปแล้ว',
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
        unset($_SESSION['success-add']);
        unset($_SESSION['success-update']);
        unset($_SESSION['success-delete']);
        unset($_SESSION['success-clear']);
        unset($_SESSION['error-std']);
        unset($_SESSION['error-num']);
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