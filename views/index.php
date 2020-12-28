<?php
    // Libraries
    require_once '../lib/database.php';

    // Models
    require_once '../models/chuyenbay.php';

    // Controllers
    require_once '../controllers/c_chuyenbay.php';
?>

<html>
<head>
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
    <form method='POST'>
        <label>Nhập số hiệu:</label>
        <input name="sohieu" required="required">
        <label>Nhập mã loại:</label>
        <input name="maloai" required="required">
        <input type="submit" value="submit"></input>
    </form>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    ?>

        <table>
            <tr>
                <th>Mã chuyến bay</th>
                <th>Sân bay đi</th>
                <th>Sân bay đến</th>
                <th>Ngày đi</th>
                <th>Giờ đi</th>
                <th>Giờ đến</th>
            </tr>

                <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $c_ChuyenBay = new C_ChuyenBay();

                        $sohieu = $_POST['sohieu'];
                        $maloai = $_POST['maloai'];
                    
                        $dsChuyenBay = $c_ChuyenBay->getChuyenBayBySoHieuVaMaLoai($sohieu, $maloai);
                        
                        $dsChuyenBayJson = array();
                        foreach($dsChuyenBay as $chuyenbay){
                            echo '
                                <tr>
                                    <td>'.$chuyenbay->getMaCB().'</td>
                                    <td>'.$chuyenbay->getSbDi().'</td>
                                    <td>'.$chuyenbay->getSbDen().'</td>
                                    <td>'.$chuyenbay->getNgayDi().'</td>
                                    <td>'.$chuyenbay->getGioDi().'</td>
                                    <td>'.$chuyenbay->getGioDen().'</td>
                                </tr>
                            ';
                        }
                    
                    }
                ?>
        </table>
    
    <?php
        }
    ?>

</body>
</html>