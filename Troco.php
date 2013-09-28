<?php

/**
 * Class Troco
 * Classe para calcular a quantidade de notas necessÃ¡rias para um determinado valor em Reais.
 * Suporta centavos.
 */
class Troco
{
    /*
     * Dado um valor em reais, retorna a quantidade de notas necessÃ¡rias para formar o troco.
     *
     * @param $reais Valor em reais, podendo conter centavos.
     * @return array Quantidade de notas, indexada pelo seu valor.
     */
    public function getQtdeNotas($reais)
    {   $valorTotal = 0;
        $qtdeNotas = array( "100" => 0,
                            "50" => 0,
                            "20" => 0,
                            "10" => 0,
                            "5" => 0,
                            "2" => 0,
                            "1" => 0,
                            "0.5" => 0,
                            "0.25" => 0,
                            "0.1" => 0,
                            "0.01" => 0,);
            //Array com as notas Disponï¿½veis
                $nDisp = array( "100" => 3,
                            "50" => 4,
                            "20" => 6,
                            "10" => 9,
                            "5" => 6,
                            "2" => 8,
                            "1" => 10,
                            "0.5" => 5,
                            "0.25" => 10,
                            "0.1" => 12,
                            "0.01" => 25,);



       /*While responsavel por incrementar as notas
         ate que a quantidade chegue no valor desejado. */

        do{
            if ($valorTotal + 100 <= $reais && $nDisp["100"] > 0)
             {
                $valorTotal += 100;
                $qtdeNotas["100"] += 1;
                $nDisp["100"] -= 1;
             }
             ElseIf ($valorTotal + 50 <= $reais && $nDisp["50"] > 0)
             {
                $valorTotal += 50;
                $qtdeNotas["50"] += 1;
                $nDisp["50"] -= 1;
             }
             ElseIf ($valorTotal + 20 <= $reais && $nDisp["20"] > 0)
             {
                $valorTotal += 20;
                $qtdeNotas["20"] += 1;
                $nDisp["20"] -= 1;
             }
             ElseIf ($valorTotal + 10 <= $reais && $nDisp["10"] > 0)
             {
                $valorTotal += 10;
                $qtdeNotas["10"] += 1;
                $nDisp["10"] -= 1;
             }
             ElseIf ($valorTotal + 5 <= $reais && $nDisp["5"] > 0)
             {
                $valorTotal += 5;
                $qtdeNotas["5"] += 1;
                $nDisp["5"] -= 1;
             }
             ElseIf ($valorTotal + 2 <= $reais && $nDisp["2"] > 0)
             {
                $valorTotal += 2;
                $qtdeNotas["2"] += 1;
                $nDisp["2"] -= 1;
             }
             ElseIf ($valorTotal + 1 <= $reais && $nDisp["1"] > 0)
             {
                $valorTotal += 1;
                $qtdeNotas["1"] += 1;
                $nDisp["1"] -= 1;
             }
             ElseIf ($valorTotal + 0.5 <= $reais && $nDisp["0.5"] > 0)
             {
                $valorTotal += 0.5;
                $qtdeNotas["0.5"] += 1;
                $nDisp["0.5"] -= 1;
             }
             ElseIf ($valorTotal + 0.25 <= $reais && $nDisp["0.25"] > 0)
             {
                $valorTotal += 0.25;
                $qtdeNotas["0.25"] += 1;
                $nDisp["0.25"] -= 1;
             }
             ElseIf ($valorTotal + 0.1 <= $reais && $nDisp["0.1"] > 0)
             {
                $valorTotal += 0.1;
                $qtdeNotas["0.1"] += 1;
                $nDisp["0.1"] -= 1;
             }
             ElseIf ($valorTotal + 0.01 <= $reais && $nDisp["0.01"] > 0)
             {
                $valorTotal += 0.01;
                $qtdeNotas["0.01"] += 1;
                $nDisp["0.01"] -= 1;
             }
             ElseIf ($valorTotal < $reais)
             {
               throw new Exception('Notas insuficientes');
             }
        }  while ($valorTotal<$reais) ;
          return $qtdeNotas;
    }
}
?>
