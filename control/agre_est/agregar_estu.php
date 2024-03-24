<?php
$consulta = "SELECT ID_ESTUDIANTE FROM ESTUDIANTE ORDER BY CAST(SUBSTRING(ID_ESTUDIANTE, 2) AS UNSIGNED) DESC LIMIT 1";
$resultado = mysqli_query($con, $consulta);
$fila = mysqli_fetch_assoc($resultado);

if (empty($fila)) {
    $nuevo_id_estudiante = 'L1';
} else {
    $ultimo_numero = $fila['ID_ESTUDIANTE'];
    $letra = substr($ultimo_numero, 0, 1);
    $numero = intval(substr($ultimo_numero, 1)) + 1;
    $nuevo_id_estudiante = $letra . str_pad($numero, 2, '0', STR_PAD_LEFT);
}
?>
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <h4 class="modal-title" id="myModalLabel">NUEVO ESTUDIANTE</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="nuevo_estu.php">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label " style="position:relative; top:-4px;">ID Estudiante:</label>
                            </div>
                            <div class="col-sm-5">
                            <input type="text" class="form-control" name="ID_ESTUDIANTE" value="<?php echo $nuevo_id_estudiante; ?>" readonly>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">Nombres:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="NOMBRE_EST">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">Apellidos:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="APELLIDOS_ESTU">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">Direccion:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="DIRECCION_EST">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">Edad:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="EDAD_EST">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-3">
                                <label class="control-label control-label-form">Sexo:</label>
                            </div>
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn">
                                    <input type="radio" name="SEXO_EST" autocomplete="off" value="MASCULINO"> MASCULINO
                                </label>
                                <label class="btn">
                                    <input type="radio" name="SEXO_EST" autocomplete="off" value="FEMENINO"> FEMENINO
                                </label>
                                <label class="btn">
                                    <input type="radio" name="SEXO_EST" autocomplete="off" value="OTROS"> OTROS
                                </label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:-6px;">Tipo Sangre:</label>
                            </div>
                            <div class="col-sm-5">
                                <select class="bootstrap-select bootstrap-select-arrow" name="TSANGRE_EST">
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">Telefono:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="TELEFONO_EST">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">Correo:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="CORREO_EST">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:-6px;">Estado Civil:</label>
                            </div>
                            <div class="col-sm-5">
                                <select class="bootstrap-select bootstrap-select-arrow" name="ECIVIL_EST">
                                    <option value="SOLTERO">SOLTERO</option>
                                    <option value="CASADO">CASADO</option>
                                    <option value="VIUDO">VIUDO</option>
                                    <option value="DIVORCIADO">DIVORCIADO</option>
                                    <option value="COMPLICADO">COMPLICADO</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:-4px;">Fecha Nacimiento:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="FNACIMIENTO_EST">
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CANCELAR</button>
                <button type="submit" name="agregar" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> GUARDAR </button>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="edit_<?php echo $row['ID_ESTUDIANTE']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <h4 class="modal-title" id="myModalLabel">ACTUALIZAR ESTUDIANTE</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="nuevo_estu.php?id=<?php echo $row['ID_ESTUDIANTE']; ?>">
                        <input type="hidden" class="form-control" name="ID_ESTUDIANTE" value="<?php echo $row['ID_ESTUDIANTE']; ?>">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">Nombres:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="NOMBRE_EST" value="<?php echo $row['NOMBRE_EST']; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">Apellidos:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="APELLIDOS_ESTU" value="<?php echo $row['APELLIDOS_ESTU']; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">Direccion:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="DIRECCION_EST" value="<?php echo $row['DIRECCION_EST']; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">Edad:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="EDAD_EST" value="<?php echo $row['EDAD_EST']; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-3">
                                <label class="control-label control-label-form">Sexo:</label>
                            </div>
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn <?php if ($row['SEXO_EST'] == 'MASCULINO') echo 'active'; ?>">
                                    <input type="radio" name="SEXO_EST" autocomplete="off" value="MASCULINO" <?php if ($row['SEXO_EST'] == 'MASCULINO') echo 'checked'; ?>> MASCULINO
                                </label>
                                <label class="btn <?php if ($row['SEXO_EST'] == 'FEMENINO') echo 'active'; ?>">
                                    <input type="radio" name="SEXO_EST" autocomplete="off" value="FEMENINO" <?php if ($row['SEXO_EST'] == 'FEMENINO') echo 'checked'; ?>> FEMENINO
                                </label>
                                <label class="btn <?php if ($row['SEXO_EST'] == 'OTROS') echo 'active'; ?>">
                                    <input type="radio" name="SEXO_EST" autocomplete="off" value="OTROS" <?php if ($row['SEXO_EST'] == 'OTROS') echo 'checked'; ?>> OTROS
                                </label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:-6px;">Tipo Sangre:</label>
                            </div>
                            <div class="col-sm-5">
                                <select class="" name="TSANGRE_EST">
                                    <option <?php echo $row['TSANGRE_EST'] === '' ? "selected='selected'" : "" ?>>VACIO</option>
                                    <option <?php echo $row['TSANGRE_EST'] === 'A+' ? "selected='selected'" : "" ?> value="A+">A+</option>
                                    <option <?php echo $row['TSANGRE_EST'] === 'A-' ? "selected='selected'" : "" ?> value="A-">A-</option>
                                    <option <?php echo $row['TSANGRE_EST'] === 'B+' ? "selected='selected'" : "" ?> value="B+">B+</option>
                                    <option <?php echo $row['TSANGRE_EST'] === 'B-' ? "selected='selected'" : "" ?> value="B-">B-</option>
                                    <option <?php echo $row['TSANGRE_EST'] === 'AB+' ? "selected='selected'" : "" ?> value="AB+">AB+</option>
                                    <option <?php echo $row['TSANGRE_EST'] === 'AB-' ? "selected='selected'" : "" ?> value="AB-">AB-</option>
                                    <option <?php echo $row['TSANGRE_EST'] === 'O+' ? "selected='selected'" : "" ?> value="O+">O+</option>
                                    <option <?php echo $row['TSANGRE_EST'] === 'O-' ? "selected='selected'" : "" ?> value="O-">O-</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">Telefono:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="TELEFONO_EST"  value="<?php echo $row['TELEFONO_EST']; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">Correo:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="CORREO_EST"  value="<?php echo $row['CORREO_EST']; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:-6px;">Estado Civil:</label>
                            </div>
                            <div class="col-sm-5">
                                <select class="" name="ECIVIL_EST">
                                    <option <?php echo $row['ECIVIL_EST'] === '' ? "selected='selected'" : "" ?>>VACIO</option>
                                    <option <?php echo $row['ECIVIL_EST'] === 'SOLTERO' ? "selected='selected'" : "" ?> value="SOLTERO">SOLTERO</option>
                                    <option <?php echo $row['ECIVIL_EST'] === 'CASADO' ? "selected='selected'" : "" ?> value="CASADO">CASADO</option>
                                    <option <?php echo $row['ECIVIL_EST'] === 'VIUDO' ? "selected='selected'" : "" ?> value="VIUDO">VIUDO</option>
                                    <option <?php echo $row['ECIVIL_EST'] === 'DIVORCIADO' ? "selected='selected'" : "" ?> value="DIVORCIADO">DIVORCIADO</option>
                                    <option <?php echo $row['ECIVIL_EST'] === 'COMPLICADO' ? "selected='selected'" : "" ?> value="COMPLICADO">COMPLICADO</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:-4px;">Fecha Nacimiento:</label>
                            </div>
                            <div class="col-sm-10">
                                <?php
                                $fecha_db = $row['FNACIMIENTO_EST'];
                                $fecha_formateada = date('Y-m-d', strtotime(str_replace('/', '-', $fecha_db)));
                                ?>
                                <input type="date" class="form-control" name="FNACIMIENTO_EST" value="<?php echo $fecha_formateada; ?>" id="FNACIMIENTO_EST">
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CANCELAR</button>
                <button type="submit" name="editar" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> ACTUALIZAR</a>
                    </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="delete_<?php echo $row['ID_ESTUDIANTE']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <h4 class="modal-title" id="myModalLabel">BORRAR ESTUDIANTE</h4>
                </center>
            </div>
            <div class="modal-body">
                <p class="text-center">¿Esta Seguro de Borrar del Registro?</p>
                <h2 class="text-center"><?php echo '[' . $row['ID_ESTUDIANTE'] . '] [' . $row['NOMBRE_EST'] . ' ' . $row['APELLIDOS_ESTU'] . ']'; ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CANCELAR</button>
                <a href="nuevo_estu.php?ID_ESTUDIANTE=<?php echo $row['ID_ESTUDIANTE']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> SI</a>
            </div>
        </div>
    </div>
</div>