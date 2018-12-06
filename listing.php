<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$funciones = new Clases\PublicFunction();
$template->set("title", "Pinturería Ariel | Productos");
$template->set("description", "");
$template->set("keywords", "");
$template->set("favicon", LOGO);
$template->themeInit();
//
$pagina = isset($_GET["pagina"]) ? $_GET["pagina"] : '0';
$categoria = isset($_GET["categoria"]) ? $_GET["categoria"] : '';
$subcategoria = isset($_GET["subcategoria"]) ? $_GET["subcategoria"] : '';

$filter = array();

if($categoria != '') {
    array_push($filter,"categoria = '$categoria'");
}

if($subcategoria != '') {
    array_push($filter,"subcategoria = '$subcategoria'");
}

if ($pagina > 0) {
    $pagina = $pagina - 1;
}

if(@count($filter) == 0) {
    $filter = '';
}


if(@count($_GET) == 0) {
    $anidador = "?";
} else {
    $anidador = "&";
}


//Clases
$productos = new Clases\Productos();
$imagenes = new Clases\Imagenes();
$categorias = new Clases\Categorias();
$subcategorias = new Clases\Subcategorias();
$banners = new Clases\Banner();
//Banners
$categoriasData = $categorias->list('');
foreach ($categoriasData as $valor) {
    if ($valor['titulo'] == 'Pie' && $valor['area'] == 'banners') {
        $banners->set("categoria", $valor['cod']);
        $banDataPie = $banners->listForCategory();
    }

    if ($valor['titulo'] == 'Side' && $valor['area'] == 'banners') {
        $banners->set("categoria", $valor['cod']);
        $banDataSide = $banners->listForCategory();
    }
}
//Productos
$categorias->set("area", "productos");
$categoriasParaProductos = $categorias->listForArea('');
$marcasParaProductos = $subcategorias->list('');
$productData = $productos->listWithOps($filter, '', (24 * $pagina) . ',' . 24);
$productDataSide = $productos->listWithOps($filter, '', '8');
$productosPaginador = $productos->paginador($filter, 24);
//

//SUBCATEGORIAS
$subSub = $subcategorias->listForSearch("045");
//echo count($subSub);

?>
    <body id="bd" class="cms-index-index2 header-style2 prd-detail cms-index-index  products-grid1 cms-simen-home-page-v2 default cmspage">
<div id="sns_wrapper">
    <?php $template->themeNav(); ?>
    <!-- BREADCRUMBS -->
    <div id="sns_breadcrumbs" class="wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="sns_titlepage"></div>
                    <div id="sns_pathway" class="clearfix">
                        <div class="pathway-inner">
                            <span class="icon-pointer "></span>
                            <ul class="breadcrumbs">
                                <li class="home">
                                    <a  href="<?=URL . '/index' ?>">
                                        <i class="fa fa-home"></i>
                                        <span>Inicio</span>
                                    </a>
                                </li>
                                <li class="category3 last">
                                    <span>Todos los productos</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- AND BREADCRUMBS -->
