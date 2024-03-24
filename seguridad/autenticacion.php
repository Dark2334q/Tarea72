
<?php
include "config.php";
if (isset($_POST['boton'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    if ($user != "" && $pass != "") {
        $sql_query = "SELECT * FROM usuarios WHERE usuario='" . $user . "'";
        $result = mysqli_query($con, $sql_query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            if ($pass == $row['Pass']) {
                $_SESSION['user'] = $user;
                header('Location: home.php');
            } else {
                echo '<span>' . "Contraseña incorrecta</span>";
            }
        } else {
            echo '<span >' . "Usuario no encontrado</span>";
        }
    } elseif ($user != "") {
        echo '<span>' . "Ingresar Contraseña</span>";
    } else {
        echo '<span>' . "Ingresar Usuario y Contraseña </span>";
    }
}
?>