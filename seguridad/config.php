<?php
session_start();
$con = mysqli_init();
mysqli_ssl_set($conn, null, null, "DigiCertGlobalRootCA.crt.pem",null,null);
mysqli_real_connect($conn,"dark12.mysql.database.azure.com","Admin12",
"Darkady1","mariayiret08",3306, MYSQLI_CLIENT_SSL);
?>
