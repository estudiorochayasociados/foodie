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

<!-- CONTENT -->
<div id="sns_content" class="wrap">
    <div class="container">
        <div class="row">
            <div id="sns_left" class="col-md-3">
                <div class="wrap-in">
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
            </div>

            <div id="sns_main" class="col-md-9 col-main">
                <div id="sns_mainmidle">
                    <div class="blogs-page">
                        <?php
                        foreach ($novedadesData as $nov ) {
                            $imagenes->set("cod",$nov['cod']);
                            $img=$imagenes->view();
                            $fecha = explode("-", $novSide['fecha']);
                            ?> 
                            <div class="postWrapper v1">
                                <a class="post-img" href="<?php echo URL . '/blog/' . $funciones->normalizar_link($nov['titulo']) . "/" . $nov['id'] ?>">
                                    <img src="<?= URL . '/' . $img['ruta'] ?>" alt="<?= $nov['titulo']; ?>">
                                </a>
                                <div class="date">
                                    <span class="poster"><?php echo $fechaSide[2] . "/" . $fechaSide[1] . "/" . $fechaSide[0] ?></span>
                                </div>
                                <div class="post-title">
                                    <a href="<?php echo URL . '/blog/' . $funciones->normalizar_link($nov['titulo']) . "/" . $nov['id'] ?>"><?= ucfirst($nov['titulo']) ?></a>
                                </div>
                                <div class="post-content">
                                    <p><?php echo $nov["desarrollo"] ?></p>
                                </div>
                                <div class="link-readmore">
                                    <a title="Leer más" href="<?php echo URL . '/blog/' . $funciones->normalizar_link($nov['titulo']) . "/" . $nov['id'] ?>">Leer más</a>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
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