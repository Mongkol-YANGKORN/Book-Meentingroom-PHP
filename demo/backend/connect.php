<?php
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
