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
$pedido = new Clases\Pedidos;
$carrito = new Clases\Carrito();
$usuario = new Clases\Usuarios();

$cod_pedido = $_SESSION["cod_pedido"];

$precioTotal = 0;

$carro = $carrito->return();
$carroEnvio = $carrito->checkEnvio();
?>
    <!-- SubHeader =============================================== -->
    <section class="parallax-window" id="short" data-parallax="scroll" data-image-src="img/sub_header_cart.jpg"
             data-natural-width="1400" data-natural-height="350">
        <div id="subheader">
            <div id="sub_content">
                <h1>Confirmar</h1>
                <p>Confirmá tu pedido.</p>
                <p></p>
            </div><!-- End sub_content -->
        </div><!-- End subheader -->
    </section><!-- End section -->
    <!-- End SubHeader ============================================ -->

    <div id="position">
        <div class="container">
            <ul>
                <li><a href="#">Pedido</a></li>
                <li>Confirmación</li>
            </ul>
        </div>
    </div><!-- Position -->

    <!-- Content ================================================== -->

    <div class="container margin_60_35">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="box_style_2">
                    <h2 class="inner">Compra Finalizada</h2>
                    <div id="confirm">
                        <i class="icon_check_alt2"></i>
                        <h3>¡Encargado exitosamente!</h3>
                        <p>
                            Tu pedido ya fue tomado y estára llegando detro de los proximos 30 minutos.
                        </p>
                    </div>
                    <h4>Resumen</h4>
                    <table class="table table-striped nomargin">
                        <tbody>
                        <?php foreach ($carro as $carroItem): ?>
                            <?php $opcionesMostrar = explode("|||", $carroItem['opciones']); ?>
                            <?php $varianteMostrar = explode(",", $opcionesMostrar[0]); ?>
                            <?php $adicionalesMostrar = explode("//", $opcionesMostrar[1]); ?>
                            <tr>
                                <td>
                                    <strong><?= $carroItem['cantidad']; ?>x</strong> <?= $carroItem['titulo']; ?>
                                </td>
                                <td>
                                    <strong class="pull-right">$<?= $carroItem['precio'] * $carroItem['cantidad']; ?></strong>
                                </td>
                            </tr>
                            <?php if (!empty($varianteMostrar[0])): ?>
                                <tr>
                                    <td>
                                        - <?= $varianteMostrar[1]; ?>
                                    </td>
                                    <td>
                                        <strong class="pull-right">$<?= $varianteMostrar[0] * $carroItem['cantidad']; ?></strong>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php if (count($adicionalesMostrar) > 1): ?>
                                <?php foreach ($adicionalesMostrar as $value): ?>
                                    <?php $value = explode(",", $value); ?>
                                    <tr>
                                        <td>
                                            - <?= $value[1] ?>
                                        </td>
                                        <td>
                                            <strong class="pull-right">$<?= $value[0] * $carroItem['cantidad'] ?></strong>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php elseif (!empty($adicionalesMostrar[0])): ?>
                                <?php $value = explode(",", $adicionalesMostrar[0]); ?>
                                <tr>
                                    <td>
                                        - <?= $value[1] ?>
                                    </td>
                                    <td>
                                        <strong class="pull-right">$<?= $value[0] * $carroItem['cantidad'] ?></strong>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <?php foreach ($carro as $carroItem): ?>
                            <?php $precioTotal = $precioTotal + ($carroItem['precio'] + $carroItem['precioAdicional']) * $carroItem['cantidad']; ?>
                        <?php endforeach; ?>
                        <tr>
                            <td>
                                Delivery <a href="#" class="tooltip-1" data-placement="top" title=""
                                            data-original-title="Tiempo estimado: 30 min."><i
                                            class="icon_question_alt"></i></a>
                            </td>
                            <td>
                                <strong class="pull-right">$ <?=$carro[0]["costoEnvio"]?></strong>
                            </td>
                        </tr>
                        <tr>
                            <td class="total_confirm">
                                TOTAL
                            </td>
                            <td class="total_confirm">
                                <span class="pull-right">$<?= $precioTotal + $carro[0]["costoEnvio"]; ?></span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <?php $carrito->destroy(); ?>
                    <?php unset($_SESSION["cod_pedido"]); ?>
                    <?php
                    if (isset($_POST["crear_cuenta"])):
                        if ($_POST["password"] == $_POST["password2"]):
                            $email = $funcion->antihack_mysqli(isset($_POST["email"]) ? $_POST["email"] : '');
                            $password = $funcion->antihack_mysqli(isset($_POST["password"]) ? $_POST["password"] : '');
                            $terminos = $funcion->antihack_mysqli(isset($_POST["terminos"]) ? $_POST["terminos"] : '');
                            $telefono = $funcion->antihack_mysqli(isset($_SESSION["usuarios"]["telefono"]) ? $_SESSION["usuarios"]["telefono"] : '');
                            $nombre = $funcion->antihack_mysqli(isset($_SESSION["usuarios"]["nombre"]) ? $_SESSION["usuarios"]["nombre"] : '');
                            $apellido = $funcion->antihack_mysqli(isset($_SESSION["usuarios"]["apellido"]) ? $_SESSION["usuarios"]["apellido"] : '');
                            $provincia = $funcion->antihack_mysqli(isset($_SESSION["usuarios"]["provincia"]) ? $_SESSION["usuarios"]["provincia"] : '');
                            $localidad = $funcion->antihack_mysqli(isset($_SESSION["usuarios"]["localidad"]) ? $_SESSION["usuarios"]["localidad"] : '');
                            $barrio = $funcion->antihack_mysqli(isset($_SESSION["usuarios"]["barrio"]) ? $_SESSION["usuarios"]["barrio"] : '');
                            $direccion = $funcion->antihack_mysqli(isset($_SESSION["usuarios"]["direccion"]) ? $_SESSION["usuarios"]["direccion"] : '');
                            $cod = $funcion->antihack_mysqli(isset($_SESSION["usuarios"]["cod"]) ? $_SESSION["usuarios"]["cod"] : '');

                            $fecha = getdate();
                            $fecha = $fecha['year'] . '-' . $fecha['mon'] . '-' . $fecha['mday'];

                            $usuario->set("cod", $cod);
                            $usuario->set("nombre", $nombre);
                            $usuario->set("apellido", $apellido);
                            $usuario->set("provincia", $provincia);
                            $usuario->set("localidad", $localidad);
                            $usuario->set("direccion", $direccion);
                            $usuario->set("barrio", $barrio);
                            $usuario->set("telefono", $telefono);
                            $usuario->set("email", $email);
                            $usuario->set("password", $password);
                            $usuario->set("terminos", $terminos);
                            $usuario->set("invitado", 0);
                            $usuario->set("fecha", $fecha);

                            if ($usuario->edit() == 0):
                                ?>
                                <div class="alert alert-warning" role="alert">El email ya está registrado.</div>
                            <?php
                            else:
                                $usuario->login();
                                $funcion->headerMove(URL);
                            endif;
                        else:
                            ?>
                            <div class="alert alert-warning" role="alert">Las contraseñas no coinciden.</div>
                        <?php
                        endif;
                    endif;
                    ?>
                    <?php if ($_SESSION["usuarios"]["invitado"] == 0): ?>
                        <h3>¿Te gustaría crear una cuenta?</h3>
                        <p>
                            ¡Solo te tomará 1 minuto!.
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <a class="btn_full" data-toggle="collapse" href="#crear_cuenta" role="button"
                                   aria-expanded="false" aria-controls="crear_cuenta">Sí</a>
                            </div>
                            <div class="col-md-6">
                                <a class="btn_full" href="<?= URL ?>">No</a>
                            </div>
                        </div>
                        <div class="collapse" id="crear_cuenta">
                            <div class="card card-body">
                                <form method="post">
                                    <input type="email" class="form-control" name="email" placeholder="Email"
                                           required><br/>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" name="password"
                                                   placeholder="Contraseña"
                                                   id="password1" required>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" name="password2"
                                                   placeholder="Confirmar contraseña"
                                                   id="password2" required>
                                        </div>
                                    </div>
                                    <br/>
                                    <label>
                                        <input type="checkbox" value="1" id="check_2" name="terminos" required>
                                        <span>He leído y acepto los <strong>Términos &amp; Condiciones</strong></span>
                                    </label><br/><br/>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <button class="btn_full" name="crear_cuenta" type="submit">Confirmar <i
                                                        class="icon-right-open-5"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div><!-- End row -->
    </div><!-- End container -->
    <!-- End Content =============================================== -->

<?php $template->themeEnd() ?>