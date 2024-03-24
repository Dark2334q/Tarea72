<?php
$host = "dark12.mysql.database.azure.com";
$user = "Admin12";
$password = "Darkady1";
$dbname = "mariayiret08";
$con = mysqli_connect($host, $user, $password, $dbname);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$error_message = "";
if (isset($_POST['agregar'])) {
    $cod_sem = $_POST['COD_SEM'];
    $n_sem = $_POST['NOM_SEM'];
    if ($cod_sem != "" && $n_sem != "" ) {
        $sql = "INSERT INTO SEMINARIO (COD_SEM, NOM_SEM)
                VALUES  ('$cod_sem','$n_sem');";
    } else {
        echo '<span class="error">' . "FALTAN DATOS";
        exit;
    }
    $result = mysqli_query($con, $sql);
    header('Location: L_seminario.php');
    exit;
} else if (isset($_POST['editar'])) {
    $cod_sem = $_POST['COD_SEM'];
    $n_sem = $_POST['NOM_SEM'];
    if ($cod_sem != "" && $n_sem != "" ) {
        $sql = "UPDATE SEMINARIO SET NOM_SEM='$n_sem'WHERE COD_SEM='$cod_sem'";
    } else {
        echo '<span class="error">FALTAN DATOS</span>';
        exit;
    }
    $result = mysqli_query($con, $sql);
    header('Location: L_seminario.php');
    exit;
} else {
    if (isset($_GET['COD_SEM'])) {
        $cod_sem = $_GET['COD_SEM'];
        $sql = "DELETE FROM SEMINARIO WHERE COD_SEM='" . mysqli_real_escape_string($con, $cod_sem) . "'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            header('Location: L_seminario.php');
            exit;
        } else {
            echo '<span class="error">FALTAN DATOS</span>';
        }
    }
}
