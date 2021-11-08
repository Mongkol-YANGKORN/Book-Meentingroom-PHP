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
if (!empty($_POST)) {
    $room = $_POST['ID_Room'];
    $datestart = $_POST["datetime"];
    $dateend = $_POST["datetime2"];
    $seat = $_POST["Num_seat"];
    $checkdate = $conn->query(" SELECT * from Booked where Booked.Event_Start = Convert(DATETIME ,'$datestart') 
    and Booked.Event_End = Convert(DATETIME ,'$dateend ')And ID_Room = ('$room')  ")->fetchColumn();
    $result = $conn->query(" SELECT Num_Seat FROM Room WHERE  ID_Room = '$room' ")->fetchColumn();
    if ($checkdate > 0) {
        echo 'ขอโทษนะครับ!!! คิวเวลานี้ถูกจองไว้แล้วนะครับ';
        //echo $room;
    } else if ($seat > $result) {
        echo 'ขอโทษนะครับ!!! จองที่นั่งเยอะเกินไปนะครับ ห้องนี้มีแค่ ' . $result . " ที่นั่ง";
    } else {

        $stm = $conn->prepare("UPDATE Booked SET Num_User = :Num_User, Event_Start = :datetime, Event_End = :datetime2 
        ,ID_Room = :ID_Room ,ID_Member = :ID_Member WHERE ID_Booked = :ID_Booked");
        $stm->bindParam("datetime", $_POST["datetime"]);
        $stm->bindParam("datetime2", $_POST["datetime2"]);
        $stm->bindParam("ID_Room", $_POST['ID_Room']);
        $stm->bindParam("Num_User", $_POST["Num_seat"]);
        $stm->bindParam("ID_Member", $_SESSION["login_id"]);
        $stm->bindParam("ID_Booked", $_POST["ID_Booked"]);
        $stm->execute();
        if ($stm->rowCount()) {
            echo "UPDATE successfully";
            header("refresh: 2;Location:http://localhost/meetingroom/demo/book_detail.php");
        } else {
            echo "UPDATE Faill";
            header("refresh: 2;Location:http://localhost/meetingroom/demo/book_detail.php");
        }
    }
    $conn = null;
}
