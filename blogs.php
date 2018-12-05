<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$funciones= new Clases\PublicFunction();
$template->set("title", "Pinturería Ariel | Blogs");
$template->set("description", "");
$template->set("keywords", "");
$template->set("favicon", LOGO);
$template->themeInit();
$novedades = new Clases\Novedades();
$novedadesData = $novedades->list('');
$imagenes = new Clases\Imagenes();
?>
     
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
                                            <a title="Go to Home Page" href="#">
                                                <i class="fa fa-home"></i>
                                                <span>Blog</span>
                                            </a>
                                        </li>
                                        <li class="category3 last">
                                            <span>Blog</span>
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
            <div id="sns_content" class="wrap">
                <div class="container">
                    <div class="row">
                        <div id="sns_left" class="col-md-3">
                            <div class="wrap-in">

                                <div class="block block-blog-inner">
                                    <div class="block-content">
                                        <div class="menu-categories">

                                            <div class="block-title">
                                                <strong>All categories</strong>
                                            </div>

                                            <ul>
                                                <li><span>1</span><a href="#">Sofas & Couches</a></li>
                                                <li><span>2</span><a href="#">Living Room Furniture</a></li>
                                                <li><span>3</span><a href="#">Television Stands</a></li>
                                                <li><span>4</span><a href="#">Bedroom Furniture</a></li>
                                                <li><span>5</span><a href="#">Coffee Tables</a></li>
                                                <li><span>6</span><a href="#">Kitchen & Dining Room</a></li>
                                                <li><span>7</span><a href="#">Chests of Drawers</a></li>
                                                <li><span>8</span><a href="#">Ottomans</a></li>
                                                <li><span>9</span><a href="#">Kids' Furniture & Décor</a></li>
                                                <li><span>10</span><a href="#">Media Storage</a></li>
                                            </ul>
                                            <p>
                                                <span class="title">more categories</span>
                                                <i class="fa fa-angle-down"></i>
                                            </p>
                                        
                                        </div>
                                    </div>
                                </div>


                                <div class="block block-latestblog-v3" id="sns_latestblog_19454288391442904929">
                                    <div class="block-title">
                                        <strong>LATEST POST</strong>
                                    </div>
                                    <div class="block-content">
                                        <div class="list-blog">
                                            <div class="item-post clearfix">
                                                <div class="item-child">
                                                    <div class="item-img">
                                                        <a class="post-img" title="Donec scelerisque quam vitae est." href="index4-blog-detail.html" >
                                                            <img alt="" src="images/blog/blog1.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="item-content">
                                                        <div class="post-title">
                                                            <a href="index4-blog-detail.html" >Donec scelerisque quam vitae est.</a>
                                                        </div>
                                                        <div class="date">  
                                                            <i class="fa fa-calendar-o"></i>
                                                            <span class="day-month">Sept, 20, 2015</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item-child">
                                                    <div class="item-img">
                                                        <a class="post-img" title="Diam Pharetra Nisi" href="index4-blog-detail.html" >
                                                            <img alt="" src="images/blog/blog2.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="item-content">
                                                        <div class="post-title">
                                                            <a href="index4-blog-detail.html" >Donec scelerisque quam vitae est.</a>
                                                        </div>
                                                       <div class="date">  
                                                            <i class="fa fa-calendar-o"></i>
                                                            <span class="day-month">Sept, 20, 2015</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item-child">
                                                    <div class="item-img">
                                                        <a class="post-img" title="Curabitur adipiscing odio in" href="index4-blog-detail.html" >
                                                            <img alt="" src="images/blog/blog3.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="item-content">
                                                        <div class="post-title">
                                                            <a href="index4-blog-detail.html" >Donec scelerisque quam vitae est.</a>
                                                        </div>
                                                        <div class="date">  
                                                            <i class="fa fa-calendar-o"></i>
                                                            <span class="day-month">Sept, 20, 2015</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item-child">
                                                    <div class="item-img">
                                                        <a class="post-img" title="Curabitur adipiscing odio in" href="index4-blog-detail.html" >
                                                            <img alt="" src="images/blog/blog2.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="item-content">
                                                        <div class="post-title">
                                                            <a href="index4-blog-detail.html" >Donec scelerisque quam vitae est.</a>
                                                        </div>
                                                        <div class="date">  
                                                            <i class="fa fa-calendar-o"></i>
                                                            <span class="day-month">Sept, 20, 2015</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item-child">
                                                    <div class="item-img">
                                                        <a class="post-img" title="Curabitur adipiscing odio in" href="index4-blog-detail.html" >
                                                            <img alt="" src="images/blog/blog1.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="item-content">
                                                        <div class="post-title">
                                                            <a href="index4-blog-detail.html" >Donec scelerisque quam vitae est.</a>
                                                        </div>
                                                        <div class="date">  
                                                            <i class="fa fa-calendar-o"></i>
                                                            <span class="day-month">Sept, 20, 2015</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div id="sns_main" class="col-md-9 col-main">
                            <div id="sns_mainmidle">
                                <div class="blogs-page">
                                    <div class="postWrapper v1">
                                        <a class="post-img" href="index4-blog-detail.html">
                                            <img src="images/blog/blog1.jpg" alt="">
                                        </a>
                                        <div class="date">
                                            <span class="poster">JUL 12, 2015</span>
                                            <div class="post-info">
                                                <div class="postDetails">Post by: KomodoArt</div>
                                            </div>
                                        </div>
                                        <div class="post-title">
                                            <a href="index4-blog-detail.html">Donec scelerisque quam vitae est.</a>
                                        </div>
                                        <div class="post-content">
                                            <p>Duis imperdiet diam pharetra nisi. Fusce accumsan. Fusce adipiscing, felis non ornare egestas, risus elit placerat mauris, in mollis ante erat quis nisi. Quisque sed ipsum. Vestibulum eu risus. hasellus tempus massa aliquet urna. Integer fringilla quam eget dolor.</p>
                                        </div>
                                        <div class="link-readmore">
                                            <a title="Read more" href="#">READ MORE</a>
                                        </div>
                                    </div>
                                    <div class="postWrapper">
                                        <a class="post-img" href="index4-blog-detail.html">
                                            <img src="images/blog/blog2.jpg" alt="">
                                        </a>
                                        <div class="date">
                                            <span class="poster">JUL 12, 2015</span>
                                            <div class="post-info">
                                                <div class="postDetails">Post by: KomodoArt</div>
                                            </div>
                                        </div>
                                        <div class="post-title">
                                            <a href="index4-blog-detail.html">Donec scelerisque quam vitae est.</a>
                                        </div>
                                        <div class="post-content">
                                            <p>Duis imperdiet diam pharetra nisi. Fusce accumsan. Fusce adipiscing, felis non ornare egestas, risus elit placerat mauris, in mollis ante erat quis nisi. Quisque sed ipsum. Vestibulum eu risus. hasellus tempus massa aliquet urna. Integer fringilla quam eget dolor.</p>
                                        </div>
                                        <div class="link-readmore">
                                            <a title="Read more" href="#">READ MORE</a>
                                        </div>
                                    </div>
                                    <div class="postWrapper">
                                        <a class="post-img" href="index4-blog-detail.html">
                                            <img src="images/blog/blog3.jpg" alt="">
                                        </a>
                                        <div class="date">
                                            <span class="poster">JUL 12, 2015</span>
                                            <div class="post-info">
                                                <div class="postDetails">Post by: KomodoArt</div>
                                            </div>
                                        </div>
                                        <div class="post-title">
                                            <a href="index4-blog-detail.html">Donec scelerisque quam vitae est.</a>
                                        </div>
                                        <div class="post-content">
                                            <p>Duis imperdiet diam pharetra nisi. Fusce accumsan. Fusce adipiscing, felis non ornare egestas, risus elit placerat mauris, in mollis ante erat quis nisi. Quisque sed ipsum. Vestibulum eu risus. hasellus tempus massa aliquet urna. Integer fringilla quam eget dolor.</p>
                                        </div>
                                        <div class="link-readmore">
                                            <a title="Read more" href="#">READ MORE</a>
                                        </div>
                                    </div>
                                    <div class="postWrapper">
                                        <a class="post-img" href="index4-blog-detail.html">
                                            <img src="images/blog/blog4.jpg" alt="">
                                        </a>
                                        <div class="date">
                                            <span class="poster">JUL 12, 2015</span>
                                            <div class="post-info">
                                                <div class="postDetails">Post by: KomodoArt</div>
                                            </div>
                                        </div>
                                        <div class="post-title">
                                            <a href="index4-blog-detail.html">Donec scelerisque quam vitae est.</a>
                                        </div>
                                        <div class="post-content">
                                            <p>Duis imperdiet diam pharetra nisi. Fusce accumsan. Fusce adipiscing, felis non ornare egestas, risus elit placerat mauris, in mollis ante erat quis nisi. Quisque sed ipsum. Vestibulum eu risus. hasellus tempus massa aliquet urna. Integer fringilla quam eget dolor.</p>
                                        </div>
                                        <div class="link-readmore">
                                            <a title="Read more" href="#">READ MORE</a>
                                        </div>
                                    </div>


                                </div>
                                <div class="blog-toolbar">
                                    <div class="toolbar clearfix">
                                        <div class="toolbar-inner">
                                            <div class="pager">
                                                <div class="pages">
                                                    <ol>
                                                        <li class="current">1</li>
                                                        <li>
                                                            <a href="#">2</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">3</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">4</a>
                                                        </li>
                                                        <li>
                                                            <a class="next i-next" title="Next" href="#"></a>
                                                        </li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-- AND CONTENT -->

            <!-- PARTNERS -->
           <div id="sns_partners" class="wrap">
                <div class="container">
                    <div class="slider-wrap">
                        <div class="partners_slider_in">
                            <div id="partners_slider1" class="our_partners owl-carousel owl-theme owl-loaded" style="display: inline-block">
                                <div class="item">
                                    <a class="banner11" href="#" target="_blank">
                                        <img alt="" src="images/brands/1.png">
                                    </a>
                                </div>
                                <div class="item">
                                    <a class="banner11" href="#" target="_blank">
                                        <img alt="" src="images/brands/2.png">
                                    </a>
                                </div>
                                <div class="item">
                                    <a class="banner11" href="#" target="_blank">
                                        <img alt="" src="images/brands/3.png">
                                    </a>
                                </div>
                                <div class="item">
                                    <a class="banner11" href="#" target="_blank">
                                        <img alt="" src="images/brands/4.png">
                                    </a>
                                </div>
                                <div class="item">
                                    <a class="banner11" href="#" target="_blank">
                                        <img alt="" src="images/brands/5.png">
                                    </a>
                                </div>
                                <div class="item">
                                    <a class="banner11" href="#" target="_blank">
                                        <img alt="" src="images/brands/6.png">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- AND PARTNERS -->
        </div>
<?php
$template->themeEnd();
?>