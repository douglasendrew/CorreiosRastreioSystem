<?php

    namespace SimpleWork\Framework\Controllers;

    use SimpleWork\Framework\Database\Db;
    use SimpleWork\Framework\Models\usuariosModel as Usuarios;
    use SimpleWork\Framework\Page\Site;

    class homeController extends MainController
    {

        public function index()
        {
            Site::page_name("Home");
            $this->view("home/homeView");
        }

    }