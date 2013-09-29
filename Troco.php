<?php

/**
 * Class Troco
 * Classe para calcular a quantidade de notas necessÃ¡rias para um determinado valor em Reais.
 * Suporta centavos.
 */
class Troco
{
    /**
     * Dado um valor em reais, retorna a quantidade de notas necessÃ¡rias para formar o troco.
     *
     * @param $reais Valor em reais, podendo conter centavos.
     * @return array Quantidade de notas, indexada pelo seu valor.
     */
     
    public function getQtdeNotas($reais)
    {   $v;
        $k;
        $valorTotal = 0;
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
        //Array com as notas Disponiveis
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

       /*
       * While responsavel por incrementar as notas
       * ate que a quantidade chegue no valor desejado.
       */
          foreach ($qtdeNotas as $k => $v)
          {
                while ($valorTotal<$reais)
                {
                      if ($valorTotal + $k <= $reais && $nDisp[$k] > 0)
                      {
                           $valorTotal += $k;
                           $qtdeNotas[$k] += 1;
                           $nDisp[$k] -= 1;
                      }
                      else
                      {
                           break;
                      }
                }
          }
          
          /*
          * Se após a utilização de todas as notas disponíveis o valor ainda não
          * for alcançado retorna notas insuficientes.
          */
          If($valorTotal<$reais)
          {
                return "<b>Atenção: Notas insuficientes</b>";
          }
          return $qtdeNotas;
    }
}
?>

