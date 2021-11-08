<?php
session_start();
include '../connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book-room</title>
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
                                <li class="submenu-item ">
                                    <a href="EquipmentAdd.php">เพิ่มข้อมูลอุปกรณ์ห้องประชุม</a>
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



            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">จองอุปกรณ์</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form" method="post" action="backend/addequipmenttodetail.php">
                                        <div class="row">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>อุปกรณ์เพิ่มเติม</label>
                                                    </div>
                                                    <li class="d-inline-block me-2 mb-1">
                                                        <div class="form-check">
                                                            <div class="checkbox">
                                                                <?php
                                                                include '../connect.php';
                                                                $sql = "SELECT Equipment_Name,ID_Equipment from Equipment  ";
                                                                $meQuery = $conn->query($sql);
                                                                $result1  = $conn->query("SELECT * from Equipment ")->fetchColumn();
                                                                ?>
                                                                <tr>
                                                                    <td><input type="checkbox" name="equip[]" value="E0001"></td>
                                                                    <td><?php echo 'projector'; ?></td>

                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="equip[]" value="E0002"></td>
                                                                    <td><?php echo 'television'; ?></td>

                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="equip[]" value="E0003"></td>
                                                                    <td><?php echo 'notebook'; ?></td>

                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="equip[]" value="E0004"></td>
                                                                    <td><?php echo 'microphone'; ?></td>

                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="equip[]" value="E0005"></td>
                                                                    <td><?php echo 'white board'; ?></td>

                                                                </tr>
                                                                <?php


                                                                ?>


                                                            </div>
                                                        </div>
                                                    </li>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end">

                                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
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