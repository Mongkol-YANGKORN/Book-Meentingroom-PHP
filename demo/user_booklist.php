<?php
session_start();
include '../connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap%22");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            font-family: "Prompt", sans-serif;
        }
    </style>
    <!-- datetime -->
    <link rel="stylesheet" href="js/jquery.datetimepicker.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery.datetimepicker.full.js"></script>
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>l;
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item  ">
                            <a href="user_dashboard.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="user_bookroom.php" class='sidebar-link'>
                                <i class="bi bi-display"></i>
                                <span>จองห้องประชุม</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="user_booklist.php" class='sidebar-link'>
                                <i class="bi bi-credit-card"></i>
                                <span>ข้อมูลการจอง</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="user_personaldetail.php" class='sidebar-link'>
                                <i class="bi bi-person-square"></i>
                                <span>ข้อมูลส่วนตัว</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="../index.html" class='sidebar-link'>
                                <i class="bi bi-power"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">ข้อมูลการจอง</h4>
                            </div>
                            <section class="section">
                                <div class="card">
                                    <div class="card-body">
                                        <form class="form" method="post" action="demo\backend\#">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>ห้องประชุม</label>
                                                        <?php
                                                        include '../connect.php';
                                                        $sql = "SELECT * FROM Room ORDER BY Room_Name asc";
                                                        $result = $conn->query($sql);
                                                        ?>
                                                        <select name="ID_Room" id="ID_Room" class="form-select"> ;
                                                            <option selected>เลือก..</option>
                                                            <?php foreach ($result as $results) { ?>
                                                                <option value="<?php echo $results["ID_Room"]; ?>">
                                                                    <?php echo $results["Room_Name"]; ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="ID_Member-column">วันที่จอง</label>
                                                        <div class="position-relative">
                                                            <input id="datetime" class="form-control" placeholder="เลือกวันที่จอง" />
                                                            <script>
                                                                $("#datetime").datetimepicker({
                                                                    step: 15
                                                                });
                                                            </script>
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-clock"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">ค้นหา</button>
                                                </div>
                                            </div>
                                        </form>
                                        <table class="table table-striped" id="table1">
                                            <thead>
                                                <tr>
                                                    <th>ลำดับ</th>
                                                    <th>ห้องประชุม</th>
                                                    <th>วัน-เวลา</th>
                                                    <th>หัวข้อการประชุม</th>
                                                    <th>ชื่อผู้จอง</th>
                                                    <th>แสดง</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            if (!isset($_GET['action'])) {
                                                $meSQL = "SELECT * FROM Booked ";
                                                $meQuery = $conn->query($meSQL);
                                            ?>
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    while ($rs = $meQuery->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                        <tr>
                                                            <td> <?php echo $i++ ?> </td>
                                                            <td> <?php //echo $rs['Room_Name'] 
                                                                    ?></td>
                                                            <td><?php echo $rs['Event_Start'] ?></td>
                                                            <td><?php //echo $rs['Num_Seat'] 
                                                                ?></td>
                                                            <td>รอลูกแพะมาทำ</td>
                                                            <td>
                                                                <a href="#" class="btn-sm btn-success">แสดง</a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </section>




        </div>

    </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>