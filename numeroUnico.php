<?php
include_once "aleatorio.php";
include_once "arquivo.php";
include_once  "model.php";
include_once "BD/conexao.php";
class NumeroUnico
{
    private $arquivo;
    private $modal;
    function __construct()
    {
        $this->arquivo = new Arquivo();
        $con = new Conexao();
        $pdo = $con->con();
        $this->modal = new Model($pdo);
    }

    function numeros($inicio, $quantidade)
    {
        $file = "numeroUnico";
        if (!file_exists($file)) {
           $this->setNumeroUnico($inicio,$quantidade);
        }
    }

   private function getNumeroUnico(){
        $numJson = $this->arquivo->ler("numeroUnico");
        $num = json_decode($numJson[0],true);
        return $num;
   }

   private function setNumeroUnico($inicio,$quantidade){
       $aleatorio = new NumeroAleatorio($inicio,$quantidade);
       $nums = $aleatorio->gerar();
       $numsJson = json_encode($nums);
        $this->arquivo->escreve($numsJson,"numeroUnico");
   }

   function atualizaNumeroUnico($a){
       $aJson = json_encode($a);
       $this->arquivo->escreve($aJson,"numeroUnico");
   }

   function atribuiNumeroUnico($grupo){
       $this->devolveArray($grupo);
       $numUnico = $this->getNumeroUnico();
       $sql = "SELECT id_pessoas FROM grupo".$grupo." WHERE contemplacao = '0'";
       $r = $this->modal->busca($sql);
       shuffle($numUnico);
       foreach ($r as $p){
            $numU = $numUnico[0];
            array_shift($numUnico);
            @$this->modal->updateNumeroUnico($numU,$p['id_pessoas']);
       }

           $this->atualizaNumeroUnico($numUnico);

   }

   function devolveArray($grupo){
       $numUnico = $this->getNumeroUnico();
       $sql = "SELECT * FROM grupo".$grupo." WHERE contemplacao = '0' AND numeroUnico <> '0'";
       $r = $this->modal->busca($sql);
       foreach ($r as $p){
           array_push($numUnico,$p['numeroUnico']);
       }
       $this->atualizaNumeroUnico($numUnico);
   }
}