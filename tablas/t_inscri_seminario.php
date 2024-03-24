<?php
include('control/agre_est/agregar_est_semi.php');
?>

<div class="page-content">
    <div class="container-fluid">
        <section class="card">
            <br>
            <center>
                <h1>LISTADO DE INSCRICIONES DE SEMINARIO</H1>
            </center>
            <div class="container-fluid">
                <a href="#addnewinss" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> INSCRIPCION SEMINARIO NUEVO</a>
            </div>
            <br>
            <div class="card-block">
                <table class="display table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>N° REGISTRO</th>
                            <th>ESTUDIANTES</th>
                            <th>SEMINARIO</th>
                            <th>FECHA</th>
                            <th>HORA</th>
                            <th>LUGAR</th>
                            <th>VALOR</th>
                            <th>CONFERENCISTA</th>
                            <th>ACCION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql = "SELECT rs.Consecutivo as Consecutivo, CONCAT(es.NOMBRE_EST,' ', es.Apellidos_estu ) as Estudiante, se.NOM_SEM as NOMBRE, 
                        rs.FECHA_SEMINARIO AS FECHA_SEMINARIO, rs.HORA_SEMINARIO AS HORA_SEMINARIO, rs.LUGAR_SEMINARIO AS LUGAR_SEMINARIO, 
                        rs.VALOR_SEMINARIO AS VALOR_SEMINARIO, rs.CONFERENCISTA_SEMINARIO AS  CONFERENCISTA_SEMINARIO,es.ID_ESTUDIANTE as 
                        ID_ESTUDIANTE, se.COD_SEM as COD_SEM FROM rel_seminario rs
                        JOIN estudiante es ON es.ID_ESTUDIANTE = rs.ID_ESTUDIANTE
                        JOIN seminario se ON rs.COD_SEMINARIO = se.COD_SEM ORDER BY Consecutivo ASC";
                        $can_regis = 0;
                        if ($result = mysqli_query($con, $sql)) {
                            while ($row = $result->fetch_assoc()) {
                                $can_regis++;
                        ?>
                                <tr>
                                    <td> <?php echo $row["Consecutivo"];  ?> </td>
                                    <td> <?php echo $row["Estudiante"];  ?> </td>
                                    <td> <?php echo $row["NOMBRE"];  ?> </td>
                                    <td><?php echo date('d/m/Y', strtotime($row["FECHA_SEMINARIO"])); ?></td>
                                    <td><?php echo date('H:i', strtotime($row["HORA_SEMINARIO"])); ?></td>
                                    <td> <?php echo $row["LUGAR_SEMINARIO"];  ?> </td>
                                    <td>$<?php echo number_format($row["VALOR_SEMINARIO"], 2); ?></td>
                                    <td> <?php echo $row["CONFERENCISTA_SEMINARIO"];  ?> </td>
                                    <td>
                                        <a href="#editinssemi_<?php echo $row['Consecutivo']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> EDITAR</a>
                                        <a href="#deletessemi_<?php echo $row['Consecutivo']; ?>" class="btn btn-warning btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> BORRAR</a>
                                    </td>
                                    <?php
                                    include('control/agre_est/agregar_est_semi.php');
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
                        <strong>Nº DE INSCRICION SEMINARIOS = </strong>
                        <strong><?php echo $can_regis; ?></strong>
                    </td>
                </tr>
            </tfoot>
                </table>
            </div>
        </section>
    </div>
</div>