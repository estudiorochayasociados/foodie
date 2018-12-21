<?php $usuario = new Clases\Usuarios; ?>
<?php $funcion = new Clases\PublicFunction; ?>

<!-- Start Preload -->
<div id="preloader">
    <div class="sk-spinner sk-spinner-wave" id="status">
        <div class="sk-rect1"></div>
        <div class="sk-rect2"></div>
        <div class="sk-rect3"></div>
        <div class="sk-rect4"></div>
        <div class="sk-rect5"></div>
    </div>
</div>
<!-- End Preload -->

<header>
    <div class="container">
        <div class="row">
            <div class="col--md-4 col-sm-4 col-xs-4">
                <a href="index" id="logo">
                    <img src="<?= URL ?>/assets/img/logo.png" width="120" alt="" data-retina="true" class="hidden-xs">
                    <img src="<?= URL ?>/assets/img/logo_mobile.png" width="59" alt="" data-retina="true"
                    class="hidden-lg hidden-md hidden-sm">
                </a>
            </div>
            <nav class="col--md-8 col-sm-8 col-xs-8">
                <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                <div class="main-menu">
                    <div id="header_menu">
                        <img src="<?= URL ?>/assets/img/logo.png" width="190" alt="" data-retina="true">
                    </div>
                    <a href="#" class="open_close" id="close_in"><i class="icon_close"></i></a>
                    <ul>
                        <li><a href="about">Nosotros</a></li>
                        <?php if(isset($_SESSION["usuarios"])): ?>
                            <li><a href="#">Hola <?=$_SESSION["usuarios"]["nombre"]?></a></li>
                        <?php endif; ?>
                        <li><a href="#0" data-toggle="modal" data-target="#login_2">Login</a></li>
                        <li><a href="#0" data-toggle="modal" data-target="#register">Registrarse</a></li>
                    </ul>
                </div><!-- End main-menu -->
            </nav>
        </div><!-- End row -->
    </div><!-- End container -->
</header>

<!-- Login modal --> 
<?php 
if (isset($_POST["login"])):
    $email    = $funcion->antihack_mysqli(isset($_POST["email"]) ? $_POST["email"] : '');
    $password   = $funcion->antihack_mysqli(isset($_POST["password"]) ? $_POST["password"] : '');

    $usuario->set("email",$email);
    $usuario->set("password",$password);

    $usuario->login();
endif;
?>  
<div class="modal fade" id="login_2" tabindex="-1" role="dialog" aria-labelledby="myLogin" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
            <form class="popup-form" id="myLogin" method="post">
                <div class="login_icon"><i class="icon_lock_alt"></i></div>
                <input type="text" class="form-control form-white" name="email" placeholder="Email">
                <input type="text" class="form-control form-white" name="password" placeholder="Password">
                <div class="text-left">
                    <a href="#">¿Olvidaste tu contraseña?</a>
                </div>
                <button type="submit" name="login" class="btn btn-submit">Ingresar</button>
            </form>
        </div>
    </div>
</div><!-- End modal -->   

<!-- REGISTRAR --> 
<?php 
if (isset($_POST["registrar"])):
    if($_POST["password"] == $_POST["password2"]):
        $nombre   = $funcion->antihack_mysqli(isset($_POST["nombre"]) ? $_POST["nombre"] : '');
        $apellido   = $funcion->antihack_mysqli(isset($_POST["apellido"]) ? $_POST["apellido"] : '');
        $email    = $funcion->antihack_mysqli(isset($_POST["email"]) ? $_POST["email"] : '');
        $password   = $funcion->antihack_mysqli(isset($_POST["password"]) ? $_POST["password"] : '');
        $terminos = $funcion->antihack_mysqli(isset($_POST["terminos"]) ? $_POST["terminos"] : '');
        $cod   = substr(md5(uniqid(rand())), 0, 10);
        $fecha = getdate();
        $fecha = $fecha['year'].'-'.$fecha['mon'].'-'.$fecha['mday'];
        
        $usuario->set("cod",$cod);
        $usuario->set("nombre",$nombre);
        $usuario->set("apellido",$apellido);
        $usuario->set("email",$email);
        $usuario->set("password",$password);
        $usuario->set("terminos",$terminos);
        $usuario->set("fecha",$fecha);

        $usuario->add();
    else:
        echo '<div class="alert alert-warning" role="alert">¡Las contraseñas no coinciden!</div>';
    endif;
endif;
?>
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myRegister" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
            <form class="popup-form" id="myRegister" method="post">
                <div class="login_icon"><i class="icon_lock_alt"></i></div>
                <input type="text" class="form-control form-white" name="nombre" placeholder="Nombre">
                <input type="text" class="form-control form-white" name="apellido" placeholder="Apellido">
                <input type="email" class="form-control form-white" name="email" placeholder="Email">
                <input type="text" class="form-control form-white" name="password" placeholder="Contraseña"  id="password1">
                <input type="text" class="form-control form-white" name="password2" placeholder="Confirmar contraseña"  id="password2">
                <div id="pass-info" class="clearfix"></div>
                <div class="checkbox-holder text-left">
                    <div class="checkbox">
                        <input type="checkbox" value="1" id="check_2" name="terminos" />
                        <label for="check_2"><span>He leído y acepto los <strong>Términos &amp; Condiciones</strong></span></label>
                    </div>
                </div>
                <button type="submit" name="registrar" class="btn btn-submit">Registrar</button>
            </form>
        </div>
    </div>
</div><!-- End Register modal -->