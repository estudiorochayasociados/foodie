<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$funciones= new Clases\PublicFunction();

//Clases
$imagenes = new Clases\Imagenes();
$novedades = new Clases\Novedades();
$banners = new Clases\Banner();
//Productos
$id       = isset($_GET["id"]) ? $_GET["id"] : '';
$novedades->set("id",$id);
$novedadData = $novedades->view();
$imagenes->set("cod",$novedadData['cod']);
$imagenData = $imagenes->view();
$novedadesData = $novedades->list('');
$fecha = explode("-", $novedadData['fecha']);
$template->set("title", "Pinturería Ariel | ".ucfirst($novedadData['titulo']));
$template->set("description", $novedadData['description']);
$template->set("keywords", $novedadData['keywords']);
$template->set("favicon", LOGO);
$template->themeInit();
//
?>
<div id="sns_content" class="wrap">
                <div class="container">
                    <div class="row">
                        <div id="sns_left" class="col-md-3">
                            <div class="block block-latestblog-v3" id="sns_latestblog_19454288391442904929">
                                <div class="block-title">
                                    <strong>LATEST POST</strong>
                                </div>
                                <div class="block-content">
                                    <div class="list-blog">
                                    <div class="item-post clearfix">
                                            <?php
                                            foreach ($novedadesData as $novSide) {
                                                $imagenes->set("cod",$novSide['cod']);
                                                $imgSide=$imagenes->view();
                                                $fechaSide = explode("-", $novSide['fecha']);
                                                ?>
                                                <div class="item-child">
                                                    <div class="item-img">
                                                        <a class="post-img" title="Donec scelerisque quam vitae est." href="<?php echo URL . '/blog/' . $funciones->normalizar_link($novSide['titulo']) . "/" . $novSide['id'] ?>">
                                                            <img alt="" src="<?= URL. '/' . $imgSide['ruta'] ?>">
                                                        </a>
                                                    </div>
                                                    <div class="item-content">
                                                        <div class="post-title">
                                                            <a href="<?php echo URL . '/blog/' . $funciones->normalizar_link($novSide['titulo']) . "/" . $novSide['id'] ?>" >Donec scelerisque quam vitae est.</a>
                                                        </div>
                                                        <div class="date">  
                                                            <i class="fa fa-calendar-o"></i>
                                                            <span class="day-month"><?php echo $fechaSide[2] . "/" . $fechaSide[1] . "/" . $fechaSide[0] ?></span>
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
                        <div id="sns_main" class="col-md-9 col-main">
                            <div id="sns_mainmidle">
                                <div class="blogs-page">
                                    <div class="postWrapper v1">
                                        <a class="post-img">
                                            <img src="<?= URL. '/' . $imagenData['ruta']; ?>" alt="<?= $novedadData['titulo']; ?>">
                                        </a>
                                        <br>
                                        <div class="date">
                                            <span class="poster"><?php echo $fecha[2] . "/" . $fecha[1] . "/" . $fecha[0] ?></span>
                                        </div>
                                        <div class="post-title">
                                            <a><?= ucfirst($novedadData['titulo']); ?></a>
                                        </div>
                                        <div class="post-content">
                                            <p class="text1">
                                                    <?= $novedadData['desarrollo']; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
$template->themeEnd();
?>