<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "mariayiret08";
$con = mysqli_connect($host, $user, $password, $dbname);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$error_message = "";
 if (isset($_POST['agregar_modulo'])) {
    $reg = $_POST['REGISTRO'];
    $id_est = $_POST['ID_ESTUDIANTE'];
    $cod_mod = $_POST['COD_MODULO'];
    $f_ini = $_POST['FECHA_INICIO'];
    $f_fin = $_POST['FECHA_FIN'];

    if (
        $reg != "" && $id_est != "" && $cod_mod != "" && $f_ini != "" && $f_fin != ""  
    ) {
        $sql = "INSERT INTO rel_academico_modulo (REGISTRO, ID_ESTUDIANTE, COD_MODULO, FECHA_INICIO, FECHA_FIN) VALUES  
        ('" . $reg . "','" . $id_est . "','" . $cod_mod . "','" . $f_ini . "','" . $f_fin . "');";
        $result = mysqli_query($con, $sql);
        header('Location: L_inscri_modulo.php');
        exit;
    } else {
        echo '<span class="error">' . "FALTAN DATOS";
    }
} else if (isset($_POST['editar_modulo'])) {
    $reg = $_POST['REGISTRO'];
    $id_est = $_POST['ID_ESTUDIANTE'];
    $cod_mod = $_POST['COD_MODULO'];
    $f_ini = $_POST['fe_inicio'];
    $f_fin = $_POST['fe_fin'];

    if (
        $reg != "" && $id_est != "" && $cod_mod != "" && $f_ini != "" && $f_fin != ""  
    ) {
        $sql = "UPDATE rel_academico_modulo SET ID_ESTUDIANTE='" . $id_est . "', COD_MODULO='" . $cod_mod . "' ,FECHA_INICIO='" . $f_ini . "' ,
        FECHA_FIN='" . $f_fin . "'
            WHERE REGISTRO='" . $reg . "'";
        $result = mysqli_query($con, $sql);
        header('Location: L_inscri_modulo.php');
        exit;
    } else {
        echo '<span class="error">' . "FALTAN DATOS";
    }
} else {
    if (isset($_GET['REGISTRO'])) {
        $reg = $_GET['REGISTRO'];
        $sql = "DELETE FROM rel_academico_modulo WHERE REGISTRO='" . mysqli_real_escape_string($con, $reg) . "'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            header('Location: L_inscri_modulo.php');
            exit;
        } else {
            $error_message = "Error al eliminar el docente: " . mysqli_error($con);
        }
    } else {
        $error_message = "FALTAN DATOS";
    }
}

?>