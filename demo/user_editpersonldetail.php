<?php
error_reporting(0);
session_start();
include '../connect.php';
$user = $_GET['ID_Member'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลส่วนตัว</title>

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
                                <h4 class="card-title">แก้ไขข้อมูลผู้ใช้งาน</h4>
                            </div>
                            <section class="section">
                                <div class="card">
                                    <div class="card-body">
                                        <form class="form" method="post" action="backend\membereditdata.php">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="Member_Name-column">รหัสสมาชิก</label>
                                                        <?php
                                                        include '../connect.php';
                                                        if (isset($_GET['ID_Member'])) {

                                                            $meSQL = "SELECT * FROM member INNER JOIN Division ON Member.ID_Division = Division.ID_Division 
                                                                            where ID_Member ='$user'";
                                                            $meQuery = $conn->query($meSQL);
                                                        ?>
                                                            <?php
                                                            $i = 1;
                                                            while ($rs = $meQuery->fetch(PDO::FETCH_ASSOC)) {
                                                            ?>
                                                                <div class="form-group">
                                                                    <label for="Member_Name-column"> <?php echo $rs["ID_Member"]; ?> </label>
                                                                    <input type="hidden" name="ID_Member" value="<?php echo $rs["ID_Member"]; ?>" />

                                                                </div>

                                                    </div>
                                                <?php
                                                            } ?>
                                            <?php
                                                        } ?>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="Member_Name-column">ชื่อ-นามสกุล</label>
                                                        <input type="text" id="Member_Name-column" class="form-control" placeholder="ชื่อ-นามสกุล" name="Member_Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="Username-column">Username</label>
                                                        <input type="text" id="Username-column" class="form-control" placeholder="Username" name="Username">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="Password-column">Password</label>
                                                        <input type="password" id="Password-column" class="form-control" name="Password" placeholder="Password">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>แผนก</label>
                                                        <?php
                                                        include '../connect.php';
                                                        $sql = "SELECT * FROM Division ORDER BY Division_Name asc";
                                                        $result = $conn->query($sql);
                                                        ?>

                                                        <select name="ID_Division" id="ID_Division" class="form-select"> ;
                                                            <option selected>เลือก..</option>
                                                            <?php foreach ($result as $results) { ?>
                                                                <option value="<?php echo $results["ID_Division"]; ?>">
                                                                    <?php echo $results["Division_Name"]; ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="Job_title-column">ตำแหน่งงาน</label>
                                                        <input type="text" id="Job_title-column" class="form-control" name="Job_title" placeholder="ตำแหน่งงาน">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="Responsibility-column">บทบาท</label>
                                                        <select name="Responsibility" id="Responsibility" class="form-select">
                                                            <option selected>เลือก..</option>
                                                            <option value="Admin">Admin</option>
                                                            <option value="User">User</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="Member_Tel-column">เบอร์โทรศัพท์</label>
                                                        <input type="text" id="Member_Tel-column" class="form-control" name="Member_Tel" placeholder="เบอร์โทรศัพท์">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="Address-column">ที่อยู่</label>
                                                        <input type="text" id="Address-column" class="form-control" name="Address" placeholder="ที่อยู่">
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                </div>

                                            </div>
                                        </form>
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