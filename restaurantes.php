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
$productos = new Clases\Productos();

$ubicacionUsuario = isset($_GET["ubicacion"]) ? $_GET["ubicacion"] : '';
if ($ubicacionUsuario != ''):
    $ubicacionUsuario = str_replace("-", "+", $funcion->normalizar_link($ubicacionUsuario));
    $jsonUsuario = json_decode(file_get_contents('https://geocoder.api.here.com/6.2/geocode.json?app_id=Nkd7zJVtg6iaOyaQoEvK&app_code=HTkK8DlaV14bg6RDCA-pQA&searchtext=' . $ubicacionUsuario));
    $usuarioLongitud = ($jsonUsuario->Response->View[0]->Result[0]->Location->DisplayPosition->Longitude);
    $usuarioLatitud = ($jsonUsuario->Response->View[0]->Result[0]->Location->DisplayPosition->Latitude);
endif;


$categoriaGET = isset($_GET["categoria"]) ? $_GET["categoria"] : 0;
$filterEmpresa = '';

if ($categoriaGET != 0):
    unset($filterEmpresa);
    if (strpos($categoriaGET, ',') !== false):
        foreach (explode(',', $categoriaGET) as $value):
            $productosArrayTemp[] = $productos->list(array("categoria = '$value' GROUP BY cod_empresa"), "", "");
        endforeach;
        $cantidadCategorias = count($productosArrayTemp);
        for ($i = 0; $i < $cantidadCategorias; $i++):
            $cantidadProductos = count($productosArrayTemp[$i]);
            for ($j = 0; $j < $cantidadProductos; $j++):
                $arrayDeCodigos[] = "cod = '" . $productosArrayTemp[$i][$j]['cod_empresa'] . "'";
            endfor;
            if ($i == 0):
                $arraySinRepeticiones = $arrayDeCodigos;
            endif;
            $arraySinRepeticiones = array_intersect($arrayDeCodigos, $arraySinRepeticiones);
            unset($arrayDeCodigos);
        endfor;
        $filterEmpresa = array(implode(" OR ", $arraySinRepeticiones));
    else:
        $filterProductos = array("categoria = '$categoriaGET' GROUP BY cod_empresa");
        $productosArray = $productos->list($filterProductos, "", "");
        foreach ($productosArray as $key => $value):
            $filterEmpresaTmp[] = "cod = '" . $value['cod_empresa'] . "'";
        endforeach;
        $filterEmpresa = array(implode(" OR ", $filterEmpresaTmp));
    endif;
endif;

$productosCategorias = $productos->list(array("categoria != '' GROUP BY categoria"), "", "");
foreach ($productosCategorias as $key => $value):
    $categoriasQuery[] = "cod = '".$value['categoria']."'";
endforeach;
$filterCategorias = array(implode(" OR ",$categoriasQuery));
$categoriasArray = $categorias->list($filterCategorias, "titulo asc", "");

$pagina = isset($_GET["pagina"]) ? $_GET["pagina"] : '0';
$cantidad = 2;

if ($pagina > 0) {
    $pagina = $pagina - 1;
}

if (isset($_GET['pagina'])):
    $url = $funcion->eliminar_get(CANONICAL, 'pagina');
else:
    $url = CANONICAL;
endif;

if (isset($_SESSION['seed'])) {
    $seed = $_SESSION['seed'];
} else {
    $_SESSION['seed'] = mt_rand();
    $seed = $_SESSION['seed'];
}

$empresaArray = $empresa->list($filterEmpresa, "rand($seed)", $cantidad * $pagina . ',' . $cantidad);
$numeroPaginas = $empresa->paginador($filterEmpresa, $cantidad);
?>

<!-- SubHeader =============================================== -->
<section class="parallax-window" id="short" data-parallax="scroll"
         data-image-src="<?= URL ?>/assets/img/restaurantes.jpg"
         data-natural-width="1920" data-natural-height="1280">
    <div id="subheader">
        <div id="sub_content">
            <h1>Restaurantes</h1>
            <p>Elegí el restaurante más cerca de tu casa.</p>
            <p></p>
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

