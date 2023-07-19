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
<body>
    <?php
        SESSION_START();
        include('condb.php');

        if(!isset($_SESSION['ID']))
        {
            $_SESSION['error-path'] = "error";
            HEADER('Location: index');
        }

        $ID = $_SESSION['ID'];

        $sql = "SELECT * FROM `eltr_student` WHERE s_user = '$ID'";
        $result = mysqli_query($con, $sql) or die ("Error in query: $sql" . mysqli_error());

        $sql_candidates = "SELECT * FROM `eltr_candidate` WHERE c_number >= 1 ORDER BY 'c_number' ASC";
        $result_candidates = mysqli_query($con, $sql_candidates) or die ("Error in query: $sql_candidates " . mysqli_error());

        while($row = mysqli_fetch_array($result))
        {
            $name = $row['s_name'];
        }
    ?>

    <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand mb-0 h1"><img src="img/logo/logo.png" style="width: 1.25rem;">&nbsp;Electoral System</a>
            <button class="navbar-toggler" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item active">
                        <a class="nav-link active disabled">สถานะ : <?php
                            foreach($result as $row)
                            {
                                if($row['s_status'] == 0) {
                                    echo "<font color='red'><img src='img//logo/incorrect.png' class='align-middle' style='width: 1.25rem;'>&nbsp;ยังไม่ได้ลงคะแนน</font>";
                                } else {
                                    echo "<font color='green'><img src='img//logo/correct.png' class='align-middle' style='width: 1.25rem;'>&nbsp;ลงคะแนนเรียบร้อยแล้ว</font>";
                                }
                            }
                            ?>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <?php foreach($result as $rows) { ?>
                            <button class="btn btn-sm btn-outline-info btn-center" data-bs-toggle="modal" data-bs-target="#notvote" <?php if($rows['s_status'] == 1) { ?> disabled <?php } ?>>
                                <i class="fas fa-ban align-text-bottom" style="font-size: 1.25rem;"></i> ไม่ประสงค์ลงคะแนน
                            </button>
                        <?php } ?>
                    </li>
                    &ensp;
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle align-text-top" style="font-size: 1.5rem;"></i>
                            <?php echo $name; ?>
                        </a>
                        <ul class="dropdown-menu bg-dark">
                            <li>
                                <a class="dropdown-item text-light bg-dark" href="logout">
                                    <i class="fas fa-sign-out-alt align-text-bottom" style="font-size: 1.25rem;"></i> ออกจากระบบ
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="navbar-dropdown-menu">
                <li class="fs-5 fw-semibold">
                    <i class="fas fa-user-circle align-text-top" style="font-size: 1.75rem;"></i>
                    &nbsp;<?php echo $name; ?>
                </li>
                <hr>
                <li>
                    <?php foreach($result as $rows) { ?>
                        <button class="btn btn-lg btn-outline-info" style="width: 15rem;" data-bs-toggle="modal" data-bs-target="#notvote" <?php if($rows['s_status'] == 1) { ?> disabled <?php } ?>>
                            <i class="fas fa-ban align-middle" style="font-size: 1.5rem;"></i> ไม่ประสงค์ลงคะแนน
                        </button>
                    <?php } ?>
                </li>
                <li>
                    <a class="nav-link" href="logout">
                        <button class="btn btn-lg btn-outline-danger" style="width: 15rem;">
                            <i class="fas fa-sign-out-alt align-middle" style="font-size: 1.5rem;"></i> ออกจากระบบ
                        </button>
                    </a>
                </li>
                <hr>
                <li class="fs-5">
                    สถานะ : &nbsp;
                    <?php
                        foreach($result as $row)
                        {
                            if($row['s_status'] == 0) {
                                echo "<font color='red'><img src='img//logo/incorrect.png' class='align-middle' style='width: 1.25rem;'>&nbsp;ยังไม่ได้ลงคะแนน</font>";
                            } else {
                                echo "<font color='green'><img src='img//logo/correct.png' class='align-middle' style='width: 1.25rem;'>&nbsp;ลงคะแนนเรียบร้อยแล้ว</font>";
                            }
                        }
                    ?>
                </li>
            </div>
        </div>
    </nav>

    <div class="modal fade" id="notvote" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="notvoteLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-4 text-center">
                    <h3 class="mb-0"><b>ลงคะแนน</b></h3><br>
                    <form class="form-horizontal" name="notvote" id="notvote" method="post" action="candidates_db.php">
                        <p class="mb-0">ยืนยันที่จะ <b>ไม่ประสงค์ลงคะแนน</b> ?</p>
                        <input class="form-control" type="hidden" name="s_user" id="s_user" value="<?php echo $ID;?>">
                </div>
                        <div class="modal-footer flex-nowrap p-0">
                            <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-1 border-end" data-bs-dismiss="modal">ยกเลิก</button>
                            <button type="submit" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-2 text-warning" name="notvote">ไม่ประสงค์ลงคะแนน</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <p></p>

    <div class="container-fluid">
        <div class="grid">
            <?php foreach($result_candidates as $row) { ?>
                <div class="col-sm-12">
                    <div class="shadow rounded">
                        <div class="card bg-light border-dark">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-9">
                                        <h1 class="card-title"><?php echo $row['c_name']; ?></h1>
                                    </div>
                                    <div class="col-3">
                                        <h1 class="card-title" align="right"><b>เบอร์ <?php echo $row['c_number']; ?></b></h1>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="grid-2">
                                    <div class="col-md-12">
                                        <img src="admin/img/policy/<?php echo $row['c_img']; ?>" class="fit">
                                    </div>
                                    <div class="col-md-12">
                                        <p class="card-text"><b>ชื่อ : </b><?php echo $row['c_name']; ?></p>
                                        <p class="card-text"><b>ชั้น : </b><?php echo $row['c_class']; ?></p>
                                        <p class="card-text"><b>แผนก : </b><?php echo $row['c_major']; ?></p>
                                        <p class="card-text">
                                            <h3><b><u>นโยบาย</u></b></h3>
                                            <?php echo $row['c_policy']; ?>
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <center>
                                    <?php foreach($result as $rows) { ?>
                                        <button href="candidates_db.php?c_number=<?php echo $row['c_number'];?>" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#vote<?php echo $row['c_number'];?>" <?php if($rows['s_status'] == 1) { ?> disabled <?php } ?>>
                                            <i class="fas fa-times align-middle" style="font-size: 1.5rem"></i>
                                            &nbsp;ลงคะแนน
                                        </button>
                                    <?php } ?>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal fade" id="vote<?php echo $row['c_number'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="vote<?php echo $row['c_number'];?>Label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body p-4 text-center">
                                <h3 class="mb-0"><b>ลงคะแนน</b></h3><br>
                                <form class="form-horizontal" name="vote" id="vote" method="post" action="candidates_db.php">
                                    <p class="mb-0">ยืนยันที่จะเลือกเบอร์ <b><?php echo $row['c_number']; ?> <?php echo $row['c_name']; ?></b> ?</p>
                                    <input class="form-control" type="hidden" name="c_number" id="c_number" value="<?php echo $row['c_number'];?>">
                                    <input class="form-control" type="hidden" name="s_user" id="s_user" value="<?php echo $ID;?>">
                            </div>
                                    <div class="modal-footer flex-nowrap p-0">
                                        <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-1 border-end" data-bs-dismiss="modal">ยกเลิก</button>
                                        <button type="submit" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-2 text-success" name="vote" >ยืนยัน</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php
                echo '
                <script src="js/jquery-3.6.1.min.js"></script>
                <script src="js/sweetalert2.all.min.js"></script>
                <link rel="stylesheet" href="css/sweetalert2.min.css">
                ';

                if(isset($_SESSION['success']))
                {
                    echo "
                        <script>
                            swal.fire(
                                'เข้าสู่ระบบสำเร็จ!',
                                'เลือกลงคะแนนได้เลย',
                                'success'
                            )
                        </script>
                    ";
                }
                elseif(isset($_SESSION['success-vote']))
                {
                    echo "
                        <script>
                            swal.fire(
                                'เรียบร้อย!',
                                'คุณลงคะแนนเรียบร้อยแล้ว',
                                'success'
                            )
                        </script>
                    ";
                }
                elseif(isset($_SESSION['success-notvote']))
                {
                    echo "
                        <script>
                            swal.fire(
                                'เรียบร้อย!',
                                'คุณไม่ประสงค์ลงคะแนน',
                                'success'
                            )
                        </script>
                    ";
                }
                elseif(isset($_SESSION['error']))
                {
                    echo "
                        <script>
                            swal.fire(
                                'ไม่สำเร็จ!',
                                'เกิดข้อผิดพลาดบางอย่าง',
                                'error'
                            )
                        </script>
                    ";
                }
                unset($_SESSION['success']);
                unset($_SESSION['success-vote']);
                unset($_SESSION['success-notvote']);
                unset($_SESSION['error']);
            ?>
        </div>
    </div>

    <script>
        const toggleBtn = document.querySelector('.navbar-toggler')
        const dropDownMenu = document.querySelector('.navbar-dropdown-menu')

        toggleBtn.onclick = function () {
            dropDownMenu.classList.toggle('open')
        }
    </script>

    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
</body>
</html>