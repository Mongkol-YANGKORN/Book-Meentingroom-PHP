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
    $name = $_POST['Room_Name'];
    $result1 = $conn->query(" SELECT Room_Name FROM Room WHERE  Room_Name = '$name' ")->fetchColumn();
    if ($result1 > 0) {
        echo "ชื่อห้องนี้ถูกใช้งานแล้ว" . "<br>";
        echo '<a href=http://localhost/meetingroom/demo/roomAdd.php>ไปแก้รายการ</a>';
    } else {
        $stm = $conn->prepare("INSERT INTO Room (Room_Name,Num_seat,Room_Dscription) 
            VALUES (:Room_Name, :Num_seat,:Room_Dscription)");
        $stm->bindParam("Room_Name", $_POST['Room_Name']);
        $stm->bindParam("Num_seat", $_POST['Num_seat']);
        $stm->bindParam("Room_Dscription", $_POST["Room_Dscription"]);
        $stm->execute();
        if ($stm->rowCount()) {
            echo "Record add successfully";
            header("Location:http://localhost/meetingroom/demo/addequipmenttoroom.php");
        } else {
            echo 'บันทึกรายการผิดพลาด<br>';
            echo '<a href=http://localhost/meetingroom/demo/roomAdd.php>ไปแก้รายการ</a>';
        }
    }

    $conn = null;
}
