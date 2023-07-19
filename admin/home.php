<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>หน้าหลัก | Electoral System</title>

    <link rel="stylesheet" href="css/font-family.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/adminlte.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="icon" href="../img/logo/logo.png">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include('navbar.php'); ?>
        <?php include('sidebar.php'); ?>
        
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                include('../condb.php');

                $sql_candidate = "SELECT * FROM `eltr_candidate` WHERE c_number >= 1";
                $result_candidate = mysqli_query($con, $sql_candidate) or die ("Error in query: $sql_candidate" . mysqli_error());

                $sql_student = "SELECT * FROM `eltr_student`";
                $result_student = mysqli_query($con, $sql_student) or die ("Error in query: $sql_student" . mysqli_error());

                $sql_voted = "SELECT 's_status' FROM `eltr_student` WHERE s_status LIKE '1'";
                $result_voted = mysqli_query($con, $sql_voted) or die ("Error in query: $sql_voted" . mysqli_error());

                $sql_vote = "SELECT 's_status' FROM `eltr_student` WHERE s_status LIKE '0'";
                $result_vote = mysqli_query($con, $sql_vote) or die ("Error in query: $sql_vote" . mysqli_error());

                $voted = mysqli_num_rows($result_voted);
                $std = mysqli_num_rows($result_student);

                $percent = $voted / $std * 100;
            ?>
            
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info shadow">
                                <div class="inner">
                                    <h3><?php echo mysqli_num_rows($result_candidate); ?></h3>
                                    <p>ผู้ลงสมัคร</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-times"></i>
                                </div>
                                <a href="list_candidate" class="small-box-footer">
                                    รายละเอียด
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info shadow">
                                <div class="inner">
                                    <h3><?php echo mysqli_num_rows($result_student); ?></h3>
                                    <p>นักเรียน/นักศึกษา</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                                <a href="list_student" class="small-box-footer">
                                    รายละเอียด
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success shadow">
                                <div class="inner">
                                    <h3><?php echo mysqli_num_rows($result_voted); ?></h3>
                                    <p>คนที่ลงคะแนนแล้ว</p>
                                </div>
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="85" height="85" fill="currentColor" class="bi bi-person-fill-check" viewBox="0 0 16 16">
                                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                        <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
                                    </svg>
                                </div>
                                <a href="list_voted" class="small-box-footer">
                                    รายละเอียด
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-danger shadow">
                                <div class="inner">
                                    <h3><?php echo mysqli_num_rows($result_vote); ?></h3>
                                    <p>คนที่ยังไม่ได้ลงคะแนน</p>
                                </div>
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="85" height="85" fill="currentColor" class="bi bi-person-fill-x" viewBox="0 0 16 16">
                                        <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
                                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708Z"/>
                                    </svg>
                                </div>
                                <a href="list_vote" class="small-box-footer">
                                    รายละเอียด
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container-fluid">
                    <div class="card shadow">
                        <div class="card-body">
                            <h4>&ensp;จำนวนของคนที่มาลงคะแนนทั้งหมดคิดเป็นร้อยละ&nbsp;<b><?php echo number_format($percent,2); ?>%</b></h4>
                            <div class="chart-container">
                                <canvas id="graphCanvas" height="120"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/adminlte.min.js"></script>
    <script src="js/chart.min.js"></script>

    <script>
        $(document).ready(function() {
            showGraph();
        });
        function showGraph(){
            {
                $.post("dashboard.php", function(data) {
                    console.log(data);
                    let number = [];
                    let name = [];
                    let score = [];

                    for (let i in data) {
                        number.push(data[i].c_number);
                        name.push(data[i].c_name);
                        score.push(data[i].c_score);
                    }
                    let chartdata = {
                        labels: name,
                        datasets: [{
                                label: 'คะแนน',
                                borderWidth: 1,
                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.3)',
                                                    'rgba(54, 162, 235, 0.3)',
                                                    'rgba(255, 206, 86, 0.3)',
                                                    'rgba(75, 192, 192, 0.3)',
                                                    'rgba(153, 102, 255, 0.3)',
                                                    'rgba(255, 159, 64, 0.3)',
                                                    'rgba(255, 99, 132, 0.3)',
                                                    'rgba(54, 162, 235, 0.3)',
                                                    'rgba(255, 206, 86, 0.3)',
                                                    'rgba(75, 192, 192, 0.3)',
                                                    'rgba(153, 102, 255, 0.3)',
                                                    'rgba(255, 159, 64, 0.3)',
                                                    'rgba(255, 99, 132, 0.3)',
                                                    'rgba(54, 162, 235, 0.3)',
                                                    'rgba(255, 206, 86, 0.3)',
                                                    'rgba(75, 192, 192, 0.3)',
                                                    'rgba(153, 102, 255, 0.3)',
                                                    'rgba(255, 159, 64, 0.3)'
                                                ],
                                borderColor: [
                                                'rgba(255,99,132,1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(153, 102, 255, 1)',
                                                'rgba(255, 159, 64, 1)',
                                                'rgba(255,99,132,1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(153, 102, 255, 1)',
                                                'rgba(255, 159, 64, 1)',
                                                'rgba(255,99,132,1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(153, 102, 255, 1)',
                                                'rgba(255, 159, 64, 1)'
                                            ],
                                data: score
                        }]
                    };
                    let graphTarget = $('#graphCanvas');
                    let barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    })
                })
            }
        }
    </script>

    <?php
        echo '
        <script src="../js/jquery-3.6.1.min.js"></script>
        <script src="../js/sweetalert2.all.min.js"></script>
        <link rel="stylesheet" href="../css/sweetalert2.min.css">
        ';

        if(isset($_SESSION['success']))
        {
            echo "
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'เข้าสู่ระบบเรียบร้อย!',
                        showConfirmButton: false,
                        timer: 2000
                    })
                </script>
            ";
        }
        unset($_SESSION['success']);
    ?>
</body>
</html>