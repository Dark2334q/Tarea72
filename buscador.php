<?php
include("seguridad/config.php");
function resaltar_frase($string, $frase, $taga = '<b>', $tagb = '</b>')
{
    return ($string !== '' && $frase !== '')
        ? preg_replace('/(' . preg_quote($frase, '/') . ')/i', $taga . '\\1' . $tagb, $string)
        : $string;
}

if (isset($_POST['buscar']) && !empty($_POST['buscar'])) {
    $aKeyword = explode(" ", $_POST['buscar']);
    $query = "SELECT FOTO FROM carrera WHERE COD_CARRERA = ?";
    $parametros = [];
    $parametros[] = strtolower(trim($aKeyword[0]));

    for ($i = 1; $i < count($aKeyword); $i++) {
        if (!empty($aKeyword[$i])) {
            $parametros[] = strtolower(trim($aKeyword[$i]));
            $query .= " OR LOWER(COD_CARRERA) =?";
        }
    }

    $stmt = $con->prepare($query);
    $stmt->bind_param(str_repeat('s', count($parametros)), ...$parametros);
    $stmt->execute();
    $result = $stmt->get_result();

    $numero = mysqli_num_rows($result);

    if ($numero > 0 && $_POST['buscar'] != '') {
        $row_count = 0;
        while ($row = $result->fetch_assoc()) {
            $row_count++;
            $foto = $row['FOTO'];
            echo '<td><img src="data:image/jpeg;base64,' . base64_encode($foto) . '" style="max-width: 100%; max-height: 200px; object-fit: cover;"></td>';
        }
    }
}

if (isset($_POST['buscar2']) && !empty($_POST['buscar2'])) {
    $aKeyword = explode(" ", $_POST['buscar2']);
    $query = "SELECT FOTO FROM carrera WHERE COD_CARRERA = ?";
    $parametros = [];
    $parametros[] = strtolower(trim($aKeyword[0]));

    for ($i = 1; $i < count($aKeyword); $i++) {
        if (!empty($aKeyword[$i])) {
            $parametros[] = strtolower(trim($aKeyword[$i]));
            $query .= " OR LOWER(COD_CARRERA) = ?";
        }
    }

    $stmt = $con->prepare($query);
    $stmt->bind_param(str_repeat('s', count($parametros)), ...$parametros);
    $stmt->execute();
    $result = $stmt->get_result();

    $numero = mysqli_num_rows($result);

    if ($numero > 0 && $_POST['buscar2'] != '') {
        $row_count = 0;
        while ($row = $result->fetch_assoc()) {
            $row_count++;
            $foto = $row['FOTO'];
            echo '<td><img src="data:image/jpeg;base64,' . base64_encode($foto) . '" style="max-width: 100%; max-height: 200px; object-fit: cover;"></td>';
        }
    }
}
?>