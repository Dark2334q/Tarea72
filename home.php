<?php
include "seguridad/config.php";
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}
?>
<?php include "header.php"; ?>