<?php
include('control/agre_adm/agregar_modulo.php');
?>

<div class="page-content">
    <div class="container-fluid">
        <section class="card">
            <br>
            <center>
                <h1>LISTADO DE MODULOS</H1>
            </center>
            <div class="container-fluid">
                <a href="#addnew" class="btn btn-primary" data-toggle="modal">
                    <span class="glyphicon glyphicon-plus"></span> NUEVO</a>
            </div>
            <br>
            <div class="card-block">
                <table class="display table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>CODIGO</th>
                            <th>NOMBRES</th>
                            <th>DURACION</th>
                            <th>VALOR</th>
                            <th>ACCION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql = "SELECT * FROM MODULOS;";
                        $can_regis = 0;
                        if ($result = mysqli_query($con, $sql)) {
                            while ($row = $result->fetch_assoc()) {
                                $can_regis++;
                        ?>
                                <tr>
                                    <td> <?php echo $row["COD_MODULO"];  ?> </td>
                                    <td> <?php echo $row["NOMBRE_MOD"];  ?> </td>
                                    <td> <?php echo $row["DURACION_MOD"];  ?> </td>
                                    <td>$ <?php echo number_format($row["VAL_MOD"], 2); ?></td>
                                    <td>
                                        <a href="#edit_<?php echo $row['COD_MODULO']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> EDITAR</a>
                                        <a href="#delete_<?php echo $row['COD_MODULO']; ?>" class="btn btn-warning btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> BORRAR</a>
                                    </td>
                                    <?php include('control/agre_adm/agregar_modulo.php'); ?>
                                </tr>
                    </tbody>
            <?php
                            }
                            $result->free();
                        }
            ?>
            <tfoot>
                <tr>
                    <td colspan="7">
                        <strong>Nº DE MODULOS = </strong>
                        <strong><?php echo $can_regis; ?></strong>
                    </td>
                </tr>
            </tfoot>
                </table>
            </div>
        </section>
    </div>
</div>