<?php
session_start();
include '../connect.php';
$user = $_POST['Username'];
$pass = $_POST['Password'];
$sql = "SELECT * FROM `member` where Username = '" . $user . "' && Password = '" . $pass . "'";
$result = $conn->query($sql);
//echo $sql;
if ($result->num_rows > 0) {

    while ($data = $result->fetch_object()) {
        $role = $data->ID_Division;
        $_SESSION['role'] = $role;
        $_SESSION['name'] = $data->Username;

        if ($role == "developers") {
            echo $role;
            header("refresh: 1; url=/meetingroom/demo/index.php"); //admin
            exit(0);
        } else {
            echo $role;
            header("refresh: 1; url=/meetingroom/demo/index.php"); //User
        }
    }
} else {
    echo 'เข้าสู่ระบบผิดพลาด';
    header("refresh: 1; url=/meetingroom/demo/auth-login.php");
    exit(0);
}
$conn->close();
