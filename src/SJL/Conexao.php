<?php

namespace SJL;

class Conexao {

    public static $db = [
        "stringDB" => "mysql",
        "host"     => "localhost",
        "banco"    => "poo",
        "usuario"  => "root",
        "senha"    => "371257"
    ];

    public static function DBConect(){
        $dsn = self::$db['stringDB'] . ":dbname=" . self::$db['banco'] . ";host=" . self::$db['host'] . ";charset=utf8";
        $user = self::$db['usuario'];
        $password = self::$db['senha'];

        try{
            $con = new \PDO($dsn, $user, $password);
            return $con;
        }
        catch(\PDOException $e){
            die("Falha na conexão com o banco de dados <br />"
                ."código : ".$e->getCode()."<br />"
                ."Mensagem : ".$e->getMessage());
        }
    }
}
?>