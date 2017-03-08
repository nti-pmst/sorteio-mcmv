<?php
header("Access-Control-Allow-Origin: *");
if (isset($_REQUEST['grupo'])) {
    $grupo = $_REQUEST['grupo'];
    include_once 'model.php';
    include_once 'BD/conexao.php';
    $bd = new Conexao();
    $pdo = $bd->con();
    $modal = new Model($pdo);
    $sql = "SELECT * FROM grupo" . $grupo . " WHERE contemplacao='" . $grupo . "' ORDER BY numeroUnico ASC";

    $r = $modal->busca($sql);


    $sql = "SELECT * FROM sorteio WHERE grupo = '" . $grupo . "' ORDER BY id_sorteio DESC";

    $d = $modal->busca($sql);



    $j['data'] = $d[0]['data'];
    $j['grupo'] = $r;
    $json = json_encode($j);
    echo $json;
}