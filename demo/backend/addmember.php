<?php
include '../connect.php';
$ID = $_POST['ID_Member'];
$Name = $_POST['Member_Name'];
$Username = $_POST['city-column'];
$Pass = $_POST['Password'];
$Div = $_POST['ID_Division'];
$Tel = $_POST['Member_Tel'];
$Add = $_POST['Address'];

$sql = "INSERT INTO `member`(`ID_Member`, `Username`, `Password`, `Member_Name`, `Member_Address`, `Member_Tel`, `ID_Division`) 
                    .VALUES ('[$ID]','[$Username]','[$Pass]','[$Name]','[$Add]','[$Tel]','[$Div]')";

$result = $mysqli->query($sql);
echo $sql;
