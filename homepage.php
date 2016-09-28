<?php
session_start();
if (@!$_SESSION['nombre_vendedor']) {
    header("Location:index.php");
}
require('common/_setup.php');
$sql = "SELECT * FROM cotizaciones";
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
    <h1 class="espacio-abajo">Ultimos
        <small>Presupuestos</small>
    </h1>
</div>
<body>
<div class="col-md-9 center-table">
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>COD</th>
            <th>Fecha</th>
            <th>Empresa</th>
            <th>Atencion</th>
            <th>Validez</th>
            <th>Ver PDF</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['numero_cotizacion']; ?></td>
                <td><?php echo $row['fecha_cotizacion']; ?></td>
                <td><?php echo $row['empresa']; ?></td>
                <td><?php echo $row['atencion']; ?></td>
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


