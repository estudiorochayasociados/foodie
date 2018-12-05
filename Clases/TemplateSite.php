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
      <link href='https://fonts.googleapis.com/css?family=Poppins:300,700' rel='stylesheet' type='text/css'> 
      <link rel="stylesheet" type="text/css" href="<?=URL?>/assets/font/font-awesome/css/font-awesome.min.css" />
      <link rel="stylesheet" href="<?=URL?>/assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?=URL?>/assets/js/owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="<?=URL?>/assets/js/owl-carousel/owl.theme.css">
      <link rel="stylesheet" href="<?=URL?>/assets/css/style.css" />
      <link rel="stylesheet" href="<?=URL?>/assets/css/estilos.css">
      <meta name="viewport" content="width=device-width" />
      <link rel="shortcut icon" href="<?=URL?>/assets/images/favicon.ico">
      <meta charset="UTF-8">
      <title><?=$this->title?></title>
      <meta name="description" content="<?=$this->description?>">
      <meta name="keywords" content="<?=$this->keywords?>">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    </head>
    
    <body id="bd" class="cms-index-index4 header-style4 prd-detail blog-pagev1 cms-simen-home-page-v2 default cmspage">
     <div id="sns_wrapper"> 

      <?php include 'assets/inc/nav.inc.php'; ?>
      <div class="container-fluid">
        <?php

      }
      public function themeSideIndex()
      {
        ?>
        <?php include 'assets/inc/sideIndex.inc.php'; ?>
        <?php
      }

      public function themeList()
      {
        ?>
        <?php include 'assets/inc/sideList.inc.php'; ?>
        <?php
      }


      public function themeEnd()
      {
        ?>
        <?php include 'assets/inc/footer.inc.php'; ?>
      </div>
    </div>
    </body>
    <script src="<?=URL?>/admin/ckeditor/ckeditor.js"></script>
    <script src="<?=URL?>/admin/ckeditor/lang/es.js"></script>
    <script src="<?=URL?>/assets/js/jquery-1.9.1.min.js"></script>
    <script src="<?=URL?>/assets/js/bootstrap.min.js"></script>
    <script src="<?=URL?>/assets/js/less.min.js"></script>
    <script src="<?=URL?>/assets/js/owl-carousel/owl.carousel.min.js"></script>
    <script src="<?=URL?>/assets/js/sns-extend.js"></script>
    <script src="<?=URL?>/assets/js/custom.js"></script>
          <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

          <script src="<?=URL?>/assets/js/list-grid.js"></script>
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
