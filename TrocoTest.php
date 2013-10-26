<?php

require_once 'Troco.php';

/**
 * Class TrocoTest
 * Teste unitário para a classe Troco.
 * Executar na linha de comando utilizando: php phpunit.phar TrocoTest.php
 */
class TrocoTest extends PHPUnit_Framework_Testcase
{
    /**
     * @var Troco
     */
    protected $troco;

    public function setUp()
    {
        $this->troco = new Troco();
    }

    //Para 100 reais o vetor na posição 100 deve ser 1
    public function test100()
    {
        $notas = $this->troco->getQtdeNotas(100);
        $this->assertEquals(1, $notas["100"]);
    }

    //Para 50 reais o vetor na posição 50 deve ser 1
    public function test50()
    {
        $notas = $this->troco->getQtdeNotas(50);
        $this->assertEquals(1, $notas["50"]);
    }
    
    //Para 0.1 reais o vetor na posição 0.1 deve ser 1
    public function test0Virgula1()
    {
        $notas = $this->troco->getQtdeNotas(0.1);
        $this->assertEquals(1, $notas["0.1"]);
    }
    
    //Para 20 reais o vetor na posição 20 deve ser 1
    public function test20()
    {
        $notas = $this->troco->getQtdeNotas(20);
        $this->assertEquals(1, $notas["20"]);
    }
    
    //Para 1000 reais o vetor na posição 100 deve ser 10
    public function test1000()
    {
        $notas = $this->troco->getQtdeNotas(1000);
        $this->assertEquals(10, $notas["100"]);
    }

    //Para 0 Reais, a quantidade de notas deve ser zero para todas.
    public function testZero()
    {
        $notas = $this->troco->getQtdeNotas(0);

        $resultadoEsperado = [
            "100"  => 0,
            "50"   => 0,
            "20"   => 0,
            "10"   => 0,
            "5"    => 0,
            "2"    => 0,
            "1"    => 0,
            "0.5"  => 0,
            "0.25" => 0,
            "0.1"  => 0,
            "0.01" => 0,
        ];

        $this->assertEquals($resultadoEsperado, $notas);
    }
    
    /*
     * Para 379 Reais, a quantidade de notas deve ser: 3 na posição 100
                                                       1 na posição 50
                                                       1 na posição 20
                                                       1 na posição 5
                                                       2 na posição 2
    */
    public function test379()
    {
        $notas = $this->troco->getQtdeNotas(379);

        $resultadoEsperado = [
            "100"  => 3,
            "50"   => 1,
            "20"   => 1,
            "10"   => 0,
            "5"    => 1,
            "2"    => 2,
            "1"    => 0,
            "0.5"  => 0,
            "0.25" => 0,
            "0.1"  => 0,
            "0.01" => 0,
        ];

        $this->assertEquals($resultadoEsperado, $notas);
    }
    
    /*
     * Para 379 Reais, a quantidade de notas deve ser: 1 na posição 20
                                                       1 na posição 10
                                                       1 na posição 2
                                                       1 na posição 1
                                                       1 na posição 0.5
    */
    public function test33Virgula5()
    {
        $notas = $this->troco->getQtdeNotas(33.5);

        $resultadoEsperado = [
            "100"  => 0,
            "50"   => 0,
            "20"   => 1,
            "10"   => 1,
            "5"    => 0,
            "2"    => 1,
            "1"    => 1,
            "0.5"  => 1,
            "0.25" => 0,
            "0.1"  => 0,
            "0.01" => 0,
        ];

        $this->assertEquals($resultadoEsperado, $notas);
    }

    /*
     * Para 379 Reais, a quantidade de notas deve ser: 1 na posição 10
                                                       1 na posição 5
                                                       1 na posição 0.25
    */
    public function test15Virgula25()
    {
        $notas = $this->troco->getQtdeNotas(15.25);

        $resultadoEsperado = [
            "100"  => 0,
            "50"   => 0,
            "20"   => 0,
            "10"   => 1,
            "5"    => 1,
            "2"    => 0,
            "1"    => 0,
            "0.5"  => 0,
            "0.25" => 1,
            "0.1"  => 0,
            "0.01" => 0,
        ];

        $this->assertEquals($resultadoEsperado, $notas);
    }
    
    /*
     * Para 379 Reais, a quantidade de notas deve ser: 1 na posição 1
                                                       1 na posição 0.1
                                                       1 na posição 0.01
    */
    public function test1Virgula11()
    {
        $notas = $this->troco->getQtdeNotas(1.11);

        $resultadoEsperado = [
            "100"  => 0,
            "50"   => 0,
            "20"   => 0,
            "10"   => 0,
            "5"    => 0,
            "2"    => 0,
            "1"    => 1,
            "0.5"  => 0,
            "0.25" => 0,
            "0.1"  => 1,
            "0.01" => 1,
        ];

        $this->assertEquals($resultadoEsperado, $notas);
    }
    
    /* Caso o valor informado por algum motivo ou erro seja negativo,
     * deve retornar zero para todas as posições
     */
    public function testMenosUm()
    {
        $notas = $this->troco->getQtdeNotas(-1);

        $resultadoEsperado = [
            "100"  => 0,
            "50"   => 0,
            "20"   => 0,
            "10"   => 0,
            "5"    => 0,
            "2"    => 0,
            "1"    => 0,
            "0.5"  => 0,
            "0.25" => 0,
            "0.1"  => 0,
            "0.01" => 0,
        ];

        $this->assertEquals($resultadoEsperado, $notas);
    }
    
    /**
     * Com nenhuma disponibilidade de notas, deve gerar uma exceção
     * @expectedException RuntimeException
     */
    public function testException()
    {
        $this->troco->Disp = [
            "100" => 0,
            "50" => 0,
            "20" => 0,
            "10" => 0,
            "5" => 0,
            "2" => 0,
            "1" => 0,
            "0.5" => 0,
            "0.25" => 0,
            "0.1" => 0,
            "0.01" => 0
        ];
        $this->troco->getQtdeNotas(100);

    }
}
