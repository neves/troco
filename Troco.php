<?php

/**
 * Class Troco
 * Classe para calcular a quantidade de notas necessárias para um determinado valor em Reais.
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
    * Dado um valor em reais, retorna a quantidade de notas necessárias para formar o troco.
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
           foreach ($qtdeNotas as $key => $value)
           {
               while ($valorTotal < $reais)
               {
                    if ($valorTotal + $key <= $reais && $nDisp[$key] > 0)
                    {
                        $valorTotal += $key;
                        $qtdeNotas[$key] ++;
                        $nDisp[$key] --;
                    }
                    else
                    {
                        break;
                    }
                }
            }
          
            /*
            * Se ap�s a utiliza��o de todas as notas dispon�veis o valor ainda n�o
            * for alcan�ado d� o erro.
            */
            If($valorTotal < $reais)
            {
                // Cria o erro.
                throw new RuntimeException("<b>Aten��o: Notas insuficientes</b>");
            }
          }
          catch (RuntimeException $rex)
          {
              // Apresenta a mesagem de erro e sai da fun��o.
              die($rex->getMessage());
          }
          return $qtdeNotas;
    }
}
?>

