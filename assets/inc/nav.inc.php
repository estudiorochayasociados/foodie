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
                        <li><a href="<?= URL ?>/c/nosotros"><i class="icon-users-outline"></i> Nosotros</a></li>
                        <li><a href="<?= URL ?>/restaurantes"><i class="icon-shop-1"></i> Restaurantes</a></li>
                        <?php if (isset($_SESSION["usuarios"])): ?>
                            <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu"> <i class="icon-cog-5"></i>Mi
                                    Cuenta<i class="icon-down-open-mini"></i></a>
                                <ul>
                                    <?php if ($_SESSION["usuarios"]["vendedor"] == 1): ?>
                                        <li><a href="<?= URL ?>/panel#seccion-1">Empresa</a></li>
                                        <li><a href="<?= URL ?>/panel#seccion-2">Menús</a></li>
                                        <li><a href="<?= URL ?>/panel#seccion-3">Perfil</a></li>
                                        <li><a href="<?= URL ?>/logout">Salir</a></li>
                                    <?php else: ?>
                                        <li><a href="<?= URL ?>/panel#seccion-3">Perfil</a></li>
                                        <li><a href="<?= URL ?>/logout">Salir</a></li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li><a href="#0" data-toggle="modal" data-target="#login_2">Login</a></li>
                            <li><a href="#0" data-toggle="modal" data-target="#register">Registrarse</a></li>
                        <?php endif; ?>
                    </ul>
                </div><!-- End main-menu -->
            </nav>
        </div><!-- End row -->
    </div><!-- End container -->
</header>

<!-- Login modal -->
<?php
if (isset($_POST["login"])):
    $email = $funcion->antihack_mysqli(isset($_POST["email"]) ? $_POST["email"] : '');
    $password = $funcion->antihack_mysqli(isset($_POST["password"]) ? $_POST["password"] : '');

    $usuario->set("email", $email);
    $usuario->set("password", $password);

    if ($usuario->login() == 0):
        ?>
        <script>
            $(document).ready(function () {
                $("#errorLogin").html('<br/><div class="alert alert-warning" role="alert">Email o contraseña incorrecta.</div>');
                $('#login_2').modal("show");
            });
        </script>
    <?php
    else:
        $funcion->headerMove(URL);
    endif;
endif;
?>
<div class="modal fade" id="login_2" tabindex="-1" role="dialog" aria-labelledby="myLogin" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
            <p id="errorLogin"></p>
            <form class="popup-form" id="myLogin" method="post">
                <div class="login_icon"><i class="icon_lock_alt"></i></div>
                <input type="email" class="form-control form-white" name="email" placeholder="Email">
                <input type="password" class="form-control form-white" name="password" placeholder="Contraseña">
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
    if ($_POST["password"] == $_POST["password2"]):
        $nombre = $funcion->antihack_mysqli(isset($_POST["nombre"]) ? $_POST["nombre"] : '');
        $apellido = $funcion->antihack_mysqli(isset($_POST["apellido"]) ? $_POST["apellido"] : '');
        $email = $funcion->antihack_mysqli(isset($_POST["email"]) ? $_POST["email"] : '');
        $password = $funcion->antihack_mysqli(isset($_POST["password"]) ? $_POST["password"] : '');
        $terminos = $funcion->antihack_mysqli(isset($_POST["terminos"]) ? $_POST["terminos"] : '');
        $senalVendedor = $funcion->antihack_mysqli(isset($_POST["senalVendedor"]) ? $_POST["senalVendedor"] : 0);
        $cod = substr(md5(uniqid(rand())), 0, 10);
        $fecha = getdate();
        $fecha = $fecha['year'] . '-' . $fecha['mon'] . '-' . $fecha['mday'];

        $usuario->set("cod", $cod);
        $usuario->set("nombre", $nombre);
        $usuario->set("apellido", $apellido);
        $usuario->set("email", $email);
        $usuario->set("password", $password);
        $usuario->set("terminos", $terminos);
        $usuario->set("fecha", $fecha);

        if ($usuario->add() == 0):
            ?>
            <script>
                $(document).ready(function () {
                    $("#errorRegistro").html('<br/><div class="alert alert-warning" role="alert">El email ya está registrado.</div>');
                    $('#register').modal("show");
                });
            </script>
        <?php
        else:
            $usuario->login();
            if ($senalVendedor == 0):
                $funcion->headerMove(URL);
            else:
                ?>
                <script>
                    $(document).ready(function () {
                        $('#vendedor').modal("show");
                    });
                </script>
            <?php
            endif;
        endif;
    else:
        ?>
        <script>
            $(document).ready(function () {
                $("#errorRegistro").html('<br/><div class="alert alert-warning" role="alert">Las contraseñas no coinciden.</div>');
                $('#register').modal("show");
            });
        </script>
    <?php
    endif;
endif;
?>
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myRegister" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
            <p id="errorRegistro"></p>
            <form class="popup-form" id="myRegister" method="post">
                <div class="login_icon"><i class="icon_lock_alt"></i></div>
                <input type="text" class="form-control form-white" name="nombre" placeholder="Nombre" required>
                <input type="text" class="form-control form-white" name="apellido" placeholder="Apellido" required>
                <input type="email" class="form-control form-white" name="email" placeholder="Email" required>
                <p id="senalVendedor"></p>
                <input type="text" class="form-control form-white" name="password" placeholder="Contraseña"
                       id="password1" required>
                <input type="text" class="form-control form-white" name="password2" placeholder="Confirmar contraseña"
                       id="password2" required>
                <div class="checkbox-holder text-left">
                    <div class="checkbox">
                        <input type="checkbox" value="1" id="check_2" name="terminos" required>
                        <label for="check_2"><span>He leído y acepto los <strong>Términos &amp; Condiciones</strong></span></label>
                    </div>
                </div>
                <button type="submit" name="registrar" class="btn btn-submit">Registrar</button>
            </form>
        </div>
    </div>
</div><!-- End Register modal -->