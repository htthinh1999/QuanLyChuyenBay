
<?php
include 'Connect.php';
$obj=new sinhvien();
$sinhvien_data=$obj->view_sinhvien_id($_GET['manv']);
echo json_encode($sinhvien_data);
//echo $sinhvien_data;


?>
