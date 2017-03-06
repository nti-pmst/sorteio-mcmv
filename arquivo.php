<?php

class Arquivo
{
    function ler($arquivo)
    {
        $handle = @fopen($arquivo, "r");
        if ($handle) {
            $i = 0;
            while (!feof($handle)) {

                try {
                    $b[$i] = fgets($handle);
                } catch (Exception $e) {
                    fclose($handle);
                }
                $i++;
            }
            fclose($handle);
            return $b;

        }
    }

    function escreve($st, $nome)
    {
        $fp = fopen($nome, 'w');
        fwrite($fp, $st);
        fclose($fp);
    }

    function delete($nome){
        if (file_exists($nome)) {
            unlink($nome);
        }
    }

}




