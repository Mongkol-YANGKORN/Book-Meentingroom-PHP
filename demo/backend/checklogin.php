<?php
session_start();
//Connect MSSQL

$serverName = 'localhost';
$userName = 'sa';
$userPassword = 'Hunterman1328!';
$dbName = 'meetings_room';


$conn = new PDO("sqlsrv:server=$serverName ; Database = $dbName", $userName, $userPassword);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (!empty($_POST)) {
    $stmt = $conn->prepare(" SELECT Username,ID_Member,Member_Name,Password,Responsibility from Member INNER JOIN Division 
    ON Member.ID_Division = Division.ID_Division WHERE username = :username AND password = :password");
    $stmt->bindParam("username", $_POST['Username']);
    $stmt->bindParam("password", $_POST['Password']);
    $stmt->execute();
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
    if (empty($rows)) {
        echo 'ไม่พบ username, password ในระบบ กรุณาตรวจสอบใหม่อีกครั้ง';
        header('http://localhost/meetingroom/demo/auth-login.php');
        exit();
    } else {
        $_SESSION["login_id"] = $rows["ID_Member"]; // เก็บค่าในรูปแบบของ session
        $_SESSION["login_name"] = $rows["Member_Name"]; // เก็บค่าในรูปแบบของ session
        $role = $rows["Responsibility"];
        //$_SESSION["login_surname"] = $rows["surname"]; // เก็บค่าในรูปแบบของ session
        //header('localhost/meetingroom/demo/index.php');
        //exit();
        echo $_SESSION["login_id"] . $_SESSION["login_name"];
        if ($role = 'Admin') {
            header("Location:http://localhost/meetingroom/demo/index.php");
        } elseif ($role = 'User') {
            header("Location:http://localhost/meetingroom/demo/user_dashboard.php");
        } else {
            echo 'ไม่พบข้อมูลในระะบบ' . "</br>";
            echo $role;
        }
    }
}
