<?php
$consulta = "SELECT MAX(NFACTURA) AS ultimo_numero FROM COPIA_REL_PAGOS_DOC";
$resultado = mysqli_query($con, $consulta);
$fila = mysqli_fetch_assoc($resultado);
$ultimo_numero = $fila['ultimo_numero'];
$nuevo_numero = $ultimo_numero + 1;
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
                    <h4 class="modal-title" id="myModalLabel">FACTURA DOCENTE</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="nuevo_docu_pago.php">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label " style="position:relative; top:-4px;">Nº FACTURA:</label>
                            </div>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="NFACTURA" value="<?php echo $nuevo_numero; ?>" readonly>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">DOCENTE:</label>
                            </div>
                            <div class="col-sm-5">
                                <select class="bootstrap-select bootstrap-select-arrow" name="ID_DOCENTE">
                                    <?php
                                    $consulta = "SELECT ID_DOCENTE, CONCAT(NOMBRE_DOCENTE,' ',APELLIDOS_DOCENTE) AS DOCENTES FROM DOCENTE";
                                    $ejecutar = mysqli_query($con, $consulta) or die(mysqli_error($con));
                                    while ($fila = mysqli_fetch_assoc($ejecutar)) {
                                    ?>
                                        <option value="<?php echo $fila['ID_DOCENTE'] ?>"><?php echo $fila['DOCENTES'] ?> </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:-4px;">FECHA PAGO:</label>
                            </div>
                            <div class="col-sm-10 ">
                                <input type="date" class="form-control" name="FECHA_DE_PAGO">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">VALOR ABONO:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="number" step="0.01" class="form-control" name="VALOR_ABONO" id="valor_abono" placeholder="$ 00.00" onfocus="clearDefaultValue()">
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


<script>
    function clearDefaultValue() {
        var input = document.getElementById('valor_abono');
        if (input.value === "$ 00.00") {
            input.value = "0";
        }
    }
    document.getElementById('valor_abono').addEventListener('blur', function() {
        var input = document.getElementById('valor_abono');
        if (input.value === "") {
            input.value = "$ 00.00";
        }
    });
</script>


<div class="modal fade" id="edit_<?php echo $row['NFACTURA']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <h4 class="modal-title" id="myModalLabel">ACTUALIZAR FACTURA</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="nuevo_docu_pago.php?id=<?php echo $row['NFACTURA']; ?>">

                        <input type="hidden" class="form-control" name="NFACTURA" value="<?php echo $row['NFACTURA']; ?>">

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">DOCENTE:</label>
                            </div>
                            <div class="col-sm-5">
                                <select class="" name="ID_DOCENTE">
                                    <?php
                                    $consulta = "SELECT ID_DOCENTE, CONCAT(NOMBRE_DOCENTE, ' ', APELLIDOS_DOCENTE) AS DOCENTES FROM DOCENTE";
                                    $ejecutar = mysqli_query($con, $consulta) or die(mysqli_error($con));
                                    $valor_seleccionado = $row['ID_DOCENTE'];
                                    while ($fila = mysqli_fetch_assoc($ejecutar)) {
                                        $selected = "";
                                        if ($fila['ID_DOCENTE'] == $valor_seleccionado) {
                                            $selected = "selected";
                                        }
                                    ?>
                                        <option value="<?php echo $fila['ID_DOCENTE'] ?>" <?php echo $selected ?>><?php echo $fila['DOCENTES'] ?></option>
                                    <?php
                                    }

                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:-4px;">FECHA PAGO:</label>
                            </div>
                            <div class="col-sm-10">
                                <?php
                                $fecha_db = $row['FECHA_DE_PAGO'];
                                $fecha_formateada = date('Y-m-d', strtotime(str_replace('/', '-', $fecha_db)));
                                ?>
                                <input type="date" class="form-control" name="FECHA_DE_PAGO" value="<?php echo $fecha_formateada; ?>" id="FECHA_DE_PAGO">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label control-label-form">VALOR ABONO:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="number" step="0.01" class="form-control" name="VALOR_ABONO" value="<?php echo $row['VALOR_ABONO']; ?>" id="VALOR_ABONO" placeholder="$ 00.00" onfocus="clearDefaultValue()">
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

<div class="modal fade" id="delete_<?php echo $row['NFACTURA']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <h4 class="modal-title" id="myModalLabel">BORRAR FACTURA</h4>
                </center>
            </div>
            <div class="modal-body">
                <p class="text-center">¿Esta Seguro de Borrar del Registro?</p>
                <h2 class="text-center"><?php echo '[' . $row['NFACTURA'] . '] [' . $row['DOCENTE'] . '] [$' . $row['VALOR_ABONO'] . ']'; ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CANCELAR</button>
                <a href="nuevo_docu_pago.php?NFACTURA=<?php echo $row['NFACTURA']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> SI</a>
            </div>
        </div>
    </div>
</div>