<?php
ob_start();

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
$usuario = new Clases\Usuarios();
?>

<?php
if (isset($_POST["ubicacion"])):
    $provincia = $funcion->antihack_mysqli(isset($_POST["provincia"]) ? $_POST["provincia"] : '');
    $ciudad = $funcion->antihack_mysqli(isset($_POST["ciudad"]) ? $_POST["ciudad"] : '');
    $direccion = $funcion->antihack_mysqli(isset($_POST["direccion"]) ? $_POST["direccion"] : '');

    $ubicacion = $direccion . '-' . $ciudad . '-' . $provincia;
    $ubicacion = str_replace(" ", "-", $ubicacion);

    $funcion->headerMove(URL . '/restaurantes?ubicacion=' . $ubicacion);
endif;
?>

    <!-- SubHeader =============================================== -->
    <section class="header-video">
        <div id="hero_video">
            <div id="sub_content">
                <h1>Foodie delivery online</h1>
                <p>
                    ¡Pedí toda la comida que te guste directamente desde tu casa!
                </p>
                <form method="post">
                    <div id="custom-search-input">
                        <input type="hidden" name="provincia" value="Córdoba">
                        <div class="col-md-3">
                            <div class="form-group">
                                <select class="form-control" name="ciudad" id="ciudad" required>
                                    <option value="" selected disabled>Ciudad</option>
                                    <option value="San Francisco">San Francisco</option>
                                    <option value="Devoto">Devoto</option>
                                    <option value="La Francia">La Francia</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <input type="text" class="form-control" name="direccion"
                                       placeholder="Escribí tu dirección">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <input type="submit" name="ubicacion" class="h40 btn_1" value="Buscar">
                        </div>
                    </div>
                </form>
            </div><!-- End sub_content -->
        </div>
        <img src="assets/img/video_fix.png" alt="" class="header-video--media" data-video-src="assets/video/intro"
             data-teaser-source="assets/video/intro" data-provider="Vimeo" data-video-width="1920"
             data-video-height="960">
    </section><!-- End Header video -->
    <!-- End SubHeader ============================================ -->

    <!-- Content ================================================== -->
    <div class="container margin_60">

        <div class="main_title">
            <h2 class="nomargin_top" style="padding-top:0">¿Cómo funciona?</h2>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="box_home" id="one">
                    <span>1</span>
                    <h3>Ingresá tu dirección</h3>
                    <p>
                        Encontraremos todos los restaurantes cercanos en tu zona.
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box_home" id="two">
                    <span>2</span>
                    <h3>Elegí un restaurante</h3>
                    <p>
                        De todos los restaurantes disponibles elegí el de tu agrado.
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box_home" id="three">
                    <span>3</span>
                    <h3>Pagá</h3>
                    <p>
                        Esto es rápido y facil, con tarjeta o directamente efectivo.
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box_home" id="four">
                    <span>4</span>
                    <h3>Disfrutá</h3>
                    <p>
                        ¡Disfrutá la comida que pediste!
                    </p>
                </div>
            </div>
        </div><!-- End row -->
    </div><!-- End container -->
    <div class="high_light">
        <div class="container">
            <h3>¿Tenés un restaurante o negocio de comidas?</h3><br/>
            <p>Solicitá tu cuenta de vendedor haciendo click en el siguiente link.</p>
            <?php if (empty($_SESSION["usuarios"])): ?>
                <a href="#" data-toggle="modal" data-target="#register">Quiero ser vendedor</a>
                <script>
                    $(document).ready(function () {
                        $("#senalVendedor").html('<input name="senalVendedor" value="1" type="hidden">');
                    });
                </script>
            <?php else: ?>
                <a href="#" data-toggle="modal" data-target="#vendedor">Quiero ser vendedor</a>
            <?php endif; ?>
        </div><!-- End container -->
    </div>

    <!-- VENDEDOR -->
<?php
if (isset($_POST["vendedor"])):
    $nombre = $funcion->antihack_mysqli(isset($_POST["nombreVendedor"]) ? $_POST["nombreVendedor"] : '');
    $provincia = $funcion->antihack_mysqli(isset($_POST["provinciaVendedor"]) ? $_POST["provinciaVendedor"] : '');
    $localidad = $funcion->antihack_mysqli(isset($_POST["localidadVendedor"]) ? $_POST["localidadVendedor"] : '');
    $telefono = $funcion->antihack_mysqli(isset($_POST["telefonoUsuario"]) ? $_POST["telefonoUsuario"] : '');

    $usuario->set("cod", $_SESSION["usuarios"]['cod']);
    $usuario->set("email", $_SESSION["usuarios"]['email']);
    $usuario->editUnico("telefono", $telefono);

    ?>
    <script>
        $(document).ready(function () {
            $('#modalOK').modal("show");
        });
    </script>
