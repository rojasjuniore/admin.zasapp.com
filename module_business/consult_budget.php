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
    <title>Consultar Cotizaciones</title>
</head>
<?php include('../common/menu.php'); ?>
<body>
<div class="text-center">
    <h1> Consultar
        <small>Clientes</small>
    </h1>
</div>
<body>
<!--col-xs-7 inline-block quitar-float center-block espacio-arriba2-->
<div class="col-lg-offset-3 inline-block quitar-float center-block espacio-arriba2">
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>id_cotizacion</th>
            <th>empresa</th>
            <th>numero_cotizacion</th>
            <th>fecha_cotizacion</th>
            <th>Ver</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id_cotizacion']; ?></td>
                <td><?php echo $row['numero_cotizacion']; ?></td>
                <td><?php echo $row['atencion']; ?></td>
                <td><?php echo $row['empresa']; ?></td>
                <td><?php echo '<a href="request_db/consult_pdf.php?id=' . $row["id_cotizacion"] . '">Ver</a>'; ?></td>

            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>



