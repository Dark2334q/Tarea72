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
 if (isset($_POST['agregar_seminario'])) {
    $conse = $_POST['Consecutivo'];
    $id_est = $_POST['ID_ESTUDIANTE'];
    $cod_semi = $_POST['COD_SEMINARIO'];
    $fe_semi = $_POST['FECHA_SEMINARIO'];
    $ho_semi = $_POST['HORA_SEMINARIO'];
    $lu_semi = $_POST['LUGAR_SEMINARIO'];
    $va_semi = $_POST['VALOR_SEMINARIO'];
    $con_se = $_POST['CONFERENCISTA_SEMINARIO'];

    if (
        $conse != "" && $id_est != "" && $cod_semi != "" && $fe_semi != "" && $ho_semi != "" && $lu_semi != ""  && $va_semi != ""  && $con_se != "" 
    ) {
        $ho_semi = date('H:i', strtotime($_POST['HORA_SEMINARIO']));
        $sql = "INSERT INTO rel_seminario (Consecutivo, ID_ESTUDIANTE, COD_SEMINARIO, FECHA_SEMINARIO, 
        HORA_SEMINARIO, LUGAR_SEMINARIO, VALOR_SEMINARIO, CONFERENCISTA_SEMINARIO) VALUES  
        ('" . $conse . "','" . $id_est . "','" . $cod_semi . "','" . $fe_semi . "','" . $ho_semi . "','" . $lu_semi . "','" . $va_semi . "'
        ,'" . $con_se . "');";
        $result = mysqli_query($con, $sql);
        header('Location: L_inscri_seminario.php');
        exit;
    } else {
        echo '<span class="error">' . "FALTAN DATOS";
    }
} else if (isset($_POST['editar_semi'])) {
    $conse = $_POST['Consecutivo'];
    $id_est = $_POST['ID_ESTUDIANTE'];
    $cod_semi = $_POST['COD_SEMINARIO'];
    $fe_semi = $_POST['FECHA_SEMINARIO'];
    $ho_semi = $_POST['HORA_SEMINARIO'];
    $lu_semi = $_POST['LUGAR_SEMINARIO'];
    $va_semi = $_POST['VALOR_SEMINARIO'];
    $con_se = $_POST['CONFERENCISTA_SEMINARIO'];

    if (
        $conse != "" && $id_est != "" && $cod_semi != "" && $fe_semi != "" && $ho_semi != "" && $lu_semi != ""  && $va_semi != ""  && $con_se != "" 
    ) {
        $sql = "UPDATE rel_seminario SET ID_ESTUDIANTE='" . $id_est . "', COD_SEMINARIO='" . $cod_semi . "' ,FECHA_SEMINARIO='" . $fe_semi . "' ,
        HORA_SEMINARIO='" . $ho_semi . "' ,LUGAR_SEMINARIO='" . $lu_semi . "' ,VALOR_SEMINARIO='" . $va_semi . "' ,CONFERENCISTA_SEMINARIO='" . $con_se . "'
            WHERE Consecutivo='" . $conse . "'";
        $result = mysqli_query($con, $sql);
        header('Location: L_inscri_seminario.php');
        exit;
    } else {
        echo '<span class="error">' . "FALTAN DATOS";
    }
} else {
    if (isset($_GET['Consecutivo'])) {
        $cone = $_GET['Consecutivo'];
        $sql = "DELETE FROM rel_seminario WHERE Consecutivo='" . mysqli_real_escape_string($con, $cone) . "'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            header('Location: L_inscri_seminario.php');
            exit;
        } else {
            $error_message = "Error al eliminar el docente: " . mysqli_error($con);
        }
    } else {
        $error_message = "FALTAN DATOS";
    }
}

?>
