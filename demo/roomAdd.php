<?php
session_start();

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
                            <a href="index.html" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="form-layout.html" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>ข้อมูลผู้ใช้</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="component-alert.html">ข้อมูลผู้ใช้ทั้งหมด</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-badge.html">เพิ่มข้อมูลผู้ใช้</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="index.html" class='sidebar-link'>
                                <i class="bi bi-easel-fill"></i>
                                <span>จัดการห้องประชุม</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="component-alert.html">ข้อมูลห้องประชุมทั้งหมด</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-badge.html">เพิ่มข้อมูลห้องประชุม</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="index.html" class='sidebar-link'>
                                <i class="bi bi-credit-card"></i>
                                <span>ข้อมูลการจอง</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="index.html" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>รายงานสถิติประจำเดือน</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="index.html" class='sidebar-link'>
                                <i class="bi bi-person-square"></i>
                                <span>ข้อมูลส่วนตัว</span>
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
                                <h4 class="card-title">เพิ่มห้องประชุม</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form" method="post" action="#">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="ID_Member-column">รหัสห้องประชุม</label>
                                                    <input type="text" id="ID_Member-column" class="form-control" placeholder="รหัสห้องประชุม" name="ID_Member">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="Member_Name-column">ชื่อห้องประชุม</label>
                                                    <input type="text" id="Member_Name-column" class="form-control" placeholder="ชื่อห้องประชุม" name="Member_Name">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="Username-column">จำนวนที่นั่ง</label>
                                                    <input type="text" id="Username-column" class="form-control" placeholder="จำนวนที่นั่ง" name="city-column">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="Password-column">อุปกรณ์</label>
                                                </div>
                                                <li class="d-inline-block me-2 mb-1">
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox1" class="form-check-input">
                                                            <label for="checkbox1">โปรเจคเตอร์</label>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="d-inline-block me-2 mb-1">
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" class="form-check-input" id="checkbox2">
                                                            <label for="checkbox2">โทรทัศน์</label>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="d-inline-block me-2 mb-1">
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" class="form-check-input" id="checkbox2">
                                                            <label for="checkbox2">กระดานไวท์บอร์ด</label>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="d-inline-block me-2 mb-1">
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" class="form-check-input" id="checkbox2">
                                                            <label for="checkbox2">ไมค์-ลำโพง</label>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="d-inline-block me-2 mb-1">
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" class="form-check-input" id="checkbox2">
                                                            <label for="checkbox2">คอมพิวเตอร์</label>
                                                        </div>
                                                    </div>
                                                </li>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="Username-column">รายละเอียดเพิ่มเติม</label>
                                                    <input type="text" id="Username-column" class="form-control" placeholder="รายละเอียดเพิ่มเติม" name="city-column">
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">

                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                <button type="submit" class="btn btn-primary me-1 mb-1">บันทึก</button>
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