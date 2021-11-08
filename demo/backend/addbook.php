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
    $seat = $_POST['contact'];
    $datestart = $_POST["datetime"];
    $dateend = $_POST["datetime2"];
    //$user = $_SESSION["login_id"];
    $result = $conn->query(" SELECT Num_Seat FROM Room WHERE  ID_Room = '$room' ")->fetchColumn();
    $checkdate = $conn->query(" SELECT * from Booked where Booked.Event_Start = Convert(DATETIME ,'$datestart') 
    and Booked.Event_End = Convert(DATETIME ,'$dateend ')And ID_Room = ('$room')  ")->fetchColumn();
    if ($checkdate > 0) {
        echo 'ขอโทษนะครับ!!! คิวเวลานี้ถูกจองไว้แล้วนะครับ';
        echo '<a href=http://localhost/meetingroom/demo/book_room.php>ไปแก้รายการ</a>';
    } else if ($seat > $result) {
        echo 'ขอโทษนะครับ!!! จองที่นั่งเยอะเกินไปนะครับ ห้องนี้มีแค่ ' . $result . " ที่นั่ง";
        echo '<a href=http://localhost/meetingroom/demo/book_room.php>ไปแก้รายการ</a>';
    } else {
        $stm = $conn->prepare("INSERT INTO Booked (Num_User,Event_Start,Event_End,ID_Room,ID_Member) 
            VALUES (:seat,:datetime,:datetime2,:ID_Room,:ID_Member)");
        $stm->bindParam("seat", $_POST['contact']);
        $stm->bindParam("datetime", $_POST["datetime"]);
        $stm->bindParam("datetime2", $_POST["datetime2"]);
        $stm->bindParam("ID_Room", $_POST['ID_Room']);
        $stm->bindParam("ID_Member", $_SESSION["login_id"]);
        $stm->execute();
        if ($stm->rowCount()) {
            header("Location:http://localhost/meetingroom/demo/addequipment.php");
        } else {
            echo "Record add Faill";
            header("refresh: 2;Location:http://localhost/meetingroom/demo/book_room.php");
        }
        $conn = null;
    }
}
