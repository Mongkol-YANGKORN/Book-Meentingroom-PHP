<?php
session_start();
//Connect MSSQL
$serverName = 'localhost';
$userName = 'sa';
$userPassword = 'Hunterman1328!';
$dbName = 'meetingroom';

try {
    $conn = new PDO("sqlsrv:server=$serverName ; Database = $dbName", $userName, $userPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die(print_r($e->getMessage()));
}
//---------------------------------------------------------------------------------------------------------------------------------

if (isset($_POST['Password'])) {
    $password = $_POST['Password'];
}
if (isset($_POST["city-column"])) {
    $user = $_POST["city-column"];
}
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);


if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
    echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
} else {
    //$password = sha1($password);
    $sql = "INSERT INTO member (Username, Password, Member_Name,Member_Address,Member_Tel,ID_Division) 
   VALUES (?, ?, ?, ?, ?, ?)";
    $params = array($user, $password, $_POST["Member_Name"], $_POST["Address"], $_POST["Member_Tel"], $_POST["ID_Division"]);
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);

    if ($stmt->rowCount()) {
        echo "Record add successfully";
    }
}
$conn = null;//--เหลือเช็ค  User ที่คิดว่าจะทำดีไหม
//-----------------------------------------------------------------------------------------------------------------------------------------------

//$check =  " SELECT  Username 
       // FROM member
       // WHERE  m_user = '$username' 
       // ";
//$result1 = mysqli_query($conn, $check);
///$num = mysqli_num_rows($result1);
//if ($num > 0) {
 ///   echo "username หรือ ID นี้ถูกใช้งานแล้ว";
    //header("refresh: 1; url=/meetingroom/demo/memberRigister.php");
    //echo $sql;

//$result = $mysqli->query($sql);
//echo $sql;