<?php
session_start();
//Connect MSSQL
$serverName = 'localhost';
$userName = 'sa';
$userPassword = 'Hunterman1328!';
$dbName = 'meetingroom';

try {
    $conn = new PDO("sqlsrv:server=$serverName ; Database = $dbName", $userName, $userPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die(print_r($e->getMessage()));
}

if (isset($_POST['Username'])) {
    $user = $_POST['Username'];
}
if (isset($_POST['Password'])) {
    $pass = $_POST['Username'];
}

$meSQL = "SELECT * FROM member where Username = $user  and Password = $pass ";

$meQuery = $conn->query($meSQL);

echo $meSQL;
