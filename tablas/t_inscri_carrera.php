<?php
include('control/agre_est/agregar_est_carre.php');
?>

<div class="page-content">
    <div class="container-fluid">
        <section class="card">
            <br>
            <center>
                <h1>LISTADO DE INSCRICIONES DE CARRERA</H1>
            </center>
            <div class="container-fluid">
                <a href="#addnewinsc" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> INSCRIPCION CARRERA</a>
            </div>
            <br>
            <div class="card-block">
                <table class="display table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>N° REGISTRO</th>
                            <th>ESTUDIANTES</th>
                            <th>CARRERA</th>
                            <th>FECHA INCIO</th>
                            <th>FECHA FIN</th>
                            <th>ACCION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql = "SELECT rac.REGISTRO as REGISTRO, es.ID_ESTUDIANTE, CONCAT(es.NOMBRE_EST,' ', es.Apellidos_estu ) as Estudiante, 
                        car.COD_CARRERA, car.NOMBRE_CARRERA as CARRERA, car.FOTO as FOTO, rac.FECHA_INICIO as fe_inicio, rac.FECHA_FINAL as fe_fin
                        FROM rel_academico_carrera rac
                        JOIN estudiante es ON es.ID_ESTUDIANTE = rac.ID_ESTUDIANTE
                        JOIN carrera car ON rac.COD_CARRERA = car.COD_CARRERA  ORDER BY rac.REGISTRO ASC;";
                        $can_regis = 0;
                        if ($result = mysqli_query($con, $sql)) {
                            while ($row = $result->fetch_assoc()) {
                                $can_regis++;
                        ?>
                                <tr>
                                    <td> <?php echo $row["REGISTRO"];  ?> </td>
                                    <td> <?php echo $row["Estudiante"];  ?> </td>
                                    <td> <?php echo $row["CARRERA"];  ?> </td>
                                    <td><?php echo date('d/m/Y', strtotime($row["fe_inicio"])); ?></td>
                                    <td><?php echo date('d/m/Y', strtotime($row["fe_fin"])); ?></td>
                                    <td>
                                        <a href="#editinscarre_<?php echo $row['REGISTRO']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> EDITAR</a>
                                        <a href="#deletescarre_<?php echo $row['REGISTRO']; ?>" class="btn btn-warning btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> BORRAR</a>
                                    </td>
                                    <?php
                                    include('control/agre_est/agregar_est_carre.php');
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
                        <strong>Nº DE INSCRICION CARRERA = </strong>
                        <strong><?php echo $can_regis; ?></strong>
                    </td>
                </tr>
            </tfoot>
                </table>
            </div>
        </section>
    </div>
</div>