<?php

// Utilize este arquivo para testar rapidamente a classe pela linha de comando

require_once 'NumeroExtenso.php';
$reais = $argv[1] ?: 0;
$extenso = new NumeroExtenso();

$result = $extenso->extenso($reais);

echo $result;
?>