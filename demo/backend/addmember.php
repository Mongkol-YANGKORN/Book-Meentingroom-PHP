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
    $password = $_POST['Password'];
    $user = $_POST['Username'];
    $tel = $_POST["Member_Tel"];
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    $result1 = $conn->query(" SELECT  Username FROM member WHERE  Username = '$user' ")->fetchColumn();

    if ($result1 > 0) {
        echo "Username นี้ถูกใช้งานแล้ว" . "<br>";
        echo '<a href=http://localhost/meetingroom/demo/memberRigister.php>ไปแก้รายการ</a>';
    } else {
        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            echo 'Password ควรมีมากกว่า 8 ตัวอักษรและมีตัวเล็กตัวใหญ่,ตัวเลขอย่างน้อยต้องมี 1 ตัวอักษร,อักษรพิเศษ [^\w]' . "<br>";
            echo '<a href=http://localhost/meetingroom/demo/memberRigister.php>ไปแก้รายการ</a>';
        } else {
            if (strlen($tel) < 10) {
                echo 'เบอร์โทรศัพท์ไม่ครบ 10 ตัวอักษร';
            } else {
                //$password = sha1($password);
                $stm = $conn->prepare("INSERT INTO Member (Username, Password, Member_Name,Member_Address,Member_Tel,ID_Division) 
            VALUES (:Username, :Password,:Member_Name,:Address, :Member_Tel, :ID_Division)");
                $stm->bindParam("Username", $_POST['Username']);
                $stm->bindParam("Password", $_POST['Password']);
                $stm->bindParam("Member_Name", $_POST["Member_Name"]);
                $stm->bindParam("Address", $_POST["Address"]);
                $stm->bindParam("Member_Tel", $_POST["Member_Tel"]);
                $stm->bindParam("ID_Division", $_POST["ID_Division"]);
                $stm->execute();
                if ($stm->rowCount()) {
                    echo "Record add successfully";
                } else {
                    echo "Record add Faill";
                    header("Location:http://localhost/meetingroom/demo/memberRigister.php");
                }
            }
        }
        $conn = null;
    }
}
