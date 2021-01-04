<?php
include 'Connect.php';
$obj=new sinhvien();
$result=$obj->delete_thongtin_sinhvien($_GET['SV_id']);
$message['message']=$result;
echo json_encode($message);






?>