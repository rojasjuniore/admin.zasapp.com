<style type="text/css">
    <!--
    table {
        vertical-align: top;
    }

    tr {
        vertical-align: top;
    }

    td {
        vertical-align: top;
    }

    table.page_footer {
        width: 100%;
        border: none;
        background-color: white;
        padding: 2mm;
        border-collapse: collapse;
        border: none;
    }

    }
    -->
</style>
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial">
    <page_footer>
        <table class="o_PAGE_FOOTER">
            <tr>
                <td style="width: 50%; text-align: left">
                    <page>
                        <page_footer>
                            [[page_cu]]/[[page_nb]]
                        </page_footer>
                    </page>
                </td>
                <td style="width: 50%; text-align: right">
                    &copy; <?php echo $empresa . " ";
                    echo $anio = date('Y'); ?>
                </td>
            </tr>
        </table>
    </page_footer>
    <table cellspacing="0" style="width: 100%;">
        <tr>
            <td style="width: 25%; color: #444444;">
                <img style="width: 100%;" src="../../../img/logo.jpg" alt="Logo"><br>
            </td>
            <td style="width: 75%;text-align:right">
                COTIZACION Nº <?php echo $numero_cotizacion; ?>
            </td>
        </tr>
    </table>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
            <td style="width:50%; "><strong>Dirección:</strong> <br>MI Direccion
            </td>
        </tr>
    </table>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
            <td style="width: 100%;text-align:right">
                FECHA: <?php echo date("d-m-Y"); ?>
            </td>
        </tr>
    </table>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
            <td style="width:15%; ">ATENCION:</td>
            <td style="width:50%"><?php echo $atencion; ?> </td>
            <td style="width:15%;text-align:right"> TEL.:</td>
            <td style="width:20%">&nbsp;<?php echo $tel1; ?> </td>
        </tr>
        <tr>
            <td style="width:15%; ">EMPRESA :</td>
            <td style="width:50%"><?php echo $empresa; ?></td>
            <td style="width:15%;text-align:right"> TEL.:</td>
            <td style="width:20%">&nbsp; <?php echo $tel2; ?> </td>
        </tr>
        <tr>
            <td style="width:15%; ">Email :</td>
            <td style="width:50%"><?php echo $email; ?></td>
        </tr>

    </table>
    <table cellspacing="0" style="width: 100%; text-align: left;font-size: 11pt">
        <tr>
            <td style="width:100%; ">A continuación Presentamos nuestra oferta que esperamos sea de su conformidad.</td>
        </tr>
    </table>
    <table cellspacing="0"
           style="width: 100%; border: solid 1px black; background: #E7E7E7; text-align: center; font-size: 10pt;padding:1mm;">
        <tr>
            <th style="width: 10%">CANT.</th>
            <th style="width: 60%">DESCRIPCION</th>
            <th style="width: 15%">PRECIO UNIT.</th>
            <th style="width: 15%">PRECIO TOTAL</th>
        </tr>
    </table>
    <?php
    $sql = mysql_query("select * from producto, tmp_cotizacion where producto.id_producto=tmp_cotizacion.id_producto  and tmp_cotizacion.session_id='" . $session_id . "'") or die("Error al ejecutar la consulta  01" . mysql_error());
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
        ?>
        <table cellspacing="0"
               style="width: 100%; border: solid 1px black;  text-align: center; font-size: 11pt;padding:1mm;">
            <tr>
                <td style="width: 10%; text-align: center"><?php echo $cantidad; ?></td>
                <td style="width: 60%; text-align: left"><?php echo $nombre_producto; ?></td>
                <td style="width: 15%; text-align: right"><?php echo $precio_venta_f; ?></td>
                <td style="width: 15%; text-align: right"><?php echo $precio_total_f; ?></td>

            </tr>
        </table>
        <?php
        //Insert en la tabla detalle_cotizacion
        $insert_detail = mysql_query("INSERT INTO detalle_cotizacion VALUES ('','$numero_cotizacion','$id_producto','$cantidad','$precio_venta_r')") or die("Error al ejecutar la consulta 02" . mysql_error());
    }
    ?>
    <table cellspacing="0"
           style="width: 100%; border: solid 1px black; background: #E7E7E7; text-align: center; font-size: 11pt;padding:1mm;">
        <tr>
            <th style="width: 87%; text-align: right;">TOTAL :</th>
            <th style="width: 13%; text-align: right;">&#36; <?php echo number_format($sumador_total, 2); ?></th>
        </tr>
    </table>
    *** Precios incluyen IVA ***
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
            <td style="width:50%;text-align:right">Condiciones de pago:</td>
            <td style="width:50%; ">&nbsp;<?php echo $condiciones; ?></td>
        </tr>
        <tr>
            <td style="width:50%;text-align:right">Validez de la oferta:</td>
            <td style="width:50%; ">&nbsp;<?php echo $validez; ?></td>
        </tr>
        <tr>
            <td style="width:50%;text-align:right">Tiempo de entrega:</td>
            <td style="width:50%; ">&nbsp;<?php echo $entrega; ?></td>
        </tr>
    </table>
    <br>
    <table cellspacing="10" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
            <td style="width:33%;text-align: center;">
                <?php
                $query = mysql_query("select nombre_vendedor, apellidos_vendedor from vendedor  where id_vendedor='$vendedor'") or die("Error al ejecutar la consulta 03" . mysql_error());
                $rw_u = mysql_fetch_array($query);
                echo $rw_u['nombre_vendedor'] . " " . $rw_u['apellidos_vendedor'];
                ?>
            </td>
        </tr>
        <tr>
            <td style="width:33%;text-align: center;border-top:solid 1px">Vendedor</td>
            <td style="width:33%;text-align: center;border-top:solid 1px">Cotizado</td>
            <td style="width:33%;text-align: center;border-top:solid 1px">Aceptado Cliente</td>
        </tr>
    </table>
</page>
<?php
function Footer()
{
    $this->SetY(-15);
    $this->SetFont('Arial', 'I', 8);
    $this->Cell(0, 10, 'Este es el pie de página creado con el método Footer() de la clase creada PDF que hereda de FPDF', 'T', 0, 'C');
}

$date = date("Y-m-d H:i:s");
$insert = mysql_query("INSERT INTO cotizaciones VALUES ('','$numero_cotizacion','$date','$atencion','$tel1','$empresa', '$tel2','$email','$condiciones','$validez','$entrega','$vendedor')") or die("Error al ejecutar la consulta 04 " . mysql_error());
//$delete = mysql_query("DELETE FROM tmp_cotizacion WHERE session_id='" . $session_id . "'") or die("Error al ejecutar la consulta 05" . mysql_error());
?>