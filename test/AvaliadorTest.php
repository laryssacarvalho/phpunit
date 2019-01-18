<?php
    require "Usuario.php";
    require "Leilao.php";
    require "Lance.php";
    require "Avaliador.php";

    class AvaliadorTest extends PHPUnit\Framework\TestCase{
        public function testDeveAceitarLancesEmOrdemDecrescente(){
            $leilao = new Leilao("Playstation 4");
            $renan = new Usuario("Renan");
            $caio = new Usuario("Caio");
            $felipe = new Usuario("Felipe");
            
            $leilao->propoe(new Lance($felipe, 250));
            $leilao->propoe(new Lance($renan, 400));
            $leilao->propoe(new Lance($caio, 350));

            $leiloeiro = new Avaliador();
            $leiloeiro->avalia($leilao);

            $maiorEsperado = 400;
            $menorEsperado = 250;

            $this->assertEquals($maiorEsperado, $leiloeiro->getMaiorLance());
            $this->assertEquals($menorEsperado, $leiloeiro->getMenorLance());
        }

        public function testCalcularMediaDosLances(){
            $leilao = new Leilao("Playstation 4");
            $renan = new Usuario("Renan");
            $caio = new Usuario("Caio");
            $felipe = new Usuario("Felipe");
            
            $leilao->propoe(new Lance($felipe, 250));
            $leilao->propoe(new Lance($renan, 400));
            $leilao->propoe(new Lance($caio, 350));

            $leiloeiro = new Avaliador();
            $leiloeiro->avalia($leilao);

            $mediaEsperada = 333.333;

            $this->assertEquals($mediaEsperada, $leiloeiro->getMedia(), 0,001);
        }
    }