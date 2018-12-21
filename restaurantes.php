<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$funcion = new Clases\PublicFunction();
$template->set("title", TITULO);
$template->set("description", "");
$template->set("keywords", "");
$template->set("favicon", LOGO);
$template->themeInit();
//Clases
$empresa = new Clases\Empresas();
$imagenesEmpresa = new Clases\Imagenes();
$categorias = new Clases\Categorias();

$pagina = isset($_GET["pagina"]) ? $_GET["pagina"] : '0';
$cantidad = 2;

if ($pagina > 0) {
    $pagina = $pagina - 1;
}

if(@count($_GET)>1){
    $anidador = "&";
}else{
    $anidador = "?";
}

if(isset($_GET['pagina'])):
    $url = $funcion->eliminar_get(CANONICAL, 'pagina');
else:
    $url = CANONICAL;
endif;

$empresaArray = $empresa->list("","",$cantidad*$pagina.','.$cantidad);
$numeroPaginas = $empresa->paginador("",$cantidad);
?>

<!-- SubHeader =============================================== -->
<section class="parallax-window" id="short" data-parallax="scroll" data-image-src="img/sub_header_cart.jpg"
         data-natural-width="1400" data-natural-height="350">
    <div id="subheader">
        <div id="sub_content">
            <h1>Crea tu empresa en 3 simples pasos</h1>
            <div class="bs-wizard">
                <div class="col-xs-4 bs-wizard-step active">
                    <div class="text-center bs-wizard-stepnum"><strong>1.</strong> Descripción</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="#0" class="bs-wizard-dot"></a>
                </div>

                <div class="col-xs-4 bs-wizard-step disabled">
                    <div class="text-center bs-wizard-stepnum"><strong>2.</strong> Ubicación</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="cart_2.html" class="bs-wizard-dot"></a>
                </div>

                <div class="col-xs-4 bs-wizard-step disabled">
                    <div class="text-center bs-wizard-stepnum"><strong>3.</strong> Logo y Creación</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="cart_3.html" class="bs-wizard-dot"></a>
                </div>
            </div><!-- End bs-wizard -->
        </div><!-- End sub_content -->
    </div><!-- End subheader -->
</section><!-- End section -->
<!-- End SubHeader ============================================ -->

<div id="position">
    <div class="container">
        <ul>
            <li><a href="#0">Inicio</a></li>
            <li>Crear Empresa</li>
        </ul>
    </div>
</div><!-- Position -->

<?php
if (isset($_POST["crear_empresa"])):
    $titulo = $funcion->antihack_mysqli(isset($_POST["tituloEmpresa"]) ? $_POST["tituloEmpresa"] : '');
    $telefono = $funcion->antihack_mysqli(isset($_POST["telefonoEmpresa"]) ? $_POST["telefonoEmpresa"] : '');
    $email = $funcion->antihack_mysqli(isset($_POST["emailEmpresa"]) ? $_POST["emailEmpresa"] : '');
    $desarrollo = $funcion->antihack_mysqli(isset($_POST["desarrolloEmpresa"]) ? $_POST["desarrolloEmpresa"] : '');

    $cod = substr(md5(uniqid(rand())), 0, 10);
    $cod_usuario = $_SESSION['usuarios']['cod'];

    $fecha = getdate();
    $fecha = $fecha['year'] . '-' . $fecha['mon'] . '-' . $fecha['mday'];

    $empresa->set("cod", $cod);
    $empresa->set("titulo", $titulo);
    $empresa->set("telefono", $telefono);
    $empresa->set("email", $email);
    $empresa->set("desarrollo", $desarrollo);
    $empresa->set("fecha", $fecha);
    $empresa->set("cod_usuario", $cod_usuario);

    $empresa->add();
    $funcion->headerMove(URL . '/crear_empresa_paso2');
endif;
?>

