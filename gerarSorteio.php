<?php
header("Access-Control-Allow-Origin: *");
include_once 'numeroUnico.php';
include_once "arquivo.php";
include_once 'sorteio.php';

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

if($grupo=="ZERO"){
    $modal->updateLimpaSorteioAll();
    $arquivo = new Arquivo();
    $arquivo->delete("numeroUnico");
    die("ok");
}

$numParticipantes = 2410;
$numAreaRisco = 4;
$numCasas = 902;


$numeroUnico = new NumeroUnico();

$num = $numeroUnico->numeros($numLoteria,$numParticipantes);


$numeroUnico->atribuiNumeroUnico($grupo);

$aux = $numCasas;

$deficientes = ceil (3*$aux/100);

$idosos = ceil (3*$aux/100);

$aux2 = $aux - $deficientes - $idosos - $numAreaRisco;

$i = round(60*$aux2/100);

$ii = round(25*$aux2/100);

$iii = round(15*$aux2/100);



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




/**
 * Created by PhpStorm.
 * User: neex
 * Date: 06/03/2017
 * Time: 00:08
 */