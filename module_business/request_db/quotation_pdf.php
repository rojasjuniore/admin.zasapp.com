<?php
session_start();
if (@!$_SESSION['nombre_vendedor']) {
    header("Location:index.php");
}
include('../../common/_setup.php');
$id = session_id();
mysqli_select_db($cnx, 'cotizaciones');
$query = "SELECT * FROM tmp_cotizacion WHERE session_id ='$id'  ";

/*$result = mysqli_query($cnx, $query);
$row_cotizacion = $result->fetch_assoc();
$n_cotizacion = $row_cotizacion['numero_cotizacion'];

//var_export($row_cotizacion);echo "<br><br>";
mysqli_select_db($cnx, 'detalle_cotizacion');
$query2 = "SELECT * FROM detalle_cotizacion  WHERE numero_cotizacion = $n_cotizacion";
$result2 = mysqli_query($cnx, $query2);*/

//sin consigue registros
/*while ($a = $result2->fetch_assoc()) {

    $cod_p = $a['id_producto'];
    $query3 = "SELECT codigo_producto FROM producto  WHERE id_producto = '$cod_p'  ";
    $result3 = mysqli_query($cnx, $query3);

    $d_codigo = $result3->fetch_assoc();

    if ($d_codigo) {
        $a += $d_codigo;
    } else {
        $a += array('codigo_producto' => NULL);
    }
    //almacenar
    $datos[] = $a;
    //var_export($a);echo "<br><br>";
}*/

//exit;
//var_export($datos);
/*******************************************************************************
 * codigo para el pdf
 ********************************************************************************
 */
//CARGAR LIBRERIA
require_once('../../common/lib/ezpdf/class.ezpdf.php');


//FUNCION PARA LA FECHA
function FechaEs($sintax, $date = '')
{
    // En caso de qe no este seteada la fecha pongo la fecha actual
    $date = ($date) ? $date : time();
    // Pongo los meses y dias en un array
    $meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
    $dias = array('Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado');

    // Remplazando sintaxis [En el array $meses resto uno ya que como saben los array cuentan desde 0]
    $fechaes = str_replace('&diatexto', $dias[date('w', $date)], $sintax);
    $fechaes = str_replace('&dianum', date('d', $date), $fechaes);
    $fechaes = str_replace('&mestexto', $meses[date('m', $date) - 1], $fechaes);
    $fechaes = str_replace('&mesnum', date('m', $date), $fechaes);
    $fechaes = str_replace('&año', date('Y', $date), $fechaes);

    return ($fechaes) ? $fechaes : '<b>Sintax Error</b>: sintax error in <b>' . __FILE__ . '</b> in function <b>FechaEs(int sintax,int time)</b>';
}

$fecha = FechaEs('&dianum de &mestexto del &año');

//DECLARAR E INICIAR OBJETO
$pdf =& new Cezpdf('LETTER', 'portrait');
//Agregamos la fuente
$pdf->selectFont('../../common/lib/ezpdf/fonts/Helvetica.afm');
//establecemos el margen
$pdf->ezSetCmMargins(2, 2, 2, 2);

//****************** FUNCION PARA EL HEADER Y FOOTER ***************************
$footer = $pdf->openObject();
//IMAGEN PARA EL HEADER
//$imagen=ImageCreatefromPng(APPPATH.'../assets/png/cgp.png');
//$pdf->addImage($imagen,40,720,565,0);
//IMAGEN PARA EL FOOTER
//$imagen2=ImageCreatefromPng(APPPATH.'../assets/png/footer.png');
//$pdf->addImage($imagen2,40,10,565,0);
$pdf->closeObject();
$pdf->addObject($footer, "all");

//******************************************************************************

// $imagen=ImageCreatefromPng(APPPATH.'../assets/png/cgp.png');
// $pdf->addImage($imagen,40,720,565,0);

//$pdf->ezImage($imagen,$padding = 5,$width = 50,$resize = 'full',$justification = 'center');

$pdf->ezsetdy(-20);
$pdf->ezText(utf8_decode("TITULO"), 14, array('justification' => 'center'));
$pdf->ezsetdy(-12);
$pdf->ezText(utf8_decode("<b>TITULO_2</b>"), 14, array('justification' => 'center'));
$pdf->ezText("\n");

$pdf->ezsetdy(-10);
$pdf->ezText(utf8_decode("<b>DATOS_1</b>"), 14, array('justification' => 'center'));

$pdf->ezsetdy(-7);
$pdf->ezText(utf8_decode("Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."), 11, array('justification' => 'full', 'spacing' => '1.5'));
$pdf->ezText("\n");

$pdf->ezsetdy(-10);
$pdf->ezText(utf8_decode("<b>Numero de Cotizacion: </b>" . $row_cotizacion['cod_cotizacion_tmp']), 12, array('justification' => 'left'));
$pdf->ezsetdy(14);
$pdf->ezText(utf8_decode("Fecha de cotizacion: " . $row_cotizacion['fecha_creacion_cotizacion	']), 12, array('left' => 200));
$pdf->ezText(utf8_decode("Atencion: " . $row_cotizacion['atencion']), 12, array('justification' => 'left'));
$pdf->ezsetdy(14);
$pdf->ezText(utf8_decode("Empresa: " . $row_cotizacion['empresa']), 12, array('left' => 200));
$pdf->ezText(utf8_decode("Telefonos: " . $row_cotizacion['tel1'] . ' // ' . $row_cotizacion['tel2']), 12, array('justification' => 'left'));
//$pdf->ezsetdy(-10);
$pdf->ezText(utf8_decode("Email: " . $row_cotizacion['email']), 12, array('justification' => 'left'));
$pdf->ezsetdy(14);
$pdf->ezText(utf8_decode("Condiciones: " . $row_cotizacion['condiciones']), 12, array('left' => 200));
$pdf->ezText(utf8_decode("Validez: " . $row_cotizacion['validez']), 12, array('justification' => 'left'));
$pdf->ezsetdy(14);
$pdf->ezText(utf8_decode("Entrega: " . $row_cotizacion['entrega']), 12, array('left' => 200));
$pdf->ezText(utf8_decode("Vendedor: " . $row_cotizacion['vendedor']), 12, array('justification' => 'left'));

/*
    Formato del Encabezado de la Tabla
*/
$e_p = array(
    'codigo_producto' => utf8_decode('<b>ID_PRODUCTO</b>'),
    'cantidad' => utf8_decode('<b>Cantidad</b>'),
    'precio_venta' => utf8_decode('<b>Precio de Venta</b>')
);
$c_table1 = array(
    'showHeadings' => 1,//mostrar encabezado
    'fontSize' => 10,//tamaño de la letra
    'titleFontSize' => 14, //tamaño letras titulo
    'showLines' => 1,//mostrar lineas de la tabla
    'shaded' => 1, //sombras entre lineas
    'width' => 500, //ancho de la tabla
    'maxWidth' => 500, //ancho maximo de la tabla
    'xOrientation' => 'center', //orientacion
    'cols' => array( //configuracion de las columnas
        //'cedula' => array(
        //'justification' => 'center'//justificacion
        //'width' =>  //ancho de la columna
        //)
    )

);

$pdf->ezTable($datos, $e_p, '<b>DETALLES DE LA COTIZACION</b>', $c_table1);

$pdf->ezText("\n");

//CERRAR PED Y ENVIAR AL NAVEGADOR

ob_end_clean();
$pdf->Stream(array('Content-Disposition' => 'COTIZACION.pdf'));


?>