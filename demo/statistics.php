<?php
error_reporting(0);
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
                            <img src="../demo/assets/images/logo/logo2.png" alt="Logo">
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item  ">
                            <a href="index.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>ข้อมูลผู้ใช้</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="memberlist.php">ข้อมูลผู้ใช้ทั้งหมด</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="memberRigister.php">เพิ่มข้อมูลผู้ใช้</a>
                                </li>

                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a class='sidebar-link'>
                                <i class="bi bi-easel-fill"></i>
                                <span>จัดการห้องประชุม</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="roomList.php">ข้อมูลห้องประชุมทั้งหมด</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="roomAdd.php">เพิ่มข้อมูลห้องประชุม</a>
                                </li>

                            </ul>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="book_room.php" class='sidebar-link'>
                                <i class="bi bi-display"></i>
                                <span>จองห้องประชุม</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="book_detail.php" class='sidebar-link'>
                                <i class="bi bi-credit-card"></i>
                                <span>ข้อมูลการจองของฉัน</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="book_user.php" class='sidebar-link'>
                                <i class="bi bi-credit-card-2-back-fill"></i>
                                <span>ข้อมูลการจองของผู้ใช้งาน</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="statistics.php" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>รายงานสถิติประจำเดือน</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="personaldetail.php" class='sidebar-link'>
                                <i class="bi bi-person-square"></i>
                                <span>ข้อมูลส่วนตัว</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="backend\logout.php" class='sidebar-link'>
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

            <div class="page-heading">
                <h3>รายงานสถิติ</h3>
            </div>
            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <section class="section">
                                <div class="card">
                                    <div class="card-body">
                                        <form class="form" method="post" action="statisticsshow.php">
                                            <div class="row">

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="ID_Member-column">วัน-เดือน-ปี เริ่มต้น</label>
                                                        <div class="position-relative">
                                                            <input name='date' id="datetime" class="form-control" placeholder="วันที่เริ่มต้น" />
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
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="ID_Member-column">วัน-เดือน-ปี สิ้นสุด</label>
                                                        <div class="position-relative">
                                                            <input name='date2' id="datetime2" class="form-control" placeholder="วันที่สิ้นสุด" />
                                                            <script>
                                                                $("#datetime2").datetimepicker({
                                                                    step: 15
                                                                });
                                                            </script>
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-clock"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                        <button type="submit" class="btn btn-primary me-1 mb-1">ค้นหา</button>
                                                        <input class="btn btn-info me-1 mb-1" name="print" type="submit" id="non-printable" value="พิมพ์รายงาน" onClick="window.print()" />
                                                    </div>
                                                </div>
                                            </div>
                                        </form>



                                        <table class="table table-striped table-borderless">
                                            <thead>
                                                <tr>
                                                    <th>ลำดับ</th>
                                                    <th>ห้องประชุม</th>
                                                    <th>จำนวนครั้ง</th>


                                                </tr>
                                            </thead>
                                            <?php
                                            if (!isset($_GET['action'])) {
                                                $sql = ("SELECT DISTINCT Room_Name FROM Booked 
                                                INNER JOIN Room ON Booked.ID_Room=Room.ID_Room");
                                                $query = $conn->query($sql);
                                            ?>
                                                <tbody><?php
                                                        $i = 1;
                                                        while ($rs = $query->fetch(PDO::FETCH_ASSOC)) {
                                                        ?>
                                                        <tr>
                                                            <td> <?php echo $i++ ?> </td>
                                                            <td> <?php echo $rs['Room_Name']
                                                                    ?></td>
                                                            <td><?php
                                                                $rooms = $rs['Room_Name'];
                                                                $meSQL = ("SELECT COUNT(ID_Booked)FROM Booked 
                                                                INNER JOIN Room ON Booked.ID_Room=Room.ID_Room where Room_Name = '$rooms' ");
                                                                $meQuery = $conn->query($meSQL);
                                                                $count = $meQuery->fetchColumn();
                                                                echo $count;
                                                                ?></td>

                                                        </tr>

                                                </tbody>
                                            <?php } ?>
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