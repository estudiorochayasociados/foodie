<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$funciones= new Clases\PublicFunction();
$template->set("title", "Admin");
$template->set("description", "Admin");
$template->set("keywords", "Inicio");
$template->set("favicon", LOGO);
$template->themeInit();
//Clases
$productos = new Clases\Productos();
$imagenes = new Clases\Imagenes();
$categorias = new Clases\Categorias();
$banners = new Clases\Banner();
//Banners
$categoriasData = $categorias->list('');
foreach($categoriasData as $valor){
    if($valor['titulo']=='Pie' && $valor['area']=='banners'){ 
        $banners->set("categoria",$valor['cod']);
        $banDataPie = $banners->listForCategory();
    }
    
    if($valor['titulo']=='Pie 1/2' && $valor['area']=='banners'){ 
        $banners->set("categoria",$valor['cod']);
        $banDataPieMedio = $banners->listForCategory();
    }
    
    if($valor['titulo']=='Side' && $valor['area']=='banners'){
        $banners->set("categoria",$valor['cod']);
        $banDataSide = $banners->listForCategory();  
    }
}
//Productos
$categorias->set("area","productos");
$categoriasParaProductos= $categorias->listForArea();
$productDataCenter1 = $productos->listWithOps('','','');
$productDataCenter2 = $productos->listWithOps('','','');
$productDataCenter3 = $productos->listWithOps('','','');
$productDataCenter4 = $productos->listWithOps('','','');
$productDataSide = $productos->listWithOps('','','4');
//
?>
 <!-- CONTENT -->
 <div id="sns_content" class="wrap layout-m">
                <div class="container">
                    <div class="row">
                        <!-- sns_left -->
                        <div id="sns_left" class="col-md-3">
                            <div class="wrap-in">
                                <div class="block block-blog-inner">
                                    <div class="block-content">
                                        <div class="menu-categories">
                                            <div class="block-title">
                                                <strong>Todas las categorias</strong>
                                            </div>
                                            <ul>
                                                <?php
                                                $nro = 1;
                                                foreach ($categoriasParaProductos as $catList) {
                                                ?>
                                                    <li><span><?=$nro?></span><a href="#"><?=ucfirst($catList['titulo'])?></a></li>
                                                <?php
                                                    $nro++;
                                                    if ($nro>12) {
                                                       break;
                                                    }
                                                } 
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Banner 270x350 -->
                                <?php
                                if (count($banDataSide)!=''){
                                    $banRandSide = $banDataSide[array_rand($banDataSide)];
                                    $imagenes->set("codigo",$banRandSide['cod']);
                                    $imgRandSide = $imagenes->view();
                                    $banners->set("id",$banRandSide['id']);
                                    $value=$banRandSide['vistas']+1;
                                    $banners->set("vistas",$value);
                                    $banners->increaseViews();
                                ?>
                                    <div class="block banner_left2 block_cat">
                                    <a class="banner5" href="<?= $banRandSide['link'] ?>">
                                        <img src="<?=URL. '/' . $imgRandSide['ruta'] ?>" alt="<?= $banRandSide['nombre']?>">
                                    </a>
                                </div>
                                <?php
                                }
                                ?>
                                <!-- EndBanner -->
                                <!-- Productos random -->
                                <div class="block bestsale">
                                    <div class="title">
                                        <h3>Recomendados</h3>
                                    </div>
                                    <div class="content">
                                        <div class="products-slider12  owl-theme" style="display: inline-block">
                                                <?php
                                                if (count($productDataSide)>=5) {
                                                    $cont = 5;
                                                }else{ $cont = count($productDataSide); }
                                                for ($i=0; $i < $cont ; $i++) { 
                                                        $proRandSide = $productDataSide[array_rand($productDataSide)];
                                                        $imagenes->set("codigo",$proRandSide['cod']);
                                                        $imgProSide = $imagenes->view();
                                                        if (($key = array_search($proRandSide, $productDataSide)) !== false) {
                                                            unset($productDataSide[$key]);
                                                        }
                                                ?>
                                                    <div class="item">
                                                    <div class="item-inner">
                                                        <div class="prd">
                                                            <div class="item-img clearfix">
                                                                <a class="product-image have-additional" href="<?php echo URL . '/producto/' . $funciones->normalizar_link($proRandSide['titulo']) . "/" . $proRandSide['id'] ?>">
                                                                    <span class="img-main">
                                                                        <img alt="" src="<?=URL. '/' . $imgProSide['ruta'] ?>">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="<?php echo URL . '/producto/' . $funciones->normalizar_link($proRandSide['titulo']) . "/" . $proRandSide['id'] ?>"> <?= ucfirst($proRandSide['titulo']) ?> </a>
                                                                    </div>
                                                                    <div class="item-price">
                                                                        <span class="price">
                                                                            <span class="price1">$ <?= $proRandSide['precio'] ?></span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="action-bot">
                                                                    <div class="wrap-addtocart">
                                                                        <button class="btn-cart" >
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

                                <div class="block sns-latestblog">
                                    <div class="block-title">
                                        <h3>LATEST POSTS</h3>
                                    </div>
                                    <div class="content">
                                        <div id="latestblog1333" class=" slider-left9  latestblog-content owl-carousel owl-theme owl-loaded" style="display: inline-block">
                                            <div class="item banner5">
                                                <img alt="" src="<?=URL?>/assets/images/page2/blog-page2.jpg">
                                                <div class="blog-page">
                                                    <div class="blog-left">
                                                        <p class="text1">08</p>
                                                        <p class="text2">JAN</p>
                                                    </div>
                                                    <div class="blog-right">
                                                        <p class="style1">
                                                            <a href="blog-detail.html">Chair furnitured</a>
                                                        </p>
                                                        <p class="style2">Lorem Ipsum has been the industry's </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item banner5">
                                                <img alt="" src="<?=URL?>/assets/images/blog/blog5.jpg">
                                                <div class="blog-page">
                                                    <div class="blog-left">
                                                        <p class="text1">08</p>
                                                        <p class="text2">JAN</p>
                                                    </div>
                                                    <div class="blog-right">
                                                        <p class="style1">
                                                            <a href="blog-detail.html">Chair furnitured</a>
                                                        </p>
                                                        <p class="style2">Lorem Ipsum has been the industry's </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- sns_main -->
                        <div id="sns_main" class="col-md-9 col-main">
                            <div id="sns_mainmidle">
                                <div id="sns_slideshow2">
                                    <div id="header-slideshow">
                                        <div class="row">
                                            <div class="slideshows col-md-8 col-sm-8">
                                                <div id="slider123" class="owl-carousel owl-theme" style="overflow: hidden;">
                                                    <div class="item style1">
                                                        <img src="<?=URL?>/assets/images/sildeshow/slideshow1.jpg" alt="">
                                                    </div>
                                                    <div class="item style2">
                                                        <img src="<?=URL?>/assets/images/sildeshow/slideshow2.jpg" alt="">
                                                    </div>
                                                    <div class="item style3">
                                                        <img src="<?=URL?>/assets/images/sildeshow/slideshow3.jpg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Banner -->
                                            <?php 
                                                if (count($banDataSide)>=2) {
                                                    $banRandSide2 = $banDataSide[array_rand($banDataSide)];
                                                    $imagenes->set("codigo",$banRandSide2['cod']);
                                                    $imgRandSide2 = $imagenes->view();
                                                    $banners->set("id",$banRandSide2['id']);
                                                    $value=$banRandSide2['vistas']+1;
                                                    $banners->set("vistas",$value);
                                                    $banners->increaseViews();
                                                    ?>
                                                    <div class="banner-right col-md-4 col-sm-4">
                                                        <div class="banner6 pdno col-md-12 col-sm-12">
                                                            <div class="banner7 banner6  banner5 col-md-12 col-sm-12">
                                                                    <a href="<?= $banRandSide2['link']?>">
                                                                        <img src="<?=URL. '/' . $imgRandSide2['ruta'] ?>" alt="<?= $banRandSide2['nombre']?>">
                                                                    </a>
                                                            </div>
                                                     <?php
                                                     if (($key = array_search($banRandSide2, $banDataSide)) !== false) {
                                                         unset($banDataSide[$key]);
                                                     }
                                                     $banRandSide3 = $banDataSide[array_rand($banDataSide)];
                                                     $imagenes->set("codigo",$banRandSide3['cod']);
                                                     $imgRandSide3 = $imagenes->view();
                                                     $banners->set("id",$banRandSide3['id']);
                                                     $value=$banRandSide3['vistas']+1;
                                                     $banners->set("vistas",$value);
                                                     $banners->increaseViews();
                                                     ?>
                                                                 <div class="banner8 banner6  banner5 col-md-12 col-sm-12">
                                                                    <a href="<?= $banRandSide3['link']?>">
                                                                        <img src="<?=URL. '/' . $imgRandSide3['ruta'] ?>" alt="<?= $banRandSide3['nombre']?>">
                                                                    </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php   
                                                    if (($key = array_search($banRandSide3, $banDataSide)) !== false) {
                                                        unset($banDataSide[$key]);
                                                    }
                                                }
                                            ?>
                                            <!-- End Banner -->
                                        </div>
                                    </div>
                                </div>
                                
                                <div id="sns_producttaps1" class="sns_producttaps_wraps">
                                    <h3 class="precar">SOFAS</h3>
                                      <!-- Tab panes -->
                                  <div class="tab-content">
                                    <div class="content-loading"></div>
                                    <div role="tabpanel" class="tab-pane active" id="chair">
                                        <div  class="taps-slider1 products-grid row style_grid owl-carousel owl-theme owl-loaded">
                                            <div class="taps-slider">
                                            <?php
                                                $cont=0;
                                                foreach($productDataCenter1 as $productosCenter1){
                                                    if ($cont<4) {
                                                    $imagenes->set("codigo",$productosCenter1['cod']);
                                                    $imgProCenter1 = $imagenes->view();    
                                                ?>
                                                    <div class="item col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                                                     <div class="item-inner">
                                                         <div class="prd">
                                                             <div class="item-img clearfix">
                                                                 <a class="product-image have-additional"
                                                                    href="<?php echo URL . '/producto/' . $funciones->normalizar_link($productosCenter1['titulo']) . "/" . $productosCenter1['id'] ?>"> 
                                                                    <span class="img-main">
                                                                   <img src="<?= URL. '/' . $imgProCenter1['ruta'] ?>" alt="">
                                                                    </span>
                                                                 </a>
                                                             </div>
                                                             <div class="item-info">
                                                                 <div class="info-inner">
                                                                     <div class="item-title">
                                                                         <a
                                                                            href="<?php echo URL . '/producto/' . $funciones->normalizar_link($productosCenter1['titulo']) . "/" . $productosCenter1['id'] ?>"> 
                                                                             <?= ucfirst($productosCenter1['titulo']) ?> </a>
                                                                     </div>
                                                                     <div class="item-price">
                                                                         <div class="price-box">
                                                                    <span class="regular-price">
                                                                        <span class="price">
                                                                            <span class="price1">$ <?= $productosCenter1['precio'] ?></span>
                                                                            <!--<span class="price2">$ 600.00</span>-->
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
                                                                                    href="<?php echo URL . '/producto/' . $funciones->normalizar_link($productosCenter1['titulo']) . "/" . $productosCenter1['id'] ?>">
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
                                                $cont++;
                                                if (($key = array_search($productosCenter1, $productDataCenter1)) !== false) {
                                                    unset($productDataCenter1[$key]);
                                                }
                                                }
                                                }
                                                ?>
                                             </div>
                                             <div class="taps-slider">
                                             <?php
                                                $cont=0;
                                                foreach($productDataCenter1 as $productosCenter1){
                                                    if ($cont<4) {
                                                    $imagenes->set("codigo",$productosCenter1['cod']);
                                                    $imgProCenter1 = $imagenes->view();    
                                                ?>
                                                    <div class="item col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                                                     <div class="item-inner">
                                                         <div class="prd">
                                                             <div class="item-img clearfix">
                                                                 <a class="product-image have-additional"
                                                                    href="<?php echo URL . '/producto/' . $funciones->normalizar_link($productosCenter1['titulo']) . "/" . $productosCenter1['id'] ?>"> 
                                                                    <span class="img-main">
                                                                   <img src="<?= URL. '/' . $imgProCenter1['ruta'] ?>" alt="">
                                                                    </span>
                                                                 </a>
                                                             </div>
                                                             <div class="item-info">
                                                                 <div class="info-inner">
                                                                     <div class="item-title">
                                                                         <a
                                                                            href="<?php echo URL . '/producto/' . $funciones->normalizar_link($productosCenter1['titulo']) . "/" . $productosCenter1['id'] ?>"> 
                                                                             <?= ucfirst($productosCenter1['titulo']) ?> </a>
                                                                     </div>
                                                                     <div class="item-price">
                                                                         <div class="price-box">
                                                                    <span class="regular-price">
                                                                        <span class="price">
                                                                            <span class="price1">$ <?= $productosCenter1['precio'] ?></span>
                                                                            <!--<span class="price2">$ 600.00</span>-->
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
                                                                                    href="<?php echo URL . '/producto/' . $funciones->normalizar_link($productosCenter1['titulo']) . "/" . $productosCenter1['id'] ?>">
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
                                                $cont++;
                                                }
                                                }
                                                ?>
                                             </div>
                                        </div>
                                    </div>
                                  </div>
                                </div>  
                                <!-- Banner 870x110 -->
                                <?php
                                
                                if (count($banDataPie)!=''){
                                    $banRandPie = $banDataPie[array_rand($banDataPie)];
                                    $imagenes->set("codigo",$banRandPie['cod']);
                                    $imgRandPie = $imagenes->view();
                                    $banners->set("id",$banRandPie['id']);
                                    $valuePie=$banRandPie['vistas']+1;
                                    $banners->set("vistas",$valuePie);
                                    $banners->increaseViews();
                                ?>
                                    <div class="sns_banner_page2">
                                    <div class="banner5">
                                        <a href="<?= $banRandPie['link'] ?>">
                                            <img src="<?=URL. '/' . $imgRandPie['ruta'] ?>" alt="<?= $banRandPie['nombre']?>">
                                        </a>
                                    </div>
                                </div>
                                </div>
                                <?php
                                }
                                ?>

                                <div id="sns_slider1_page2" class="sns-slider-wraps sns_producttaps_wraps">
                                    <h3 class="precar">office chair</h3>

                                      <!-- Tab panes -->
                                      <div class="tab-content">
                                    <div class="content-loading"></div>
                                    <div role="tabpanel" class="tab-pane active" id="chair">
                                        <div  class="taps-slider1 products-grid row style_grid owl-carousel owl-theme owl-loaded">
                                            <div class="taps-slider">
                                            <?php
                                                $cont=0;
                                                foreach($productDataCenter2 as $productosCenter2){
                                                    if ($cont<4) {
                                                    $imagenes->set("codigo",$productosCenter2['cod']);
                                                    $imgProCenter2 = $imagenes->view();    
                                                ?>
                                                    <div class="item col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                                                     <div class="item-inner">
                                                         <div class="prd">
                                                             <div class="item-img clearfix">
                                                                 
                                                                 <a class="product-image have-additional"
                                                                    title="Modular Modern"
                                                                    href="<?php echo URL . '/producto/' . $funciones->normalizar_link($productosCenter2['titulo']) . "/" . $productosCenter2['id'] ?>">
                                                                    <span class="img-main">
                                                                   <img src="<?= URL. '/' . $imgProCenter2['ruta'] ?>" alt="">
                                                                    </span>
                                                                 </a>
                                                             </div>
                                                             <div class="item-info">
                                                                 <div class="info-inner">
                                                                     <div class="item-title">
                                                                         <a title="Modular Modern"
                                                                            href="<?php echo URL . '/producto/' . $funciones->normalizar_link($productosCenter2['titulo']) . "/" . $productosCenter2['id'] ?>">
                                                                            <?= ucfirst($productosCenter2['titulo']) ?> </a>
                                                                     </div>
                                                                     <div class="item-price">
                                                                         <div class="price-box">
                                                                    <span class="regular-price">
                                                                        <span class="price">
                                                                            <span class="price1">$ <?= $productosCenter2['precio'] ?></span>
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
                                                                                    href="<?php echo URL . '/producto/' . $funciones->normalizar_link($productosCenter2['titulo']) . "/" . $productosCenter2['id'] ?>"">
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
                                                $cont++;
                                                if (($key = array_search($productosCenter2, $productDataCenter2)) !== false) {
                                                    unset($productDataCenter2[$key]);
                                                }
                                                }
                                                }
                                                ?>
                                             </div>

                                             <div class="taps-slider">
                                            <?php
                                             $cont=0;
                                                foreach($productDataCenter2 as $productosCenter2){
                                                    if ($cont<4) {
                                                    $imagenes->set("codigo",$productosCenter2['cod']);
                                                    $imgProCenter2 = $imagenes->view();    
                                                ?>
                                                    <div class="item col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                                                     <div class="item-inner">
                                                         <div class="prd">
                                                             <div class="item-img clearfix">
                                                                 
                                                                 <a class="product-image have-additional"
                                                                    title="Modular Modern"
                                                                    href="<?php echo URL . '/producto/' . $funciones->normalizar_link($productosCenter2['titulo']) . "/" . $productosCenter2['id'] ?>">
                                                                    <span class="img-main">
                                                                   <img src="<?= URL. '/' . $imgProCenter2['ruta'] ?>" alt="">
                                                                    </span>
                                                                 </a>
                                                             </div>
                                                             <div class="item-info">
                                                                 <div class="info-inner">
                                                                     <div class="item-title">
                                                                         <a title="Modular Modern"
                                                                            href="<?php echo URL . '/producto/' . $funciones->normalizar_link($productosCenter2['titulo']) . "/" . $productosCenter2['id'] ?>">
                                                                            <?= ucfirst($productosCenter2['titulo']) ?> </a>
                                                                     </div>
                                                                     <div class="item-price">
                                                                         <div class="price-box">
                                                                    <span class="regular-price">
                                                                        <span class="price">
                                                                            <span class="price1">$ <?= $productosCenter2['precio'] ?></span>
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
                                                                                    href="<?php echo URL . '/producto/' . $funciones->normalizar_link($productosCenter2['titulo']) . "/" . $productosCenter2['id'] ?>"">
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
                                                $cont++;
                                                }
                                                }
                                                ?>
                                             </div>
                                        </div>
                                    </div>

                                  </div>
                                </div>  

                                <!-- Banner 425x110 -->
                                <?php 
                                    if (count($banDataPieMedio)>=2) {
                                        $banRandPieMedio = $banDataPieMedio[array_rand($banDataPieMedio)];
                                        $imagenes->set("codigo",$banRandPieMedio['cod']);
                                        $imgRandPieMedio = $imagenes->view();
                                        $banners->set("id",$banRandPieMedio['id']);
                                        $value=$banRandPieMedio['vistas']+1;
                                        $banners->set("vistas",$value);
                                        $banners->increaseViews();
                                        ?>
                                        <div class="sns_banner1">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="banner-content banner5">
                                                        <a href="<?= $banRandPieMedio['link']?>">
                                                            <img src="<?=URL. '/' . $imgRandPieMedio['ruta'] ?>" alt="<?= $banRandPieMedio['nombre']?>">
                                                        </a>
                                                    </div>
                                                </div>
                                         <?php
                                         if (($key = array_search($banRandPieMedio, $banDataPieMedio)) !== false) {
                                             unset($banDataPieMedio[$key]);
                                         }
                                         $banRandPieMedio2 = $banDataPieMedio[array_rand($banDataPieMedio)];
                                         $imagenes->set("codigo",$banRandPieMedio2['cod']);
                                         $imgRandPieMedio2 = $imagenes->view();
                                         $banners->set("id",$banRandPieMedio2['id']);
                                         $value=$banRandPieMedio2['vistas']+1;
                                         $banners->set("vistas",$value);
                                         $banners->increaseViews();
                                         ?>
                                                <div class="col-md-6 col-sm-6">
                                                     <div class="banner-content banner5 style-banner2">
                                                        <a href="<?= $banRandPieMedio2['link']?>">
                                                            <img src="<?=URL. '/' . $imgRandPieMedio2['ruta'] ?>" alt="<?= $banRandPieMedio2['nombre']?>">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php   
                                        if (($key = array_search($banRandPieMedio2, $banDataPieMedio)) !== false) {
                                            unset($banDataPieMedio[$key]);
                                        }
                                    }
                                    ?>
                                <!--
                                <div class="sns_banner1">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="banner-content banner5">
                                                <a href="#">
                                                    <img src="<?=URL?>/assets/images/page2/banner2-page2.jpg" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                             <div class="banner-content banner5 style-banner2">
                                                <a href="#">
                                                    <img src="<?=URL?>/assets/images/page2/banner3-page2.jpg" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                -->
                                <!-- Banner 870x110 -->


                                <div id="sns_slider2_page2" class="sns-slider-wraps sns_producttaps_wraps">
                                    <h3 class="precar">office chair</h3>

                                      <!-- Tab panes -->
                                      <div class="tab-content">
                                    <div class="content-loading"></div>
                                    <div role="tabpanel" class="tab-pane active" id="chair">
                                        <div  class="taps-slider1 products-grid row style_grid owl-carousel owl-theme owl-loaded">
                                            <div class="taps-slider">
                                            <?php
                                                $cont=0;
                                                foreach($productDataCenter3 as $productosCenter3){
                                                    if ($cont<4) {
                                                    $imagenes->set("codigo",$productosCenter3['cod']);
                                                    $imgProCenter3 = $imagenes->view();    
                                                ?>
                                                    <div class="item col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                                                     <div class="item-inner">
                                                         <div class="prd">
                                                             <div class="item-img clearfix">
                                                                 
                                                                 <a class="product-image have-additional"
                                                                    title="Modular Modern"
                                                                    href="<?php echo URL . '/producto/' . $funciones->normalizar_link($productosCenter3['titulo']) . "/" . $productosCenter3['id'] ?>">
                                                                    <span class="img-main">
                                                                   <img src="<?= URL. '/' . $imgProCenter3['ruta'] ?>" alt="">
                                                                    </span>
                                                                 </a>
                                                             </div>
                                                             <div class="item-info">
                                                                 <div class="info-inner">
                                                                     <div class="item-title">
                                                                         <a title="Modular Modern"
                                                                            href="<?php echo URL . '/producto/' . $funciones->normalizar_link($productosCenter3['titulo']) . "/" . $productosCenter3['id'] ?>">
                                                                            <?= ucfirst($productosCenter3['titulo']) ?> </a>
                                                                     </div>
                                                                     <div class="item-price">
                                                                         <div class="price-box">
                                                                    <span class="regular-price">
                                                                        <span class="price">
                                                                            <span class="price1">$ <?= $productosCenter3['precio'] ?></span>
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
                                                                                    href="<?php echo URL . '/producto/' . $funciones->normalizar_link($productosCenter3['titulo']) . "/" . $productosCenter3['id'] ?>"">
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
                                                $cont++;
                                                if (($key = array_search($productosCenter3, $productDataCenter3)) !== false) {
                                                    unset($productDataCenter3[$key]);
                                                }
                                                }
                                                }
                                                ?>
                                             </div>

                                             <div class="taps-slider">
                                             <?php
                                                $cont=0;
                                                foreach($productDataCenter3 as $productosCenter3){
                                                    if ($cont<4) {
                                                    $imagenes->set("codigo",$productosCenter3['cod']);
                                                    $imgProCenter3 = $imagenes->view();    
                                                ?>
                                                    <div class="item col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                                                     <div class="item-inner">
                                                         <div class="prd">
                                                             <div class="item-img clearfix">
                                                                 
                                                                 <a class="product-image have-additional"
                                                                    title="Modular Modern"
                                                                    href="<?php echo URL . '/producto/' . $funciones->normalizar_link($productosCenter3['titulo']) . "/" . $productosCenter3['id'] ?>">
                                                                    <span class="img-main">
                                                                   <img src="<?= URL. '/' . $imgProCenter3['ruta'] ?>" alt="">
                                                                    </span>
                                                                 </a>
                                                             </div>
                                                             <div class="item-info">
                                                                 <div class="info-inner">
                                                                     <div class="item-title">
                                                                         <a title="Modular Modern"
                                                                            href="<?php echo URL . '/producto/' . $funciones->normalizar_link($productosCenter3['titulo']) . "/" . $productosCenter3['id'] ?>">
                                                                            <?= ucfirst($productosCenter3['titulo']) ?> </a>
                                                                     </div>
                                                                     <div class="item-price">
                                                                         <div class="price-box">
                                                                    <span class="regular-price">
                                                                        <span class="price">
                                                                            <span class="price1">$ <?= $productosCenter3['precio'] ?></span>
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
                                                                                    href="<?php echo URL . '/producto/' . $funciones->normalizar_link($productosCenter3['titulo']) . "/" . $productosCenter3['id'] ?>"">
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
                                                $cont++;
                                                }
                                                }
                                                ?>
                                             </div>
                                        </div>
                                    </div>
                                </div>  

                                <!-- Banner 425x110 -->
                                <?php 
                                    if (count($banDataPieMedio)>=2) {
                                        $banRandPieMedio3 = $banDataPieMedio[array_rand($banDataPieMedio)];
                                        $imagenes->set("codigo",$banRandPieMedio3['cod']);
                                        $imgRandPieMedio3 = $imagenes->view();
                                        $banners->set("id",$banRandPieMedio3['id']);
                                        $value=$banRandPieMedio3['vistas']+1;
                                        $banners->set("vistas",$value);
                                        $banners->increaseViews();
                                        ?>
                                        <div class="sns_banner2">
                                            <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="banner-content banner5">
                                                    <a href="<?= $banRandPieMedio3['link']?>">
                                                                <img src="<?=URL. '/' . $imgRandPieMedio3['ruta'] ?>" alt="<?= $banRandPieMedio3['nombre']?>">
                                                    </a>
                                                </div>
                                            </div>
                                         <?php
                                         if (($key = array_search($banRandPieMedio3, $banDataPieMedio)) !== false) {
                                             unset($banDataPieMedio[$key]);
                                         }
                                         $banRandPieMedio4 = $banDataPieMedio[array_rand($banDataPieMedio)];
                                         $imagenes->set("codigo",$banRandPieMedio4['cod']);
                                         $imgRandPieMedio4 = $imagenes->view();
                                         $banners->set("id",$banRandPieMedio4['id']);
                                         $value=$banRandPieMedio4['vistas']+1;
                                         $banners->set("vistas",$value);
                                         $banners->increaseViews();
                                         ?>
                                                     <div class="col-md-6 col-sm-6">
                                                          <div class="banner-content banner5 style-banner2">
                                                             <a href="<?= $banRandPieMedio4['link']?>">
                                                                         <img src="<?=URL. '/' . $imgRandPieMedio4['ruta'] ?>" alt="<?= $banRandPieMedio4['nombre']?>">
                                                             </a>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                        <?php   
                                    if (($key = array_search($banRandPieMedio4, $banDataPieMedio)) !== false) {
                                        unset($banDataPieMedio[$key]);
                                    }
                                }
                                ?>
                                <!-- Banner 425x110 -->
                                <div id="sns_slider3_page2" class="sns-slider-wraps sns_producttaps_wraps">
                                    <h3 class="precar">office chair</h3>

                                      <!-- Tab panes -->
                                      <div class="tab-content">
                                    <div class="content-loading"></div>
                                    <div role="tabpanel" class="tab-pane active" id="chair">
                                        <div  class="taps-slider1 products-grid row style_grid owl-carousel owl-theme owl-loaded">
                                            <div class="taps-slider">
                                            <?php
                                                $cont=0;
                                                foreach($productDataCenter4 as $productosCenter4){
                                                    if ($cont<4) {
                                                    $imagenes->set("codigo",$productosCenter4['cod']);
                                                    $imgProCenter4 = $imagenes->view();    
                                                ?>
                                                    <div class="item col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                                                     <div class="item-inner">
                                                         <div class="prd">
                                                             <div class="item-img clearfix">
                                                                 
                                                                 <a class="product-image have-additional"
                                                                    title="Modular Modern"
                                                                    href="<?php echo URL . '/producto/' . $funciones->normalizar_link($productosCenter4['titulo']) . "/" . $productosCenter4['id'] ?>">
                                                                    <span class="img-main">
                                                                   <img src="<?= URL. '/' . $imgProCenter4['ruta'] ?>" alt="">
                                                                    </span>
                                                                 </a>
                                                             </div>
                                                             <div class="item-info">
                                                                 <div class="info-inner">
                                                                     <div class="item-title">
                                                                         <a title="Modular Modern"
                                                                            href="<?php echo URL . '/producto/' . $funciones->normalizar_link($productosCenter4['titulo']) . "/" . $productosCenter4['id'] ?>">
                                                                            <?= ucfirst($productosCenter4['titulo']) ?> </a>
                                                                     </div>
                                                                     <div class="item-price">
                                                                         <div class="price-box">
                                                                    <span class="regular-price">
                                                                        <span class="price">
                                                                            <span class="price1">$ <?= $productosCenter4['precio'] ?></span>
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
                                                                                    href="<?php echo URL . '/producto/' . $funciones->normalizar_link($productosCenter4['titulo']) . "/" . $productosCenter4['id'] ?>"">
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
                                                $cont++;
                                                if (($key = array_search($productosCenter4, $productDataCenter4)) !== false) {
                                                    unset($productDataCenter4[$key]);
                                                }
                                                }
                                                }
                                                ?>
                                             </div>

                                             <div class="taps-slider">
                                             <?php
                                                $cont=0;
                                                foreach($productDataCenter4 as $productosCenter4){
                                                    if ($cont<4) {
                                                    $imagenes->set("codigo",$productosCenter4['cod']);
                                                    $imgProCenter4 = $imagenes->view();    
                                                ?>
                                                    <div class="item col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                                                     <div class="item-inner">
                                                         <div class="prd">
                                                             <div class="item-img clearfix">
                                                                 
                                                                 <a class="product-image have-additional"
                                                                    title="Modular Modern"
                                                                    href="<?php echo URL . '/producto/' . $funciones->normalizar_link($productosCenter4['titulo']) . "/" . $productosCenter4['id'] ?>">
                                                                    <span class="img-main">
                                                                   <img src="<?= URL. '/' . $imgProCenter4['ruta'] ?>" alt="">
                                                                    </span>
                                                                 </a>
                                                             </div>
                                                             <div class="item-info">
                                                                 <div class="info-inner">
                                                                     <div class="item-title">
                                                                         <a title="Modular Modern"
                                                                            href="<?php echo URL . '/producto/' . $funciones->normalizar_link($productosCenter4['titulo']) . "/" . $productosCenter4['id'] ?>">
                                                                            <?= ucfirst($productosCenter4['titulo']) ?> </a>
                                                                     </div>
                                                                     <div class="item-price">
                                                                         <div class="price-box">
                                                                    <span class="regular-price">
                                                                        <span class="price">
                                                                            <span class="price1">$ <?= $productosCenter4['precio'] ?></span>
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
                                                                                    href="<?php echo URL . '/producto/' . $funciones->normalizar_link($productosCenter4['titulo']) . "/" . $productosCenter4['id'] ?>"">
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
                                                $cont++;
                                                if (($key = array_search($productosCenter4, $productDataCenter4)) !== false) {
                                                    unset($productDataCenter4[$key]);
                                                }
                                                }
                                                }
                                                ?>
                                             </div>
                                        </div>
                                    </div>

                             </div>
                        </div>
                    </div>

                    <div class="row bottom">

                        <div class="col-md-12"> 
                            <!-- Banner 570x110 -->
                            <?php 
                                    if (count($banDataPieMedio)>=2) {
                                        $banRandPieMedio5 = $banDataPieMedio[array_rand($banDataPieMedio)];
                                        $imagenes->set("codigo",$banRandPieMedio5['cod']);
                                        $imgRandPieMedio5 = $imagenes->view();
                                        $banners->set("id",$banRandPieMedio5['id']);
                                        $value=$banRandPieMedio5['vistas']+1;
                                        $banners->set("vistas",$value);
                                        $banners->increaseViews();
                                        ?>
                                        <div class="sns_banner3">
                                            <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="banner-content banner5">
                                                    <a href="<?= $banRandPieMedio5['link']?>">
                                                        <img src="<?=URL. '/' . $imgRandPieMedio5['ruta'] ?>" alt="<?= $banRandPieMedio5['nombre']?>">
                                                    </a>
                                                </div>
                                            </div>
                                         <?php
                                         if (($key = array_search($banRandPieMedio5, $banDataPieMedio)) !== false) {
                                             unset($banDataPieMedio[$key]);
                                         }
                                         $banRandPieMedio6 = $banDataPieMedio[array_rand($banDataPieMedio)];
                                         $imagenes->set("codigo",$banRandPieMedio6['cod']);
                                         $imgRandPieMedio6 = $imagenes->view();
                                         $banners->set("id",$banRandPieMedio6['id']);
                                         $value=$banRandPieMedio6['vistas']+1;
                                         $banners->set("vistas",$value);
                                         $banners->increaseViews();
                                         ?>
                                                     <div class="col-md-6 col-sm-6">
                                                          <div class="banner-content banner5 style-banner2">
                                                             <a href="<?= $banRandPieMedio6['link']?>">
                                                                <img src="<?=URL. '/' . $imgRandPieMedio6['ruta'] ?>" alt="<?= $banRandPieMedio6['nombre']?>">
                                                             </a>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                        <?php   
                                    if (($key = array_search($banRandPieMedio6, $banDataPieMedio)) !== false) {
                                        unset($banDataPieMedio[$key]);
                                    }
                                }
                            ?>
                            <!-- Banner 570x110 -->
                            

                        </div>
                    </div>
                </div>
            </div>
            <!-- AND CONTENT -->

<?php
$template->themeEnd();
?>