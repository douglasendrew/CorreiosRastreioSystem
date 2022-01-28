<?php 

    namespace SimpleWork\Framework\Models;

    use SimpleWork\Framework\Models\MainModel as Db;

    class usuariosModel
    {
        
        public function ususariosList()
        {
            $usuarios = Db::delete("usuarios", ["id" => 3]);
            return $usuarios;
        }

    }