<!-- Content ================================================== -->
<div class="container margin_60_35">
    <div class="row">

        <div class="col-md-3">
            <div id="filters_col">
                <a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters"
                   id="filters_col_bt">Filtros <i class="icon-plus-1 pull-right"></i></a>
                <div class="collapse" id="collapseFilters">
                    <div class="filter_type">
                        <h6><b>Opciones</b></h6>
                        <ul class="nomargin">
                            <li><a class="categoriasLink"><i class="icon-credit-card"></i> Tarjeta</a></li>
                            <li><a class="categoriasLink"><i class="icon-tag-7"></i> Descuentos</a></li>
                        </ul>
                    </div>
                    <div class="filter_type">
                        <h6><b>Categorías</b></h6>
                        <ul>
                            <?php foreach ($categoriasArray as $key => $value): ?>
                                <?php $anidador = $funcion->anidador(CANONICAL, "categoria", count($_GET)); ?>
                                <?php if ($categoriaGET != 0): ?>
                                    <?php $categoriaNueva = $categoriaGET . "," . $value['cod']; ?>
                                    <?php $urlFiltro = $funcion->eliminar_get(CANONICAL, 'categoria'); ?>
                                <?php else: ?>
                                    <?php $categoriaNueva = $value['cod']; ?>
                                    <?php $urlFiltro = CANONICAL; ?>
                                <?php endif; ?>
                                <li>
                                    <a href="<?= $urlFiltro . $anidador ?>categoria=<?= $categoriaNueva ?>"
                                       class="categoriasLink"><?= $value['titulo'] ?>
                                        <small></small>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div><!--End collapse -->
            </div><!--End filters col-->
        </div><!--End col-md -->

        <div class="col-md-9">

            <?php foreach ($empresaArray as $key => $value): ?>

                <?php if ($ubicacionUsuario != ''): ?>
                    <?php $coordenadas = explode(',', $value['coordenadas']); ?>
                    <?php $jsonDistancia = json_decode(file_get_contents('https://route.api.here.com/routing/7.2/calculateroute.json?app_id=Nkd7zJVtg6iaOyaQoEvK&app_code=HTkK8DlaV14bg6RDCA-pQA&waypoint0=geo!' . $usuarioLatitud . ',' . $usuarioLongitud . '&waypoint1=geo!' . $coordenadas[0] . ',' . $coordenadas[1] . '&mode=shortest;pedestrian')); ?>
                    <?php $distancia = $jsonDistancia->response->route[0]->summary->distance; ?>
                <?php endif; ?>

                <?php $categorias->set("cod_empresa", $value['cod']); ?>
                <?php $categoriasMasUsadas = $categorias->categoriasMasUsadas(); ?>
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

                                </div>
                                <h3><?= $value['titulo'] ?></h3>
                                <div class="type">
                                    <i class="icon-food"></i>
                                    <?php foreach ($categoriasMasUsadas as $keyC => $valueC): ?>
                                        <?= $valueC['titulo'] ?> /
                                    <?php endforeach; ?>
                                    ..
                                </div>
                                <div class="location">
                                    <i class="icon-location"></i> <?= $value['direccion'] ?> • <?= $value['ciudad'] ?>
                                    • <?= $value['provincia'] ?>
                                </div>
                                <?php if ($ubicacionUsuario != ''): ?>
                                    <div class="mt-5">
                                        <span class="info">Distancia: </span>
                                        <?= $distancia ?> m
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="go_to">
                                <div>
                                    <a href="<?= URL; ?>/restaurante/<?= str_replace(" ", "-", $value['titulo']); ?>/<?= $value['cod'] ?>"
                                       class="btn_1">Ver Restaurante</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End row-->
                </div><!-- End strip_list-->
            <?php endforeach; ?>
            <div class="text_center">
                <ul class="pagination">
                    <?php $anidador = $funcion->anidador(CANONICAL, "pagina", count($_GET)); ?>
                    <?php if (($pagina + 1) > 1): ?>
                        <li class="page-item"><a class="page-link"
                                                 href="<?= $url ?><?= $anidador ?>pagina=<?= $pagina ?>"><span
                                        aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Anterior</span></a></li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $numeroPaginas; $i++): ?>
                        <li class="page-item"><a class="page-link"
                                                 href="<?= $url ?><?= $anidador ?>pagina=<?= $i ?>"><?= $i ?></a></li>
                    <?php endfor; ?>

                    <?php if (($pagina + 2) <= $numeroPaginas): ?>
                        <li class="page-item"><a class="page-link"
                                                 href="<?= $url ?><?= $anidador ?>pagina=<?= ($pagina + 2) ?>"><span
                                        aria-hidden="true">&raquo;</span>
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
<script src="js/infobox.js"></script>

