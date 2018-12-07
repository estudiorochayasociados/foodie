<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template  = new Clases\TemplateSite();
$funciones = new Clases\PublicFunction();
$template->set("title", "Admin");
$template->set("description", "Admin");
$template->set("keywords", "Inicio");
$template->set("favicon", LOGO);
$template->themeInit();
$carrito    = new Clases\Carrito();
$usuarios    = new Clases\Usuarios();
$usuarioSesion = $usuarios->view_sesion();
?>
<body id="bd" class="cms-index-index2 header-style2 prd-detail sns-products-detail1 cms-simen-home-page-v2 default cmspage">
    <div id="sns_wrapper">
        <?php $template->themeNav(); ?>
        <div class="container mt-30">
           
         
        </div>
    </div>
</body>
<?php
$template->themeEnd();
?>