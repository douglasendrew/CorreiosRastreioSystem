<?php 

    namespace SimpleWork\Framework\Database;

    use SimpleWork\Framework\Database\Db;

    class Crud {

        public static function select(array $item, $from, array $where, array $orderby)
        {

            if (!empty($item) and !empty($from)) {

                $campos = "";
                $counterCampos = 0;

                foreach ($item as $campo) {

                    $counterCampos++;
                    if (count($item) == $counterCampos) {

                        $campos .= $campo;

                    } else {

                        $campos .= $campo . ",";

                    }

                }

                if($where != null)
                {

                    $whereText = "WHERE ";
                    $counter = 0;
        
                    foreach ($where as $key => $value) {
        
                        $counter++;
                        if (count($where) == $counter) {
        
                            $whereText .= " " . $key . " = '" . $value . "'";
        
                        } else {
        
                            $whereText .= $key . " = '" . $value . "' AND ";
        
                        }
        
                    }


                }

                $whereText = (empty($whereText)) ? "": $whereText;
                $sql = "SELECT $campos FROM $from $whereText";

                if($orderby != null)
                {
                    foreach ( $orderby as  $key => $order )
                    {
                        $sql .= "ORDER BY $key $order";
                    }
                    
                }

                $insert = Db::db_connect()->prepare($sql);

                if ($insert->execute()) {

                    if ($insert->rowCount() > 0) {

                        return $insert;

                    } else {

                        echo "Nenhum resultado foi encontrado";
                        exit;

                    }

                } else {

                    return false;
                    exit;

                }
            } else {
                echo "Todos paramentros precisam ser preenchidos";
                exit;
            }

        }

        public static function insert($table, array $campos, array $valores)
        {

            if (!empty($table) and !empty($campos) and !empty($valores)) {

                $camposPreencher = "";
                $counterCampos = 0;

                foreach ($campos as $campo) {

                    $counterCampos++;
                    if (count($campos) == $counterCampos) {

                        $camposPreencher .= $campo;

                    } else {

                        $camposPreencher .= $campo . ",";

                    }

                }

                $valoresCampos = "";
                $counter = 0;

                foreach ( $valores as $key ) {

                    $counter++;
                    if (count($valores) == $counter) {

                        $valoresCampos .= "'" . $key . "'";

                    } else {

                        $valoresCampos .= "'". $key . "',";

                    }

                }

                $exec = Db::db_connect()->prepare("INSERT INTO $table ($camposPreencher) VALUES ($valoresCampos)");

                if ($exec->execute()) {

                    return "Incluido com sucesso";

                } else {

                    return "Não foi possível inserir os dados, verifique se você preencheu corretamente";

                }

            } else {

                return "Todos paramentros precisam ser preenchidos";

            }

        }


        // 
        // Uso: Db::update("Tabela ser atualizada", ["campos a serem atualizados"], ["valores das condições (WHERE)"]);
        // Exemplo: Db::update("usuarios", ["email" => "teste@teste.com"], ["id" => "1"]); 
        //
        public static function update($table, array $set, array $where)
        {

            // Verifica se todos parametros foram preenchidos
            if (!empty($table) and !empty($set) and !empty($where)) {

                // Pegar valores do where
                $whereText = "";
                $counter = 0;
                foreach ($where as $key => $value) {
                    $counter++;
                    if (count($where) == $counter) {
                        $whereText .= " " . $key . " = '" . $value . "'";
                    } else {
                        $whereText .= $key . " = '" . $value . "' AND ";
                    }
                }

                // Pegar valores do set
                $setText = "";
                $counter2 = 0;
                foreach ($set as $key => $value) {
                    $counter2++;
                    if (count($set) == $counter2) {
                        $setText .= " " . $key . " = '" . $value . "'";
                    } else {
                        $setText .= $key . " = '" . $value . "', ";
                    }
                }

                $teste = Db::db_connect()->prepare("UPDATE $table SET $setText WHERE $whereText");

                if ($teste->execute()) {
                    if ($teste->rowCount() > 0) {
                        return $teste;
                    } else {
                        return "Nenhum resultado foi encontrado";
                    }
                } else {
                    return "Consulta não realizada, verifique se você preencheu corretamente";
                }

            } else {
                return "Todos paramentros precisam ser preenchidos";
            }

        }


        public static function delete( $from, array $where )
        {
            if (!empty($from)) {

                $delete_string_sql = "DELETE FROM $from";

                if($where != null)
                {

                    $whereText = " WHERE ";
                    $counter = 0;
                    foreach ($where as $key => $value) {
                        $counter++;
                        if (count($where) == $counter) {

                            $whereText .= " " . $key . " = '" . $value . "'";

                        } else {

                            $whereText .= $key . " = '" . $value . "' AND ";

                        }
                    }

                    $delete_string_sql .= $whereText;

                }

                $teste = Db::db_connect()->prepare($delete_string_sql);

                if ($teste->execute()) {

                    if ($teste->rowCount() > 0) {

                        return "Excluido com sucesso";

                    } else {

                        return "Nenhum resultado foi encontrado";

                    }

                } else {

                    return "Consulta não realizada, verifique se você preencheu corretamente";

                }

            } else {

                return "Todos paramentros precisam ser preenchidos";

            }
        }
    }