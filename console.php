<?php

// Utilize este arquivo para testar rapidamente a classe pela linha de comando

require_once 'Troco.php';
$reais = $argv[1] ?: 0;
$troco = new Troco();

/*
 * Abaixo segue a variável com as notas necessárias.
 * Se for informada a classe utiliza para fazer o cálculo,
 * caso contrário ela utiliza um array infinito.
$troco->Disp = array( "100" => 3,
                       "50" => 0,
                       "20" => 0,
                       "10" => 1,
                        "5" => 0,
                        "2" => 0,
                        "1" => 0,
                      "0.5" => 0,
                     "0.25" => 0,
                      "0.1" => 0,
                     "0.01" => 0);  */

                     
$notas = $troco->getQtdeNotas($reais);

print_r($notas);
?>
