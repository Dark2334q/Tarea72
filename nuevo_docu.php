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
    if (isset($_POST['agregar'])) {
        $id_doc = $_POST['ID_DOCENTE'];
        $nom_doc = $_POST['NOMBRE_DOCENTE'];
        $ape_doc = $_POST['APELLIDOS_DOCENTE'];
        $dir_doc = $_POST['DIRECCION_DOCENTE'];
        $tel_doc = $_POST['TELEFONO_DOCENTE'];
        $corre_doc = $_POST['CORREO_DOCENTE'];
        $sex_doc = $_POST['SEXO_DOCENTE'];
        $eci_doc = $_POST['ECIVIL_DOCENTE'];

        if (
            $id_doc != "" && $nom_doc != "" && $ape_doc != "" && $dir_doc != "" &&
            $tel_doc != "" && $corre_doc != "" && $sex_doc != "" && $eci_doc != ""
        ) {
            $sql = "INSERT INTO DOCENTE(ID_DOCENTE, NOMBRE_DOCENTE, APELLIDOS_DOCENTE, 
        DIRECCION_DOCENTE, TELEFONO_DOCENTE, CORREO_DOCENTE, SEXO_DOCENTE, ECIVIL_DOCENTE) VALUES  
        ('" . $id_doc . "','" . $nom_doc . "','" . $ape_doc . "','" . $dir_doc . "','" . $tel_doc . "'
        ,'" . $corre_doc . "','" . $sex_doc . "','" . $eci_doc . "');";
            $result = mysqli_query($con, $sql);
            header('Location: L_docente.php');
            exit;
        } else {
            echo '<span class="error">' . "FALTAN DATOS";
        }
    }
} else if (isset($_POST['editar'])) {
    if (isset($_POST['editar'])) {
        $id_doc = $_POST['ID_DOCENTE'];
        $nom_doc = $_POST['NOMBRE_DOCENTE'];
        $ape_doc = $_POST['APELLIDOS_DOCENTE'];
        $dir_doc = $_POST['DIRECCION_DOCENTE'];
        $tel_doc = $_POST['TELEFONO_DOCENTE'];
        $corre_doc = $_POST['CORREO_DOCENTE'];
        $sex_doc = $_POST['SEXO_DOCENTE'];
        $eci_doc = $_POST['ECIVIL_DOC'];

        if ($id_doc != "" && $nom_doc != "" && $ape_doc != "" && $dir_doc != "" &&
        $tel_doc != "" && $corre_doc != "" && $sex_doc != "" ) {
            $sql = "UPDATE DOCENTE SET NOMBRE_DOCENTE='" . $nom_doc . "', APELLIDOS_DOCENTE='" . $ape_doc . "' 
            ,DIRECCION_DOCENTE='" . $dir_doc . "' ,TELEFONO_DOCENTE='" . $tel_doc . "'
            , CORREO_DOCENTE='" . $corre_doc . "' , SEXO_DOCENTE='" . $sex_doc . "', ECIVIL_DOCENTE='" . $eci_doc . "'
            where ID_DOCENTE='" . $id_doc . "'";
            $result = mysqli_query($con, $sql);
            header('Location: L_docente.php');
            exit;
        } else {
            echo '<span class="error">' . "FALTAN DATOS";
        }
    }
} else {
    if (isset($_GET['ID_DOCENTE'])) {
        $docente_id = $_GET['ID_DOCENTE'];
        $sql = "DELETE FROM DOCENTE WHERE ID_DOCENTE='" . mysqli_real_escape_string($con, $docente_id) . "'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            header('Location: L_docente.php');
            exit;
        } else {
            $error_message = "Error al eliminar el docente: " . mysqli_error($con);
        }
    } else {
        $error_message = "FALTAN DATOS";
    }
}
