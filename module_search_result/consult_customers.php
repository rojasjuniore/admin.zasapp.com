<?php
session_start();
if (@!$_SESSION['nombre_vendedor']) {
    header("Location:index.php");
}
require('../common/_setup.php');
$sql = "SELECT * FROM cliente";
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
    <title>Consultar Cliente</title>
</head>
<?php include('../common/menu.php'); ?>
<body>
<div class="text-center">
    <h1> Consultar
        <small>Clientes</small>
    </h1>
</div>
<body>
<div class="col-md-8 center-table">
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Nombres</th>
            <th>CIF/NIF</th>
            <th>email</th>
            <th>telefono</th>
            <th>Editar</th>
            <th>Seleccionar</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['nombre_cliente'] . ' ' . $row['apellidos_cliente']; ?></td>
                <td><?php echo $row['cif_nif']; ?></td>
                <td><?php echo $row['email_cliente']; ?></td>
                <td><?php echo $row['telefono_movil_cliente']; ?></td>
                <td><?php echo '<a href="../module_change/modify_customer.php?id=' . $row["id_cliente"] . '">Editar</a>'; ?></td>
                <td><?php echo '<a href="../module_business/registration_quotes1.php?id=' . $row["id_cliente"] . '">Seleccionar</a>'; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>