<?php
endif;
?>

    <div class="modal fade" id="vendedor" tabindex="-1" role="dialog" aria-labelledby="myVendedor" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-popup">
                <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
                <p id="errorVendedor"></p>
                <form class="popup-form" id="myVendedor" method="post">
                    <div class="login_icon"><i class="icon_lock_alt"></i></div>
                    <input type="text" class="form-control form-white" name="nombreVendedor"
                           placeholder="Nombre de tu restaurtante / negocio" required>
                    <div class="row">
                        <label class="col-md-6 col-xs-6">
                            <select class="form-control" name="provinciaVendedor" id="provincia" required>
                                <option value="" selected disabled>Provincia</option>
                                <?php $funcion->provincias() ?>
                            </select>
                        </label>
                        <label class="col-md-6 col-xs-6">
                            <select class="form-control" name="localidadVendedor" id="localidad" required>
                                <option value="" selected disabled>Localidad</option>
                            </select>
                        </label>
                    </div>
                    <?php if (empty($_SESSION["usuarios"]["telefono"])): ?>
                        <input type="text" class="form-control form-white" name="telefonoUsuario"
                               placeholder="Tu teléfono personal" required>
                    <?php endif; ?>
                    <button type="submit" name="vendedor" class="btn btn-submit">Solicitar</button>
                </form>
            </div>
        </div>
    </div><!-- End Register modal -->

    <div class="modal fade" id="modalOK" tabindex="-1" role="dialog" aria-labelledby="modalOK" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-popup">
                <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
                <br/>
                <div id="confirm">
                    <i class="icon_check_alt2 text_white"></i>
                    <h3 class="text_white">¡Tu solicitud fue enviada correctamente!</h3>
                </div>
                <br/>
                <div class="alert alert-success" role="alert">¡Tu solicitud fue enviada correctamente!. Te vamos a
                    avisar
                    por email o teléfono cuando te habilitemos.
                </div>
            </div>
        </div>
    </div><!-- End Register modal -->

<?php $template->themeEnd() ?>

    <div class="layer"></div><!-- Mobile menu overlay mask -->

    <!-- SPECIFIC SCRIPTS -->
    <script src="assets/js/video_header.js"></script>
    <script>
        $(document).ready(function () {
            'use strict';
            HeaderVideo.init({
                container: $('.header-video'),
                header: $('.header-video--media'),
                videoTrigger: $("#video-trigger"),
                autoPlayVideo: true
            });

        });
    </script>


<?php


$html = ob_get_contents();
ob_end_clean();

