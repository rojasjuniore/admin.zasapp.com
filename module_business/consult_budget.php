<?php
session_start();
if (@!$_SESSION['nombre_vendedor']) {
    header("Location:index.php");
}
require('../common/_setup.php');
$sql = "SELECT * FROM cotizaciones";
$result = $cnx->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" language="javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="../js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                "order": [[1, "asc"]],
                "language": {
                    "lengthMenu": "Mostar _MENU_ registros por pagina",
                    "info": "Mostrando pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtrada de _MAX_ registros)",
                    "search": "Buscar:",
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                }


            });

        });
    </script>
    <title>Consultar Presupuestos</title>
</head>
<?php include('../common/menu.php'); ?>
<body>
<div class="text-center">
    <h1> Consultar
        <small>Cotizaciones</small>
    </h1>
</div>
<body>
<div class="container">

    <table id="example" class="display text-center" cellspacing="0" width="100%">
        <thead>
        <tr class="text-center">
            <th>Numero Cotizacion</th>
            <th>Fecha De Cotizacion</th>
            <th>Atencion</th>
            <th>Empresa</th>
            <th>Email</th>
            <th>Ver</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <?php
            $id_cotizacion = $row['id_cotizacion'];
            $numero_cotizacion = $row['numero_cotizacion'];
            $fecha_cotizacion = $row['fecha_cotizacion'];
            $atencion = $row['atencion'];
            $empresa = $row['empresa'];
            $email = $row['email'];
            ?>

            <tr>
                <td><?php echo $numero_cotizacion; ?></td>
                <td><?php echo $fecha_cotizacion; ?></td>
                <td><?php echo $atencion; ?></td>
                <td><?php echo $empresa ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo '<a href="../pdf_upload/' . $row["cotizacion_pdf"] . '.pdf" target="_blank"><img src="img/contrato.png"></a>'; ?></td>

            </tr>
        <?php } ?>
        <?php

        ?>
        </tbody>
    </table>
</div>

</body>
</html>



