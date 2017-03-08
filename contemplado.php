<?php
header("Access-Control-Allow-Origin: *");
$reserva = 0;
$sqlReserva = "";
if (isset($_REQUEST['reserva'])) {
    $reserva = $_REQUEST['reserva'];
}
if (isset($_REQUEST['grupo'])) {
    $grupo = $_REQUEST['grupo'];
    include_once 'model.php';
    include_once 'BD/conexao.php';
    $bd = new Conexao();
    $pdo = $bd->con();
    $modal = new Model($pdo);
    if($reserva == 1){
        $sqlReserva = "' AND reserva = '1";
    }
    $sql = "SELECT * FROM pessoas WHERE contemplacao='" . $grupo .$sqlReserva. "' ORDER BY numeroUnico ASC";


    $r = $modal->busca($sql);


    $sql = "SELECT * FROM sorteio WHERE grupo = '" . $grupo . "' ORDER BY id_sorteio DESC";

    $d = $modal->busca($sql);

    $datas = $d[0]['data'];

    $data[0] = substr($datas, 0,4);
    $data[1]= substr($datas, 4,2);
    $data[2]= substr($datas, 6,2);
    $data[3] = substr($datas, 8,2);
    $data[4] = substr($datas, 10,2);
    $data[5] = substr($datas, 12,2);
    $datass = $data[1]."/".$data[2]."/".$data[0]." ".$data[3].":".$data[4].":".$data[5];


    $j['data'] = $datass;
    $j['grupo'] = $r;
    $json = json_encode($j);
    echo $json;
}