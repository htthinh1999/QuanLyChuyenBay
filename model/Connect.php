<?php
class sinhvien
{
    private $conn;
    function __construct() //sinhvien()
    {
      session_start();
      $servername = "localhost";
      $dbname = "qlcb";
      $username = "root";
      $password = ""; 
      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
         if ($conn->connect_error) {
         die("Lỗi kết nối: " . $conn->connect_error);
         }else{
         $this->conn=$conn;  
         }
    }


    
    public function Danhsach_sinhvien($page=1,$search_input=''){
       $perpage=5;
       $page=($page-1)*$perpage;
       
       $search='';
       if($search_input!=''){
         $search="WHERE ( TEN LIKE '%$search_input%' OR DCHI like '%$search_input%' OR DTHOAI like '%$search_input%' OR LUONG like '$search_input%' OR LOAINV like '%$search_input%' )";  
       }
      
     
       $sql = "SELECT * FROM NhanVien $search ORDER BY MANV desc LIMIT $page,$perpage";
     
       $query=  $this->conn->query($sql);
       $sinhvien=array();
       if ($query->num_rows > 0) {
       while ($row = $query->fetch_assoc()) {
          $sinhvien['sinhvien_data'][]= $row;
       }
       }       
       
    $count_sql = "SELECT COUNT(*) FROM NhanVien $search";
    $query=  $this->conn->query($count_sql);
    $total = mysqli_fetch_row($query);
    $sinhvien['total'][]= $total;       
       
    return $sinhvien;  
    }
    
    public function Tao_thongtin_sinhvien($post_data=array()){
         
    
       $manv='';
       if(isset($post_data->manv)){
       $manv= mysqli_real_escape_string($this->conn,trim($post_data->manv));
       }
       $tennv='';
       if(isset($post_data->tennv)){
       $tennv= mysqli_real_escape_string($this->conn,trim($post_data->tennv));
       }
       
        $diachi='';
       if(isset($post_data->diachi)){
       $diachi= mysqli_real_escape_string($this->conn,trim($post_data->diachi));
       }
       
       $dienthoai='';
       if(isset($post_data->dienthoai)){
       $dienthoai= mysqli_real_escape_string($this->conn,trim($post_data->dienthoai));
       }
       
       $luongnv='';
       if(isset($post_data->luongnv)){
       $luongnv= mysqli_real_escape_string($this->conn,trim($post_data->luongnv));
       }
       
       $loainv='';
       if(isset($post_data->loainv)){
       $loainv= mysqli_real_escape_string($this->conn,trim($post_data->loainv));
       }
      
     
       $sql="INSERT INTO NHANVIEN(MANV, TEN, DCHI, DTHOAI, LUONG, LOAINV) VALUES ('$manv', '$tennv', '$diachi','$dienthoai','$luongnv','$loainv')";
        
        $result=  $this->conn->query($sql);
        
        if($result){
          return 'Đã thêm được 1 nhân viên';     
        }else{
           return 'Kiểm tra thông tin để nhập vào, lỗi';
        }
          
       
       
       
        
    }
    
    public function view_sinhvien_id($id){
       if(isset($id)){
       $manv= mysqli_real_escape_string($this->conn,trim($id));
       //echo $SV_id1;
       $sql="Select * from NhanVien where MaNV=$manv";
        
       $result=  $this->conn->query($sql);
     
        return $result->fetch_assoc(); 
    
       }  
    }
    
    
    public function update_thongtin_sinhvien($post_data=array()){
       if( isset($post_data->MANV)){
       $MANV=mysqli_real_escape_string($this->conn,trim($post_data->MANV));
           
       $TEN='';
       if(isset($post_data->TEN)){
       $TEN= mysqli_real_escape_string($this->conn,trim($post_data->TEN));
       }

       $sql="UPDATE NHANVIEN SET TEN='$TEN' WHERE MANV =$MANV";
     
        $result=  $this->conn->query($sql);
        
         
         unset($post_data->MANV); 
        if($result){
          return 'Đã cập nhật thành công';     
        }else{
         return 'Kiểm tra, lỗi cập nhật thông tin  ';     
        }
          
           
           
      
       }   
    }
    
    public function delete_thongtin_sinhvien($id){
        
       if(isset($id)){
       $SV_id1= mysqli_real_escape_string($this->conn,trim($id));

       $sql="DELETE FROM  sinhviens  WHERE SV_id =$SV_id1";
        $result=  $this->conn->query($sql);
        
        if($result){
          return 'Xóa thành công';     
        }else{
         return 'Kiểm tra, lỗi xóa';     
        }         
        
           
       }
        
    }
    function __destruct() {
    mysqli_close($this->conn);  
    }
    
}

?>