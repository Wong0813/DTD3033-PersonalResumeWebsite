<?php
$servername = "db.schtg.com";
$username = "schtgcom_d06337";   
$password = "m6f8a91q64";
$dbname = "schtgcom_d06337";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("DB ERROR: " . mysqli_connect_error());
}
?>