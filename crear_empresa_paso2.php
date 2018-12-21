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
//Clases
$empresa = new Clases\Empresas();
?>

<!-- SubHeader =============================================== -->
<section class="parallax-window" id="short" data-parallax="scroll" data-image-src="img/sub_header_cart.jpg" data-natural-width="1400" data-natural-height="350">
  <div id="subheader">
    <div id="sub_content">
     <h1>Ya estás más cerca</h1>
     <div class="bs-wizard">
      <div class="col-xs-4 bs-wizard-step active">
        <div class="text-center bs-wizard-stepnum"><strong>1.</strong> Descripción</div>
        <div class="progress"><div class="progress-bar"></div></div>
        <a href="#0" class="bs-wizard-dot"></a>
      </div>

      <div class="col-xs-4 bs-wizard-step active">
        <div class="text-center bs-wizard-stepnum"><strong>2.</strong> Ubicación</div>
        <div class="progress"><div class="progress-bar"></div></div>
        <a href="cart_2.html" class="bs-wizard-dot"></a>
      </div>

      <div class="col-xs-4 bs-wizard-step disabled">
        <div class="text-center bs-wizard-stepnum"><strong>3.</strong> Logo y Creación</div>
        <div class="progress"><div class="progress-bar"></div></div>
        <a href="cart_3.html" class="bs-wizard-dot"></a>
      </div>  
    </div><!-- End bs-wizard --> 
  </div><!-- End sub_content -->
</div><!-- End subheader -->
</section><!-- End section -->
<!-- End SubHeader ============================================ -->

<div id="position">
  <div class="container">
    <ul>
      <li><a href="#0">Inicio</a></li>
      <li>Crear Empresa</li>
    </ul>
  </div>
</div><!-- Position -->

<?php 
if (isset($_POST["crear_empresa_paso2"])):
  $provincia   = $funcion->antihack_mysqli(isset($_POST["provinciaEmpresa"]) ? $_POST["provinciaEmpresa"] : '');
  $ciudad   = $funcion->antihack_mysqli(isset($_POST["ciudadEmpresa"]) ? $_POST["ciudadEmpresa"] : '');
  $barrio    = $funcion->antihack_mysqli(isset($_POST["barrioEmpresa"]) ? $_POST["barrioEmpresa"] : '');
  $direccion   = $funcion->antihack_mysqli(isset($_POST["direccionEmpresa"]) ? $_POST["direccionEmpresa"] : '');
  $postal   = $funcion->antihack_mysqli(isset($_POST["postalEmpresa"]) ? $_POST["postalEmpresa"] : '');

  $cod_usuario   = $_SESSION['usuarios']['cod'];  
  $empresa->set("cod_usuario",$cod_usuario);
  $empresaData = $empresa->view();

  $empresa->set("id",$empresaData['id']);

  $empresa->set("cod",$empresaData['cod']);
  $empresa->set("titulo",$empresaData['titulo']);
  $empresa->set("telefono",$empresaData['telefono']);
  $empresa->set("email",$empresaData['email']);
  $empresa->set("desarrollo",$empresaData['desarrollo']);
  $empresa->set("fecha",$empresaData['fecha']);
  $empresa->set("cod_usuario",$empresaData['cod_usuario']);

  //Agregado
  $empresa->set("provincia",$provincia);
  $empresa->set("ciudad",$ciudad);
  $empresa->set("barrio",$barrio);
  $empresa->set("direccion",$direccion);
  $empresa->set("postal",$postal);

  $empresa->edit();
  $funcion->headerMove(URL.'/crear_empresa_paso3');
endif;
?>

<!-- Content ================================================== -->
<div class="container margin_60_35">
  <div class="row">
    <div class="col-md-12">
      <div class="box_style_2" id="order_process">
        <form method="post">
          <h2 class="inner">Ubicación</h2>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label>Provincia</label>
                <select class="form-control" name="provinciaEmpresa" id="provinciaEmpresa">
                  <option value="" selected>Selecciona tu provincia</option>
                  <option value="Córdoba">Córdoba</option>
                  <option value="Buenos Aires">Buenos Aires</option>
                  <option value="Santa Fe">Santa Fe</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Ciudad</label>
                <select class="form-control" name="ciudadEmpresa" id="ciudadEmpresa">
                  <option value="" selected>Selecciona tu provincia</option>
                  <option value="San Francisco">San Francisco</option>
                  <option value="Tandil">Tandil</option>
                  <option value="Rosario">Rosario</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label>Barrio</label>
                <input type="text" id="barrioEmpresa" name="barrioEmpresa" class="form-control">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Driección</label>
                <input type="text" id="direccionEmpresa" name="direccionEmpresa" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Código Postal</label>
                <input type="text" id="postalEmpresa" name="postalEmpresa" class="form-control">
              </div>
            </div>
          </div><!--End row -->
          <hr>
          <div class="row">
            <div class="col-md-3">
              <button class="btn_full" name="crear_empresa_paso2" type="submit" >Siguiente Paso <i class="icon-right-open-5"></i></button>
            </div>
          </div>
        </form>
      </div><!-- End box_style_1 -->
    </div><!-- End col-md-6 -->
  </div><!-- End row -->
</div><!-- End container -->
<!-- End Content =============================================== -->

<?php $template->themeEnd() ?>

<!-- SPECIFIC SCRIPTS -->
<script src="<?=URL?>/assets/js/theia-sticky-sidebar.js"></script>
<script>
  jQuery('#sidebar').theiaStickySidebar({
    additionalMarginTop: 80
  });
</script>