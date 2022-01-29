<?php 

    namespace SimpleWork\Framework\Models;

    use SimpleWork\Framework\Models\MainModel as Db;

    class homeModel 
    {

        private static $result_sql; 
        private static $encomendas;
        private static $time_now;
        
        public static function listEncomendas()
        {
            self::$result_sql = Db::select(["*"], "correspondencias", [], []);
            return self::$result_sql;
        }

        public static function newEncomenda( array $encomenda )
        {
            self::$encomendas = $encomenda;
            self::$time_now = time();
            self::$result_sql = Db::insert("correspondencias", ["nome_empresa", "ac", "cep", "endereco", "complemento", "pessoa_responsavel", "tipo_envio", "ar", "data_envio", "cod_rastreio", "usuario", "data_create", "data_update"], [self::$encomendas['empresa'], self::$encomendas['ac'], self::$encomendas['cep'], self::$encomendas['end_comp'], self::$encomendas['complem'], self::$encomendas['rsp_envio'], self::$encomendas['tipo_envio'], self::$encomendas['ar'], self::$encomendas['data_envio'], self::$encomendas['cod_rastr'], "", self::$time_now, self::$time_now]);     
            
            return self::$result_sql;
        }

        public static function delEncomenda( $id_encomenda )
        {
            self::$result_sql = Db::delete("correspondencias", ["id" => $id_encomenda]);
            return self::$result_sql;
        }

        public static function updateEncomenda( $id_encomenda, array $encomenda )
        {
            self::$result_sql = Db::update("correspondencias", [], ["id" => $id_encomenda]);
        }

    }