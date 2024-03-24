<?php
$consulta = "SELECT MAX(Consecutivo) AS ultimo_numero FROM rel_seminario";
$resultado = mysqli_query($con, $consulta);
$fila = mysqli_fetch_assoc($resultado);
$ultimo_numero = $fila['ultimo_numero'];
$nuevo_registro_SEMINARIO = $ultimo_numero + 1;

?>
<div class="modal fade" id="addnewinss" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <div>
                        <a href="home.php" class="site-logo-text">
                            <img src="bootstrap/img/logo_EY4.png" alt="Logo de ELYON YIREH" width="350" height="90">
                        </a>
                    </div>
                    <h4 class="modal-title" id="myModalLabel">INSCRIPCION SEMINARIO</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="nuevo_ins_semi.php">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label " style="position:relative; top:-4px;">Nº Registro:</label>
                            </div>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="Consecutivo" value="<?php echo $nuevo_registro_SEMINARIO; ?>" readonly>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">Estudiante:</label>
                            </div>
                            <div class="col-sm-10">
                                <select class="bootstrap-select bootstrap-select-arrow" name="ID_ESTUDIANTE">
                                    <option value="null"> </option>
                                    <?php
                                    $consulta = "SELECT ID_ESTUDIANTE, CONCAT(NOMBRE_EST,' ',APELLIDOS_ESTU) AS ESTUDIANTES FROM ESTUDIANTE";
                                    $ejecutar = mysqli_query($con, $consulta) or die(mysqli_error($con));
                                    while ($fila = mysqli_fetch_assoc($ejecutar)) {
                                        echo '<option value="' . $fila['ID_ESTUDIANTE'] . '">' . '[' . $fila['ID_ESTUDIANTE'] . '] ' . $fila['ESTUDIANTES'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">Seminario:</label>
                            </div>
                            <div class="col-sm-10">
                                <select class="bootstrap-select bootstrap-select-arrow" name="COD_SEMINARIO">
                                    <option value="null"> </option>
                                    <?php
                                    $consulta = "SELECT COD_SEM, NOM_SEM FROM seminario";
                                    $ejecutar = mysqli_query($con, $consulta) or die(mysqli_error($con));
                                    while ($fila = mysqli_fetch_assoc($ejecutar)) {
                                        echo '<option value="' . $fila['COD_SEM'] . '">' . $fila['NOM_SEM'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:-4px;">Fecha Semin.:</label>
                            </div>
                            <div class="col-sm-10 ">
                                <input type="date" class="form-control" name="FECHA_SEMINARIO">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:-4px;">Hora Semin.:</label>
                            </div>
                            <div class="col-sm-10 ">
                                <input type="time" class="form-control" name="HORA_SEMINARIO">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">Lugar Semina.:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="LUGAR_SEMINARIO">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">Valor Semina.:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="number" step="0.01" class="form-control" name="VALOR_SEMINARIO"  id="VALOR_SEMINARIO" placeholder="$ 00.00" onfocus="clearDefaultValue()">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">Confer- encista:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="CONFERENCISTA_SEMINARIO">
                            </div>
                        </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CANCELAR</button>
                <button type="submit" name="agregar_seminario" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> GUARDAR </button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function clearDefaultValue() {
        var input = document.getElementById('VALOR_SEMINARIO');
        if (input.value === "$ 00.00") {
            input.value = "0";
        }
    }
    document.getElementById('VALOR_SEMINARIO').addEventListener('blur', function() {
        var input = document.getElementById('VALOR_SEMINARIO');
        if (input.value === "") {
            input.value = "$ 00.00";
        }
    });
</script>
<div class="modal fade" id="editinssemi_<?php echo $row['Consecutivo']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <div>
                        <a href="home.php" class="site-logo-text">
                            <img src="bootstrap/img/logo_EY4.png" alt="Logo de ELYON YIREH" width="350" height="90">
                        </a>
                    </div>
                    <h4 class="modal-title" id="myModalLabel">ACTUALIZAR INSCRICION DE SEMINARIO</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="nuevo_ins_semi.php">
                        <input type="hidden" class="form-control" name="Consecutivo" value="<?php echo $row['Consecutivo']; ?>">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">Estudiante:</label>
                            </div>
                            <div class="col-sm-10">
                                <select name="ID_ESTUDIANTE">
                                    <option value="null"> </option>
                                    <?php
                                    $consulta = "SELECT ID_ESTUDIANTE, CONCAT(NOMBRE_EST,' ',APELLIDOS_ESTU) AS ESTUDIANTES FROM ESTUDIANTE";
                                    $ejecutar = mysqli_query($con, $consulta) or die(mysqli_error($con));
                                    $valor_seleccionado = $row['ID_ESTUDIANTE'];
                                    while ($fila = mysqli_fetch_assoc($ejecutar)) {
                                        $selected = "";
                                        if ($fila['ID_ESTUDIANTE'] == $valor_seleccionado) {
                                            $selected = "selected";
                                        }
                                        echo '<option value="' . $fila['ID_ESTUDIANTE'] . '"' . $selected . '>' . '[' . $fila['ID_ESTUDIANTE'] . '] ' . $fila['ESTUDIANTES'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">Seminario:</label>
                            </div>
                            <div class="col-sm-10">
                                <select class="" name="COD_SEMINARIO">
                                    <option value="null"> </option>
                                    <?php
                                    $consulta = "SELECT COD_SEM, NOM_SEM FROM seminario";
                                    $ejecutar = mysqli_query($con, $consulta) or die(mysqli_error($con));
                                    $valor_seleccionado = $row['COD_SEM'];
                                    while ($fila = mysqli_fetch_assoc($ejecutar)) {
                                        $selected = "";
                                        if ($fila['COD_SEM'] == $valor_seleccionado) {
                                            $selected = "selected";
                                        }
                                        echo '<option value="' . $fila['COD_SEM'] . '"' . $selected . '>' . $fila['NOM_SEM'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:-4px;">Fecha Semin.:</label>
                            </div>
                            <div class="col-sm-10 ">
                                <?php
                                $fecha_db = $row['FECHA_SEMINARIO'];
                                $fecha_formateada = date('Y-m-d', strtotime(str_replace('/', '-', $fecha_db)));
                                ?>
                                <input type="date" class="form-control" name="FECHA_SEMINARIO" value="<?php echo $fecha_formateada; ?>" id="FECHA_SEMINARIO">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:-4px;">Hora Semin.:</label>
                            </div>
                            <div class="col-sm-10 ">
                                <input type="time" class="form-control" name="HORA_SEMINARIO" value="<?php echo date('H:i', strtotime($row['HORA_SEMINARIO'])); ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">Lugar Semina.:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="LUGAR_SEMINARIO" value="<?php echo $row['LUGAR_SEMINARIO']; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">Valor Semina.:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="number" step="0.01" class="form-control" name="VALOR_SEMINARIO" value="<?php echo $row['VALOR_SEMINARIO']; ?>"  id="VALOR_SEMINARIO" placeholder="$ 00.00" onfocus="clearDefaultValue()">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">Confer- encista:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="CONFERENCISTA_SEMINARIO" value="<?php echo $row['CONFERENCISTA_SEMINARIO']; ?>">
                            </div>
                        </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CANCELAR</button>
                <button type="submit" name="editar_semi" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> ACTUALIZAR</a>
                    </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deletessemi_<?php echo $row['Consecutivo']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <div>
                        <a href="home.php" class="site-logo-text">
                            <img src="bootstrap/img/logo_EY4.png" alt="Logo de ELYON YIREH" width="350" height="90">
                        </a>
                    </div>
                    <h4 class="modal-title" id="myModalLabel">BORRAR INSCRICION DE SEMINARIO</h4>
                </center>
            </div>
            <div class="modal-body">
                <p class="text-center">¿Esta Seguro de Borrar del Registro?</p>
                <h2 class="text-center"><?php echo '[' . $row['Consecutivo'] . '] [' . $row['NOMBRE'] . '] [' . $row['Estudiante'] . ']'; ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CANCELAR</button>
                <a href="nuevo_ins_semi.php?Consecutivo=<?php echo $row['Consecutivo']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> SI</a>
            </div>
        </div>
    </div>
</div>