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
if (isset($_POST['agregar_carrera'])) {
    $res = $_POST['REGISTRO'];
    $id_est = $_POST['ID_ESTUDIANTE'];
    $cod_carr = $_POST['COD_CARRERA'];
    $f_ini = $_POST['FECHA_INICIO'];
    $f_fin = $_POST['FECHA_FINAL'];

    if (
        $res != "" && $id_est != "" && $cod_carr != "" && $f_ini != "" && $f_fin != ""
    ) {
        $sql = "INSERT INTO REL_ACADEMICO_CARRERA (REGISTRO, ID_ESTUDIANTE, COD_CARRERA, FECHA_INICIO, FECHA_FINAL) VALUES  
        ('" . $res . "','" . $id_est . "','" . $cod_carr . "','" . $f_ini . "','" . $f_fin . "');";
        $result = mysqli_query($con, $sql);
        header('Location: L_inscri_carrera.php');
        exit;
    } else {
        echo '<span class="error">' . "FALTAN DATOS";
    }
}else if (isset($_POST['editar_carrera'])) {
    $res = $_POST['REGISTRO'];
    $id_est = $_POST['ID_ESTUDIANTE'];
    $cod_carr = $_POST['COD_CARRERA'];
    $f_ini = $_POST['fe_inicio'];
    $f_fin = $_POST['fe_fin'];
    if ($res != "" && $id_est != "" && $cod_carr != "" && $f_ini != "" && $f_fin != "") {
        $sql = "UPDATE REL_ACADEMICO_CARRERA SET ID_ESTUDIANTE='$id_est', COD_CARRERA='$cod_carr',FECHA_INICIO='$f_ini', FECHA_FINAL='$f_fin'
            WHERE REGISTRO='$res'";
    } else {
        echo '<span class="error">FALTAN DATOS</span>';
        exit;
    }
    $result = mysqli_query($con, $sql);
    header('Location: L_inscri_carrera.php');
    exit;
} else {
    if (isset($_GET['REGISTRO'])) {
        $res = $_GET['REGISTRO'];
        $sql = "DELETE FROM REL_ACADEMICO_CARRERA WHERE REGISTRO='" . mysqli_real_escape_string($con, $res) . "'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            header('Location: L_inscri_carrera.php');
            exit;
        } else {
            echo '<span class="error">FALTAN DATOS</span>';
        }
    }
}
