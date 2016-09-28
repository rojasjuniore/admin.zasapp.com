<?php
require('../lib/mpdf/mpdf.php');
require('../_setup.php');
require('../connect_db.php');
session_start();
$session_id = session_id();

$sql_1 = "SELECT * FROM tmp_cotizacion WHERE session_id='" . $session_id . "'" or die(mysqli_connect_error());
$result_1 = $cnx->query($sql_1);
$count = mysqli_num_rows($result_1);
if (!count) {
    echo "<script>alert('No hay productos agregados a la cotizacion')</script>";
    echo "<script>window.close();</script>";
    exit;
}
//Variables por GET
$atencion = $_GET['atencion'];
$tel1 = $_GET['tel1'];
$empresa = $_GET['empresa'];
$tel2 = $_GET['tel2'];
$email = $_GET['email'];
$condiciones = $_GET['condiciones'];
$validez = $_GET['validez'];
$entrega = $_GET['entrega'];
$vendedor = $_GET['vendedor'];
$direccion_cliente = $_GET['direccion_cliente'];
$date = date("Y-m-d H:i:s");
//Fin de variables por GET
$sql_cotizacion = mysql_query("select LAST_INSERT_ID(numero_cotizacion) as last from cotizaciones order by id_cotizacion desc limit 0,1 ") or die(mysql_error());
$rwC = mysql_fetch_array($sql_cotizacion);
echo mysql_error($link);
$numero_cotizacion = $rwC['last'] + 1;


$sql = "select * from producto, tmp_cotizacion where producto . id_producto = tmp_cotizacion . id_producto and tmp_cotizacion . session_id = '" . $session_id . "'" or die(mysqli_connect_error());
$result = $cnx->query($sql);
while ($productos[] = $result->fetch_array()) ;
//print_r($productos);
//die();
$html = '  <header class="clearfix">
      <div id="logo">
        <img src="img /logo.png">
      </div>
      <h1>www.zasapp.com </h1>
      <div id="company" class="clearfix">
        <div>ZaSapp.com</div>
        <div>455 Foggy Heights,<br /> AZ 85004, US</div>
        <div>(955) 292 250</div>
        <div>(696) 912269</div>
        <div><a href="mailto:jmolina@zasapp . com">jmolina@zasapp.com</a></div>
      </div>';
$html .= '
      <div id="project">
        <!--<div><span>PROJECT</span> Website development</div>-->
        <div><span>CLIENT</span> ' . $empresa . '</div>
        <div><span>ATTENTIONS</span> ' . $atencion . '</div>
        <div><span>ADDRESS</span> ' . $direccion_cliente . '</div>
        <div><span>EMAIL</span> <a href="mailto:' . $atencion . '"> ' . $atencion . '</a></div>
        <div><span>DATE</span> ' . $atencion . '</div>
        <div><span>DUE DATE</span> ' . $atencion . '</div>
      </div>';
$html .= '
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">COD</th>
            <th class="service">SERVICE</th>
            <th class="desc">DESCRIPTION</th>
            <th>PRICE</th>
            <th>QTY</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>';
foreach ($productos as $producto) {
    $precio_venta = $productos['precio_tmp'];
    $precio_venta_f = number_format($precio_venta, 2);//Formateo variables
    $precio_venta_r = str_replace(",", "", $precio_venta_f);//Reemplazo las comas
    $precio_total = $precio_venta_r * $cantidad;
    $precio_total_f = number_format($precio_total, 2);//Precio total formateado
    $precio_total_r = str_replace(",", "", $precio_total_f);//Reemplazo las comas
    $sumador_total += $precio_total_r;//Sumador
    $html .= '
          <tr>
            <td class="service">' . $producto['codigo_producto'] . '</td>
            <td class="service">' . $producto['titulo'] . '</td>
            <td class="desc">' . $producto['descripcion'] . '</td>
            <td class="unit">€' . $precio_venta . '</td>
            <td class="qty">' . $producto['cantidad_tmp'] . '</td>
            <td class="total">€' . $producto['cantidad_tmp'] * $producto['precio_tmp'] . '</td>
          </tr>';
}
$html .= '
          <tr>';

$html .= '
            <td colspan="4">SUBTOTAL</td>
            <td class="total">€' . $sumador_total . '</td>
          </tr>
          <tr>
            <td colspan="4">TAX 25%</td>
            <td class="total">€' . $tax . '</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total">€' . $sumador_total . '</td>
          </tr>';
$html .= '
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>';

//Insert en la tabla detalle_cotizacion
$insert_detail = mysql_query("INSERT INTO detalle_cotizacion VALUES ('','$numero_cotizacion','$id_producto','$cantidad','$precio_venta_r')") or die("Error al ejecutar la consulta 02" . mysql_error());
$query = mysql_query("select nombre_vendedor, apellidos_vendedor from vendedor  where id_vendedor='$vendedor'") or die("Error al ejecutar la consulta 03" . mysql_error());
$rw_u = mysql_fetch_array($query);
echo $rw_u['nombre_vendedor'] . " " . $rw_u['apellidos_vendedor'];


$mpdf = new mPDF('c', 'A4');
$css = file_get_contents('css/style.css');
$mpdf->writeHTML($css, 1);
$mpdf->writeHTML($html);
$mpdf->Output('cotizaciones.pdf', 'I');

$date = date("Y-m-d H:i:s");
$insert = mysql_query("INSERT INTO cotizaciones (numero_cotizacion,fecha_cotizacion,atencion, tel1,empresa,tel2,email,condiciones,validez,entrega,vendedor,estatus) VALUES ('$numero_cotizacion','$date','$atencion','$tel1','$empresa', '$tel2','$email','$condiciones','$validez','$entrega','$vendedor','PEND')") or die(mysql_error());
$delete = mysql_query("DELETE FROM tmp_cotizacion WHERE session_id='" . $session_id . "'") or die("Error al ejecutar la consulta 05" . mysql_error());

?>