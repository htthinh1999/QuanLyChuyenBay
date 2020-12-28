<?php

    class ChuyenBay{
        private $maCB;
        private $sbDi;
        private $sbDen;
        private $ngayDi;
        private $gioDi;
        private $gioDen;

        public function ChuyenBay($maCB, $sbDi, $sbDen, $ngayDi, $gioDi, $gioDen){
            $this->maCB = $maCB;
            $this->sbDi = $sbDi;
            $this->sbDen = $sbDen;
            $this->ngayDi = $ngayDi;
            $this->gioDi = $gioDi;
            $this->gioDen = $gioDen;
        }

        public function getMaCB(){
            return $this->maCB;
        }

        public function getSbDi(){
            return $this->sbDi;
        }
        
        public function getSbDen(){
            return $this->sbDen;
        }
        
        public function getNgayDi(){
            return $this->ngayDi;
        }
        
        public function getGioDi(){
            return $this->gioDi;
        }
        
        public function getGioDen(){
            return $this->gioDen;
        }


        public function getJson(){
            return [
                'maCB' => $this->maCB,
                'sbDi' => $this->sbDi,
                'sbDen' => $this->sbDen,
                'ngayDi' => $this->ngayDi,
                'gioDi' => $this->gioDi,
                'gioDen' => $this->gioDen,
            ];
        }

    }

?>