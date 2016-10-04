<?php
require_once('../lib/mpdf/mpdf.php');
require('../../common/_setup.php');
session_start();
$session_id = session_id();
$sql_count = mysqli_query($cnx, "select * from tmp_cotizacion  where session_id='" . $session_id . "'");
$count = mysqli_num_rows($sql_count);
//print_r($count);
//die();
if ($count == 0) {
    echo "<script>alert('No hay productos agregados en el Presupuesto')</script>";
    echo "<script>window.close();</script>";
    exit;
}
//Variables por GET
$atencion = $_GET['atencion'];
$id_cliente = $_GET['id_cliente'];
$tel1 = $_GET['tel1'];
$empresa = $_GET['empresa'];
$tel2 = $_GET['tel2'];
$email = $_GET['email'];
$condiciones = $_GET['condiciones'];
$validez = $_GET['validez'];
$entrega = $_GET['entrega'];
$vendedor = $_GET['vendedor'];
$direccion_cliente = $_GET['direccion_cliente'];
$descuento = $_GET['descuento'];
$hoy = date("F j, Y, g:i a");
//var_dump($_GET);
//die();
//Fin de variables por GET
$sql_cotizacion = mysqli_query($cnx, "select LAST_INSERT_ID(numero_cotizacion) as last from cotizaciones order by id_cotizacion desc limit 0,1 ");
$rwC = mysqli_fetch_array($sql_cotizacion);
$numero_cotizacion = $rwC['last'] + 1;
ob_start();

$sql_vendedor = mysqli_query($cnx, "SELECT * FROM vendedor WHERE id_vendedor='$vendedor'");
while ($row = mysqli_fetch_array($sql_vendedor)) {
    $nombre_vendedor = $row['nombre_vendedor'];
    $apellidos_vendedor = $row['apellidos_vendedor'];
    $email_vendedor = $row['email_vendedor'];
}

$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Presupuesto</title>
</head>
<body>
<div class="container">
<header class="clearfix">
     <div class="col-md-6">
     
