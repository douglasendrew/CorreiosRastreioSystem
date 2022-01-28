<?php

    // MVC Url: http://www.exemplo.com/controlador/ação/parametro1/parametro2/etc…
    namespace SimpleWork\Core;

    use SimpleWork\Framework\Routes\Rotas;

    class Run
    {

        private static $includes = array();
        private static $tipo_requisicao;
        private static $rota;

        public static function init()
        {

            self::$tipo_requisicao = $_SERVER['REQUEST_METHOD'];

            // Pegar informações da URL
            if (isset($_GET['pag'])) {
                $url = $_GET['pag'];
            }

            if (!empty($url)) {
                $url = explode("/", $url);

                $controller = $url[0] . "Controller";
                array_shift($url);

                if (isset($url[0]) && !empty($url[0])) {
                    $metodo = $url[0];
                    array_shift($url);
                } else {
                    $metodo = "index";
                }

                if (count($url) > 0) {
                    $parametros = $url;
                }
            } else {
                $controller = "homeController";
                $metodo = "index";
            }

            // Configurações das rotas
            if (isset($controller)) {

                $controller = str_replace("Controller", "", $controller);
                self::$rota = $controller;

                if (isset($metodo) and !empty($metodo)) {

                    self::$rota .= "/" . $metodo;

                    if (isset($parametros) and !empty($parametros)) {
                        self::$rota .= "/";
                    }
                }
            }

            $request_method = Rotas::get(self::$rota);

            if ($request_method != self::$tipo_requisicao) {


                if ($request_method == "PUT") {

                    if (!isset($parametros) or empty($parametros)) {
                        $controller = "errorController";
                        $metodo = "errorRotas";
                    }
                } else {

                    $controller = "errorController";
                    $metodo = "error404";
                }
            }

            $controller = $controller . "Controller";
            $dir = __DIR__ . "/../Framework/Controllers/" . $controller . ".php";

            if (file_exists($dir)) {

                require $dir;

                $class = "\SimpleWork\Framework\Controllers\ " . $controller;
                $class = str_replace(" ", "", $class);

                $instanc = new $class;

                if (method_exists($instanc, $metodo)) {

                    call_user_func_array(array($instanc, $metodo), array($parametros));
                } else {

                    $controller = "errorController";
                    $metodo = "error404";

                    $class = "\SimpleWork\Framework\Controllers\ " . $controller;
                    $class = str_replace(" ", "", $class);

                    $instanc = new $class;

                   
                    call_user_func_array(array($instanc, $metodo), array($parametros));

                    exit;
                }
            } else {

                $controller = "errorController";
                $metodo = "error404";

                $class = "\SimpleWork\Framework\Controllers\ " . $controller;
                $class = str_replace(" ", "", $class);

                $instanc = new $class;

                call_user_func_array(array($instanc, $metodo), array($parametros));

                exit;
            }
        }

        public static function loadIncludes()
        {
            require __DIR__ . "/../Config/Includes.php";
        }

        public static function include($arq_name, $arq_type)
        {

            $dir = "includes/" . strtolower($arq_type) . "/" . $arq_name;

            if (file_exists($dir)) {
                if (strtolower($arq_type) == "js") {
                    echo '<script src="' . $dir . '"></script>';
                } else if (strtolower($arq_type) == "css") {
                    echo '<link rel="stylesheet" href="' . $dir . '">';
                } else {
                    require $dir;
                }
            }
        }

        public static function url_include($url, $type_arquivo)
        {
            if (strtolower($type_arquivo) == "js") {
                echo '<script src="' . $url . '"></script>';
            } else if (strtolower($type_arquivo) == "css") {
                echo '<link rel="stylesheet" href="' . $url . '">';
            }
        }

        public static function dir_include($arq_dir, $arq_type)
        {

            require __DIR__ . "/../../includes/" . strtolower($arq_type) . "/" . $arq_dir;
        }
    }
