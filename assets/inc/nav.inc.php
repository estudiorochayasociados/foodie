<?php
$funcionesNav = new Clases\PublicFunction();
//Clases
$imagenesNav = new Clases\Imagenes();
$categoriasNav = new Clases\Categorias();
$bannersNav = new Clases\Banner();
//Banners
$categoriasDataNav = $categoriasNav->list('');
foreach($categoriasDataNav as $valNav){
    if($valNav['titulo']=='Botonera' && $valNav['area']=='banners'){ 
        $bannersNav->set("categoria",$valNav['cod']);
        $banDataBotonera = $bannersNav->listForCategory();
    }
}
 ?>
   <body id="bd" class=" cms-index-index2 header-style2 cms-simen-home-page-v2 default cmspage">
        <div id="sns_wrapper">      
            <!-- HEADER -->
            <div id="sns_header" class="wrap">
                <!-- Header Top -->
                <div class="sns_header_top">
                    <div class="container">
                        <div class="sns_module">
                            <div class="header-setting">
                                <div style="margin-top:11px;color:gray;">
                                (03564) 438484-443393 , Las Malvinas 930 - San Francisco (CBA).
                                </div>
                            </div>
                            <div class="header-account">
                                <div class="myaccount">
                                    <div class="tongle">
                                        <i class="fa fa-user"></i>
                                        <span>Mi cuenta</span>
                                        <i class="fa fa-angle-down"></i>
                                    </div>
                                    <div class="customer-ct content">
                                        <ul class="links">
                                            <li>
                                                <a class="top-link-checkout" title="Checkout" href="#">Carrito</a>
                                            </li>
                                            <li class=" last">
                                                <a class="top-link-login" title="Log In" href="#">Iniciar sesión</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Header Logo -->
                <div id="sns_header_logo">
                    <div class="container">
                        <div class="container_in">
                            <div class="row">
                                <h1 id="logo" class=" responsv col-md-3">
                                    <a href="<?=URL . '/index' ?>">
                                     <img alt="" src="<?=URL?>/assets/archivos/logo-grande.png"> 
                                    </a>
                                </h1>
                                <div class="col-md-9 policy">
                                <?php
                                if (count($banDataBotonera)!=''){
                                    $banRandBotonera = $banDataBotonera[array_rand($banDataBotonera)];
                                    $imagenesNav->set("codigo",$banRandBotonera['cod']);
                                    $imgRandBotonera = $imagenesNav->view();
                                    $bannersNav->set("id",$banRandBotonera['id']);
                                    $valueNav=$banRandBotonera['vistas']+1;
                                    $bannersNav->set("vistas",$valueNav);
                                    $bannersNav->increaseViews();
                                ?>
                                    <div class="block banner_left2 block_cat">
                                    <a class="banner5" href="<?= $banRandBotonera['link'] ?>">
                                        <img src="<?=URL. '/' . $imgRandBotonera['ruta'] ?>" alt="<?= $banRandBotonera['nombre']?>" style="width:100%;margin-top:10px;">
                                    </a>
                                </div>
                                <?php
                                }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Menu -->
                <div id="sns_menu" >
                    <div class="container">
                        <div class="sns_mainmenu">
                            <div id="sns_mainnav">
                                <div id="sns_custommenu" class="visible-md visible-lg">
                                    <ul class="mainnav">
                                        <li class="level0 custom-item active">
                                            <a class="menu-title-lv0 pd-menu116" href="<?=URL . '/index' ?>" target="_self">
                                                <span class="title">Inicio</span>
                                            </a>
                                        </li>
                                        

                                        <li class="level0 nav-2 no-group drop-submenu parent">
                                            <a class=" menu-title-lv0" href="<?=URL . '/productos' ?>">
                                                <span class="title">Todos los productos</span>
                                            </a>
                                            <div class="wrap_submenu">
                                                <ul class="level0">
                                                    <li class="level1 nav-1-1 first">
                                                        <a class=" menu-title-lv1" href="#">
                                                            <span class="title">Dining Room Tables</span>
                                                        </a>
                                                    </li>
                                                    <li class="level1 nav-1-2">
                                                        <a class=" menu-title-lv1" href="#">
                                                            <span class="title">Folding Tables</span>
                                                        </a>
                                                    </li>
                                                    <li class="level1 nav-1-3 parent">
                                                        <a class=" menu-title-lv1" href="#">
                                                            <span class="title">Living Room Tables</span>
                                                        </a>
                                                        <div class="wrap_submenu">
                                                            <ul class="level1">
                                                                 <li class="level2 nav-1-3-16 first">
                                                                    <a class=" menu-title-lv2" href="#">
                                                                        <span class="title">Dining Room Tables</span>
                                                                    </a>
                                                                </li>
                                                                <li class="level2 nav-1-3-17">
                                                                    <a class=" menu-title-lv2" href="#">
                                                                        <span class="title">Folding Tables</span>
                                                                    </a>
                                                                </li>
                                                                <li class="level2 nav-1-3-16 first">
                                                                    <a class=" menu-title-lv2" href="#">
                                                                        <span class="title">Living Room Tables</span>
                                                                    </a>
                                                                </li>
                                                                <li class="level2 nav-1-3-17">
                                                                    <a class=" menu-title-lv2" href="#">
                                                                        <span class="title"> Sofa Tables</span>
                                                                    </a>
                                                                </li>
                                                                <li class="level2 nav-1-3-18">
                                                                    <a class=" menu-title-lv2" href="#">
                                                                        <span class="title"> End Tables</span>
                                                                    </a>
                                                                </li>
                                                                <li class="level2 nav-1-3-19">
                                                                    <a class=" menu-title-lv2" href="#">
                                                                        <span class="title"> Coffee Tables</span>
                                                                    </a>
                                                                </li>
                                                                <li class="level2 nav-1-3-20 last">
                                                                    <a class=" menu-title-lv2" href="#">
                                                                        <span class="title">Pedestal Tables</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li class="level1 nav-1-4 last parent">
                                                        <a class=" menu-title-lv1" href="#">
                                                            <span class="title">Sofa Tables</span>
                                                        </a>
                                                        <div class="wrap_submenu">
                                                            <ul class="level1">
                                                                <li class="level2 nav-1-3-16 first">
                                                                    <a class=" menu-title-lv2" href="#">
                                                                        <span class="title">Dining Room Tables</span>
                                                                    </a>
                                                                </li>
                                                                <li class="level2 nav-1-3-17">
                                                                    <a class=" menu-title-lv2" href="#">
                                                                        <span class="title">Folding Tables</span>
                                                                    </a>
                                                                </li>
                                                                <li class="level2 nav-1-3-16 first">
                                                                    <a class=" menu-title-lv2" href="#">
                                                                        <span class="title">Living Room Tables</span>
                                                                    </a>
                                                                </li>
                                                                <li class="level2 nav-1-3-17">
                                                                    <a class=" menu-title-lv2" href="#">
                                                                        <span class="title"> Sofa Tables</span>
                                                                    </a>
                                                                </li>
                                                                <li class="level2 nav-1-3-18">
                                                                    <a class=" menu-title-lv2" href="#">
                                                                        <span class="title"> End Tables</span>
                                                                    </a>
                                                                </li>
                                                                <li class="level2 nav-1-3-19">
                                                                    <a class=" menu-title-lv2" href="#">
                                                                        <span class="title"> Coffee Tables</span>
                                                                    </a>
                                                                </li>
                                                                <li class="level2 nav-1-3-20 last">
                                                                    <a class=" menu-title-lv2" href="#">
                                                                        <span class="title">Pedestal Tables</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li class="level1 nav-1-1 first">
                                                        <a class=" menu-title-lv1" href="#">
                                                            <span class="title">End Tables</span>
                                                        </a>
                                                    </li>
                                                    <li class="level1 nav-1-2">
                                                        <a class=" menu-title-lv1" href="#">
                                                            <span class="title">Coffee Tables</span>
                                                        </a>
                                                    </li>
                                                    <li class="level1 nav-1-2">
                                                        <a class=" menu-title-lv1" href="#">
                                                            <span class="title">Pedestal Tables</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="level0 custom-item">
                                            <a class="menu-title-lv0" href="<?=URL . '/blogs' ?>">
                                                <span class="title">Blog</span>
                                            </a>
                                        </li>
                                        <li class="level0 custom-item">
                                            <a class="menu-title-lv0" href="<?=URL . '/contact' ?>">
                                                <span class="title">Contact Us</span>
                                            </a>
                                        </li>
                                        </ul>
                                </div>
                                <div id="sns_mommenu" class="menu-offcanvas hidden-md hidden-lg">
                                    <span class="btn2 btn-navbar leftsidebar" style="display: inline-block;">
                                        <i class="fa fa-align-left"></i>
                                        <span class="overlay"></span>
                                    </span>
                                    <span class="btn2 btn-navbar offcanvas">
                                        <i class="fa fa-align-justify"></i>
                                        <span class="overlay"></span>
                                    </span>
                                    <span class="btn2 btn-navbar rightsidebar">
                                        <i class="fa fa-align-right"></i>
                                        <span class="overlay"></span>
                                    </span>
                                    <div id="menu_offcanvas" class="offcanvas">
                                        <ul class="mainnav">
                                            <li class="level0 custom-item">
                                                <div class="accr_header">
                                                    <a class="menu-title-lv0" href="<?=URL . '/index' ?>">
                                                        <span class="title">Inicio</span>
                                                    </a>
                                                </div>
                                            </li>

                                            <li class="level0 nav-5 first active">
                                                <div class="accr_header">
                                                    <a class=" menu-title-lv0" href="listing-grid.html">
                                                        <span>Funiture</span>
                                                    </a>
                                                </div>
                                            </li>

                                            <li class="level0 nav-6 parent">
                                                <div class="accr_header">
                                                    <a class=" menu-title-lv0" href="<?=URL . '/listing' ?>">
                                                        <span>All products</span>
                                                    </a>
                                                    <span class="btn_accor">
                                                        
                                                    </span>
                                                </div>
                                                <div class="accr_content" style="display: none;">
                                                    <ul class="level0">
                                                        <li class="level1 nav-5-1 first parent">
                                                            <div class="accr_header">
                                                                <a class=" menu-title-lv1" href="#">
                                                                    <span>Bags</span>
                                                                </a>
                                                                <span class="btn_accor">
                                                                    
                                                                </span>
                                                            </div>
                                                            <div class="accr_content" style="display: none;">
                                                                <ul class="level1">
                                                                    <li class="level2 nav-5-1 first">
                                                                        <div class="accr_header">
                                                                            <a class=" menu-title-lv2" href="#">
                                                                                <span>Laptop</span>
                                                                            </a>
                                                                        </div>
                                                                    </li>
                                                                    <li class="level2 nav-5-2 parent">
                                                                        <div class="accr_header">
                                                                            <a class=" menu-title-lv2" href="#">
                                                                                <span>Dresses</span>
                                                                            </a>
                                                                            <span class="btn_accor">
                                                                                
                                                                            </span>
                                                                        </div>
                                                                        <div class="accr_content" style="display: none;">
                                                                            <ul class="level2">
                                                                                <li class="level3 nav-5-1-1 first">
                                                                                    <div class="accr_header">
                                                                                        <a class=" menu-title-lv3" href="#">
                                                                                            <span>Briefs</span>
                                                                                        </a>
                                                                                    </div>
                                                                                </li>
                                                                                <li class="level3 nav-5-1-2 last parent">
                                                                                    <div class="accr_header">
                                                                                        <a class=" menu-title-lv3" href="#">
                                                                                            <span>Blog</span>
                                                                                        </a>
                                                                                        <span class="btn_accor">
                                                                                            
                                                                                        </span>
                                                                                    </div>
                                                                                    <div class="accr_content" style="display: none;">
                                                                                        <ul class="level3">
                                                                                            <li class="level4 nav-5-1-1-1 first last">
                                                                                                <div class="accr_header">
                                                                                                    <a class=" menu-title-lv4" href="#">
                                                                                                        <span>Bands</span>
                                                                                                    </a>
                                                                                                </div>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                                    <li class="level2 nav-5-3">
                                                                        <div class="accr_header">
                                                                            <a class=" menu-title-lv2" href="#">
                                                                                <span>Cosmetic</span>
                                                                            </a>
                                                                        </div>
                                                                    </li>
                                                                    <li class="level2 nav-5-4">
                                                                        <div class="accr_header">
                                                                            <a class=" menu-title-lv2" href="#">
                                                                                <span>Duffle</span>
                                                                            </a>
                                                                        </div>
                                                                    </li>
                                                                    <li class="level2 nav-5-5 last">
                                                                        <div class="accr_header">
                                                                            <a class=" menu-title-lv2" href="#">
                                                                                <span>Nightwear</span>
                                                                            </a>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li class="level1 nav-5-2 parent">
                                                            <div class="accr_header">
                                                                <a class=" menu-title-lv1" href="#">
                                                                    <span>Shirts</span>
                                                                </a>
                                                                <span class="btn_accor">
                                                                    
                                                                </span>
                                                            </div>
                                                            <div class="accr_content" style="display: none;">
                                                                <ul class="level1">
                                                                    <li class="level2 nav-5-1-6 first">
                                                                        <div class="accr_header">
                                                                            <a class=" menu-title-lv2" href="#">
                                                                                <span>Tops</span>
                                                                            </a>
                                                                        </div>
                                                                    </li>
                                                                    <li class="level2 nav-5-1-7">
                                                                        <div class="accr_header">
                                                                            <a class=" menu-title-lv2" href="#">
                                                                                <span>Camis</span>
                                                                            </a>
                                                                        </div>
                                                                    </li>
                                                                    <li class="level2 nav-5-1-8">
                                                                        <div class="accr_header">
                                                                            <a class=" menu-title-lv2" href="#">
                                                                                <span>Helmet</span>
                                                                            </a>
                                                                        </div>
                                                                    </li>
                                                                    <li class="level2 nav-5-1-9">
                                                                        <div class="accr_header">
                                                                            <a class=" menu-title-lv2" href="#">
                                                                                <span>Lingerie</span>
                                                                            </a>
                                                                        </div>
                                                                    </li>
                                                                    <li class="level2 nav-5-1-10 last">
                                                                        <div class="accr_header">
                                                                            <a class=" menu-title-lv2" href="#">
                                                                                <span>Hair</span>
                                                                            </a>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li class="level1 nav-5-3 parent">
                                                            <div class="accr_header">
                                                                <a class=" menu-title-lv1" href="#">
                                                                    <span>Shoes</span>
                                                                </a>
                                                                <span class="btn_accor">
                                                                    
                                                                </span>
                                                            </div>
                                                            <div class="accr_content" style="display: none;">
                                                                <ul class="level1">
                                                                    <li class="level2 nav-5-2-11 first">
                                                                        <div class="accr_header">
                                                                            <a class=" menu-title-lv2" href="#">
                                                                                <span>Leathers</span>
                                                                            </a>
                                                                        </div>
                                                                    </li>
                                                                    <li class="level2 nav-5-2-12">
                                                                        <div class="accr_header">
                                                                            <a class=" menu-title-lv2" href="#">
                                                                                <span>Rings</span>
                                                                            </a>
                                                                        </div>
                                                                    </li>
                                                                    <li class="level2 nav-5-2-13">
                                                                        <div class="accr_header">
                                                                            <a class=" menu-title-lv2" href="#">
                                                                                <span>Cocktail</span>
                                                                            </a>
                                                                        </div>
                                                                    </li>
                                                                    <li class="level2 nav-5-2-14">
                                                                        <div class="accr_header">
                                                                            <a class=" menu-title-lv2" href="#">
                                                                                <span>Gloves</span>
                                                                            </a>
                                                                        </div>
                                                                    </li>
                                                                    <li class="level2 nav-5-2-15 last">
                                                                        <div class="accr_header">
                                                                            <a class=" menu-title-lv2" href="#">
                                                                                <span>Clothing</span>
                                                                            </a>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li class="level1 nav-5-4 last parent">
                                                            <div class="accr_header">
                                                                <a class=" menu-title-lv1" href="#">
                                                                    <span>Shapewear</span>
                                                                </a>
                                                                <span class="btn_accor">
                                                                    
                                                                </span>
                                                            </div>
                                                            <div class="accr_content" style="display: none;">
                                                                <ul class="level1">
                                                                    <li class="level2 nav-5-3-16 first">
                                                                        <div class="accr_header">
                                                                            <a class=" menu-title-lv2" href="#">
                                                                                <span>Hats</span>
                                                                            </a>
                                                                        </div>
                                                                    </li>
                                                                    <li class="level2 nav-5-3-17">
                                                                        <div class="accr_header">
                                                                            <a class=" menu-title-lv2" href="#">
                                                                                <span>Outerwear</span>
                                                                            </a>
                                                                        </div>
                                                                    </li>
                                                                    <li class="level2 nav-5-3-18">
                                                                        <div class="accr_header">
                                                                            <a class=" menu-title-lv2" href="#">
                                                                                <span>Novelty</span>
                                                                            </a>
                                                                        </div>
                                                                    </li>
                                                                    <li class="level2 nav-5-3-19">
                                                                        <div class="accr_header">
                                                                            <a class=" menu-title-lv2" href="#">
                                                                                <span>Footwear</span>
                                                                            </a>
                                                                        </div>
                                                                    </li>
                                                                    <li class="level2 nav-5-3-20 last">
                                                                        <div class="accr_header">
                                                                            <a class=" menu-title-lv2" href="#">
                                                                                <span>Sundresses</span>
                                                                            </a>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="level0 nav-7">
                                                <div class="accr_header">
                                                    <a class=" menu-title-lv0" href="#">
                                                        <span>Shop</span>
                                                    </a>
                                                </div>
                                            </li>


                                            <li class="level0 nav-8 last parent">
                                                <div class="accr_header">
                                                    <a class=" menu-title-lv0" href="#">
                                                        <span>Mobile </span>
                                                    </a>
                                                    <span class="btn_accor">
                                                        
                                                    </span>
                                                </div>
                                                <div class="accr_content" style="display: none;">
                                                    <ul class="level0">
                                                        <li class="level1 nav-7-1 first">
                                                            <div class="accr_header">
                                                                <a class=" menu-title-lv1" href="#">
                                                                    <span>Cfg products</span>
                                                                </a>
                                                            </div>
                                                        </li>
                                                        <li class="level1 nav-7-2">
                                                            <div class="accr_header">
                                                                <a class=" menu-title-lv1" href="#">
                                                                    <span>Product types</span>
                                                                </a>
                                                            </div>
                                                        </li>
                                                        <li class="level1 nav-7-3 parent">
                                                            <div class="accr_header">
                                                                <a class=" menu-title-lv1" href="#">
                                                                    <span>Bicycle</span>
                                                                </a>
                                                                <span class="btn_accor">
                                                                    
                                                                </span>
                                                            </div>
                                                            <div class="accr_content" style="display: none;">
                                                                <ul class="level1">
                                                                    <li class="level2 nav-7-2-1 first">
                                                                        <div class="accr_header">
                                                                            <a class=" menu-title-lv2" href="#">
                                                                                <span>Lifestyle</span>
                                                                            </a>
                                                                        </div>
                                                                    </li>
                                                                    <li class="level2 nav-7-2-2">
                                                                        <div class="accr_header">
                                                                            <a class=" menu-title-lv2" href="#">
                                                                                <span>Jackets</span>
                                                                            </a>
                                                                        </div>
                                                                    </li>
                                                                    <li class="level2 nav-7-2-3 last">
                                                                        <div class="accr_header">
                                                                            <a class=" menu-title-lv2" href="#">
                                                                                <span>Scarves</span>
                                                                            </a>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li class="level1 nav-7-4">
                                                            <div class="accr_header">
                                                                <a class=" menu-title-lv1" href="#">
                                                                    <span>Cosmetics</span>
                                                                </a>
                                                            </div>
                                                        </li>
                                                        <li class="level1 nav-7-5 last">
                                                            <div class="accr_header">
                                                                <a class=" menu-title-lv1" href="#">
                                                                    <span>Bras</span>
                                                                </a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>

                                            <li class="level0 custom-item">
                                                <div class="accr_header">
                                                    <a class="menu-title-lv0" href="404.html">
                                                        <span class="title">Offer</span>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="level0 custom-item">
                                                <div class="accr_header">
                                                    <a class="menu-title-lv0" href="#">
                                                        <span class="title">Deal</span>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="level0 custom-item">
                                                <div class="accr_header">
                                                    <a class="menu-title-lv0" href="blog.html">
                                                        <span class="title">Blog</span>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="level0 custom-item">
                                                <div class="accr_header">
                                                    <a class="menu-title-lv0" href="contact-us.html">
                                                        <span class="title">Contact Us</span>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="level0 custom-item">
                                                <div class="accr_header">
                                                    <a class="menu-title-lv0" href="#">
                                                        <span class="title">Custom menu</span>
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="sns_menu_right">
                                <div class="block_topsearch">
                                     <div class="top-cart">
                                        <div class="mycart mini-cart">
                                            <div class="block-minicart">
                                                <div class="tongle">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    <div class="summary">
                                                        <span class="amount">
                                                            <a href="#">
                                                                <span>3</span>
                                                                ( items )
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="block-content content">
                                                    <div class="block-inner">
                                                        <ol id="cart-sidebar" class="mini-products-list">
                                                            <li class="item odd">
                                                                <a class="product-image" title="Modular Modern" href="detail.html">
                                                                    <img alt="" src="<?=URL?>/assets/images/products/1.jpg">
                                                                </a>
                                                                <div class="product-details">
                                                                    <a class="btn-remove" onclick="return confirm('Are you sure you would like to remove this item from the shopping cart?');" title="Remove This Item" href="#">Remove This Item</a>
                                                                    <a class="btn-edit" title="Edit item" href="#">Edit item</a>
                                                                    <p class="product-name">
                                                                        <a href="detail.html">Modular Modern</a>
                                                                    </p>
                                                                    <!-- <strong>1</strong>
                                                                    x -->
                                                                    <span class="price">$ 540.00</span>
                                                                </div>
                                                            </li>
                                                            <li class="item odd">
                                                                <a class="product-image" title="Modular Modern" href="detail.html">
                                                                    <img alt="" src="<?=URL?>/assets/images/products/22.jpg">
                                                                </a>
                                                                <div class="product-details">
                                                                    <a class="btn-remove" onclick="return confirm('Are you sure you would like to remove this item from the shopping cart?');" title="Remove This Item" href="#">Remove This Item</a>
                                                                    <a class="btn-edit" title="Edit item" href="#">Edit item</a>
                                                                    <p class="product-name">
                                                                        <a href="detail.html">Modular Modern</a>
                                                                    </p>
                                                                    <!-- <strong>1</strong>
                                                                    x -->
                                                                    <span class="price">$ 540.00</span>
                                                                </div>
                                                            </li>
                                                            <li class="item last even">
                                                                <a class="product-image" title="Modular Modern" href="detail.html">
                                                                    <img alt="" src="<?=URL?>/assets/images/products/3.jpg">
                                                                </a>
                                                                <div class="product-details">
                                                                    <a class="btn-remove" onclick="return confirm('Are you sure you would like to remove this item from the shopping cart?');" title="Remove This Item" href="#">Remove This Item</a>
                                                                    <a class="btn-edit" title="Edit item" href="detail.html">Edit item</a>
                                                                    <p class="product-name">
                                                                        <a href="#">Modular Modern</a>
                                                                    </p>
                                                                   <!--  <strong>1</strong>
                                                                    x -->
                                                                    <span class="price">$ 540.00</span>
                                                                </div>
                                                            </li>
                                                        </ol>
                                                        <p class="cart-subtotal">
                                                            <span class="label">Total:</span>
                                                            <span class="price">$ 540.00</span>
                                                        </p>
                                                        <div class="actions">
                                                            <a class="button">
                                                                <span>
                                                                    <span>Check out</span>
                                                                </span>
                                                            </a>
                                                            <a class="button gfont go-to-cart" href="shoppingcart.html">Go to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="icon-search"></span>
                                    <div class="top-search">
                                        <div id="sns_serachbox_pro11739847651442478087" class="sns-serachbox-pro">
                                            <div class="sns-searbox-content">
                                                <form id="search_mini_form3703138361442478087" method="get" action="http://demo.snstheme.com/sns-simen/index.php/catalogsearch/result/">
                                                    <div class="form-search">
                                                        <input id="search3703138361442478087" class="input-text" type="text" value="" name="q" placeholder="Search here...." size="30" autocomplete="off">
                                                        <button class="button form-button" title="Search" type="submit">Search</button>
                                                        <div id="search_autocomplete3703138361442478087" class="search-autocomplete" style="display: none;"></div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- AND HEADER -->