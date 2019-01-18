<?php
    class Avaliador {
        public $maiorValor = -INF;
        public $menorValor = INF;
        public $media = 0;
        public function avalia(Leilao $leilao){
            $total = 0;
            foreach($leilao->getLances() as $lance){
                if($lance->getValor() > $this->maiorValor){
                    $this->maiorValor = $lance->getValor();
                } 
                
                if($lance->getValor() < $this->menorValor){
                    $this->menorValor = $lance->getValor();
                }

                $total += $lance->getValor();
            }
            $this->media = $total/count($leilao->getLances());
        }

        public function getMaiorLance(){
            return $this->maiorValor;
        }

        public function getMenorLance(){
            return $this->menorValor;
        }
    
        public function getMedia(){
            return $this->media;
        }
    }    
?>