<?php
class sinhvien
{
    private $conn;
    public function __construct() //sinhvien()
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
        } else {
            $this->conn=$conn;
        }
    }


    
    public function Danhsach_sinhvien($page=1, $search_input='')
    {
        $perpage=5;
        $page=($page-1)*$perpage;
       
        $search='';
        if ($search_input!='') {
            $search="AND ( TEN LIKE '%$search_input%' )";
        }
   
        
     
        $sql = "SELECT C.MACB, N.MANV, TEN
FROM PHANCONG P INNER JOIN NHANVIEN N ON P.MANV = N.MANV
				INNER JOIN LICHBAY L ON P.NGAYDI = L.NGAYDI AND P.MACB = L.MACB
				INNER JOIN CHUYENBAY C ON L.MACB = C.MACB
WHERE L.NGAYDI = '2000-10-31' AND SBDI = 'MIA' AND GIODI = '20:30' LIMIT $page,$perpage";
     
        $query=  $this->conn->query($sql);
        $sinhvien=array();
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $sinhvien['sinhvien_data'][]= $row;
            }
        }
       
        $count_sql = "SELECT COUNT(*)
FROM PHANCONG P INNER JOIN NHANVIEN N ON P.MANV = N.MANV
				INNER JOIN LICHBAY L ON P.NGAYDI = L.NGAYDI AND P.MACB = L.MACB
				INNER JOIN CHUYENBAY C ON L.MACB = C.MACB
WHERE L.NGAYDI = '2000-10-31' AND SBDI = 'MIA' AND GIODI = '20:30' $search";
        $query=  $this->conn->query($count_sql);
        $total = mysqli_fetch_row($query);
        $sinhvien['total'][]= $total;
       
        return $sinhvien;
    }
    
    public function Tao_thongtin_sinhvien($post_data=array())
    {
        $MAKH='';
        if (isset($post_data->MAKH)) {
            $MAKH= mysqli_real_escape_string($this->conn, trim($post_data->MAKH));
        }

         
    
        $TEN='';
        if (isset($post_data->TEN)) {
            $TEN= mysqli_real_escape_string($this->conn, trim($post_data->TEN));
        }
       
       
        $DCHI='';
        if (isset($post_data->DCHI)) {
            $DCHI= mysqli_real_escape_string($this->conn, trim($post_data->DCHI));
        }
       
        $DTHOAI='';
        if (isset($post_data->DTHOAI)) {
            $DTHOAI= mysqli_real_escape_string($this->conn, trim($post_data->DTHOAI));
        }
       
      
     
        $sql="INSERT INTO khachhang(MAKH, TEN, DCHI, DTHOAI) VALUES ('$MAKH','$TEN', '$DCHI', '$DTHOAI')";
        
        $result=  $this->conn->query($sql);
        
        if ($result) {
            return 'Đã thêm được 1 Khách hàng';
        } else {
            return 'Kiểm tra thông tin để nhập vào, lỗi';
        }
    }
    
    public function view_sinhvien_id($id)
    {
        if (isset($id)) {
            $MAKH1= mysqli_real_escape_string($this->conn, trim($id));
            //echo $MAKH1;
            $sql="Select * from khachhang where MAKH=$MAKH1";
        
            $result=  $this->conn->query($sql);
     
            return $result->fetch_assoc();
        }
    }
    
    
    public function update_thongtin_sinhvien($post_data=array())
    {
        if (isset($post_data->MAKH)) {
            $MAKH=mysqli_real_escape_string($this->conn, trim($post_data->MAKH));
           
            $TEN='';
            if (isset($post_data->TEN)) {
                $TEN= mysqli_real_escape_string($this->conn, trim($post_data->TEN));
            }
            $email='';
            if (isset($post_data->email)) {
                $email= mysqli_real_escape_string($this->conn, trim($post_data->email));
            }
       
            $gioitinh='';
            if (isset($post_data->gioitinh)) {
                $gioitinh= mysqli_real_escape_string($this->conn, trim($post_data->gioitinh));
            }
       
       
            $DCHI='';
            if (isset($post_data->DCHI)) {
                $DCHI= mysqli_real_escape_string($this->conn, trim($post_data->DCHI));
            }
            $Quocgia='';
            if (isset($post_data->Quocgia)) {
                $Quocgia= mysqli_real_escape_string($this->conn, trim($post_data->Quocgia));
            }
       

            $sql="UPDATE khachhang SET TEN='$TEN' WHERE MAKH =$MAKH";
     
            $result=  $this->conn->query($sql);
        
         
            unset($post_data->MAKH);
            if ($result) {
                return 'Đã cập nhật thành công';
            } else {
                return 'Kiểm tra, lỗi cập nhật thông tin  ';
            }
        }
    }
    
    public function delete_thongtin_sinhvien($MAKH)
    {
        if (isset($MAKH)) {
            $MAKH1= mysqli_real_escape_string($this->conn, trim($MAKH));

            $sql="DELETE FROM  sinhviens  WHERE MAKH =$MAKH1";
            $result=  $this->conn->query($sql);
        
            if ($result) {
                return 'Xóa thành công';
            } else {
                return 'Kiểm tra, lỗi xóa';
            }
        }
    }
    public function __destruct()
    {
        mysqli_close($this->conn);
    }
}