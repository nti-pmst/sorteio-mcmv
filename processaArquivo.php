<?php
/**
 * Created by PhpStorm.
 * User: neex
 * Date: 28/02/2017
 * Time: 12:33
 */

include_once  'arquivo.php';
include_once 'BD/conexao.php';
include_once 'model.php';

$arquivo = new Arquivo();
$bd = new Conexao();
$pdo = $bd->con();
$file = "arquivos/5.csv";
$modal = new Model($pdo);
$tabela = $arquivo->ler($file);
$i=0;
foreach ($tabela as $t){
    if($i>4){
        echo $t."<br>";
        $pessoa = explode(";",$t);
        $sucess = $modal->insert("pessoas",$pessoa);
        if($sucess != 'ok'){
            var_dump($sucess);
            die();
        }
    }
    $i++;
}
