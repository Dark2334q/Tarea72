<?php
include('control/agre_est/agregar_est_modulo.php');
?>

<div class="page-content">
    <div class="container-fluid">
        <section class="card">
            <br>
            <center>
                <h1>LISTADO DE INSCRICIONES DE MODULOS</H1>
            </center>
            <div class="container-fluid">
                <a href="#addnewinsm" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> INSCRIPCION MODULO NUEVO</a>
            </div>
            <br>
            <div class="card-block">
                <table class="display table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>N° REGISTRO</th>
                            <th>ESTUDIANTES</th>
                            <th>MODULO</th>
                            <th>FECHA INCIO</th>
                            <th>FECHA FIN</th>
                            <th>ACCION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql = "SELECT ram.REGISTRO as REGISTRO, es.ID_ESTUDIANTE, CONCAT(es.NOMBRE_EST,' ', es.Apellidos_estu ) as Estudiante, mo.COD_MODULO,
                        mo.NOMBRE_MOD as modulo, ram.FECHA_INICIO as fe_inicio, ram.FECHA_FIN as fe_fin
                        FROM rel_academico_modulo ram
                        JOIN estudiante es ON es.ID_ESTUDIANTE = ram.ID_ESTUDIANTE
                        JOIN modulos mo ON ram.COD_MODULO = mo.COD_MODULO ORDER BY ram.REGISTRO ASC";
                        $can_regis = 0;
                        if ($result = mysqli_query($con, $sql)) {
                            while ($row = $result->fetch_assoc()) {
                                $can_regis++;
                        ?>
                                <tr>
                                    <td> <?php echo $row["REGISTRO"];  ?> </td>
                                    <td> <?php echo $row["Estudiante"];  ?> </td>
                                    <td> <?php echo $row["modulo"];  ?> </td>
                                    <td><?php echo date('d/m/Y', strtotime($row["fe_inicio"])); ?></td>
                                    <td><?php echo date('d/m/Y', strtotime($row["fe_fin"])); ?></td>
                                    <td>
                                        <a href="#editinsmodu_<?php echo $row['REGISTRO']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> EDITAR</a>
                                        <a href="#deletesmodu_<?php echo $row['REGISTRO']; ?>" class="btn btn-warning btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> BORRAR</a>
                                    </td>
                                    <?php
                                    include('control/agre_est/agregar_est_modulo.php');
                                    ?>
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
                        <strong>Nº DE INSCRICION MODULOS = </strong>
                        <strong><?php echo $can_regis; ?></strong>
                    </td>
                </tr>
            </tfoot>
                </table>
            </div>
        </section>
    </div>
</div>