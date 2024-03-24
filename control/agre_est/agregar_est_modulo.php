<?php
$consulta = "SELECT MAX(REGISTRO) AS ultimo_numero FROM REL_ACADEMICO_MODULO";
$resultado = mysqli_query($con, $consulta);
$fila = mysqli_fetch_assoc($resultado);
$ultimo_numero = $fila['ultimo_numero'];
$nuevo_registro_MODULO = $ultimo_numero + 1;

?>
<div class="modal fade" id="addnewinsm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <h4 class="modal-title" id="myModalLabel">INSCRIPCION MODULO</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="nuevo_ins_modu.php">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label " style="position:relative; top:-4px;">Nº Registro:</label>
                            </div>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="REGISTRO" value="<?php echo $nuevo_registro_MODULO; ?>" readonly>
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
                                <label class="control-label control-label-form">Modulo:</label>
                            </div>
                            <div class="col-sm-10">
                                <select class="bootstrap-select bootstrap-select-arrow" name="COD_MODULO">
                                    <option value="null"> </option>
                                    <?php
                                    $consulta = "SELECT COD_MODULO, NOMBRE_MOD FROM MODULOS";
                                    $ejecutar = mysqli_query($con, $consulta) or die(mysqli_error($con));
                                    while ($fila = mysqli_fetch_assoc($ejecutar)) {
                                        echo '<option value="' . $fila['COD_MODULO'] . '">' . $fila['NOMBRE_MOD'] . '</option>';
                                    }
                                    ?>
                                    </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:-4px;">Fecha Inicio:</label>
                            </div>
                            <div class="col-sm-10 ">
                                <input type="date" class="form-control" name="FECHA_INICIO">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:-4px;">Fecha Fin:</label>
                            </div>
                            <div class="col-sm-10 ">
                                <input type="date" class="form-control" name="FECHA_FIN">
                            </div>
                        </div>
                        
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CANCELAR</button>
                <button type="submit" name="agregar_modulo" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> GUARDAR </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editinsmodu_<?php echo $row['REGISTRO']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <h4 class="modal-title" id="myModalLabel">ACTUALIZAR INSCRICION DE MODULO</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="nuevo_ins_modu.php">
                                <input type="hidden" class="form-control" name="REGISTRO" value="<?php echo $row['REGISTRO']; ?>">
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
                                        echo '<option value="' . $fila['ID_ESTUDIANTE'] . '"' .$selected.'>' . '[' . $fila['ID_ESTUDIANTE'] . '] ' . $fila['ESTUDIANTES'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">Modulo:</label>
                            </div>
                            <div class="col-sm-10">
                                <select class="" name="COD_MODULO">
                                <option value="null"> </option>
                                    <?php
                                    $consulta = "SELECT COD_MODULO, NOMBRE_MOD FROM MODULOS";
                                    $ejecutar = mysqli_query($con, $consulta) or die(mysqli_error($con));
                                    $valor_seleccionado = $row['COD_MODULO'];
                                    while ($fila = mysqli_fetch_assoc($ejecutar)) {
                                        $selected = "";
                                        if ($fila['COD_MODULO'] == $valor_seleccionado) {
                                            $selected = "selected";
                                        }
                                        echo '<option value="' . $fila['COD_MODULO'] . '"' .$selected.'>' . $fila['NOMBRE_MOD'] . '</option>';
                                    }
                                    ?>
                                    </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:-4px;">Fecha Inicio:</label>
                            </div>
                            <div class="col-sm-10 ">
                            <?php
                                $fecha_db = $row['fe_inicio'];
                                $fecha_formateada = date('Y-m-d', strtotime(str_replace('/', '-', $fecha_db)));
                                ?>
                                <input type="date" class="form-control" name="fe_inicio" value="<?php echo $fecha_formateada; ?>" id="fe_inicio">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:-4px;">Fecha Fin:</label>
                            </div>
                            <div class="col-sm-10 ">
                            <?php
                                $fecha_db = $row['fe_fin'];
                                $fecha_formateada = date('Y-m-d', strtotime(str_replace('/', '-', $fecha_db)));
                                ?>
                                <input type="date" class="form-control" name="fe_fin" value="<?php echo $fecha_formateada; ?>" id="fe_fin">
                            </div>
                        </div>
                        
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CANCELAR</button>
                <button type="submit" name="editar_modulo" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> ACTUALIZAR</a>
                    </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deletesmodu_<?php echo $row['REGISTRO']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <h4 class="modal-title" id="myModalLabel">BORRAR INSTRICION DE MODULO</h4>
                </center>
            </div>
            <div class="modal-body">
                <p class="text-center">¿Esta Seguro de Borrar del Registro?</p>
                <h2 class="text-center"><?php echo '[' . $row['REGISTRO'] . '] [' . $row['modulo'] . '] [' . $row['Estudiante'] . ']'; ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CANCELAR</button>
                <a href="nuevo_ins_modu.php?REGISTRO=<?php echo $row['REGISTRO']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> SI</a>
            </div>
        </div>
    </div>
</div>