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
?>

    <section class="header-video">
        <div id="hero_video">
            <div id="sub_content">
               <!-- <h1>Order Takeaway or Delivery Food</h1>
                <p>Ridiculus sociosqu cursus neque cursus curae ante scelerisque vehicula.</p>-->
            </div><!-- End sub_content -->
        </div>
        <img src="<?= URL ?>/assets/img/video_fix.png" alt="" class="header-video--media"
             data-video-src="<?= URL ?>/assets/video/intro" data-teaser-source="<?= URL ?>/assets/video/intro"
             data-provider="Vimeo" data-video-width="1920" data-video-height="960">
        <div id="count" class="hidden-xs">
            <ul>
                <li> ¡La herramienta que estabas esperando! Más de 20 comercios están trabajando con nuestra
                    herramienta
                </li>
            </ul>
        </div>
    </section>
    <div class="container margin_60">
        <div class="main_title">
            <h2 class="nomargin_top" style="padding-top:0">¿Cómo funciona?</h2>
            <p>
                Esta herramienta está pensada exclusivamente para vos, mirá que fácil es...
            </p>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="box_home" id="one">
                    <span>1</span>
                    <h3>Seleccioná que queres comer</h3>
                    <p>
                        Encontrás más de 100 comercios listos para atenderte
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box_home" id="two">
                    <span>2</span>
                    <h3>Elegí el comercio</h3>
                    <p>
                        Y ahora lo mejor...<br/><br/><br/>
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box_home" id="three">
                    <span>3</span>
                    <h3>Pedí lo que queres</h3>
                    <p>
                        Elegí desde el menú del comercio lo que queres consumir<br/><br/>
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box_home" id="four">
                    <span>4</span>
                    <h3>El comercio se contactará con vos para confirmar tu pedido</h3>
                    <p>
                        ¿No es muy fácil?
                    </p>
                </div>
            </div>
        </div>
    </div><!-- End container -->

    <div class="white_bg">
        <div class="container margin_60">

            <div class="main_title">
                <h2 class="nomargin_top">Elegí entre los más visitados</h2>
                <p>
                    Estos son los comercios más visitados de nuestra plataforma
                </p>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <a href="detail_page.html" class="strip_list">
                        <div class="desc">
                            <div class="thumb_strip">
                                <img src="<?= URL ?>/assets/img/thumb_restaurant.jpg" alt="">
                            </div>
                            <h3>Taco Mexican</h3>
                            <div class="type">
                                Mexican / American
                            </div>
                            <div class="location">
                                135 Newtownards Road, Belfast, BT4. <span class="opening">Opens at 17:00</span>
                            </div>
                            <ul>
                                <li>Take away<i class="icon_check_alt2 ok"></i></li>
                                <li>Delivery<i class="icon_check_alt2 ok"></i></li>
                            </ul>
                        </div><!-- End desc-->
                    </a><!-- End strip_list-->
                    <a href="detail_page.html" class="strip_list">
                        <div class="desc">
                            <div class="thumb_strip">
                                <img src="<?= URL ?>/assets/img/thumb_restaurant_2.jpg" alt="">
                            </div>
                            <h3>Naples Pizza</h3>
                            <div class="type">
                                Italian / Pizza
                            </div>
                            <div class="location">
                                135 Newtownards Road, Belfast, BT4. <span class="opening">Opens at 17:00</span>
                            </div>
                            <ul>
                                <li>Take away<i class="icon_check_alt2 ok"></i></li>
                                <li>Delivery<i class="icon_check_alt2 ok"></i></li>
                            </ul>
                        </div><!-- End desc-->
                    </a><!-- End strip_list-->
                    <a href="detail_page.html" class="strip_list">
                        <div class="desc">
                            <div class="thumb_strip">
                                <img src="<?= URL ?>/assets/img/thumb_restaurant_3.jpg" alt="">
                            </div>
                            <h3>Japan Food</h3>
                            <div class="type">
                                Sushi / Japanese
                            </div>
                            <div class="location">
                                135 Newtownards Road, Belfast, BT4. <span class="opening">Opens at 17:00</span>
                            </div>
                            <ul>
                                <li>Take away<i class="icon_check_alt2 ok"></i></li>
                                <li>Delivery<i class="icon_check_alt2 ok"></i></li>
                            </ul>
                        </div><!-- End desc-->
                    </a><!-- End strip_list-->
                </div><!-- End col-md-6-->
                <div class="col-md-6">
                    <a href="detail_page.html" class="strip_list">
                        <div class="desc">
                            <div class="thumb_strip">
                                <img src="<?= URL ?>/assets/img/thumb_restaurant_4.jpg" alt="">
                            </div>
                            <h3>Sushi Gold</h3>
                            <div class="type">
                                Sushi / Japanese
                            </div>
                            <div class="location">
                                135 Newtownards Road, Belfast, BT4. <span class="opening">Opens at 17:00</span>
                            </div>
                            <ul>
                                <li>Take away<i class="icon_check_alt2 ok"></i></li>
                                <li>Delivery<i class="icon_close_alt2 no"></i></li>
                            </ul>
                        </div><!-- End desc-->
                    </a><!-- End strip_list-->
                    <a href="detail_page.html" class="strip_list">
                        <div class="desc">
                            <div class="thumb_strip">
                                <img src="<?= URL ?>/assets/img/thumb_restaurant_5.jpg" alt="">
                            </div>
                            <h3>Dragon Tower</h3>
                            <div class="type">
                                Chinese / Thai
                            </div>
                            <div class="location">
                                135 Newtownards Road, Belfast, BT4. <span class="opening">Opens at 17:00</span>
                            </div>
                            <ul>
                                <li>Take away<i class="icon_check_alt2 ok"></i></li>
                                <li>Delivery<i class="icon_check_alt2 ok"></i></li>
                            </ul>
                        </div><!-- End desc-->
                    </a><!-- End strip_list-->
                    <a href="detail_page.html" class="strip_list">
                        <div class="desc">
                            <div class="thumb_strip">
                                <img src="<?= URL ?>/assets/img/thumb_restaurant_6.jpg" alt="">
                            </div>
                            <h3>China Food</h3>
                            <div class="type">
                                Chinese / Vietnam
                            </div>
                            <div class="location">
                                135 Newtownards Road, Belfast, BT4. <span class="opening">Opens at 17:00</span>
                            </div>
                            <ul>
                                <li>Take away<i class="icon_check_alt2 ok"></i></li>
                                <li>Delivery<i class="icon_check_alt2 ok"></i></li>
                            </ul>
                        </div><!-- End desc-->
                    </a><!-- End strip_list-->
                </div>
            </div><!-- End row -->

        </div><!-- End container -->
    </div><!-- End white_bg -->


<?php $template->themeEnd() ?>