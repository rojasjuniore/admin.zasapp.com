<?php
session_start();
if (@!$_SESSION['nombre_vendedor']) {
    header("Location:index.php");
}
require('common/_setup.php');
$sql = "SELECT * FROM cotizaciones ORDER BY fecha_cotizacion ASC";
$result = $cnx->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" language="javascript" src="js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
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
    <title>Homepage</title>
</head>
<?php include('common/menu.php'); ?>
<body>
<div class="text-center">
    <h1>Ultima Cotizaciones
        <small>Generadas</small>
    </h1>
</div>
<body>
<!--col-xs-7 inline-block quitar-float center-block espacio-arriba2-->
<div class="">
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>COD</th>
            <th>Fecha</th>
            <th>Empresa</th>
            <th>validez</th>
            <th>Ver</th>
            <th>Editar</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id_cotizacion']; ?></td>
                <td><?php echo $row['fecha_cotizacion']; ?></td>
                <td><?php echo $row['empresa']; ?></td>
                <td><?php echo $row['validez']; ?></td>
                <td><?php echo '<a href="common/reportes_pdf/cotizacion.php?id=' . $row["id_cotizacion"] . '" target="_blank">Ver PDF</a>'; ?></td>
                <td><?php echo '<a href="#?id=' . $row["id_cotizacion"] . '">Editar</a>'; ?></td>

            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>


