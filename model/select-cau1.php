<?php
include 'Cau1.php';



$obj=new sinhvien();
$sinhvien_list=$obj->Danhsach_sinhvien($_GET['page'],$_GET['search_input']);


echo json_encode($sinhvien_list);


?>