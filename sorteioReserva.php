<?php
include_once 'model.php';
class Sorteio extends Model {
    function  __construct($pdo){
        $this->pdo = $pdo;
    }
    function sorteia($grupo,$quantidade,$contemplacao){
        $numero = new NumeroUnico();
        $sql = "SELECT * FROM grupo".$grupo." WHERE contemplacao = '0' ORDER BY numeroUnico ASC LIMIT 0,".$quantidade;
        $r = $this->busca($sql);
        $i=0;

        foreach ($r as $p){
            $this->updateSorteioReserva($p['id_pessoas'],$contemplacao);
            $p['contemplacao'] = $contemplacao;
            $salvaSorteio[$i] = $p;
            $i++;
        }
        if($i==0){
            $salvaSorteio[0]="";
        }
        $json = json_encode($salvaSorteio);
        $this->insertSorteio($grupo,$json);

        if(count($r)<$quantidade){
            $novaQuantidade = $quantidade - count($r);
            if($grupo == "i"){
                $novoGrupo = "ii";
            }elseif($grupo=="ii"){
                $novoGrupo = "iii";
            }
            $numero->atribuiNumeroUnico($novoGrupo);
            $this->sorteia($novoGrupo,$novaQuantidade,$grupo);
        }
    }
}