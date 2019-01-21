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
                            <?php $variantesMostrarCarrito = $carroItem['opciones'][0]; ?>
                            <?php $adicionalesMostrarCarrito = $carroItem['opciones'][1]; ?>
                            <tr>
                                <td>
                                    <strong><?= $carroItem['cantidad']; ?>x</strong> <?= $carroItem['titulo']; ?>
                                </td>
                                <td>
                                    <strong class="pull-right">$<?= $carroItem['precio'] * $carroItem['cantidad']; ?></strong>
                                </td>
                            </tr>
                            <?php if (!empty($variantesMostrarCarrito[0])): ?>
                                <?php $valor = explode(",",$variantesMostrarCarrito); ?>
                                <tr>
                                    <td>
                                        - <?= $valor[1]; ?>
                                    </td>
                                    <td>
                                        <strong class="pull-right">$<?= $valor[0] * $carroItem['cantidad']; ?></strong>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php if (is_array($adicionalesMostrarCarrito) && count($adicionalesMostrarCarrito) > 1): ?>
                                <?php foreach ($variantesMostrarCarrito as $value): ?>
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
                            <?php elseif (is_array($adicionalesMostrarCarrito) && count($adicionalesMostrarCarrito) == 1): ?>
                                <?php $valor = explode(",", $adicionalesMostrarCarrito[0]); ?>
                                <tr>
                                    <td>
                                        - <?= $valor[1] ?>
                                    </td>
                                    <td>
                                        <strong class="pull-right">$<?= $valor[0] * $carroItem['cantidad'] ?></strong>
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
                                <strong class="pull-right">$ <?= $carro[0]["costoEnvio"] ?></strong>
                            </td>
                        </tr>
                        <tr>
                            <td class="total_confirm">
                                TOTAL
                            </td>
                            <td class="total_confirm">
                                <span class="pull-right">$<?= $precioTotal+$carro[0]["costoEnvio"]; ?></span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <?php
                    if (isset($_POST["crear_cuenta"])):
                        if ($_POST["password"] == $_POST["password2"]):
                            $email = $funcion->antihack_mysqli(isset($_POST["email"]) ? $_POST["email"] : '');
                            $password = $funcion->antihack_mysqli(isset($_POST["password"]) ? $_POST["password"] : '');
                            $terminos = $funcion->antihack_mysqli(isset($_POST["terminos"]) ? $_POST["terminos"] : '');
                            $cod = $funcion->antihack_mysqli(isset($_POST["cod"]) ? $_POST["cod"] : '');

                            $usuario->set("cod", $cod);
                            $usuarioData = $usuario->view();

                            $usuario->set("nombre", $usuarioData['nombre']);
                            $usuario->set("apellido", $usuarioData['apellido']);
                            $usuario->set("provincia", $usuarioData['provincia']);
                            $usuario->set("localidad", $usuarioData['localidad']);
                            $usuario->set("direccion", $usuarioData['direccion']);
                            $usuario->set("barrio", $usuarioData['barrio']);
                            $usuario->set("telefono", $usuarioData['telefono']);
                            $usuario->set("email", $email);
                            $usuario->set("password", $password);
                            $usuario->set("terminos", $terminos);
                            $usuario->set("invitado", 0);
                            $usuario->set("fecha", $usuarioData['fecha']);

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
                    <?php if ($_SESSION["usuarios"]["invitado"] == 1): ?>
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
                                    <input type="hidden" name="cod" value="<?= $_SESSION['usuarios']['cod'] ?>">
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

<?php if (!empty($carro)): ?>
    <?php $carrito->destroy(); ?>
    <?php unset($_SESSION["usuarios"]); ?>
    <?php unset($_SESSION["cod_pedido"]); ?>
<?php endif; ?>
<?php $template->themeEnd() ?>