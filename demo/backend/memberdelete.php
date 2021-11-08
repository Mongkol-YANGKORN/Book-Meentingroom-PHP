<?php
session_start();
//Connect MSSQL
$serverName = 'localhost';
$userName = 'sa';
$userPassword = 'Hunterman1328!';
$dbName = 'meetings_room';

$conn = new PDO("sqlsrv:server=$serverName ; Database = $dbName", $userName, $userPassword);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//---------------------------------------------------------------------------------------------------------------------------------
if (!empty($_GET)) {
    $user = $_GET['ID_Member'];
    echo $user;
    $stm = $conn->prepare("DELETE FROM Member WHERE ID_Member = :ID_Member");
    $stm->bindParam("ID_Member", $user);
    $stm->execute();
    if ($stm->rowCount()) {
        echo "Record add successfully";
    } else {
        echo "Record add Faill";
        //header("Location:http://localhost/meetingroom/demo/memberRigister.php");
    }


    $conn = null;
}
