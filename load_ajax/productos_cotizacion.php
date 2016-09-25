<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
//session_start();
session_start();
if (@!$_SESSION['nombre_vendedor']) {
    header("Location:index.php");
}
/* Connect To Database*/
require_once("../common/connect_db.php");
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'ajax') {
    $q = $_REQUEST['q'];//Para ejecutar la consulta.
    $aColumns = array('codigo_producto', 'titulo');//Columnas de busqueda
    $sTable = "producto";
    $sWhere = "";
    if ($_GET['q'] != "") {
        $sWhere = "WHERE (";
        for ($i = 0; $i < count($aColumns); $i++) {
            $sWhere .= $aColumns[$i] . " LIKE '%" . mysql_real_escape_string($_GET['q']) . "%' OR ";
        }
        $sWhere = substr_replace($sWhere, "", -3);
        $sWhere .= ')';
    }


    include 'pagination.php'; //include pagination file
    //pagination variables
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $per_page = 5; //how much records you want to show
    $adjacents = 4; //gap between pages after number of adjacents
    $offset = ($page - 1) * $per_page;
    //Count the total number of row in your table*/


    $count_query = mysql_query("SELECT count(*) AS numrows FROM $sTable  $sWhere");
    $row = mysql_fetch_array($count_query);
    $numrows = $row['numrows'];
    $total_pages = ceil($numrows / $per_page);
    $reload = './new_market.php';
    //main query to fetch the data

    $query = mysql_query("SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page");
    //loop through fetched data
    if ($numrows > 0) {
        ?>
        <table class="table">
            <tr>
                <th>Codigo</th>
                <th>Producto</th>
                <th>Producto</th>
                <th><span class="pull-right">Cant.</span></th>
                <th><span class="pull-right">Precio</span></th>
                <th style="width: 36px;"></th>
            </tr>
            <?php
            while ($row = mysql_fetch_array($query)) {
                $id_producto = $row['id_producto'];
                $codigo_producto = $row['codigo_producto'];
                $titulo = $row['titulo'];
                $plantilla_url = $row['plantilla_url'];
                $precio_venta = $row["precio"];
                $precio_venta_ = number_format($precio_venta, 2);
                $precio_venta_ = str_replace(",", "", $precio_venta_);
                ?>
                <tr>
                    <td><?php echo $codigo_producto; ?></td>
                    <td><?php echo $titulo; ?></td>
                    <td>
                        <div class="pull-right">
                            <input type="text" class="input-mini" style="text-align:right"
                                   id="cantidad_<?php echo $id_producto; ?>" value="1">
                        </div>
                    </td>
                    <td>
                        <div class="pull-right">

                            <input type="text" class="input-mini" style="text-align:right"
                                   id="precio_venta_<?php echo $id_producto; ?>" value="<?php echo $precio_venta; ?>">
                        </div>
                    </td>
                    <td><span class="pull-right"><a href="#" onclick="agregar('<?php echo $id_producto ?>')"><i
                                    class="icon-plus-sign"></i></a></span></td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td colspan=5><span class="pull-right"><? echo paginate($reload, $page, $total_pages, $adjacents);
                        ?></span></td>
            </tr>
        </table>
        <?php
    }
}
?>