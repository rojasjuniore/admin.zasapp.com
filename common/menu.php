<?php
if (!isset($_SESSION)) {
    session_start();
    if (@!$_SESSION['nombre_vendedor']) {
        header("Location:index.php");
    }
}
require_once('config.php');
$base_url = BASE_URL;
?>
<header>
    <div class="menu_bar">
        <a href="#" class="bt-menu"><span class="icon-list2"></span>Menú</a>
    </div>
    <nav>
        <ul>
            <li><a href="<?php echo $base_url; ?>/homepage.php"><span class="icon-home2"></span>Inicio</a></li>
            <li class="submenu">
                <a href="#"><span class="icon-user-tie"></span>Cliente<span></span></a>
                <ul class="children">
                    <li><a href="<?php echo $base_url; ?>/module_registration/registration_customer.php">Registro de
                            Cliente<span
                                class="icon-user-plus"></span></a>
                    </li>
                    <li><a href="<?php echo $base_url; ?>/module_search_result/consult_customers.php">Consulta de
                            Cliente<span
                                class="icon-search"></span></a>
                    </li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#"><span class="icon-rocket"></span>Productos<span class="caret icon-arrow-down6"></span></a>
                <ul class="children">
                    <li><a href="<?php echo $base_url; ?>/module_registration/registration_product.php">Registro de
                            Producto<span
                                class="icon-user-plus"></span></a>
                    </li>
                    <li><a href="../module_search_result/consult_product.php">Consulta de
                            Producto<span
                                class="icon-search"></span></a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#"><span class="icon-man"></span>Vendedor<span class="caret icon-arrow-down6"></span></a>
                <ul class="children">
                    <li><a href="<?php echo $base_url; ?>/module_registration/registration_seller.php">Registro de
                            Vendedor<span
                                class="icon-file-pdf"></span></a></li>
                    <li><a href="../module_search_result/consult_seller.php">Consulta de
                            Vendedor<span
                                class="icon-search"></span></a></li>
                    <li><a href="<?php echo $base_url; ?>/module_business/show_products.php">Ver Productos<span
                                class="icon-cart"></span></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><span class="icon-cart"></span>Presupuesto<span class="caret icon-arrow-down6"></span></a>
                <ul class="children">
                    <li><a href="<?php echo $base_url; ?>/module_business/registration_quotes.php">Registro de
                            cotizaciones<span
                                class="icon-cart"></span></a>
                    </li>
                    <li><a href="<?php echo $base_url; ?>/module_business/consult_budget.php">Consultar
                            Cotizaciones<span
                                class="icon-search"></span></a>
                    <li><a href="<?php echo $base_url; ?>/module_business/consulting_contract.php">Consultar
                            Contratos<span
                                class="icon-book"></span></a>
                </ul>
            </li>
            <li class="submenu text-left">
                <a href="#"><span class="icon-profile"></span>Bienvenido <?php echo
                    $_SESSION['nombre_vendedor']; ?></a>
                <ul class="children">
                    <li><a href="<?php echo $base_url; ?>/common/disconnect.php"><span
                                class="icon-exit"></span>Salir</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>