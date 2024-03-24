<?php
$consulta = "SELECT MAX(COD_SEM) AS ultimo_numero FROM SEMINARIO";
$resultado = mysqli_query($con, $consulta);
$fila = mysqli_fetch_assoc($resultado);
$ultimo_numero = $fila['ultimo_numero'];
$letra = substr($ultimo_numero, 0, 1);
$numero = substr($ultimo_numero, 1);
$nuevo_numero = $numero + 1;
$nuevo_Cod_SEMI = $letra . $nuevo_numero;
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
                    <h4 class="modal-title" id="myModalLabel">NUEVO SEMINARIO</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="nuevo_semi.php" >
                        <div class="row">
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label " style="position:relative; top:-4px;">Cod. Seminario:</label>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="COD_SEM" value="<?php echo $nuevo_Cod_SEMI; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label control-label-form">Nombre:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="NOM_SEM">
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
<div class="modal fade" id="edit_<?php echo $row['COD_SEM']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <h4 class="modal-title" id="myModalLabel">ACTUALIZAR SEMINARIO</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="nuevo_semi.php?id=<?php echo $row['COD_SEM']; ?>">
                        <input type="hidden" class="form-control" name="COD_SEM" value="<?php echo $row['COD_SEM']; ?>">
                        <div class="row">
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label control-label-form">Nombre:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="NOM_SEM" value="<?php echo $row['NOM_SEM']; ?>">
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
<div class="modal fade" id="delete_<?php echo $row['COD_SEM']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <h4 class="modal-title" id="myModalLabel">BORRAR SEMINARIO</h4>
                </center>
            </div>
            <div class="modal-body">
                <p class="text-center">¿Esta Seguro de Borrar del Registro?</p>
                <h2 class="text-center"><?php echo '[' . $row['COD_SEM'] . '] [' . $row['NOM_SEM'] . '] '; ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CANCELAR</button>
                <a href="nuevo_semi.php?COD_SEM=<?php echo $row['COD_SEM']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> SI</a>
            </div>
        </div>
    </div>
</div>