<!-- CONTENT -->
    <div id="sns_content" class="wrap layout-lm">
        <div class="container">
            <div class="row">
                <!-- sns_left -->
                <div id="sns_left" class="col-md-3">
                    <div class="wrap-in">
                        <div class="block block-layered-nav block-layered-nav--no-filters">
                            <div class="block-title">
                                <strong>
                                    <span>Categorías</span>
                                </strong>
                            </div>
                            <div class="block-content toggle-content">
                                <dl id="narrow-by-list">
                                    <dt class="odd">Categorias</dt>
                                    <dd class="odd categoriasList">
                                        <ol>
                                            <?php
                                            foreach ($marcasParaProductos as $marList) {
                                                ?>
                                                <li>
                                                    <a href="<?= URL . "/productos.php?categoria=" . $marList['cod'] ?>">
                                                        <?= $marList['titulo'] ?>
                                                    </a>
                                                </li>
                                                <?php
                                            }
                                            ?>
                                        </ol>
                                    </dd>
                                    <dt class="odd">Marcas</dt>
                                    <dd class="odd marcasList">
                                        <ol>
                                            <?php
                                            foreach ($categoriasParaProductos as $catList) {
                                                ?>
                                                <li>
                                                    <a href="<?= URL . "/productos.php?marca=" . $catList['cod'] ?>">
                                                        <?= $catList['titulo'] ?>
                                                    </a>
                                                </li>
                                                <?php
                                            }
                                            ?>
                                        </ol>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <?php
                        if (count($banDataSide) != ''){
                        $banRandSide = $banDataSide[array_rand($banDataSide)];
                        $imagenes->set("cod", $banRandSide['cod']);
                        $imgRandSide = $imagenes->view();
                        $banners->set("id", $banRandSide['id']);
                        $value = $banRandSide['vistas'] + 1;
                        $banners->set("vistas", $value);
                        $banners->increaseViews();
                        ?>
                        <div class="block block_cat visible-lg visible-md">
                            <a class="banner5" href="<?= $banRandSide['link'] ?>">
                                <img src="<?= URL . '/' . $imgRandSide['ruta'] ?>" alt=<?= $banRandSide['nombre'] ?>">
                                    </a>
                                <?php
                                }
                                ?>
                                <div class="bestsale">
                                <div class="title">
                                    <h3 class="mt-5">Recomendados</h3>
                                </div>
                                <div class="content">
                                    <div class="products-slider12  owl-theme" style="display: inline-block">
                                        <?php
                                        if (count($productDataSide) >= 8) {
                                            $cont = 8;
                                        } else {
                                            $cont = count($productDataSide);
                                        }
                                        for ($i = 0; $i < $cont; $i++) {
                                            $proRandSide = $productDataSide[array_rand($productDataSide)];
                                            $imagenes->set("cod", $proRandSide['cod']);
                                            $imgProSide = $imagenes->view();
                                            if (($key = array_search($proRandSide, $productDataSide)) !== false) {
                                                unset($productDataSide[$key]);
                                            }
                                            ?>
                                            <div class="item">
                                                <div class="item-inner">
                                                    <div class="prd">
                                                        <div class="item-img clearfix">
                                                            <a class="product-image have-additional"
                                                               href="<?php echo URL . '/producto/' . $funciones->normalizar_link($proRandSide['titulo']) . "/" . $proRandSide['id'] ?>">
                                                                    <span class="img-main"
                                                                          style="width:80px;height:80px;background:url('<?= URL . '/' . $imgProSide['ruta'] ?>') no-repeat center center/contain;">
                                                                    </span>
                                                            </a>
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="info-inner">
                                                                <div class="item-title"
                                                                     title="<?= ucfirst($proRandSide['titulo']); ?>">
                                                                    <a href="<?php echo URL . '/producto/' . $funciones->normalizar_link($proRandSide['titulo']) . "/" . $proRandSide['id'] ?>"> <?= substr(ucfirst($proRandSide['titulo']), 0, 10) ?>
                                                                        ... </a>
                                                                </div>
                                                                <div class="item-price">
                                                                        <span class="price">
                                                                        <?php
                                                                        if ($proRandSide['precioDescuento'] > 0) {
                                                                            ?>
                                                                            <span class="precioS1">$ <?= $proRandSide['precioDescuento']; ?></span>
                                                                            <span class="precioS2">$ <?= $proRandSide['precio']; ?></span>
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <span class="precioS1">$ <?= $proRandSide['precio']; ?></span>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                        }
                                        ?>
                                </div>
                                </div>
                    </div>
                        </div>


                    </div>
            </div>
                <!-- sns_left -->
            <div id="sns_main" class="col-md-9 col-main">
                    <div id="sns_mainmidle">
                        <?php
                        if (count($banDataPie) != '') {
                            $banRandPie = $banDataPie[array_rand($banDataPie)];
                            $imagenes->set("cod", $banRandPie['cod']);
                            $imgRandPie = $imagenes->view();
                            $banners->set("id", $banRandPie['id']);
                            $valuePie = $banRandPie['vistas'] + 1;
                            $banners->set("vistas", $valuePie);
                            $banners->increaseViews();
                            ?>
                            <div class="category-cms-block"></div>
                            <p class="category-image banner5">
                                <a href="<?= $banRandPie['link'] ?>">
                                    <img src="<?= URL . '/' . $imgRandPie['ruta'] ?>"
                                         alt="<?= $banRandPie['nombre'] ?>">
                                </a>
                            </p>
                            <?php
                        }
                        ?>

                        <div class="category-products">

                            <!-- toolbar clearfix -->

                            <div class="toolbar clearfix">
                                <div class="toolbar-inner">
                                    <div class="limiter">
                                        <label>Show</label>
                                        <div class="select-new">
                                            <div class="select-inner jqtransformdone">
                                                <div class="jqTransformSelectWrapper" style="z-index: 10; width: 80px;">
                                                    <div>
                                                        <span style="width: 50px;"> 20 </span>
                                                        <a class="jqTransformSelectOpen" href="#"></a>
                                                    </div>
                                                    <ul style="width: 78px; display: none; visibility: visible;">
                                                        <li>
                                                            <a class="selected" href="#"> 20 </a>
                                                        </li>
                                                        <li>
                                                            <a href="#"> 28 </a>
                                                        </li>
                                                        <li>
                                                            <a href="#"> 36 </a>
                                                        </li>
                                                    </ul>
                                                    <select class="select-limit-show jqTransformHidden"
                                                            onchange="setLocation(this.value)" style="">
                                                        <option selected="selected"
                                                                value="http://demo.snstheme.com/sns-simen/index.php/women.html?limit=20">
                                                            20
                                                        </option>
                                                        <option value="http://demo.snstheme.com/sns-simen/index.php/women.html?limit=28">
                                                            28
                                                        </option>
                                                        <option value="http://demo.snstheme.com/sns-simen/index.php/women.html?limit=36">
                                                            36
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <span>per page</span>
                                    </div>
                                    <div class="sort-by">
                                        <label>Buscar por</label>
                                        <div class="select-new">
                                            <div class="select-inner jqtransformdone">
                                                <div class="jqTransformSelectWrapper"
                                                     style="z-index: 10; width: 118px;">
                                                    <div>
                                                        <span style="width: 50px;"> Últimos </span>
                                                        <a class="jqTransformSelectOpen" href="#"></a>
                                                    </div>
                                                    <ul style="width: 116px; display: none; visibility: visible;">
                                                        <li class="active">
                                                            <a class="selected" href="#"> Últimos </a>
                                                        </li>
                                                        <li>
                                                            <a href="#"> Mayor precio </a>
                                                        </li>
                                                        <li>
                                                            <a href="#"> Menor precio </a>
                                                        </li>
                                                    </ul>
                                                    <select class="select-sort-by jqTransformHidden"
                                                            onchange="setLocation(this.value)" style="">
                                                        <option selected="selected"> Position</option>
                                                        <option> Name</option>
                                                        <option> Price</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--  <a class="set-desc" title="Set Descending Direction" href="http://demo.snstheme.com/sns-simen/index.php/women.html?dir=desc&order=position"></a> -->
                                    </div>
                                    <div class="pager visible-md visible-lg">
                                        <p class="amount">
                                            <?= count($productData) ?> productos (s)
                                        </p>
                                        <div class="pages">
                                            <strong>Páginas:</strong>
                                            <ol>
                                                <?php
                                                if ($productosPaginador != 1 && $productosPaginador != 0) {
                                                    $links = '';
                                                    $links .= "<li><a href='" . CANONICAL."".$anidador."pagina=1'>1</a></li>";
                                                    $i = max(2, $pagina - 5);

                                                    if ($i > 2) {
                                                        $links .= "<li><a href='#'>...</a></li>";
                                                    }

                                                    for (; $i < min($pagina + 6, $productosPaginador); $i++) {
                                                        $links .= "<li><a href='" . CANONICAL."".$anidador."pagina=". $i . "'>" . $i . "</a></li>";
                                                    }

                                                    if ($i != $productosPaginador) {
                                                        $links .= "<li><a href='#'>...</a></li>";
                                                        $links .= "<li><a href='" . CANONICAL."".$anidador."pagina=". $productosPaginador . "'>" . $productosPaginador . "</a></li>";
                                                    }
                                                    echo $links;
                                                    echo "";
                                                }
                                                ?>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- toolbar clearfix -->


                            <!-- sns-products-container -->
                            <div class="sns-products-container clearfix">
                                <div class="products-grid row style_grid">

                                    <?php
                                    foreach ($productData as $productos) {
                                        $imagenes->set("cod", $productos['cod']);
                                        $imgProCenter1 = $imagenes->view();
                                        ?>
                                        <div class="item col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <div class="ico-label">
                                                            <?php
                                                            if ($productos['precioDescuento'] > 0) {
                                                                ?>
                                                                <span class="ico-product ico-sale">Promo</span>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <a class="product-image have-additional"
                                                           href="<?php echo URL . '/producto/' . $funciones->normalizar_link($productos['titulo']) . "/" . $productos['id'] ?>">
                                                                    <span class="img-main">
                                                                   <div style="height:200px;background:url(<?= URL . '/' . $imgProCenter1['ruta'] ?>)no-repeat center center/contain;">
                                                                   </div>
                                                                    </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a
                                                                        href="<?php echo URL . '/producto/' . $funciones->normalizar_link($productos['titulo']) . "/" . $productos['id'] ?>">
                                                                    <?= $productos['titulo'] ?> </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <div class="price-box">
                                                                    <span class="regular-price">
                                                                        <span class="price">
                                                                        <?php
                                                                        if ($productos['precioDescuento'] > 0) {
                                                                            ?>
                                                                            <span class="precio1">$ <?= $productos['precioDescuento']; ?></span>
                                                                            <span class="precio2">$ <?= $productos['precio']; ?></span>
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <span class="precio1">$ <?= $productos['precio']; ?></span>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <!-- sns-products-container -->


                            <!-- toolbar clearfix  bottom-->
                            <div class="toolbar clearfix">
                                <div class="toolbar-inner">
                                    <div class="pager">
                                        <p class="amount">
                                            <?= count($productData) ?> productos (s)
                                        </p>
                                        <div class="pages">
                                            <strong>Páginas:</strong>
                                            <ol>
                                                <?php
                                                if ($productosPaginador != 1 && $productosPaginador != 0) {
                                                    $links = '';
                                                    $links .= "<li><a href='" . CANONICAL."".$anidador."pagina=1'>1</a></li>";
                                                    $i = max(2, $pagina - 5);

                                                    if ($i > 2) {
                                                        $links .= "<li><a href='#'>...</a></li>";
                                                    }
                                                    for (; $i < min($pagina + 6, $productosPaginador); $i++) {
                                                        $links .= "<li><a href='" . CANONICAL."".$anidador."pagina=". $i . "'>" . $i . "</a></li>";
                                                    }
                                                    if ($i != $productosPaginador) {
                                                        $links .= "<li><a href='#'>...</a></li>";
                                                        $links .= "<li><a href='" . CANONICAL."".$anidador."pagina=". $productosPaginador . "'>" . $productosPaginador . "</a></li>";
                                                    }
                                                    echo $links;
                                                    echo "";
                                                }
                                                ?>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- toolbar clearfix bottom -->
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- AND CONTENT -->
</div>
    </body>
<?php
$template->themeEnd();
?>