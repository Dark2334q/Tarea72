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
if (isset($_POST['agregar'])) {
    $cod_carre = $_POST['COD_CARRERA'];
    $n__carre = $_POST['NOMBRE_CARRERA'];
    $d_carre = $_POST['DURACION_CARRERA'];
    $va_carre = $_POST['VALOR_CARRERA'];
    if (empty($_FILES['FOTO']['tmp_name'])) {
        $sql = "INSERT INTO CARRERA (COD_CARRERA, NOMBRE_CARRERA, DURACION_CARRERA, VALOR_CARRERA)
                VALUES  ('$cod_carre','$n__carre','$d_carre MESES','$va_carre');";
    } else {
        $foto = file_get_contents($_FILES['FOTO']['tmp_name']);
        $foto_size = getimagesize($_FILES['FOTO']['tmp_name']);
        if ($cod_carre != "" && $n__carre != "" && $d_carre != "" && $va_carre != "" && $foto != "" && $foto_size != "") {
            $foto = mysqli_real_escape_string($con, $foto);
            $sql = "INSERT INTO CARRERA(COD_CARRERA, NOMBRE_CARRERA, DURACION_CARRERA, VALOR_CARRERA, FOTO)
                        VALUES  ('$cod_carre','$n__carre','$d_carre MESES','$va_carre', '$foto');";
        } else {
            echo '<span class="error">' . "FALTAN DATOS";
            exit;
        }
    }
    $result = mysqli_query($con, $sql);
    header('Location: L_carrera.php');
    exit;
} else if (isset($_POST['editar'])) {
    $cod_carre = $_POST['COD_CARRERA'];
    $n__carre = $_POST['NOMBRE_CARRERA'];
    $d_carre = $_POST['DURACION_CARRERA'];
    $va_carre = $_POST['VALOR_CARRERA'];
    if (empty($_FILES['FOTO']['tmp_name'])) {
        $sql = "UPDATE CARRERA SET NOMBRE_CARRERA='$n__carre', DURACION_CARRERA='$d_carre' 
            ,VALOR_CARRERA='$va_carre' WHERE COD_CARRERA='$cod_carre'";
    } else {
        $foto = file_get_contents($_FILES['FOTO']['tmp_name']);
        $foto_size = getimagesize($_FILES['FOTO']['tmp_name']);
        if ($cod_carre != "" && $n__carre != "" && $d_carre != "" && $va_carre != "" && $foto != "" && $foto_size != "") {
            $foto = mysqli_real_escape_string($con, $foto);
            $sql = "UPDATE CARRERA SET NOMBRE_CARRERA='$n__carre', DURACION_CARRERA='$d_carre MESES',VALOR_CARRERA='$va_carre',
            FOTO='$foto' WHERE COD_CARRERA='$cod_carre'";
        } else {
            echo '<span class="error">FALTAN DATOS</span>';
            exit;
        }
    }
    $result = mysqli_query($con, $sql);
    header('Location: L_carrera.php');
    exit;
} else {
    if (isset($_GET['COD_CARRERA'])) {
        $cod_carr = $_GET['COD_CARRERA'];
        $sql = "DELETE FROM CARRERA WHERE COD_CARRERA='" . mysqli_real_escape_string($con, $cod_carr) . "'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            header('Location: L_carrera.php');
            exit;
        } else {
            echo '<span class="error">FALTAN DATOS</span>';
        }
    }
}
