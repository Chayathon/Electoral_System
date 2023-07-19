<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="admin/css/fontawesome.min.css">
    <link rel="icon" href="img/logo/logo.png">
    <title>Electoral System</title>
</head>
<body background="img/background/bg1.jpg">
    <?php SESSION_START(); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <center>
                    <p>
                        <div class="row">
                            <div class="col-md-9" align="right"></div>
                            <div class="col-md-1"></div>
                            <div class="col-md-2" align="right">
                                <button type="button" class="btn btn-large btn-warning" data-bs-toggle="modal" data-bs-target="#login-admin">
                                    <i class="fas fa-user-cog"></i> ผู้ดูแลระบบ
                                </button>
                            </div>
                        </div>
                    </p>
                    <div class="row">
                            <div class="col-md-6 center">
                                <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded" style="background-color: #D0D0D0;">
                                    <form class="form-floating was-validated" name="login" id="login" method="post" action="login_db.php">
                                        <h1 class="mb-0"><b>เข้าสู่ระบบ</b></h1><br>
                                        <div class="form-floating mb-2">
                                            <input type="text" class="form-control" name="user" id="user" maxlength="11" placeholder="รหัสประจำตัว" required>
                                            <label for="user">รหัสประจำตัวนักศึกษา</label>
                                            <div class="invalid-feedback" align="left">
                                                * รหัสประจำตัวนักศึกษา
                                            </div>
                                        </div>
                                        <div class="form-floating">
                                            <input type="password" class="form-control" name="pass" id="pass" maxlength="10" placeholder="วัน/เดือน/ปี เกิด" required>
                                            <label for="pass">วัน/เดือน/ปี เกิด</label>
                                            <div class="invalid-feedback" align="left">
                                                * วัน/เดือน/ปี เกิด (เช่น "01/01/2540")
                                            </div>
                                        </div>
                                        &nbsp;
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-dark btn-lg" name="login"><i class="fas fa-sign-in-alt align-middle" style="font-size: 1.5rem"></i>&ensp;เข้าสู่ระบบ</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="login-admin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="login-adminLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body p-4 text-center">
                                    <h3 class="mb-0"><b>ผู้ดูแลระบบ</b></h3><br>
                                    <img src="img/logo/admin.png" width="40%">
                                    <p></p>
                                    <form class="form-floating was-validated" name="login" id="login" method="post" action="login_admin_db.php">
                                        <div class="form-floating mb-2">
                                            <input type="text" class="form-control" name="user" id="user" placeholder="ชื่อผู้ใช้" required>
                                            <label for="user">ชื่อผู้ใช้</label>
                                        </div>
                                        <div class="form-floating">
                                            <input type="password" class="form-control" name="pass" id="pass" placeholder="รหัสผ่าน" required>
                                            <label for="user">รหัสผ่าน</label>
                                        </div>
                                </div>
                                        <div class="modal-footer flex-nowrap p-0">
                                            <button type="button" class="btn btn-lg btn-link text-secondary fs-6 text-decoration-none col-6 m-0 rounded-1 border-end" data-bs-dismiss="modal">ยกเลิก</button>
                                            <button type="submit" class="btn btn-lg btn-link text-success fs-6 text-decoration-none col-6 m-0 rounded-2" name="login">ยืนยัน</button>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </center>
            </div>
        </div>
    </div>

    <?php
        echo '
        <script src="js/jquery-3.6.1.min.js"></script>
        <script src="js/sweetalert2.all.min.js"></script>
        <link rel="stylesheet" href="css/sweetalert2.min.css">
        ';

        if(isset($_SESSION['login-error']))
        {
            echo "
                <script>
                Swal.fire({
                    icon: 'error',
                    title: 'ไม่สำเร็จ!',
                    text: 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง',
                    showConfirmButton: false,
                    timer: 2500
                })
                </script>
            ";
        }
        elseif(isset($_SESSION['logout']))
        {
            echo "
                <script>
                Swal.fire({
                    icon: 'success',
                    title: 'สำเร็จ!',
                    text: 'ออกจากระบบเรียบร้อยแล้ว',
                    showConfirmButton: false,
                    timer: 2000
                })
                </script>
            ";
            SESSION_DESTROY();
        }
        elseif(isset($_SESSION['error-path']))
        {
            echo "
                <script>
                Swal.fire({
                    icon: 'error',
                    title: 'ไม่สำเร็จ!',
                    text: 'กรุณากรอกชื่อผู้ใช้หรือรหัสผ่าน',
                    showConfirmButton: false,
                    timer: 2500
                })
                </script>
            ";
            SESSION_DESTROY();
        }
        unset($_SESSION['login-error']);
    ?>

    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>