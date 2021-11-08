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
    $stm = $conn->prepare("DELETE FROM Booked WHERE ID_Booked = :ID_Booked");
    $del = $conn->prepare("DELETE FROM Booked_Detail WHERE ID_Booked = :ID_Booked");
    $stm->bindParam("ID_Booked", $_GET['ID_Booked']);
    $del->bindParam("ID_Booked", $_GET['ID_Booked']);
    $stm->execute();
    $del->execute();
    if ($stm->rowCount() && $del->rowCount()) {
        echo "DELETE successfully";
        header("refresh: 2;Location:http://localhost/meetingroom/demo/book_detail.php");
    } else {
        echo "DELETE Faill";
        header("refresh 2:Location:http://localhost/meetingroom/demo/book_detail.php");
    }


    $conn = null;
}