<!-- Content ================================================== -->
<div class="container margin_60_35">
    <div class="row">

        <div class="col-md-3">
            <p>
                <a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false"
                   aria-controls="collapseMap">View on map</a>
            </p>
            <div id="filters_col">
                <a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters"
                   id="filters_col_bt">Filters <i class="icon-plus-1 pull-right"></i></a>
                <div class="collapse" id="collapseFilters">
                    <div class="filter_type">
                        <h6>Distance</h6>
                        <input type="text" id="range" value="" name="range">
                        <h6>Type</h6>
                        <ul>
                            <li><label><input type="checkbox" checked class="icheck">All
                                    <small>(49)</small>
                                </label></li>
                            <li><label><input type="checkbox" class="icheck">American
                                    <small>(12)</small>
                                </label><i class="color_1"></i></li>
                            <li><label><input type="checkbox" class="icheck">Chinese
                                    <small>(5)</small>
                                </label><i class="color_2"></i></li>
                            <li><label><input type="checkbox" class="icheck">Hamburger
                                    <small>(7)</small>
                                </label><i class="color_3"></i></li>
                            <li><label><input type="checkbox" class="icheck">Fish
                                    <small>(1)</small>
                                </label><i class="color_4"></i></li>
                            <li><label><input type="checkbox" class="icheck">Mexican
                                    <small>(49)</small>
                                </label><i class="color_5"></i></li>
                            <li><label><input type="checkbox" class="icheck">Pizza
                                    <small>(22)</small>
                                </label><i class="color_6"></i></li>
                            <li><label><input type="checkbox" class="icheck">Sushi
                                    <small>(43)</small>
                                </label><i class="color_7"></i></li>
                        </ul>
                    </div>
                    <div class="filter_type">
                        <h6>Rating</h6>
                        <ul>
                            <li><label><input type="checkbox" class="icheck"><span class="rating">
							<i class="icon_star voted"></i><i class="icon_star voted"></i><i
                                                class="icon_star voted"></i><i class="icon_star voted"></i><i
                                                class="icon_star voted"></i>
							</span></label></li>
                            <li><label><input type="checkbox" class="icheck"><span class="rating">
							<i class="icon_star voted"></i><i class="icon_star voted"></i><i
                                                class="icon_star voted"></i><i class="icon_star voted"></i><i
                                                class="icon_star"></i>
							</span></label></li>
                            <li><label><input type="checkbox" class="icheck"><span class="rating">
							<i class="icon_star voted"></i><i class="icon_star voted"></i><i
                                                class="icon_star voted"></i><i class="icon_star"></i><i
                                                class="icon_star"></i>
							</span></label></li>
                            <li><label><input type="checkbox" class="icheck"><span class="rating">
							<i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i
                                                class="icon_star"></i><i class="icon_star"></i>
							</span></label></li>
                            <li><label><input type="checkbox" class="icheck"><span class="rating">
							<i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i><i
                                                class="icon_star"></i><i class="icon_star"></i>
							</span></label></li>
                        </ul>
                    </div>
                    <div class="filter_type">
                        <h6>Options</h6>
                        <ul class="nomargin">
                            <li><label><input type="checkbox" class="icheck">Delivery</label></li>
                            <li><label><input type="checkbox" class="icheck">Take Away</label></li>
                            <li><label><input type="checkbox" class="icheck">Distance 10Km</label></li>
                            <li><label><input type="checkbox" class="icheck">Distance 5Km</label></li>
                        </ul>
                    </div>
                </div><!--End collapse -->
            </div><!--End filters col-->
        </div><!--End col-md -->

        <div class="col-md-9">

            <div id="tools">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="styled-select">
                            <select name="sort_rating" id="sort_rating">
                                <option value="" selected>Sort by ranking</option>
                                <option value="lower">Lowest ranking</option>
                                <option value="higher">Highest ranking</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 hidden-xs">
                        <a href="grid_list.html" class="bt_filters"><i class="icon-th"></i></a>
                    </div>
                </div>
            </div><!--End tools -->
            <?php foreach ($empresaArray as $key => $value): ?>
            <?php $categorias->set("cod_empresa",$value['cod']); ?>
            <?php $categoriasArray = $categorias->categoriasMasUsadas(); ?>
                <div class="strip_list wow fadeIn" data-wow-delay="0.1s">
                    <!--<div class="ribbon_1">
                        Popular
                    </div>-->
                    <div class="row">
                        <div class="col-md-9 col-sm-9">
                            <div class="desc">
                                <div class="thumb_strip">
                                    <a href="#"><img src="<?= URL; ?>/<?= $value['logo']; ?>"
                                                     alt="<?= $value['titulo'] ?>"></a>
                                </div>
                                <div class="rating">
                                    <i class="icon_star voted"></i><i class="icon_star voted"></i><i
                                            class="icon_star voted"></i><i class="icon_star voted"></i><i
                                            class="icon_star"></i> (
                                    <small><a href="#0">98 reviews</a></small>
                                    )
                                </div>
                                <h3><?= $value['titulo'] ?></h3>
                                <div class="type">
                                    <i class="icon-food"></i>
                                    <?php foreach ($categoriasArray as $keyC => $valueC): ?>
                                    <?=$valueC['titulo']?> /
                                    <?php endforeach; ?>
                                    ..
                                </div>
                                <div class="location">
                                    <i class="icon-location"></i> <?= $value['direccion'] ?> • <?= $value['ciudad'] ?> • <?= $value['provincia'] ?>
                                </div>
                                <div class="mt-5">
                                    <span class="info">Distancia: </span>500 m
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="go_to">
                                <div>
                                    <a href="#" class="btn_1">Ver Restaurante</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End row-->
                </div><!-- End strip_list-->
            <?php endforeach; ?>
            <div class="text_center">
                <ul class="pagination">
                    <?php if(($pagina+1) > 1): ?>
                        <li class="page-item"><a class="page-link" href="<?=$url?><?=$anidador?>pagina=<?=$pagina?>"><span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Anterior</span></a></li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $numeroPaginas; $i++): ?>
                        <li class="page-item"><a class="page-link" href="<?=$url?><?=$anidador?>pagina=<?=$i?>"><?=$i?></a></li>
                    <?php endfor; ?>

                    <?php if(($pagina+2) <= $numeroPaginas): ?>
                        <li class="page-item"><a class="page-link" href="<?=$url?><?=$anidador?>pagina=<?=($pagina+2)?>"><span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span></a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div><!-- End col-md-9-->

    </div><!-- End row -->
</div><!-- End container -->
<!-- End Content =============================================== -->

<?php $template->themeEnd() ?>

<!-- SPECIFIC SCRIPTS -->
<script src="js/cat_nav_mobile.js"></script>
<script>$('#cat_nav').mobileMenu();</script>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script src="js/map.js"></script>
<script src="js/infobox.js"></script>
<script src="js/ion.rangeSlider.js"></script>
<script>
    $(function () {
        'use strict';
        $("#range").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 15,
            from: 0,
            to: 5,
            type: 'double',
            step: 1,
            prefix: "Km ",
            grid: true
        });
    });
</script>