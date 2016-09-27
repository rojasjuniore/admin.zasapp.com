<?php
require('../lib/mpdf/mpdf.php');
require('../_setup.php');
require('../connect_db.php');
session_start();

include('../../common/_setup.php');
$id = $_GET['id'];
if ($_GET['id']) {
    $id = $_GET['id'];

    mysqli_select_db($cnx, 'cotizaciones');
    $query = "SELECT * FROM cotizaciones WHERE id_cotizacion ='$id' ";

    $result = mysqli_query($cnx, $query);
    $row_cotizacion = $result->fetch_assoc();
    $n_cotizacion = $row_cotizacion['numero_cotizacion'];
    //var_export($row_cotizacion);echo "<br><br>";
    mysqli_select_db($cnx, 'detalle_cotizacion');
    $query2 = "SELECT * FROM detalle_cotizacion WHERE numero_cotizacion = $n_cotizacion  ";
    $result2 = mysqli_query($cnx, $query2);
    //sin consigue registros
    while ($a = $result2->fetch_assoc()) {
        $cod_p = $a['id_producto'];
        $query3 = "SELECT codigo_producto FROM producto WHERE id_producto = '$cod_p'";
        $result3 = mysqli_query($cnx, $query3);
        //while ($productos[] = $result->fetch_array()) ;
        $d_codigo = $result3->fetch_assoc();
        if ($d_codigo) {
            $a += $d_codigo;
        } else {
            $a += array('codigo_producto' => NULL);
        }
        //almacenar
        $datos[] = $a;
        //var_export($a);echo "<br><br>";
    }
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
        <div><span>Status</span> ' . $cotizaciones['estatus'] . '</div>
        <div><span>CLIENT</span> ' . $cotizaciones['codigo_producto'] . '</div>
        <div><span>ATTENTIONS</span> ' . $cotizaciones['codigo_producto'] . '</div>
        <div><span>ADDRESS</span> ' . $cotizaciones['codigo_producto'] . '</div>
        <div><span>EMAIL</span> <a href="mailto:' . $cotizaciones['codigo_producto'] . '"> 
        ' . $cotizaciones['codigo_producto'] . '</a></div>
        <div><span>DATE</span> ' . $cotizaciones['fecha_cotizacion'] . '</div>
        <div><span>DUE DATE</span> ' . $cotizaciones['validez'] . '</div>
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


    $mpdf = new mPDF('c', 'A4');
    $css = file_get_contents('css/style.css');
    $mpdf->writeHTML($css, 1);
    $mpdf->writeHTML($html);
    $mpdf->Output('cotizaciones.pdf', 'I');

} else {
    echo 'error';
}
?>