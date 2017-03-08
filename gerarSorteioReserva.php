<?php
header("Access-Control-Allow-Origin: *");
include_once 'numeroUnico.php';
include_once "arquivo.php";
include_once 'sorteioReserva.php';

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

$con = new Conexao();
$pdo = $con->con();
$modal = new Model($pdo);
$sorteio = new Sorteio($pdo);

$numeroUnico = new NumeroUnico();
if($grupo=="ZERO"){
    $numeroUnico->devolveArray("deficientes");
    $numeroUnico->devolveArray("idosos");
    $numeroUnico->devolveArray("i");
    $numeroUnico->devolveArray("ii");
    $numeroUnico->devolveArray("iii");
    $modal->updateLimpaSorteioAllReserva();
    die("ok");
}

$numParticipantes = 1512;




$num = $numeroUnico->numeros($numLoteria,$numParticipantes);


$numeroUnico->atribuiNumeroUnico($grupo);

$aux = $numCasas=269;

$deficientes = 8;

$idosos = 8;

//$aux2 = $aux - $deficientes - $idosos;

$i = 151;

$ii = 63;

$iii = 38;



if($grupo == "deficientes"){
    $sorteio->updateLimpaSorteioReserva($grupo);
    $sorteio->sorteia($grupo,$deficientes,$grupo);
}

if($grupo == "idosos"){
    $sorteio->updateLimpaSorteioReserva($grupo);
    $sorteio->sorteia($grupo,$idosos,$grupo);
}

if($grupo == "i"){
    $sorteio->updateLimpaSorteioReserva($grupo);
    $sorteio->sorteia($grupo,$i,$grupo);
}

if($grupo == "ii"){
    $sorteio->updateLimpaSorteioReserva($grupo);
    $sorteio->sorteia($grupo,$ii,$grupo);
}

if($grupo == "iii"){
    $sorteio->updateLimpaSorteioReserva($grupo);
    $sorteio->sorteia($grupo,$iii,$grupo);
}



echo "ok";
