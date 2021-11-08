<?php
error_reporting(0);
session_start();
//Connect MSSQL

$serverName = 'localhost';
$userName = 'sa';
$userPassword = 'Hunterman1328!';
$dbName = 'meetings_room';


$conn = new PDO("sqlsrv:server=$serverName ; Database = $dbName", $userName, $userPassword);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$user = $_POST['Username'];
$pass = $_POST['Password'];
$stmt = $conn->prepare(" SELECT * from Member INNER JOIN Division 
ON Member.ID_Division = Division.ID_Division WHERE username = '$user' AND password = '$pass'");
$stmt->execute();
$rows = $stmt->fetch(PDO::FETCH_ASSOC);
if (empty($rows)) {
    echo 'ไม่พบ username, password ในระบบ กรุณาตรวจสอบใหม่อีกครั้ง';
    header('http://localhost/meetingroom/demo/auth-login.php');
    exit();
} else {
    $_SESSION["login_id"] = $rows["ID_Member"];
    $_SESSION["login_name"] = $rows["Member_Name"];
    $_SESSION["Responsibility"] = $rows["Responsibility"];
    echo $_SESSION["Responsibility"];
    if ($_SESSION["Responsibility"] == 'User') {
        header("Location:http://localhost/meetingroom/demo/user_dashboard.php");
    } else {
        header("Location:http://localhost/meetingroom/demo/index.php");
    }
}
