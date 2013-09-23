<?php

// Utilize este arquivo para testar rapidamente a classe pela linha de comando

require_once 'Troco.php';

$troco = new Troco();

$notas = $troco->getQtdeNotas(289.99);

print_r($notas);
