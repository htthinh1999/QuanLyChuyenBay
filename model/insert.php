<?php 

include 'Connect.php';
$obj=new sinhvien();
$data = json_decode(file_get_contents("php://input"));
$result=$obj->Tao_thongtin_sinhvien($data);
$message['message']=$result;
echo json_encode($message);



?>