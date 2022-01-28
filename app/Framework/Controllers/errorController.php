<?php

    namespace SimpleWork\Framework\Controllers;

    use SimpleWork\Framework\Page\Site;


    class errorController extends MainController
    {

        public function error404()
        {
            
            Site::page_name("404");
            $this->view("error/404.php");

        }

        public function errorRotas()
        {

            Site::page_name("Rotas error");
            $this->view("error/noRotas.php");

        }

    }