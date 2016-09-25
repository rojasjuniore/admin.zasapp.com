<?php
session_start();
include('../../common/_setup.php');
echo error_reporting(E_ALL);
$session_id = session_id();
mysqli_select_db($cnx, 'tmp_cotizacion');
$query = "SELECT * 
            FROM tmp_cotizacion
            WHERE session_id='" . $session_id . "'
            " or die(mysqli_connect_error());
//$sql_count = mysql_query("select * from tmp_cotizacion where session_id='" . $session_id . "'") or die(mysql_error());
$query = mysql_num_rows($sql_count);
if ($count == 0) {
    echo "<script>alert('No hay productos agregados a la cotizacion')</script>";
    echo "<script>window.close();</script>";
    exit;
}
require_once(dirname(__FILE__) . '/../html2pdf.class.php');
require_once(dirname(__FILE__) . '/../config_doc.php');

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
//var_dump($_GET);
//Fin de variables por GET
$sql_cotizacion = mysql_query("select LAST_INSERT_ID(numero_cotizacion) as last from cotizaciones order by id_cotizacion desc limit 0,1 ") or die(mysql_error());
$rwC = mysql_fetch_array($sql_cotizacion);
echo mysql_error($link);
$numero_cotizacion = $rwC['last'] + 1;
// get the HTML
ob_start();
include(dirname('__FILE__') . '/res/cotizacion_html.php');
$content = ob_get_clean();

try {
    // init HTML2PDF
    $html2pdf = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
    // display the full page
    $html2pdf->pdf->SetDisplayMode('fullpage');
    // convert
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    // send the PDF
    $html2pdf->Output('Cotizacion.pdf');
} catch (HTML2PDF_exception $e) {
    echo $e;
    exit;
}
?>
