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
        $n_fac = $_POST['NFACTURA'];
        $fec_pag = $_POST['FECHA_DE_PAGO'];
        $va_abo = $_POST['VALOR_ABONO'];

        if (
            $id_doc != "" && $n_fac != "" && $fec_pag != "" && $va_abo != ""
        ) {
            $sql = "INSERT INTO COPIA_REL_PAGOS_DOC(NFACTURA, ID_DOCENTE, FECHA_DE_PAGO, VALOR_ABONO)
             VALUES  ('" . $n_fac . "','" . $id_doc . "','" . $fec_pag . "','" . $va_abo . "');";
        } else {
            echo '<span class="error">' . "FALTAN DATOS";
        }
        $result = mysqli_query($con, $sql);
        header('Location: L_pago_doce.php');
        exit;
    }
} else if (isset($_POST['editar'])) {
    if (isset($_POST['editar'])) {
        $n_fac = $_POST['NFACTURA'];
        $id_doc = $_POST['ID_DOCENTE'];
        $fec_pag = $_POST['FECHA_DE_PAGO'];
        $va_abo = $_POST['VALOR_ABONO'];

        if ($id_doc != "" && $n_fac != "" && $fec_pag != "" && $va_abo != "") {
            $sql = "UPDATE COPIA_REL_PAGOS_DOC SET ID_DOCENTE='" . $id_doc . "', FECHA_DE_PAGO='" . $fec_pag . "' 
            ,VALOR_ABONO='" . $va_abo . "'
            WHERE NFACTURA='" . $n_fac . "'";
        } else {
            echo '<span class="error">FALTAN DATOS</span>';
        }
        $result = mysqli_query($con, $sql);
        header('Location: L_pago_doce.php');
        exit;
    }
} else {
    if (isset($_GET['NFACTURA'])) {
        $N_fac = $_GET['NFACTURA'];
        $sql = "DELETE FROM COPIA_REL_PAGOS_DOC WHERE NFACTURA='" . mysqli_real_escape_string($con, $N_fac) . "'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            header('Location: L_pago_doce.php');
            exit;
        } else {
            $error_message = "Error al eliminar el docente: " . mysqli_error($con);
        }
    } else {
        $error_message = "FALTAN DATOS";
    }
}
