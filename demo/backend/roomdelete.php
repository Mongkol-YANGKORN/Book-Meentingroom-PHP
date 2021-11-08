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
    $room = $_GET['ID_Room'];
    $stm = $conn->prepare("DELETE FROM Room WHERE ID_Room = :ID_Room");
    $del = $conn->prepare("DELETE FROM Room_Detail WHERE ID_Room = :ID_Room");
    $stm->bindParam("ID_Room", $_GET['ID_Room']);
    $del->bindParam("ID_Room", $_GET['ID_Room']);
    $stm->execute();
    $del->execute();
    if ($stm->rowCount() && $del->rowCount()) {
        echo "Record add successfully";
        header("Location:http://localhost/meetingroom/demo/roomList.php");
    } else {
        echo "Record add Faill";
        header("Location:http://localhost/meetingroom/demo/roomList.php");
    }


    $conn = null;
}
