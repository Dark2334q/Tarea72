
<?php
$consulta = "SELECT MAX(COD_MODULO) AS ultimo_numero FROM MODULOS";
$resultado = mysqli_query($con, $consulta);
$fila = mysqli_fetch_assoc($resultado);
$ultimo_numero = $fila['ultimo_numero'];
$letra = substr($ultimo_numero, 0, 1);
$numero = substr($ultimo_numero, 1);
$nuevo_numero = $numero + 1;
$nuevo_Cod_modulo = $letra . $nuevo_numero;
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
                    <h4 class="modal-title" id="myModalLabel">NUEVO MODULO</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="nuevo_modulo.php" >
                        <div class="row">
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label " style="position:relative; top:-4px;">Cod. Modulo:</label>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="COD_MODULO" value="<?php echo $nuevo_Cod_modulo; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label control-label-form">Nombre:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="NOMBRE_MOD">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label control-label-form">Duracion:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="DURACION_MOD">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label control-label-form">VALOR ABONO:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="number" step="0.01" class="form-control" name="VAL_MOD" id="VAL_MOD" placeholder="$ 00.00" onfocus="clearDefaultValue()">
                                    </div>
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

<div class="modal fade" id="edit_<?php echo $row['COD_MODULO']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <h4 class="modal-title" id="myModalLabel">ACTUALIZAR MODULO</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="nuevo_modulo.php?id=<?php echo $row['COD_MODULO']; ?>">
                        <input type="hidden" class="form-control" name="COD_MODULO" value="<?php echo $row['COD_MODULO']; ?>">
                        <div class="row">
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label control-label-form">Nombre:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="NOMBRE_MOD" value="<?php echo $row['NOMBRE_MOD']; ?>">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label control-label-form">Duracion:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="DURACION_MOD" value="<?php echo explode(' ', $row['DURACION_MOD'])[0]; ?>">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label control-label-form">VALOR ABONO:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="number" step="0.01" class="form-control" name="VAL_MOD" value="<?php echo $row['VAL_MOD']; ?>" id="VAL_MOD" placeholder="$ 00.00" onfocus="clearDefaultValue()">
                                    </div>
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
<div class="modal fade" id="delete_<?php echo $row['COD_MODULO']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <h4 class="modal-title" id="myModalLabel">BORRAR MODULO</h4>
                </center>
            </div>
            <div class="modal-body">
                <p class="text-center">¿Esta Seguro de Borrar del Registro?</p>
                <h2 class="text-center"><?php echo '[' . $row['COD_MODULO'] . '] [' . $row['NOMBRE_MOD'] . '] '; ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CANCELAR</button>
                <a href="nuevo_modulo.php?COD_MODULO=<?php echo $row['COD_MODULO']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> SI</a>
            </div>
        </div>
    </div>
</div>
<script>
    function clearDefaultValue() {
        var input = document.getElementById('VAL_MOD');
        if (input.value === "$ 00.00") {
            input.value = "0";
        }
    }
    document.getElementById('VAL_MOD').addEventListener('blur', function() {
        var input = document.getElementById('VAL_MOD');
        if (input.value === "") {
            input.value = "$ 00.00";
        }
    });
</script>