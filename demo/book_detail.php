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
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header">
                <div class="d-flex justify-content-between">
                    <div class="logo">
                        <a href="../index.html"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a>
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
                            <i class="bi bi-display"></i>
                            <span>จองห้องประชุม</span>
                        </a>
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
    <main class="container">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <section class="col-sm-12">
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>

        </section>
        <footer>

        </footer>
    </main>
    <script type="text/javascript">
        $(function() {
            $('#datetimepicker1').datetimepicker();
        });
    </script>
</body>

</html>