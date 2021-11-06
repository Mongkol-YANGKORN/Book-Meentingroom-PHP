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
    $name = $_POST['room_Name'];
    $result1 = $conn->query(" SELECT Room_name FROM Room WHERE  Room_name = '$name' ")->fetchColumn();

    if ($result1 > 0) {
        echo "ชื่อนี้ถูกใช้งานแล้ว";
        //echo $room;
    } else {
        $stm = $conn->prepare("UPDATE Room SET Room_Name = :Room_Name, Num_seat = :Num_seat, Room_Dscription = :Room_Dscription 
        WHERE ID_Room = :ID_Room");
        $stm->bindParam("ID_Room", $_POST['ID_Room']);
        $stm->bindParam("Room_Name", $_POST['room_Name']);
        $stm->bindParam("Num_seat", $_POST["Num_seat"]);
        $stm->bindParam("Room_Dscription", $_POST["Room_Dscription"]);
        $stm->execute();
        if ($stm->rowCount()) {
            echo "Record add successfully";
        } else {
            echo "Record add Faill";
            //header("Location:http://localhost/meetingroom/demo/memberRigister.php");
        }
    }
    $conn = null;
}
