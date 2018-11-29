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
?>

            <!-- CONTENT -->
            <div id="sns_content" class="wrap">
                <div class="container">
                    <div class="row">
                        <div id="sns_left" class="col-md-3">
                            <div class="wrap-in">
                                <div class="block block-latestblog-v3" id="sns_latestblog_19454288391442904929">
                                    <div class="block-title">
                                        <strong>Ultimas Publicaciones</strong>
                                    </div>
                                    <div class="block-content">
                                        <div class="list-blog">
                                            <div class="item-post clearfix">
                                                <div class="item-child">
                                                    <div class="item-img">
                                                        <a class="post-img" title="Donec scelerisque quam vitae est." href="index3-blog-detail.html" >
                                                            <img alt="" src="<?=URL?>/assets/images/blog/blog1.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="item-content">
                                                        <div class="post-title">
                                                            <a href="index3-blog-detail.html" >Donec scelerisque quam vitae est.</a>
                                                        </div>
                                                        <div class="date">  
                                                            <i class="fa fa-calendar-o"></i>
                                                            <span class="day-month">Sept, 20, 2015</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item-child">
                                                    <div class="item-img">
                                                        <a class="post-img" title="Diam Pharetra Nisi" href="index3-blog-detail.html" >
                                                            <img alt="" src="<?=URL?>/assets/images/blog/blog2.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="item-content">
                                                        <div class="post-title">
                                                            <a href="index3-blog-detail.html" >Donec scelerisque quam vitae est.</a>
                                                        </div>
                                                       <div class="date">  
                                                            <i class="fa fa-calendar-o"></i>
                                                            <span class="day-month">Sept, 20, 2015</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item-child">
                                                    <div class="item-img">
                                                        <a class="post-img" title="Curabitur adipiscing odio in" href="index3-blog-detail.html" >
                                                            <img alt="" src="<?=URL?>/assets/images/blog/blog3.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="item-content">
                                                        <div class="post-title">
                                                            <a href="index3-blog-detail.html" >Donec scelerisque quam vitae est.</a>
                                                        </div>
                                                        <div class="date">  
                                                            <i class="fa fa-calendar-o"></i>
                                                            <span class="day-month">Sept, 20, 2015</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item-child">
                                                    <div class="item-img">
                                                        <a class="post-img" title="Curabitur adipiscing odio in" href="index3-blog-detail.html" >
                                                            <img alt="" src="<?=URL?>/assets/images/blog/blog2.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="item-content">
                                                        <div class="post-title">
                                                            <a href="index3-blog-detail.html" >Donec scelerisque quam vitae est.</a>
                                                        </div>
                                                        <div class="date">  
                                                            <i class="fa fa-calendar-o"></i>
                                                            <span class="day-month">Sept, 20, 2015</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item-child">
                                                    <div class="item-img">
                                                        <a class="post-img" title="Curabitur adipiscing odio in" href="index3-blog-detail.html" >
                                                            <img alt="" src="<?=URL?>/assets/images/blog/blog1.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="item-content">
                                                        <div class="post-title">
                                                            <a href="index3-blog-detail.html" >Donec scelerisque quam vitae est.</a>
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
                                        <a class="post-img" href="index3-blog-detail.html">
                                            <img src="<?=URL?>/assets/images/blog/blog1.jpg" alt="">
                                        </a>
                                        <div class="date">
                                            <span class="poster">JUL 12, 2015</span>
                                            <div class="post-info">
                                                <div class="postDetails">Post by: KomodoArt</div>
                                            </div>
                                        </div>
                                        <div class="post-title">
                                            <a href="index3-blog-detail.html">Donec scelerisque quam vitae est.</a>
                                        </div>
                                        <div class="post-content">
                                            <p>Duis imperdiet diam pharetra nisi. Fusce accumsan. Fusce adipiscing, felis non ornare egestas, risus elit placerat mauris, in mollis ante erat quis nisi. Quisque sed ipsum. Vestibulum eu risus. hasellus tempus massa aliquet urna. Integer fringilla quam eget dolor.</p>
                                        </div>
                                        <div class="link-readmore">
                                            <button class="button" type="button" onclick="href: '#'" >Leer Mas</button>
                                        </div>
                                    </div>
                                    <div class="postWrapper">
                                        <a class="post-img" href="index3-blog-detail.html">
                                            <img src="<?=URL?>/assets/images/blog/blog2.jpg" alt="">
                                        </a>
                                        <div class="date">
                                            <span class="poster">JUL 12, 2015</span>
                                            <div class="post-info">
                                                <div class="postDetails">Post by: KomodoArt</div>
                                            </div>
                                        </div>
                                        <div class="post-title">
                                            <a href="index3-blog-detail.html">Donec scelerisque quam vitae est.</a>
                                        </div>
                                        <div class="post-content">
                                            <p>Duis imperdiet diam pharetra nisi. Fusce accumsan. Fusce adipiscing, felis non ornare egestas, risus elit placerat mauris, in mollis ante erat quis nisi. Quisque sed ipsum. Vestibulum eu risus. hasellus tempus massa aliquet urna. Integer fringilla quam eget dolor.</p>
                                        </div>
                                        <div class="link-readmore">
                                            <button class="button" type="button" onclick="href: '#'" >Leer Mas</button>
                                        </div>
                                    </div>
                                    <div class="postWrapper">
                                        <a class="post-img" href="index3-blog-detail.html">
                                            <img src="<?=URL?>/assets/images/blog/blog3.jpg" alt="">
                                        </a>
                                        <div class="date">
                                            <span class="poster">JUL 12, 2015</span>
                                            <div class="post-info">
                                                <div class="postDetails">Post by: KomodoArt</div>
                                            </div>
                                        </div>
                                        <div class="post-title">
                                            <a href="index3-blog-detail.html">Donec scelerisque quam vitae est.</a>
                                        </div>
                                        <div class="post-content">
                                            <p>Duis imperdiet diam pharetra nisi. Fusce accumsan. Fusce adipiscing, felis non ornare egestas, risus elit placerat mauris, in mollis ante erat quis nisi. Quisque sed ipsum. Vestibulum eu risus. hasellus tempus massa aliquet urna. Integer fringilla quam eget dolor.</p>
                                        </div>
                                        <div class="link-readmore">
                                            <button class="button" type="button" onclick="href: '#'" >Leer Mas</button>
                                        </div>
                                    </div>
                                    <div class="postWrapper">
                                        <a class="post-img" href="index3-blog-detail.html">
                                            <img src="<?=URL?>/assets/images/blog/blog4.jpg" alt="">
                                        </a>
                                        <div class="date">
                                            <span class="poster">JUL 12, 2015</span>
                                            <div class="post-info">
                                                <div class="postDetails">Post by: KomodoArt</div>
                                            </div>
                                        </div>
                                        <div class="post-title">
                                            <a href="index3-blog-detail.html">Donec scelerisque quam vitae est.</a>
                                        </div>
                                        <div class="post-content">
                                            <p>Duis imperdiet diam pharetra nisi. Fusce accumsan. Fusce adipiscing, felis non ornare egestas, risus elit placerat mauris, in mollis ante erat quis nisi. Quisque sed ipsum. Vestibulum eu risus. hasellus tempus massa aliquet urna. Integer fringilla quam eget dolor.</p>
                                        </div>
                                        <div class="link-readmore">
                                            <button class="button" type="button" onclick="href: '#'" >Leer Mas</button>
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

    

<?php
$template->themeEnd();
?>