<?php
session_start();
if (@!$_SESSION['nombre_vendedor']) {
    header("Location:index.php");
}
require('../common/_setup.php');
$sql = "SELECT  id_producto, codigo_producto, titulo, descripcion, precio, plantilla_url FROM producto";
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
    <link rel="stylesheet" type="text/css" href="../css/animate.css">
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
    <title>Consultar Producto</title>
</head>
<header>
    <?php include('../common/menu.php'); ?>
</header>
<body>
<div class="text-center">
    <h1> Consultar
        <small>productos</small>
    </h1>
</div>
<div class="col-md-9 center-table">
    <h3><a href="registro_producto.php">Cargar Producto</a></h3>
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Codigo</th>
            <th>titulo</th>
            <th>descripcion</th>
            <th>precio</th>
            <th>plantilla_url</th>
            <th>Editar</th>
            <th>Generar</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['codigo_producto']; ?></td>
                <td><?php echo $row['titulo']; ?></td>
                <td><?php echo substr($row['descripcion'], 10); ?></td>
                <td><?php echo $row['precio']; ?></td>
                <td><?php echo '<a href="' . $row["plantilla_url"] . '" target="_blank">Ir a Plantilla</a>'; ?></td>
                <td><?php echo '<a href="../module_change/modify_product.php?id=' . $row["id_producto"] . '">Editar</a>'; ?></td>
                <td><?php echo '<a href="#?id=' . $row["id_producto"] . '">Ventas</a>'; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</div>
</body>
</html>

