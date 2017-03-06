<?php
/**
 * Created by PhpStorm.
 * User: neex
 * Date: 02/03/2017
 * Time: 10:39
 */

class NumeroAleatorio{
    private $a;
    private $var1;
    private $var2;
    private $total;

    function __construct($inicio, $quantidade){
        $this->var1 = $inicio;
        $this->var2 = $inicio+$quantidade;
        $this->total = $quantidade;
        $this->a[0]=0;
    }

    private function unico($num)
    {

        if(in_array($num, $this->a)){
            return true;
        }
        return false;
    }

    private function geraNumero($i){
        $num  = rand($this->var1, $this->var2);
        if($this->unico($num)){
            $this->geraNumero($i);
        }else{
            $this->a[$i] = $num;
        }
    }

    function gerar(){
        for($i=0;$i< $this->total;$i++){
            $this->geraNumero($i);
        }
        return $this->a;
    }

}
