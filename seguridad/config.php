<?php
$conn=mysqli_init();
session_start();
mysqli_ssl_set($conn,null,null,"PRACTICAS2/seguridad/DigiCertGlobalRootCA.crt.pem",null,null);
$host = "dark12.mysql.database.azure.com";
$user = "Admin12";
$password = "Darkady1";
$dbname = "mariayiret08";
$con = mysqli_connect($host, $user, $password, $dbname);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
    return $conn;
?>
