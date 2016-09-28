<?php

require('../lib/mpdf/mpdf.php');
require('../_setup.php');
require('../connect_db.php');
$id = $_GET['id'];
if ($_GET['id']) {
    var_dump($_GET);
    mysqli_select_db($cnx, 'cotizaciones');
    $query = "SELECT * FROM cotizaciones WHERE id_cotizacion ='$id' ";
    $result = mysqli_query($cnx, $query);
    $row_cotizacion = $result->fetch_assoc();
    $n_cotizacion = $row_cotizacion['numero_cotizacion'];
    mysqli_select_db($cnx, 'detalle_cotizacion');

    $query2 = "SELECT * FROM detalle_cotizacion WHERE numero_cotizacion = $n_cotizacion  ";
    $result2 = mysqli_query($cnx, $query2);
    while ($a = $result2->fetch_assoc()) {
        $cod_p = $a['id_producto'];
        $query3 = "SELECT codigo_producto FROM producto WHERE id_producto = '$cod_p'";
        $result3 = mysqli_query($cnx, $query3);
        $d_codigo = $result3->fetch_assoc();
        if ($d_codigo) {
            $a += $d_codigo;
        } else {
            $a += array('codigo_producto' => NULL);
        }
        $datos[] = $a;
    }

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

    $sql = mysql_query("SELECT * FROM producto, tmp_cotizacion 
                        where producto.id_producto=tmp_cotizacion.id_producto  
                        and tmp_cotizacion.session_id='" . $session_id . "'")
    or die("Error al ejecutar la consulta" . mysql_error());
    echo mysql_error($link);
    while ($row = mysql_fetch_array($sql)) {
        $id_tmp = $row["id_tmp_cotizacion"];
        $id_producto = $row["id_producto"];
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
        $sumador_total_tax = $sumador_total_tax * 12 / 100;
        $total = $sumador_total + $sumador_total_tax;
    }
    $html .= '
          <tr>
            <td class="service">' . $codigo_producto . '</td>
            <td class="service">' . $nombre_producto . '</td>
            <td class="desc">' . $producto['descripcion'] . '</td>
            <td class="unit">€' . $precio_venta . '</td>
            <td class="qty">' . $cantidad . '</td>
            <td class="total">€' . $cantidad * $precio_venta . '</td>
          </tr>';
    $html .= '
          <tr>';
    $html .= '
            <td colspan="4">SUBTOTAL</td>
            <td class="total">€' . $sumador_total . '</td>
          </tr>
          <tr>
            <td colspan="4">TAX 25%</td>
            <td class="total">€' . $sumador_total_tax . '</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total">€' . $total . '</td>
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
}
?>