<?php

if(isset($_REQUEST['numLoteria']) && is_numeric($_REQUEST["numLoteria"])){
    $numLoteria = $_REQUEST['numLoteria'];
}else{
    die("Falta numero da loteria!");
}

if(isset($_REQUEST['grupo'])){
    $grupo = $_REQUEST['grupo'];
}else{
    die("Falta informar o grupo!");
}




$numParticipantes = 2410;
$numAreaRisco = 4;
$numCasas = 902;

include_once 'BD/conexao.php';
include_once 'model.php';
include_once 'aleatorio.php';
include_once 'aleatorioId.php';
include_once 'sorteio.php';
$bd = new Conexao();
$pdo = $bd->con();
$modal = new Model($pdo);
$sorteio = new Sorteio($pdo);


if($grupo=="ZERO"){
    $modal->updateLimpaSorteioAll();
    die("ok");
}




$aux = $numCasas;

$deficientes = ceil (3*$aux/100);

$idosos = ceil (3*$aux/100);

$aux2 = $aux - $deficientes - $idosos - $numAreaRisco;

$i = round(60*$aux2/100);

$ii = round(25*$aux2/100);

$iii = round(15*$aux2/100);

echo $deficientes."<br>";
echo $idosos."<br>";
echo $i."<br>";
echo $ii."<br>";
echo $iii."<br>";
echo $numAreaRisco."<br>";
echo "--------------<br>";
echo $deficientes+$idosos+$i+$ii+$iii+$numAreaRisco;


if($grupo == "deficientes"){
    $sorteio->updateLimpaSorteio($grupo);
    $sorteio->sorteia($grupo,$deficientes,$grupo);
}

if($grupo == "idosos"){
    $sorteio->updateLimpaSorteio($grupo);
    $sorteio->sorteia($grupo,$idosos,$grupo);
}

if($grupo == "i"){
    $sorteio->updateLimpaSorteio($grupo);
    $sorteio->sorteia($grupo,$i,$grupo);
}

if($grupo == "ii"){
    $sorteio->updateLimpaSorteio($grupo);
    $sorteio->sorteia($grupo,$ii,$grupo);
}

if($grupo == "iii"){
    $sorteio->updateLimpaSorteio($grupo);
    $sorteio->sorteia($grupo,$iii,$grupo);
}



echo "ok";