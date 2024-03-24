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
    $id_est = $_POST['ID_ESTUDIANTE'];
    $nom_est = $_POST['NOMBRE_EST'];
    $ape_est = $_POST['APELLIDOS_ESTU'];
    $dir_est = $_POST['DIRECCION_EST'];
    $eda_est = $_POST['EDAD_EST'];
    $sex_est = $_POST['SEXO_EST'];
    $tsan_est = $_POST['TSANGRE_EST'];
    $tel_est = $_POST['TELEFONO_EST'];
    $corr_est = $_POST['CORREO_EST'];
    $eci_est = $_POST['ECIVIL_EST'];
    $fna_est = $_POST['FNACIMIENTO_EST'];

    if (
        $id_est != "" && $nom_est != "" && $ape_est != "" && $dir_est != "" &&
        $eda_est != "" && $sex_est != "" && $tsan_est != "" && $tel_est != "" &&
        $corr_est != "" && $eci_est != "" && $fna_est != ""
    ) {
        $sql = "INSERT INTO ESTUDIANTE(ID_ESTUDIANTE, NOMBRE_EST, APELLIDOS_ESTU, DIRECCION_EST, 
            EDAD_EST, SEXO_EST, TSANGRE_EST, TELEFONO_EST, CORREO_EST, ECIVIL_EST, FNACIMIENTO_EST) VALUES  
        ('" . $id_est . "','" . $nom_est . "','" . $ape_est . "','" . $dir_est . "','" . $eda_est . "'
        ,'" . $sex_est . "','" . $tsan_est . "','" . $tel_est . "','" . $corr_est . "','" . $eci_est . "','" . $fna_est . "');";
        $result = mysqli_query($con, $sql);
        header('Location: L_estudiante.php');
        exit;
    } else {
        echo '<span class="error">' . "FALTAN DATOS";
    }
} else if (isset($_POST['editar'])) {
    $id_est = $_POST['ID_ESTUDIANTE'];
    $nom_est = $_POST['NOMBRE_EST'];
    $ape_est = $_POST['APELLIDOS_ESTU'];
    $dir_est = $_POST['DIRECCION_EST'];
    $eda_est = $_POST['EDAD_EST'];
    $sex_est = $_POST['SEXO_EST'];
    $tsan_est = $_POST['TSANGRE_EST'];
    $tel_est = $_POST['TELEFONO_EST'];
    $corr_est = $_POST['CORREO_EST'];
    $eci_est = $_POST['ECIVIL_EST'];
    $fna_est = $_POST['FNACIMIENTO_EST'];

    if (
        $id_est != "" && $nom_est != "" && $ape_est != "" && $dir_est != "" &&
        $eda_est != "" && $sex_est != "" && $tsan_est != "" && $tel_est != "" &&
        $corr_est != "" && $eci_est != "" && $fna_est != ""
    ) {
        $sql = "UPDATE ESTUDIANTE SET NOMBRE_EST='" . $nom_est . "', APELLIDOS_ESTU='" . $ape_est . "' ,DIRECCION_EST='" . $dir_est . "' ,
            EDAD_EST='" . $eda_est . "', SEXO_EST='" . $sex_est . "' , TSANGRE_EST='" . $tsan_est . "', TELEFONO_EST='" . $tel_est . "' ,
            CORREO_EST='" . $corr_est . "', ECIVIL_EST='" . $eci_est . "' , FNACIMIENTO_EST='" . $fna_est . "'
            WHERE ID_ESTUDIANTE='" . $id_est . "'";
        $result = mysqli_query($con, $sql);
        header('Location: L_estudiante.php');
        exit;
    } else {
        echo '<span class="error">' . "FALTAN DATOS";
    }
}  else if (isset($_POST['agregar_est_pag'])) {
    $n_fac = $_POST['NFACTURA'];
    $f_pag = $_POST['FECHA_PAGO'];
    $id_est = $_POST['ID_ESTUDIANTE'];
    $cod_carr = $_POST['COD_CARRERA'];
    $cod_mod = $_POST['COD_MOD'];
    $t_pag = $_POST['TIPO_PAGO'];
    $v_abo = $_POST['VALOR_ABONO'];

    if (
        $n_fac != "" && $f_pag != "" && $id_est != "" && $cod_carr != "" && $cod_mod != "" && $t_pag != "" && $v_abo != "" 
    ) {
        $sql = "INSERT INTO rel_pagos_est (NFACTURA, FECHA_PAGO, ID_ESTUDIANTE, COD_CARRERA, COD_MOD, TIPO_PAGO, VALOR_ABONO) VALUES  
        ('" . $n_fac . "','" . $f_pag . "','" . $id_est . "','" . $cod_carr . "','" . $cod_mod . "','" . $t_pag . "','" . $v_abo . "');";
        $result = mysqli_query($con, $sql);
        header('Location: L_estudiante.php');
        exit;
    } else {
        echo '<span class="error">' . "FALTAN DATOS";
    }
}  else {
    if (isset($_GET['ID_ESTUDIANTE'])) {
        $id_estudiante = $_GET['ID_ESTUDIANTE'];
        $sql = "DELETE FROM ESTUDIANTE WHERE ID_ESTUDIANTE='" . mysqli_real_escape_string($con, $id_estudiante) . "'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            header('Location: L_estudiante.php');
            exit;
        } else {
            $error_message = "Error al eliminar el docente: " . mysqli_error($con);
        }
    } else {
        $error_message = "FALTAN DATOS";
    }
}
