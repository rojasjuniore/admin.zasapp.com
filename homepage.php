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
<div class="container ">
    <table id="example" class="display center-table" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>COD</th>
            <th>Fecha</th>
            <th>Empresa</th>
            <th>Atencion</th>
            <th>Validez</th>
            <th>Ver pdf</th>
            <th>Estatus</th>
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
                <td><?php echo '<select class="form-control" name="comision_vendedor" required>
                                        <option>Estatus</option>
                                        <option value="libre">Libre</option>
                                        <option value="bloqueado">Bloqueado</option>
                                        <option value="activo">Activo</option>
                                        <option value="cerrado">Cerrado</option>
                                        <option value="cancelado">Cancelado</option>
                                    </select>';
                    ?></td>
                <td><?php echo '<a href="pdf_upload/' . $row["cotizacion_pdf"] . '.pdf" target="_blank">
                <img src="img/contrato.png"></a>'; ?></td>
                <td><?php echo '<a href="#?id=' . $row["id_cotizacion"] . '"> <img src="img/contrato.png"></a>'; ?></td>
            </tr>
        <?php } ?>
        </tbody>
        delete.png
    </table>
</div>
</body>
</html>

<select class="form-control" name="comision_vendedor" required>
    <option>Seleccione..</option>
    <option value="10">10%</option>
    <option value="20">20%</option>
    <option value="30">30%</option>
    <option value="30">40%</option>
    <option value="40">50%</option>
    <option value="50">60%</option>
    <option value="70">70%</option>
    <option value="80">80%</option>
    <option value="90">90%</option>
    <option value="100">100%</option>
</select>
