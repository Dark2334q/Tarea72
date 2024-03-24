<?php
include('control/agre_est/agregar_est_modulo.php');
include('control/agre_est/agregar_est_carre.php');
include('control/agre_est/agregar_estu.php'); 
include('control/agre_est/agregar_est_pago.php');
?>

<div class="page-content">
    <div class="container-fluid">
        <section class="card">
            <br>
            <center>
                <h1>LISTADO DE ESTUDIANTES</H1>
            </center>
            <div class="container-fluid">
                <a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> NUEVO</a>
                <a href="#addnewpago" class="btn btn-info pull-right" data-toggle="modal"><span class="glyphicon glyphicon-usd"></span> PAGO</a>
                <div>
                <a href="#addnewinsm" class="btn btn-success" style="margin-top: 0.5rem;" data-toggle="modal"><span class="glyphicon glyphicon-book"></span> INSCRIPCION MODULO</a>
                <a href="#addnewinsc" class="btn btn-secondary" style="margin-top: 0.5rem; float: right;" data-toggle="modal"><span class="glyphicon glyphicon-book"></span> INSCRIPCION CARRERA</a>
                </div>
            </div>
            <br>
            <div class="card-block">
                <table class="display table table-striped table-bordered" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRES</th>
                            <th>APELLIDOS</th>
                            <th>SEXO</th>
                            <th>FECHA NACIMIENTO</th>
                            <th>ACCION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql = "SELECT * FROM ESTUDIANTE ORDER BY CAST(SUBSTRING(ID_ESTUDIANTE, 2) AS UNSIGNED)";
                        $can_regis = 0;
                        if ($result = mysqli_query($con, $sql)) {
                            while ($row = $result->fetch_assoc()) {
                                $can_regis++;
                        ?>
                                <tr>
                                    <td> <?php echo $row["ID_ESTUDIANTE"];  ?> </td>
                                    <td> <?php echo $row["NOMBRE_EST"];  ?> </td>
                                    <td> <?php echo $row["APELLIDOS_ESTU"];  ?> </td>
                                    <td> <?php echo $row["SEXO_EST"];  ?> </td>
                                    <td><?php echo date('d/m/Y', strtotime($row["FNACIMIENTO_EST"])); ?></td>
                                    <td>
                                        <a href="#edit_<?php echo $row['ID_ESTUDIANTE']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> EDITAR</a>
                                        <a href="#delete_<?php echo $row['ID_ESTUDIANTE']; ?>" class="btn btn-warning btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> BORRAR</a>
                                    </td>
                                    <?php include('control/agre_est/agregar_estu.php'); ?>
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
                        <strong>Nº DE ESTUDIANTES = </strong>
                        <strong><?php echo $can_regis; ?></strong>
                    </td>
                </tr>
            </tfoot>
                </table>
            </div>
        </section>
    </div>
</div>