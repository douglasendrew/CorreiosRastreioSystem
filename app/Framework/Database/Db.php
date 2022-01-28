<?php

    namespace SimpleWork\Framework\Database;

    use SimpleWork\Framework\Database\Crud;
    use PDOException;
    use PDO;

    class Db extends Crud
    {

        public static $host;
        public static $user;
        public static $pass;
        public static $db_type;
        public static $db_name;

        public function __construct()
        {
            return self::load();
        }

        public static function load()
        {
            require __DIR__ . "/../../Config/database.php";
        }

        public static function set($cred_type, $value)
        {

            if (strtolower($cred_type) == "host") {
                
                self::$host = $value;

            } else if (strtolower($cred_type) == "user") {
                
                self::$user = $value;

            } else if (strtolower($cred_type) == "pass") {
                
                self::$pass = $value;

            } else if (strtolower($cred_type) == "dbtype") {
                
                self::$db_type = $value;

            } else if (strtolower($cred_type) == "dbname") {
                
                self::$db_name = $value;

            } else {

                return false;
            }

        }

        public static function db_connect()
        {

            self::load();

            if(empty(self::$host) or empty(self::$user) or empty(self::$db_type) or empty(self::$db_name) )
            {
   
                echo "Erro! Verifique se você forneceu todas credenciais do banco de dados";
                return false;
                exit;

            }else {

                try {
        
                    $pdo = new PDO(self::$db_type . ":host=" . self::$host . ";dbname=" . self::$db_name, self::$user, self::$pass);

                    return $pdo;

                } catch (PDOException $e) {

                    echo "Erro! Ocorreu um erro ao se conectar ao banco de dados: <code> ".$e->getMessage()." </code>";
                    return false;
                    exit;

                }

            }

        }

    }

?>