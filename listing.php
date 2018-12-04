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

if ($pagina > 0) {
    $pagina = $pagina - 1;
}


//Clases
$productos = new Clases\Productos();
$imagenes = new Clases\Imagenes();
$categorias = new Clases\Categorias();
$banners = new Clases\Banner();
$subcategorias = new Clases\Subcategorias();
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
$categoriasParaProductos = $categorias->listForSearch('');
$productData = $productos->listWithOps('', '', (24 * $pagina) . ',' . 24);
$productDataSide = $productos->listWithOps('', '', '8');
$productosPaginador = $productos->paginador('', 24);
//

//SUBCATEGORIAS
$subSub = $subcategorias->listForSearch("045");
echo count($subSub);

?>

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
                                    <span>Shop By</span>
                                </strong>
                            </div>
                            <div class="block-content toggle-content">
                                <dl id="narrow-by-list">
                                    <dt class="odd">Categories</dt>
                                    <dd class="odd">
                                        <ol>
                                            <?php
                                            foreach ($categoriasParaProductos as $catList) {
                                                ?>
                                                <li>
                                                    <a href="<?= URL . "/productos/" . $catList['cod'] ?>">
                                                        <?= $catList['titulo'] ?>
                                                        <span class="count">(<?= $catList['count(categoria)'] ?>)</span>
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
                        <div class="block block_cat">
                            <a class="banner5" href="<?= $banRandSide['link'] ?>">
                                <img src="<?= URL . '/' . $imgRandSide['ruta'] ?>" alt=<?= $banRandSide['nombre'] ?>">
                                    </a>
                                </div>
                                <?php
                                }
                                ?>
                                <div class=" bestsale">
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
                                                            <div class="action-bot">
                                                                <div class="wrap-addtocart">
                                                                    <button class="btn-cart">
                                                                        <i class="fa fa-shopping-cart"></i>
                                                                        <span>Añadir</span>
                                                                    </button>
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
                                        <label>Sort by</label>
                                        <div class="select-new">
                                            <div class="select-inner jqtransformdone">
                                                <div class="jqTransformSelectWrapper"
                                                     style="z-index: 10; width: 118px;">
                                                    <div>
                                                        <span style="width: 50px;"> Position </span>
                                                        <a class="jqTransformSelectOpen" href="#"></a>
                                                    </div>
                                                    <ul style="width: 116px; display: none; visibility: visible;">
                                                        <li class="active">
                                                            <a class="selected" href="#"> Position </a>
                                                        </li>
                                                        <li>
                                                            <a href="#"> Name </a>
                                                        </li>
                                                        <li>
                                                            <a href="#"> Price </a>
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
                                                    $links .= "<li><a href='" . URL . "/productos" . "/1'>1</a></li>";
                                                    $i = max(2, $pagina - 5);

                                                    if ($i > 2) {
                                                        $links .= "<li><a href='#'>...</a></li>";
                                                    }

                                                    for (; $i < min($pagina + 6, $productosPaginador); $i++) {
                                                        $links .= "<li><a href='" . URL . "/productos" . "/" . $i . "'>" . $i . "</a></li>";
                                                    }

                                                    if ($i != $productosPaginador) {
                                                        $links .= "<li><a href='#'>...</a></li>";
                                                        $links .= "<li><a href='" . URL . "/productos" . "/" . $productosPaginador . "'>" . $productosPaginador . "</a></li>";
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
                                                    <div class="action-bot">
                                                        <div class="wrap-addtocart">
                                                            <button class="btn-cart"
                                                            >
                                                                <i class="fa fa-shopping-cart"></i>
                                                                <span>Añadir</span>
                                                            </button>
                                                        </div>
                                                        <div class="actions">
                                                            <ul class="add-to-links">
                                                                <li class="wrap-quickview" data-id="qv_item_7">
                                                                    <div class="quickview-wrap">
                                                                        <a class="sns-btn-quickview qv_btn"
                                                                           href="<?php echo URL . '/producto/' . $funciones->normalizar_link($productos['titulo']) . "/" . $productos['id'] ?>">
                                                                            <i class="fa fa-eye"></i>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                            </ul>
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
                                                    $links .= "<li><a href='" . URL . "/productos" . "/1'>1</a></li>";
                                                    $i = max(2, $pagina - 5);

                                                    if ($i > 2) {
                                                        $links .= "<li><a href='#'>...</a></li>";
                                                    }
                                                    for (; $i < min($pagina + 6, $productosPaginador); $i++) {
                                                        $links .= "<li><a href='" . URL . "/productos" . "/" . $i . "'>" . $i . "</a></li>";
                                                    }
                                                    if ($i != $productosPaginador) {
                                                        $links .= "<li><a href='#'>...</a></li>";
                                                        $links .= "<li><a href='" . URL . "/productos" . "/" . $productosPaginador . "'>" . $productosPaginador . "</a></li>";
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
    </div>
    <!-- AND CONTENT -->

<?php
$template->themeEnd();
?>