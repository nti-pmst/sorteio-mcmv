<?php
/**
 * Created by PhpStorm.
 * User: neex
 * Date: 28/02/2017
 * Time: 12:42
 */
class Model{
    public $pdo;
    function  __construct($pdo){
        $this->pdo = $pdo;
    }

    function insert($tabela,$list){
        $PDO = $this->pdo;
        $sql = "INSERT INTO `".$tabela."` (`nome`, `nis`, `a`, `b`, `c`, `d`, `e`, `f`, `idade`, `deficiencia`, `criterios`) VALUES (:nome, :nis, :a, :b, :c, :d, :e, :f,  :idade, :deficiencia, :criterios)";
        $stmt = $PDO->prepare( $sql );
        $stmt->bindParam( ":nome", $list[0] );
        $stmt->bindParam( ":nis", $list[1] );
        $stmt->bindParam( ":a", $list[2] );
        $stmt->bindParam( ":b", $list[3] );
        $stmt->bindParam( ":c", $list[4] );
        $stmt->bindParam( ":d", $list[5] );
        $stmt->bindParam( ":e", $list[6] );
        $stmt->bindParam( ":f", $list[7] );
        $stmt->bindParam( ":idade", $list[11] );
        $stmt->bindParam( ":deficiencia", $list[9] );
        $stmt->bindParam( ":criterios", $list[13] );

        $result = $stmt->execute();
        if(! $result){
            return $stmt->errorInfo();
        }else{
            return "ok";
        }
    }

    function busca($sql){
        $PDO = $this->pdo;
        $result = $PDO->query( $sql );
        $rows = $result->fetchAll( PDO::FETCH_ASSOC );
        return $rows;
    }

    function updateNumeroUnico($numero,$id){
        $PDO = $this->pdo;
        $sql = "UPDATE pessoas SET numeroUnico = :numero WHERE id_pessoas = :id";

        $stmt = $PDO->prepare( $sql );

        $stmt->bindParam( ":numero", $numero );
        $stmt->bindParam( ":id", $id);
        $result = $stmt->execute();
        if(! $result){
            die($stmt->errorInfo());
            return $stmt->errorInfo();
        }else{
            return "ok";
        }
    }

    function updateSorteio($id,$grupo){
        $PDO = $this->pdo;
        $sql = "UPDATE pessoas SET contemplacao = :contemplacao WHERE id_pessoas = :id";

        $stmt = $PDO->prepare( $sql );

        $stmt->bindParam( ":contemplacao", $grupo );
        $stmt->bindParam( ":id", $id);
        $result = $stmt->execute();
        if(! $result){
            die($stmt->errorInfo());
            return $stmt->errorInfo();
        }else{
            return "ok";
        }
    }

    function updateLimpaSorteio($grupo){
        $PDO = $this->pdo;
        $sql = "UPDATE pessoas SET contemplacao = '0' WHERE contemplacao = :contemplacao";

        $stmt = $PDO->prepare( $sql );
        $stmt->bindParam( ":contemplacao", $grupo );
        $result = $stmt->execute();
        if(! $result){
            die($stmt->errorInfo());
            return $stmt->errorInfo();
        }else{
            return "ok";
        }
    }

    function updateLimpaSorteioAll(){
        $PDO = $this->pdo;
        $sql = "UPDATE pessoas SET contemplacao = '0', numeroUnico = '0' WHERE 1";

        $stmt = $PDO->prepare( $sql );
        $result = $stmt->execute();
        if(! $result){
            die($stmt->errorInfo());
            return $stmt->errorInfo();
        }else{
            return "ok";
        }
    }

    function insertSorteio($grupo,$json){
        $PDO = $this->pdo;
        $sql = "INSERT INTO sorteio (grupo, data, json) VALUES (:grupo, :data, :json)";

        date_default_timezone_set("America/Sao_Paulo");
        setlocale(LC_ALL, 'pt_BR');
        $data = date("YmdHis");
        $stmt = $PDO->prepare( $sql );
        $stmt->bindParam( ":grupo", $grupo );
        $stmt->bindParam( ":data", $data );
        $stmt->bindParam( ":json", $json );
        $result = $stmt->execute();
        if(! $result){
            die($stmt->errorInfo());
            return $stmt->errorInfo();
        }else{
            return "ok";
        }
    }


}