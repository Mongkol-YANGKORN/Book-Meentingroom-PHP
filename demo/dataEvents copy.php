<?php
error_reporting(0);
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// เรียกใช้งานไฟล์เชื่อมต่อกับฐานข้อมูล
//Connect MSSQL
$serverName = 'localhost';
$userName = 'sa';
$userPassword = 'Hunterman1328!';
$dbName = 'meetings_room';

try {
    $conn = new PDO("sqlsrv:server=$serverName ; Database = $dbName", $userName, $userPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die(print_r($e->getMessage()));
}

$json_data = array();

$q = "SELECT * FROM Booked INNER JOIN Room ON Booked.ID_Room=Room.ID_Room  
INNER JOIN dbo.Member on Member.ID_Member= dbo.Booked.ID_Member ";

$meQuery = $conn->query($q);
while ($rs = $meQuery->fetch(PDO::FETCH_ASSOC)) {
    $ID = $rs['Room_Name'];
    $ID1 = $rs['Event_Start'];
    $ID2 = $rs['Event_End'];
    $json_data[] = [
        'title' => $ID,
        'start' => $ID1,
        'end' => $ID2
    ];
}
$json = json_encode($json_data);
echo $json;

//แสดงข้อมูลแบบง่ายๆ นะครับ ส่วนเรื่องความปลอดภัยของข้อมูล ต้องมีเงื่อนไขในการเข้าถึงข้อมูลด้วยนะครับ ถ้าไม่อยากให้ที่อื่นเรียใช้ข้อมูลได้ 