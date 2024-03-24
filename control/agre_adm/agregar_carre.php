<?php
$consulta = "SELECT COD_CARRERA FROM CARRERA ORDER BY CAST(SUBSTRING(COD_CARRERA, 2) AS UNSIGNED) DESC LIMIT 1";
$resultado = mysqli_query($con, $consulta);
$fila = mysqli_fetch_assoc($resultado);
if (!$fila) {
    $nuevo_id_estudiante = 'C1';
} else {
    $ultimo_numero = $fila['COD_CARRERA'];
    $letra = substr($ultimo_numero, 0, 1);
    $numero = intval(substr($ultimo_numero, 1)) + 1;
    $nuevo_numero = $numero;
    $letra = $letra ?? 'C';
    $nuevo_Cod_carrera = $letra . str_pad($nuevo_numero, 2, '0', STR_PAD_LEFT);
}
?>
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <h4 class="modal-title" id="myModalLabel">NUEVO CARRERA</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="nuevo_carre.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label " style="position:relative; top:-4px;">Cod. Carrera:</label>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="COD_CARRERA" value="<?php echo $nuevo_Cod_carrera; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label control-label-form">Nombre:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="NOMBRE_CARRERA">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label control-label-form">Duracion:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="DURACION_CARRERA">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label control-label-form">VALOR ABONO:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="number" step="0.01" class="form-control" name="VALOR_CARRERA" id="VALOR_CARRERA" placeholder="$ 00.00" onfocus="clearDefaultValue()">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label control-label-form">IMAGEN:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="FOTO" accept=".png,.jpg,.jpeg">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label control-label-form"></label>
                                    </div>
                                    <div class="col-sm-10">
                                        <img id="image-preview" src="" alt="Image Preview" name="FOTO_FILE" style="max-width: 100%; max-height: 200px; object-fit: cover;">
                                    </div>
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


<div class="modal fade" id="edit_<?php echo $row['COD_CARRERA']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <h4 class="modal-title" id="myModalLabel">ACTUALIZAR CARRERA</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" enctype="multipart/form-data" action="nuevo_carre.php?id=<?php echo $row['COD_CARRERA']; ?>">
                        <input type="hidden" class="form-control" name="COD_CARRERA" value="<?php echo $row['COD_CARRERA']; ?>">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label control-label-form">Nombre:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="NOMBRE_CARRERA" value="<?php echo $row['NOMBRE_CARRERA']; ?>">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label control-label-form">Duracion:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="DURACION_CARRERA" value="<?php echo explode(' ', $row['DURACION_CARRERA'])[0]; ?>">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label control-label-form">VALOR ABONO:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="number" step="0.01" class="form-control" name="VALOR_CARRERA" value="<?php echo $row['VALOR_CARRERA']; ?>" id="VALOR_CARRERA" placeholder="$ 00.00" onfocus="clearDefaultValue()">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label control-label-form" for="file-input">IMAGEN:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="FOTO" accept=".png,.jpg,.jpeg" id="file-input">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label control-label-form"></label>
                                    </div>
                                    <?php
                                    if (isset($row['FOTO'])) {
                                        echo '<div class="col-sm-10"><img src="data:image/jpeg;base64,' . base64_encode($row['FOTO']) . '" style="max-width: 100%; max-height: 200px; object-fit: cover;" /></div>';
                                    }else{
                                        echo ' <img id="image-preview" src="" alt="Image Preview" name="FOTO_FILE" style="max-width: 100%; max-height: 200px; object-fit: cover;">';
                                    }
                                    ?>
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

<div class="modal fade" id="delete_<?php echo $row['COD_CARRERA']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                <h2 class="text-center"><?php echo '[' . $row['COD_CARRERA'] . '] [' . $row['NOMBRE_CARRERA'] . '] '; ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CANCELAR</button>
                <a href="nuevo_carre.php?COD_CARRERA=<?php echo $row['COD_CARRERA']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> SI</a>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelector('input[type="file"]').addEventListener('change', function(event) {
        var file = event.target.files[0];
        var reader = new FileReader();
        reader.onload = function(event) {
            var img = document.getElementById('image-preview');
            img.src = event.target.result;
        };
        reader.readAsDataURL(file);
    });
</script>
<script>
    function clearDefaultValue() {
        var input = document.getElementById('VALOR_CARRERA');
        if (input.value === "$ 00.00") {
            input.value = "0";
        }
    }
    document.getElementById('VALOR_CARRERA').addEventListener('blur', function() {
        var input = document.getElementById('VALOR_CARRERA');
        if (input.value === "") {
            input.value = "$ 00.00";
        }
    });
</script>