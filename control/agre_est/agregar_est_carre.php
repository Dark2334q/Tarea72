<?php
$consulta = "SELECT MAX(REGISTRO) AS ultimo_numero FROM REL_ACADEMICO_CARRERA";
$resultado = mysqli_query($con, $consulta);
$fila = mysqli_fetch_assoc($resultado);
$ultimo_numero = $fila['ultimo_numero'];
$nuevo_registro = $ultimo_numero + 1;

?>

<div class="modal fade" id="addnewinsc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <div>
                        <a href="home.php" class="site-logo-text">
                            <img src="bootstrap/img/logo_EY4.png" alt="Logo de ELYON YIREH" width="350" height="90">
                        </a>
                    </div>
                    <h4 class="modal-title" id="myModalLabel">INSCRIPCION CARRERA</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="nuevo_ins_carre.php">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label " style="position:relative; top:-4px;">Nº Registro:</label>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="REGISTRO" value="<?php echo $nuevo_registro; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label control-label-form">Alumno:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <select class="bootstrap-select bootstrap-select-arrow" name="ID_ESTUDIANTE">
                                            <option value="null"> </option>
                                            <?php
                                            $consulta = "SELECT ID_ESTUDIANTE, CONCAT(NOMBRE_EST,' ',APELLIDOS_ESTU) AS ESTUDIANTE FROM ESTUDIANTE";
                                            $ejecutar = mysqli_query($con, $consulta) or die(mysqli_error($con));
                                            while ($fila = mysqli_fetch_assoc($ejecutar)) {
                                                echo '<option value="' . $fila['ID_ESTUDIANTE'] . '">' . '[' . $fila['ID_ESTUDIANTE'] . '] ' . $fila['ESTUDIANTE'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label control-label-form">Carrera:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <select class="bootstrap-select bootstrap-select-arrow" name="COD_CARRERA" onchange="buscar_ahora(this.value);">
                                            <option value="null"> </option>
                                            <?php
                                            $consulta = "SELECT COD_CARRERA, NOMBRE_CARRERA FROM CARRERA";
                                            $ejecutar = mysqli_query($con, $consulta) or die(mysqli_error($con));
                                            while ($fila = mysqli_fetch_assoc($ejecutar)) {
                                                echo '<option value="' . $fila['COD_CARRERA'] . '">' . $fila['NOMBRE_CARRERA'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label" style="position:relative; top:-4px;">Fecha Inicio:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control" name="FECHA_INICIO">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label" style="position:relative; top:-4px;">Fecha Final:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control" name="FECHA_FINAL">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <div class="row form-group">
                                        <div class="col-sm-2">
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="card-body">
                                                <div id="datos_buscador"></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CANCELAR</button>
                <button type="submit" name="agregar_carrera" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> GUARDAR </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editinscarre_<?php echo $row['REGISTRO']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <div>
                        <a href="home.php" class="site-logo-text">
                            <img src="bootstrap/img/logo_EY4.png" alt="Logo de ELYON YIREH" width="350" height="90">
                        </a>
                    </div>
                    <h4 class="modal-title" id="myModalLabel">ACTUALIZAR INSCRIPCION CARRERA</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="nuevo_ins_carre.php">
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" name="REGISTRO" value="<?php echo $row['REGISTRO']; ?>">
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label control-label-form">Alumno:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <select name="ID_ESTUDIANTE">
                                            <option value="null"> </option>
                                            <?php
                                            $consulta = "SELECT ID_ESTUDIANTE, CONCAT(NOMBRE_EST,' ',APELLIDOS_ESTU) AS ESTUDIANTE FROM ESTUDIANTE";
                                            $ejecutar = mysqli_query($con, $consulta) or die(mysqli_error($con));
                                            $valor_seleccionado = $row['ID_ESTUDIANTE'];
                                            while ($fila = mysqli_fetch_assoc($ejecutar)) {
                                                $selected = "";
                                                if ($fila['ID_ESTUDIANTE'] == $valor_seleccionado) {
                                                    $selected = "selected";
                                                }
                                                echo '<option value="' . $fila['ID_ESTUDIANTE'] . '"' . $selected . '>' . '[' . $fila['ID_ESTUDIANTE'] . '] ' . $fila['ESTUDIANTE'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label control-label-form">Carrera:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <select name="COD_CARRERA">
                                            <option value="null"> </option>
                                            <?php
                                            $consulta = "SELECT COD_CARRERA, NOMBRE_CARRERA FROM CARRERA";
                                            $ejecutar = mysqli_query($con, $consulta) or die(mysqli_error($con));
                                            $valor_seleccionado = $row['COD_CARRERA'];
                                            while ($fila = mysqli_fetch_assoc($ejecutar)) {
                                                $selected = "";
                                                if ($fila['COD_CARRERA'] == $valor_seleccionado) {
                                                    $selected = "selected";
                                                }
                                                echo '<option value="' . $fila['COD_CARRERA'] . '"' . $selected . '>' . $fila['NOMBRE_CARRERA'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label" style="position:relative; top:-4px;">Fecha Inicio:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <?php
                                        $fecha_db = $row['fe_inicio'];
                                        $fecha_formateada = date('Y-m-d', strtotime(str_replace('/', '-', $fecha_db)));
                                        ?>
                                        <input type="date" class="form-control" name="fe_inicio" value="<?php echo $fecha_formateada; ?>" id="fe_inicio">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label" style="position:relative; top:-4px;">Fecha Final:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <?php
                                        $fecha_db = $row['fe_fin'];
                                        $fecha_formateada = date('Y-m-d', strtotime(str_replace('/', '-', $fecha_db)));
                                        ?>
                                        <input type="date" class="form-control" name="fe_fin" value="<?php echo $fecha_formateada; ?>" id="fe_fin">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <div class="row form-group">
                                        <div class="col-sm-2">
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="card-body">
                                                    <img src="data:image/jpeg;base64,<?php echo base64_encode($row['FOTO']); ?>" style="max-width: 100%; max-height: 200px; object-fit: cover;" />
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CANCELAR</button>
                <button type="submit" name="editar_carrera" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> ACTUALIZAR</a>
                    </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deletescarre_<?php echo $row['REGISTRO']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <h4 class="modal-title" id="myModalLabel">BORRAR INSTRICION DE CARRERA</h4>
                </center>
            </div>
            <div class="modal-body">
                <p class="text-center">¿Esta Seguro de Borrar del Registro?</p>
                <h2 class="text-center"><?php echo '[' . $row['REGISTRO'] . '] [' . $row['CARRERA'] . '] [' . $row['Estudiante'] . ']'; ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CANCELAR</button>
                <a href="nuevo_ins_carre.php?REGISTRO=<?php echo $row['REGISTRO']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> SI</a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function buscar_ahora(buscar) {
        var parametros = {
            "buscar": buscar
        };
        $.ajax({
            data: parametros,
            type: 'POST',
            url: 'buscador.php',
            success: function(data) {
                document.getElementById("datos_buscador").innerHTML = data;
            }
        });
    }
</script>