<?php 

    namespace SimpleWork\Framework\Models;

    use SimpleWork\Framework\Models\MainModel as Db;

    class homeModel 
    {

        private static $result_sql; 
        
        public static function listEncomendas()
        {
            self::$result_sql = Db::select(["*"], "correspondencias", [], []);
        }

        public static function newEncomenda( array $encomenda )
        {
            self::$result_sql = Db::insert("correspondencias", [], []);
        }

        public static function delEncomenda( $id_encomenda )
        {
            self::$result_sql = Db::delete(["correspondencias"], ["id" => $id_encomenda]);
        }

        public static function updateEncomenda( $id_encomenda, array $encomenda )
        {
            self::$result_sql = Db::update("correspondencias", [], ["id" => $id_encomenda]);
        }

    }