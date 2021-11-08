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
//---------------------------------------------------------------------------------------------------------------------------------

$meSQL = $conn->query("SELECT top 1 ID_Room , CURRENT_TIMESTAMP as 'time'  from Room Order by ID_Room desc");
$rs = $meSQL->fetch(PDO::FETCH_ASSOC);
$book = $rs['ID_Room'];
$checkbox1 = $_POST['equip'];

if (isset($_POST['equip'])) {
    if (!empty($_POST['equip'])) {
        foreach ($_POST['equip'] as $value) {
            $stm = $conn->prepare("INSERT INTO Booked_Detail (ID_ID_Room,ID_Equipment) 
                        VALUES (:ID_Room, :ID_Equipment)");
            $stm->bindParam("ID_Room", $book);
            $stm->bindParam("ID_Equipment", $value);
            $stm->execute();
            header(":Location:http://localhost/meetingroom/demo/book_detail.php");
        }
    }
}
