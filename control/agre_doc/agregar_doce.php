<?php
$consulta = "SELECT MAX(ID_DOCENTE) AS ultimo_numero FROM DOCENTE";
$resultado = mysqli_query($con, $consulta);
$fila = mysqli_fetch_assoc($resultado);
$ultimo_numero = $fila['ultimo_numero'];
$letra = substr($ultimo_numero, 0, 1);
$numero = substr($ultimo_numero, 1);
$nuevo_numero = $numero + 1;
$nuevo_id_docente = $letra . $nuevo_numero;
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
                    <h4 class="modal-title" id="myModalLabel">NUEVO DOCENTE</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="nuevo_docu.php">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label " style="position:relative; top:-4px;">ID Docente:</label>
                            </div>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="ID_DOCENTE" value="<?php echo $nuevo_id_docente; ?>" readonly>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">Nombres:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="NOMBRE_DOCENTE">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">Apellidos:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="APELLIDOS_DOCENTE">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">Direccion:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="DIRECCION_DOCENTE">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">Telefono:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="TELEFONO_DOCENTE">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">Correo:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="CORREO_DOCENTE">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-3">
                                <label class="control-label control-label-form">Sexo:</label>
                            </div>
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn">
                                    <input type="radio" name="SEXO_DOCENTE" autocomplete="off" value="MASCULINO"> MASCULINO
                                </label>
                                <label class="btn">
                                    <input type="radio" name="SEXO_DOCENTE" autocomplete="off" value="FEMENINO"> FEMENINO
                                </label>
                                <label class="btn">
                                    <input type="radio" name="SEXO_DOCENTE" autocomplete="off" value="OTROS"> OTROS
                                </label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:-6px;">Estado Civil:</label>
                            </div>
                            <div class="col-sm-5">
                                <select class="bootstrap-select bootstrap-select-arrow" name="ECIVIL_DOCENTE">
                                    <option value="SOLTERO">SOLTERO</option>
                                    <option value="CASADO">CASADO</option>
                                    <option value="VIUDO">VIUDO</option>
                                    <option value="DIVORCIADO">DIVORCIADO</option>
                                    <option value="COMPLICADO">COMPLICADO</option>
                                </select>
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

<div class="modal fade" id="edit_<?php echo $row['ID_DOCENTE']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <h4 class="modal-title" id="myModalLabel">ACTUALIZAR DOCENTE</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="nuevo_docu.php?id=<?php echo $row['ID_DOCENTE']; ?>">

                        <input type="hidden" class="form-control" name="ID_DOCENTE" value="<?php echo $row['ID_DOCENTE']; ?>">

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">Nombres:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="NOMBRE_DOCENTE" value="<?php echo $row['NOMBRE_DOCENTE']; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">Apellidos:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="APELLIDOS_DOCENTE" value="<?php echo $row['APELLIDOS_DOCENTE']; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">Direccion:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="DIRECCION_DOCENTE" value="<?php echo $row['DIRECCION_DOCENTE']; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">Telefono:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="TELEFONO_DOCENTE" value="<?php echo $row['TELEFONO_DOCENTE']; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">Correo:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="CORREO_DOCENTE" value="<?php echo $row['CORREO_DOCENTE']; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-3">
                                <label class="control-label control-label-form">Sexo:</label>
                            </div>
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn <?php if ($row['SEXO_DOCENTE'] == 'MASCULINO') echo 'active'; ?>">
                                    <input type="radio" name="SEXO_DOCENTE" autocomplete="off" value="MASCULINO" <?php if ($row['SEXO_DOCENTE'] == 'MASCULINO') echo 'checked'; ?>> MASCULINO
                                </label>
                                <label class="btn <?php if ($row['SEXO_DOCENTE'] == 'FEMENINO') echo 'active'; ?>">
                                    <input type="radio" name="SEXO_DOCENTE" autocomplete="off" value="FEMENINO" <?php if ($row['SEXO_DOCENTE'] == 'FEMENINO') echo 'checked'; ?>> FEMENINO
                                </label>
                                <label class="btn <?php if ($row['SEXO_DOCENTE'] == 'OTROS') echo 'active'; ?>">
                                    <input type="radio" name="SEXO_DOCENTE" autocomplete="off" value="OTROS" <?php if ($row['SEXO_DOCENTE'] == 'OTROS') echo 'checked'; ?>> OTROS
                                </label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:-6px;">Estado Civil:</label>
                            </div>
                            <div class="col-sm-5">
                                <select name="ECIVIL_DOC">
                                    <option <?php echo $row['ECIVIL_DOCENTE'] === '' ? "selected='selected'" : "" ?>>VACIO</option>
                                    <option <?php echo $row['ECIVIL_DOCENTE'] === 'SOLTERO' ? "selected='selected'" : "" ?> value="SOLTERO">SOLTERO</option>
                                    <option <?php echo $row['ECIVIL_DOCENTE'] === 'CASADO' ? "selected='selected'" : "" ?> value="CASADO">CASADO</option>
                                    <option <?php echo $row['ECIVIL_DOCENTE'] === 'VIUDO' ? "selected='selected'" : "" ?> value="VIUDO">VIUDO</option>
                                    <option <?php echo $row['ECIVIL_DOCENTE'] === 'DIVORCIADO' ? "selected='selected'" : "" ?> value="DIVORCIADO">DIVORCIADO</option>
                                    <option <?php echo $row['ECIVIL_DOCENTE'] === 'COMPLICADO' ? "selected='selected'" : "" ?> value="COMPLICADO">COMPLICADO</option>
                                </select>
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


<div class="modal fade" id="delete_<?php echo $row['ID_DOCENTE']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <h4 class="modal-title" id="myModalLabel">BORRAR DOCENTE</h4>
                </center>
            </div>
            <div class="modal-body">
                <p class="text-center">¿Esta Seguro de Borrar del Registro?</p>
                <h2 class="text-center"><?php echo $row['NOMBRE_DOCENTE'] . ' ' . $row['APELLIDOS_DOCENTE']; ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CANCELAR</button>
                <a href="nuevo_docu.php?ID_DOCENTE=<?php echo $row['ID_DOCENTE']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> SI</a>
            </div>
        </div>
    </div>
</div>