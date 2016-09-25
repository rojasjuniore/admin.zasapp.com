<?php
session_start();
if (@!$_SESSION['nombre_vendedor']) {
    header("Location:index.php");
}

$session_id = session_id();
var_dump($_GET);
if (isset($_GET["id"])) {
    $id = $_GET['id'];
    $cantidad = $_GET['cantidad'];
    $precio_venta = $_POST['precio'];

} else {
    $id = $_POST['id'];
    $cantidad = $_POST['cantidad'];
    $precio_venta = $_POST['precio_venta'];
}


//echo $id . '<> ' . $cantidad . '<>' . $precio_venta . '<>' . $session_id . '<>';
/* Connect To Database*/
require_once("../common/connect_db.php");

if (!empty($id) and !empty($cantidad) and !empty($precio_venta)) {
    $insert_tmp = mysql_query("INSERT INTO tmp_cotizacion  (id_producto,cantidad_tmp,precio_tmp,session_id) 
                        VALUES ('$id','$cantidad','$precio_venta','$session_id')") or die(mysql_error());
}
if (isset($_GET['id']))//codigo elimina un elemento del array
{
    $delete = mysql_query("DELETE FROM tmp_cotizacion WHERE id_tmp_cotizacion='" . mysql_escape_string($_GET['id']) . "'") or die(mysql_error());;
}

?>
<table class="table">
    <tr>
        <th>CODIGO</th>
        <th>CANT.</th>
        <th><span class="pull-right">PRECIO UNIT.</span></th>
        <th><span class="pull-right">PRECIO TOTAL</span></th>
        <th></th>
    </tr>
    <?php
    $sql = mysql_query("select * from producto, tmp_cotizacion 
                        where producto.id_producto=tmp_cotizacion.id_producto 
                        and tmp_cotizacion.session_id='" . $session_id . "'") or die(mysql_error());
    while ($row = mysql_fetch_array($sql)) {
        $id_tmp = $row["id_tmp_cotizacion"];
        $codigo_producto = $row['codigo_producto'];
        $cantidad = $row['cantidad_tmp'];
        $nombre_producto = $row['titulo'];

        $precio_venta = $row['precio_tmp'];
        $precio_venta_f = number_format($precio_venta, 2);//Formateo variables
        $precio_venta_r = str_replace(",", "", $precio_venta_f);//Reemplazo las comas
        $precio_total = $precio_venta_r * $cantidad;
        $precio_total_f = number_format($precio_total, 2);//Precio total formateado
        $precio_total_r = str_replace(",", "", $precio_total_f);//Reemplazo las comas
        $sumador_total += $precio_total_r;//Sumador
        ?>
        <tr>
            <td><?php echo $codigo_producto; ?></td>
            <td><?php echo $cantidad; ?></td>
            <td><span class="pull-right"><?php echo $precio_venta_r; ?></span></td>
            <td><span class="pull-right"><?php echo $precio_total_r; ?></span></td>
            <td><span class="pull-right"><a href="#" onclick="eliminar('<?php echo $id_tmp ?>')"><i
                            class="icon-remove"></i></a></span></td>
        </tr>
        <?php
    }
    ?>
    <tr>
        <td colspan=4><span class="pull-right">TOTAL $</span></td>
        <td><span class="pull-right"><?php echo number_format($sumador_total, 2); ?></span></td>
        <td></td>
    </tr>
</table>
