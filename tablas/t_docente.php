<?php
include('control/agre_doc/agregar_doce.php');
?>

<div class="page-content">
    <div class="container-fluid">
        <section class="card">
            <br>
            <center>
                <h1>LISTADO DE DOCENTES</H1>
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
                            <th>ID</th>
                            <th>NOMBRES</th>
                            <th>APELLIDOS</th>
                            <th>TELEFONO</th>
                            <th>SEXO</th>
                            <th>ACCION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql = "SELECT * FROM DOCENTE";
                        $can_regis = 0;
                        if ($result = mysqli_query($con, $sql)) {
                            while ($row = $result->fetch_assoc()) {
                                $can_regis++;
                        ?>
                                <tr>
                                    <td> <?php echo $row["ID_DOCENTE"];  ?> </td>
                                    <td> <?php echo $row["NOMBRE_DOCENTE"];  ?> </td>
                                    <td> <?php echo $row["APELLIDOS_DOCENTE"];  ?> </td>
                                    <td> <?php echo $row["TELEFONO_DOCENTE"];  ?> </td>
                                    <td> <?php echo $row["SEXO_DOCENTE"];  ?> </td>
                                    <td>
                                        <a href="#edit_<?php echo $row['ID_DOCENTE']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> EDITAR</a>  
                                        <a href="#delete_<?php echo $row['ID_DOCENTE']; ?>" class="btn btn-warning btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> BORRAR</a>
                                    </td>
                                    <?php include('control/agre_doc/agregar_doce.php'); ?>
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
                        <strong>Nº DE DOCENTES = </strong>
                        <strong><?php echo $can_regis; ?></strong>
                    </td>
                </tr>
            </tfoot>
                </table>
            </div>
        </section>
    </div>
</div>