<?php
include_once 'config.php';
    
class Conexao {
   public static $PDO;
    function con(){
        if(!self::$PDO){
            try{
                self::$PDO = new PDO( "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            }catch ( PDOException $e ){
                echo "Erro ao conectar com o MySQL: " . $e->getMessage();
                exit();
            }
        }
        return self::$PDO;
    }
}