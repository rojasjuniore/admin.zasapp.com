<?php
session_start();
if (@!$_SESSION['nombre_vendedor']) {
    header("Location:index.php");
}
require('../common/cn_con.php');
$sql = "SELECT * FROM vendedor";
$result = $mysqli->query($sql);
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
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/animate.css">
    <link rel="stylesheet" href="../css/fonts.css">
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
    <title>Consultar Vendedor</title>
</head>
<header>
    <?php include('../common/menu.php'); ?>
</header>
<body>
<div class="text-center">
    <h1> Consultar
        <small>vendedores</small>
    </h1>
</div>
<div class="container">
    <form action="registro/#" method="post">
        <table id="example" class="display" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Usuario</th>
                <th>Clave</th>
                <th>Comision</th>
                <th>Editar</th>
                <th>Ventas</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['nombre_vendedor']; ?></td>
                    <td><?php echo $row['apellidos_vendedor']; ?></td>
                    <td><?php echo $row['email_vendedor']; ?></td>
                    <td><?php echo $row['usuario_vendedor']; ?></td>
                    <td><?php echo $row['clave_vendedor']; ?></td>
                    <td><?php echo $row['comision_vendedor']; ?></td>
                    <td><?php echo '<a href="../module_change/modify_seller.php?id=' .
                            $row["id_vendedor"] . '"><img src="../img/editar.png"></a>'; ?></td>
                    <td><?php echo '<a href="#?id=' . $row["id_vendedor"] . '"><img src="../img/sel.png"></a>'; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
</div>
</div>
</form>
</body>
</html>



