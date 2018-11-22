<?php

namespace Clases;

class TemplateSite
{

    public $title;
    public $keywords;
    public $description;
    public $favicon;
    public $canonical;

    public function themeInit()
    {
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
           <link rel="stylesheet" href="<?=URL?>/assets/css/style.css" />
            <link rel="stylesheet" href="<?=URL?>/assets/font/font-awesome/css/font-awesome.css">
            <link rel="stylesheet" href="<?=URL?>/assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="<?=URL?>/assets/css/bootstrap.css">
            <link rel="stylesheet" href="<?=URL?>/assets/js/owl-carousel/owl.carousel.css">
            <link rel="stylesheet" href="<?=URL?>/assets/js/owl-carousel/owl.theme.css">
            <!-- favicon -->
            <link rel="shortcut icon" href="<?=URL?>/assets/images/favicon.ico">
            <!-- META TAGS -->
            <meta name="viewport" content="width=device-width" />

            <meta charset="UTF-8">
            <title><?=$this->title?></title>
            <meta name="description" content="<?=$this->description?>">
            <meta name="keywords" content="<?=$this->keywords?>">
        </head>
        <?php include 'assets/inc/nav.inc.php'; ?>
        <body>
            <div class="container-fluid pb-100">
                <?php
                
    }

    public function themeEnd()
    {
        ?>
        <?php include 'assets/inc/footer.inc.php'; ?>
        </div>
        </body>
        <script src="<?=URL?>/admin/ckeditor/ckeditor.js"></script>
        <script src="<?=URL?>/admin/ckeditor/lang/es.js"></script>
        <script src="<?=URL?>/assets/js/script.js"></script>
        <script src="<?=URL?>/assets/js/jquery-1.9.1.min.js"></script>
        <script src="<?=URL?>/assets/js/bootstrap.min.js"></script>
        <script src="<?=URL?>/assets/js/less.min.js"></script>
        <script src="<?=URL?>/assets/js/owl-carousel/owl.carousel.min.js"></script>
        <script src="<?=URL?>/assets/js/sns-extend.js"></script>
        <script src="<?=URL?>/assets/js/custom.js"></script>
        </html>
        <?php
    }

    public function set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function get($atributo)
    {
        return $this->$atributo;
    }
}