// HTML Minifier
function minify_html($input) {
    if(trim($input) === "") return $input;
    // Remove extra white-space(s) between HTML attribute(s)
    $input = preg_replace_callback('#<([^\/\s<>!]+)(?:\s+([^<>]*?)\s*|\s*)(\/?)>#s', function($matches) {
        return '<' . $matches[1] . preg_replace('#([^\s=]+)(\=([\'"]?)(.*?)\3)?(\s+|$)#s', ' $1$2', $matches[2]) . $matches[3] . '>';
    }, str_replace("\r", "", $input));
    // Minify inline CSS declaration(s)
    if(strpos($input, ' style=') !== false) {
        $input = preg_replace_callback('#<([^<]+?)\s+style=([\'"])(.*?)\2(?=[\/\s>])#s', function($matches) {
            return '<' . $matches[1] . ' style=' . $matches[2] . minify_css($matches[3]) . $matches[2];
        }, $input);
    }
    if(strpos($input, '</style>') !== false) {
        $input = preg_replace_callback('#<style(.*?)>(.*?)</style>#is', function($matches) {
            return '<style' . $matches[1] .'>'. minify_css($matches[2]) . '</style>';
        }, $input);
    }
    if(strpos($input, '</script>') !== false) {
        $input = preg_replace_callback('#<script(.*?)>(.*?)</script>#is', function($matches) {
            return '<script' . $matches[1] .'>'. minify_js($matches[2]) . '</script>';
        }, $input);
    }
    return preg_replace(
        array(
            // t = text
            // o = tag open
            // c = tag close
            // Keep important white-space(s) after self-closing HTML tag(s)
            '#<(img|input)(>| .*?>)#s',
            // Remove a line break and two or more white-space(s) between tag(s)
            '#(<!--.*?-->)|(>)(?:\n*|\s{2,})(<)|^\s*|\s*$#s',
            '#(<!--.*?-->)|(?<!\>)\s+(<\/.*?>)|(<[^\/]*?>)\s+(?!\<)#s', // t+c || o+t
            '#(<!--.*?-->)|(<[^\/]*?>)\s+(<[^\/]*?>)|(<\/.*?>)\s+(<\/.*?>)#s', // o+o || c+c
            '#(<!--.*?-->)|(<\/.*?>)\s+(\s)(?!\<)|(?<!\>)\s+(\s)(<[^\/]*?\/?>)|(<[^\/]*?\/?>)\s+(\s)(?!\<)#s', // c+t || t+o || o+t -- separated by long white-space(s)
            '#(<!--.*?-->)|(<[^\/]*?>)\s+(<\/.*?>)#s', // empty tag
            '#<(img|input)(>| .*?>)<\/\1>#s', // reset previous fix
            '#(&nbsp;)&nbsp;(?![<\s])#', // clean up ...
            '#(?<=\>)(&nbsp;)(?=\<)#', // --ibid
            // Remove HTML comment(s) except IE comment(s)
            '#\s*<!--(?!\[if\s).*?-->\s*|(?<!\>)\n+(?=\<[^!])#s'
        ),
        array(
            '<$1$2</$1>',
            '$1$2$3',
            '$1$2$3',
            '$1$2$3$4$5',
            '$1$2$3$4$5$6$7',
            '$1$2$3',
            '<$1$2',
            '$1 ',
            '$1',
            ""
        ),
        $input);
}
// CSS Minifier => http://ideone.com/Q5USEF + improvement(s)
function minify_css($input) {
    if(trim($input) === "") return $input;
    return preg_replace(
        array(
            // Remove comment(s)
            '#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')|\/\*(?!\!)(?>.*?\*\/)|^\s*|\s*$#s',
            // Remove unused white-space(s)
            '#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\'|\/\*(?>.*?\*\/))|\s*+;\s*+(})\s*+|\s*+([*$~^|]?+=|[{};,>~+]|\s*+-(?![0-9\.])|!important\b)\s*+|([[(:])\s++|\s++([])])|\s++(:)\s*+(?!(?>[^{}"\']++|"(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')*+{)|^\s++|\s++\z|(\s)\s+#si',
            // Replace `0(cm|em|ex|in|mm|pc|pt|px|vh|vw|%)` with `0`
            '#(?<=[\s:])(0)(cm|em|ex|in|mm|pc|pt|px|vh|vw|%)#si',
            // Replace `:0 0 0 0` with `:0`
            '#:(0\s+0|0\s+0\s+0\s+0)(?=[;\}]|\!important)#i',
            // Replace `background-position:0` with `background-position:0 0`
            '#(background-position):0(?=[;\}])#si',
            // Replace `0.6` with `.6`, but only when preceded by `:`, `,`, `-` or a white-space
            '#(?<=[\s:,\-])0+\.(\d+)#s',
            // Minify string value
            '#(\/\*(?>.*?\*\/))|(?<!content\:)([\'"])([a-z_][a-z0-9\-_]*?)\2(?=[\s\{\}\];,])#si',
            '#(\/\*(?>.*?\*\/))|(\burl\()([\'"])([^\s]+?)\3(\))#si',
            // Minify HEX color code
            '#(?<=[\s:,\-]\#)([a-f0-6]+)\1([a-f0-6]+)\2([a-f0-6]+)\3#i',
            // Replace `(border|outline):none` with `(border|outline):0`
            '#(?<=[\{;])(border|outline):none(?=[;\}\!])#',
            // Remove empty selector(s)
            '#(\/\*(?>.*?\*\/))|(^|[\{\}])(?:[^\s\{\}]+)\{\}#s'
        ),
        array(
            '$1',
            '$1$2$3$4$5$6$7',
            '$1',
            ':0',
            '$1:0 0',
            '.$1',
            '$1$3',
            '$1$2$4$5',
            '$1$2$3',
            '$1:0',
            '$1$2'
        ),
        $input);
}
// JavaScript Minifier
function minify_js($input) {
    if(trim($input) === "") return $input;
    return preg_replace(
        array(
            // Remove comment(s)
            '#\s*("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')\s*|\s*\/\*(?!\!|@cc_on)(?>[\s\S]*?\*\/)\s*|\s*(?<![\:\=])\/\/.*(?=[\n\r]|$)|^\s*|\s*$#',
            // Remove white-space(s) outside the string and regex
            '#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\'|\/\*(?>.*?\*\/)|\/(?!\/)[^\n\r]*?\/(?=[\s.,;]|[gimuy]|$))|\s*([!%&*\(\)\-=+\[\]\{\}|;:,.<>?\/])\s*#s',
            // Remove the last semicolon
            '#;+\}#',
            // Minify object attribute(s) except JSON attribute(s). From `{'foo':'bar'}` to `{foo:'bar'}`
            '#([\{,])([\'])(\d+|[a-z_][a-z0-9_]*)\2(?=\:)#i',
            // --ibid. From `foo['bar']` to `foo.bar`
            '#([a-z0-9_\)\]])\[([\'"])([a-z_][a-z0-9_]*)\2\]#i'
        ),
        array(
            '$1',
            '$1$2',
            '}',
            '$1$3',
            '$1.$3'
        ),
        $input);
}

print minify_html($html);
?>