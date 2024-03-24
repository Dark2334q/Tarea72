<?php
$consulta = "SELECT MAX(NFACTURA) AS ultimo_numero FROM rel_pagos_est";
$resultado = mysqli_query($con, $consulta);
$fila = mysqli_fetch_assoc($resultado);
$ultimo_numero = $fila['ultimo_numero'];
$nuevo_numero = $ultimo_numero + 1;
?>

<div class="modal fade" id="addnewpago" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <h4 class="modal-title" id="myModalLabel">FACTURA ESTUDIANTE</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="nuevo_estu.php">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label " style="position:relative; top:-4px;">Nº Factura:</label>
                            </div>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="NFACTURA" value="<?php echo $nuevo_numero; ?>" readonly>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:-4px;">Fecha Pago:</label>
                            </div>
                            <div class="col-sm-10 ">
                                <input type="date" class="form-control" name="FECHA_PAGO">
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
                                <label class="control-label control-label-form">Carrera:</label>
                            </div>
                            <div class="col-sm-10">
                                <select class="bootstrap-select bootstrap-select-arrow" name="COD_CARRERA">
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
                                <label class="control-label control-label-form">Modulo:</label>
                            </div>
                            <div class="col-sm-10">
                                <select class="bootstrap-select bootstrap-select-arrow" name="COD_MOD">
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
                                <label class="control-label" style="position:relative; top:-6px;">Tipo Pago:</label>
                            </div>
                            <div class="col-sm-10">
                                <select class="bootstrap-select bootstrap-select-arrow" name="TIPO_PAGO">
                                    <option value="MATRICULA">MATRICULA</option>
                                    <option value="MODULO">MODULO</option>
                                    <option value="ABONO">ABONO</option>
                                    <option value="RENOVACION MATRICULA">RENOVACION MATRICULA</option>
                                </select>
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
                <button type="submit" name="agregar_est_pag" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> GUARDAR </button>
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