<?php
    // Library
    require_once '../lib/database.php';

    // Model
    require_once '../models/chuyenbay.php';

    class C_ChuyenBay{

        private $db;

        public function C_ChuyenBay(){
            $this->db = new Database();
        }

        public function getChuyenBayBySoHieuVaMaLoai($sohieu, $maloai){
    
            $query = "SELECT C.MACB, SBDI, SBDEN, NGAYDI, GIODI, GIODEN
                        FROM LICHBAY L INNER JOIN CHUYENBAY C ON L.MACB = C.MACB
                        WHERE SOHIEU=$sohieu AND MALOAI='$maloai'";
        
            $result = $this->db->select($query);
        
            $dsChuyenBay = array();
            if($result){
                while ($row = mysqli_fetch_array($result)){
                    $chuyenBay = new ChuyenBay($row['MACB'], $row['SBDI'], $row['SBDEN'], $row['NGAYDI'], $row['GIODI'], $row['GIODEN']);
                    array_push($dsChuyenBay, $chuyenBay);
                }
            }

            return $dsChuyenBay;
        }
    }
?>