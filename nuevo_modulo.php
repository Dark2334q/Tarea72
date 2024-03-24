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
    $cod_modu = $_POST['COD_MODULO'];
    $n_modu = $_POST['NOMBRE_MOD'];
    $d_mod = $_POST['DURACION_MOD'];
    $va_mod = $_POST['VAL_MOD'];
    if ($cod_modu != "" && $n_modu != "" && $d_mod != "" && $va_mod != "") {
        $sql = "INSERT INTO MODULOS (COD_MODULO, NOMBRE_MOD, DURACION_MOD, VAL_MOD)
                VALUES  ('$cod_modu','$n_modu','$d_mod DIAS','$va_mod');";
    } else {
        echo '<span class="error">' . "FALTAN DATOS";
        exit;
    }
    $result = mysqli_query($con, $sql);
    header('Location: L_modulo.php');
    exit;
} else if (isset($_POST['editar'])) {
    $cod_modu = $_POST['COD_MODULO'];
    $n_modu = $_POST['NOMBRE_MOD'];
    $d_mod = $_POST['DURACION_MOD'];
    $va_mod = $_POST['VAL_MOD'];
    if ($cod_modu != "" && $n_modu != "" && $d_mod != "" && $va_mod != "") {
        $sql = "UPDATE MODULOS SET NOMBRE_MOD='$n_modu', DURACION_MOD='$d_mod DIAS',VAL_MOD='$va_mod'
            WHERE COD_MODULO='$cod_modu'";
    } else {
        echo '<span class="error">FALTAN DATOS</span>';
        exit;
    }
    $result = mysqli_query($con, $sql);
    header('Location: L_modulo.php');
    exit;
} else {
    if (isset($_GET['COD_MODULO'])) {
        $cod_modu = $_GET['COD_MODULO'];
        $sql = "DELETE FROM MODULOS WHERE COD_MODULO='" . mysqli_real_escape_string($con, $cod_modu) . "'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            header('Location: L_modulo.php');
            exit;
        } else {
            echo '<span class="error">FALTAN DATOS</span>';
        }
    }
}
