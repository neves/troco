<?php

/**
 * Class Troco
 * Classe para calcular a quantidade de notas necessÃ¡rias para um determinado valor em Reais.
 * Suporta centavos.
 */
class Troco
{
     //Array com as notas Disponiveis
     var $Disp = array( "100" => INF,
                            "50" => INF,
                            "20" => INF,
                            "10" => INF,
                            "5" => INF,
                            "2" => INF,
                            "1" => INF,
                            "0.5" => INF,
                            "0.25" => INF,
                            "0.1" => INF,
                            "0.01" => INF);
    /*
    * Dado um valor em reais, retorna a quantidade de notas necessÃ¡rias para formar o troco.
    *
    * @param $reais Valor em reais, podendo conter centavos.
    * @return array Quantidade de notas, indexada pelo seu valor.
    */
    public function getQtdeNotas($reais)
    {   $value;
        $key;
        $nDisp = $this->Disp;
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
                            "0.01" => 0);

        /*
        * Foreach + While responsaveis por incrementar as notas
        * ate que a quantidade chegue no valor desejado.
        */
        try
        {
           if($reais < 0)
              return $qtdeNotas;
           foreach ($qtdeNotas as $key => $value)
           {
               while ($valorTotal <= $reais)
               {
                    if ($valorTotal + $key <= $reais && ($nDisp[$key] > 0 || $nDisp[$key] == INF))
                    {
                        $valorTotal += $key;
                        $qtdeNotas[$key] ++;
                        If($nDisp[$key] != INF)
                           $nDisp[$key] --;
                    }
                    else
                    {
                        break;
                    }
                }
            }

            /*
            * Se após a utilização de todas as notas disponíveis o valor ainda não
            * for alcançado dá o erro.
            */
            If(number_format($valorTotal, 2, '.', '') != number_format($reais, 2, '.', ''))
            {
                // Cria o erro.
                throw new RuntimeException("Atencao: Notas insuficientes");
            }
          }
          catch (RuntimeException $rex)
          {
              // Apresenta a mesagem de erro e sai da função.
              die($rex->getMessage());
          }
          return $qtdeNotas;
    }
}
?>