</div>
    <div id="logo">
        <img src="img/logo.png">
    </div>
    <h1>www.zasapp.com</h1>
    
  <!--  <div class="col-md-6">
     <div id="company" class="clearfix">
        <div>ZASAPP</div>
        <div>(DTI DISEÑO Y PROTECCIÓN,<br/>
        S.L. P.I.PISA c/Artesanía 25,<br/> 
        nave 12. 41.927.<br/> 
        Mairena del Aljarafe (SEVILLA),<br/> AZ 85004, US</div>
        <div>(955) 292 250 (696) 912 269</div>
        <div><a href="mailto:jmolina@zasapp.com">jmolina@zasapp.com</a></div>
    </div>
    </div>
    <div class="col-md-6">
    <div id="project">
        <div><span>NUMERO DE COTIZACION</span> ' . $numero_cotizacion . '</div>
        <div><span>EMPRESA</span> ' . $empresa . '</div>
        <div><span>VENDEDOR </span> ' . $nombre_vendedor . ' ' . $apellidos_vendedor . '</div>
        <div><span>ATENCIÓN </span> ' . $atencion . '</div>
        <div><span>DIRECCIÓN</span> ' . $direccion_cliente . '</div>
        <div><span>CORREO ELECTRÓNICO</span> <a href=" ' . $email . '"> ' . $email . '</a></div>
        <div><span>FECHA </span> ' . $hoy . '</div>
        <div><span>FECHA DE VENCIMIENTO</span> ' . $validez . '</div>
    </div>
</div>-->
<TABLE width="100%" height="150">
<TR>
<TD align="left">

        <div><span>NUMERO DE COTIZACION</span> ' . $numero_cotizacion . '</div>
        <div><span>EMPRESA</span> ' . $empresa . '</div>
        <div><span>VENDEDOR </span> ' . $nombre_vendedor . ' ' . $apellidos_vendedor . '</div>
        <div><span>ATENCIÓN </span> ' . $atencion . '</div>
        <div><span>DIRECCIÓN</span> ' . $direccion_cliente . '</div>
        <div><span>CORREO ELECTRÓNICO</span> <a href=" ' . $email . '"> ' . $email . '</a></div>
        <div><span>FECHA </span> ' . $hoy . '</div>
        <div><span>FECHA DE VENCIMIENTO</span> ' . $validez . '</div>
        </div>

</TD>
<TD align="left">
        <div>ZASAPP</div>
        <div>(DTI DISEÑO Y PROTECCIÓN,<br/>
        S.L. P.I.PISA c/Artesanía 25,<br/> 
        nave 12. 41.927.<br/> 
        Mairena del Aljarafe (SEVILLA),<br/> AZ 85004, US</div>
        <div>(955) 292 250 (696) 912 269</div>
        <div><a href="mailto:jmolina@zasapp.com">jmolina@zasapp.com</a></div>
</div>
</TD>
</TR>
</TABLE>
</header>


</div>
<main>
    <table>
        <thead>
        <tr bgcolor="#FFE0B2">
            <th class="service">Referencia</th>
            <th class="desc">Descripción</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>% Dto.</th>
            <th>Importe</th>
        </tr>
        </thead>
        <tbody>';
$sumador_total = 0;
$sql = mysqli_query($cnx, "select * from producto, tmp_cotizacion where producto.id_producto=tmp_cotizacion.id_producto  and tmp_cotizacion.session_id='" . $session_id . "'");
while ($row = mysqli_fetch_array($sql)) {
    $id_tmp = $row["id_tmp"];
    $id_producto = $row["id_producto"];
    $descripcion = $row["descripcion"];
    $codigo_producto = $row['codigo_producto'];
    $cantidad = $row['cantidad_tmp'];
    $nombre_producto = $row['nombre_producto'];
    $id_marca_producto = $row['id_marca_producto'];

    $precio_venta = $row['precio_tmp'];
    $precio_venta_f = number_format($precio_venta, 2);//Formateo variables
    $precio_venta_r = str_replace(",", "", $precio_venta_f);//Reemplazo las comas
    $precio_total = $precio_venta_r * $cantidad;
    $precio_total_f = number_format($precio_total, 2);//Precio total formateado
    $precio_total_r = str_replace(",", "", $precio_total_f);//Reemplazo las comas
    $sumador_total += $precio_total_r;//Sumador
    $dto = $sumador_total * $descuento / 100;
    $subtotal = $cantidad * $precio_venta;
    $importe = $subtotal - $dto;
    $iva = $sumador_total * 25 / 100;
    $total = $sumador_total + $iva;

    $html .= '
<tr>
    <td class="service"> ' . $codigo_producto . '</td>
    <td class="desc celda"> ' . $descripcion . '</td>
    <td class="unit">' . $cantidad . '</td>
    <td class="qty">' . '€' . $precio_venta . '</td>
    <td class="total">' . '€' . $dto . '</td>
    <td class="total">' . '€' . $importe . '</td>
</tr>';
    //Insert en la tabla detalle_cotizacion
    $insert_detail = mysqli_query($cnx, "INSERT INTO  detalle_cotizacion  VALUES ('','$numero_cotizacion','$id_producto','$cantidad','$precio_venta_r')");
}
$html .= '
<tr>
    <td colspan="5">Suma Importes</td>
    <td class="total">' . '€' . $sumador_total . '</td>
</tr>
<tr>
    <td colspan="5">% Dto.</td>
    <td class="total">' . '€' . $dto . '</td>
</tr>

<tr>
    <td colspan="5">Cuota de I.V.A.</td>
    <td class="total" >' . '€' . $iva . '</td>
</tr>
<tr bgcolor="#FFE0B2">
    <td colspan="5" class="grand total">TOTAL</td>
    <td class="grand total">' . '€' . $total . '</td>
</tr>
</tbody>
</table>
</table>
<div id="notices">
    <div>CONFORME CLIENTE</div>
    <div class="notice"><br/><br/>
        NOTA: En caso de aceptación del presupuesto rogamos <br/> envíen copia debidamente conformada.
    </div>
</div>
</main>
<footer>
    AVISO DE CONFIDENCIALIDAD:A los efectos de lo establecido en la Ley de Protección de
    Datos (15/1999) y de la LSSIyCE (34/2002), garantizamos la confidencialidad de sus datos.
    Usted podrá <br/> en todo momento ejercitar sus derechos de acceso, rectificación, cancelación y
    oposición de sus datos <br/> de carácter personal comunicándonoslo en los términos establecidos
    en la LOPD.

</footer>
</body>
</html>';

$date = date("Y-m-d H:i:s");;
$mpdf = new mPDF('c', 'A4');
$css = file_get_contents('css/style.css');
$mpdf->WriteHTML($css, 1);
$mpdf->WriteHTML($html);
$fecha = mktime();
$name = "reporte_" . $fecha;
$mpdf->Output($name, 'I');
$destino = "../../pdf_upload/$name.pdf";
$mpdf->Output($destino, 'F');

$insert = mysqli_query($cnx, "INSERT INTO cotizaciones VALUES ('','$numero_cotizacion','$id_cliente','$date','$atencion','$tel1','$empresa','$direccion_cliente','$tel2','$email','$condiciones','$validez','$entrega','$vendedor','$estatus','$name')");
$delete = mysqli_query($cnx, "DELETE FROM tmp_cotizacion WHERE session_id='" . $session_id . "'");

$my_file = "$name.pdf"; // puede ser cualquier formato
$my_path = $_SERVER['DOCUMENT_ROOT'] . "../../pdf_upload/";
$my_name = $vendedor;
$my_mail = $email_vendedor;
$my_replyto = "jmolina@zasapp.com";
$my_subject = "Cotizacion Zasapp";
$destino_email = $email;
$my_message = "Tu mensaje";

mail_attachment($my_file, $my_path, "rojasjuniore@gmail.com", $my_mail, $my_name, $my_replyto, $my_subject, $my_message);

function mail_attachment($filename, $path, $mailto, $from_mail, $from_name, $replyto, $subject, $message)
{
    $file = $path . $filename;
    $file_size = filesize($file);
    $handle = fopen($file, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $content = chunk_split(base64_encode($content));
    $uid = md5(uniqid(time()));
    $name = basename($file);
    $header = "From: " . $from_name . " <" . $from_mail . ">\r\n";
    $header .= "Reply-To: " . $replyto . "\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"" . $uid . "\"\r\n\r\n";
    $header .= "This is a multi-part message in MIME format.\r\n";
    $header .= "--" . $uid . "\r\n";
    $header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
    $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $header .= $message . "\r\n\r\n";
    $header .= "--" . $uid . "\r\n";
    $header .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"\r\n"; // use different content types here
    $header .= "Content-Transfer-Encoding: base64\r\n";
    $header .= "Content-Disposition: attachment; filename=\"" . $filename . "\"\r\n\r\n";
    $header .= $content . "\r\n\r\n";
    $header .= "--" . $uid . "--";
    if (mail($mailto, $subject, "", $header)) {
        echo '<script>alert("Enviado con exito")</script>';// or use booleans here
    } else {
        echo '<script>alert("mail send ... ERROR!")</script>';
        echo "mail send ... ERROR!";
    }
}

?>


