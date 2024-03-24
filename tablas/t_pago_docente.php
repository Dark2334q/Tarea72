<?php
include('control/agre_doc/agregar_doce_pago.php');
?>

<div class="page-content">
    <div class="container-fluid">
        <section class="card">
            <br>
            <center>
                <h1>LISTADO DE FACTURAS</H1>
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
                            <th>Nº FACTURA</th>
                            <th>DOCENTE</th>
                            <th>FECHA</th>
                            <th>ABONO</th>
                            <th>SALDO</th>
                            <th>DESCUENTO</th>
                            <th>ACCION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql = "SELECT D.ID_DOCENTE, P.NFACTURA, CONCAT(D.NOMBRE_DOCENTE,' ',D.APELLIDOS_DOCENTE) AS DOCENTE, 
                        P.FECHA_DE_PAGO, P.VALOR_ABONO, P.SALDO, P.DESCUENTO
                        FROM COPIA_REL_PAGOS_DOC P JOIN DOCENTE D ON P.ID_DOCENTE = D.ID_DOCENTE";
                        $can_regis = 0;
                        if ($result = mysqli_query($con, $sql)) {
                            while ($row = $result->fetch_assoc()) {
                                $can_regis++;
                        ?>
                                <tr>
                                    <td> <?php echo $row["NFACTURA"];  ?> </td>
                                    <td> <?php echo $row["DOCENTE"];  ?> </td>
                                    <td><?php echo date('d/m/Y', strtotime($row["FECHA_DE_PAGO"])); ?></td>
                                    <td>$ <?php echo number_format($row["VALOR_ABONO"], 2); ?></td>
                                    <td> <?php echo number_format($row["SALDO"], 2);  ?> </td>
                                    <td> <?php echo number_format($row["DESCUENTO"], 2);  ?> </td>
                                    <td>
                                        <a href="#edit_<?php echo $row['NFACTURA']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> EDITAR</a>
                                        <a href="#delete_<?php echo $row['NFACTURA']; ?>" class="btn btn-warning btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> BORRAR</a>
                                    </td>
                                    <?php include('control/agre_doc/agregar_doce_pago.php'); ?>
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
                        <strong>Nº DE FACTURAS = </strong>
                        <strong><?php echo $can_regis; ?></strong>
                    </td>
                </tr>
            </tfoot>
                </table>
            </div>
        </section>
    </div>
</div>