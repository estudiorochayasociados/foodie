<?php
namespace config;

class autoload
{
    public static function runSitio()
    {
        session_start();
        define('URL', "http://".$_SERVER['HTTP_HOST']."/cms-webapp");
        spl_autoload_register(
            function ($clase) {
                $ruta = str_replace("\\", "/", $clase) . ".php";
                include_once $ruta;
            }
        );
    }

    public static function runAdmin()
    {
        session_start();
        define('URL', "http://".$_SERVER['HTTP_HOST']."/cms-webapp/admin");
        require_once "../Clases/Zebra_Image.php";
        spl_autoload_register(
            function ($clase) {
                $ruta = str_replace("\\", "/", $clase) . ".php";
                include_once "../" . $ruta;
            }
        );
    }
}
