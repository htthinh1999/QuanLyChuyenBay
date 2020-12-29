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
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
    
    <div class="jumbotron">
        <div class="container text-center">
            <h1>Quản lý chuyến bay</h1>
            <p>Quản lý chuyến bay</p>
        </div>
    </div>


    <div class="container">
    
        <div class="row">
            <div class="col-md-4">
                <form method='POST'>
                    <div class="mb-3">
                        <label for="sohieu" class="form-label">Nhập số hiệu</label>
                        <input type="number" class="form-control" id="sohieu" name="sohieu">
                    </div>
                    <div class="mb-3">
                        <label for="maloai" class="form-label">Nhập mã loại</label>
                        <input type="text" class="form-control" name="maloai" id="maloai">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <div class="col-md-8">
                <table id="table" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Mã nhân viên</th>
                            <th>Tên nhân viên</th>
                            <th>Địa chỉ</th>
                            <th>Điện thoại</th>
                            <th>Giờ đi</th>
                            <th>Giờ đến</th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th>Mã chuyến bay</th>
                            <th>Sân bay đi</th>
                            <th>Sân bay đến</th>
                            <th>Ngày đi</th>
                            <th>Giờ đi</th>
                            <th>Giờ đến</th>
                        </tr>
                    </tfoot>

                    <tbody>
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
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    
    <footer class="footer">
        <div class="container">
        <span class="text-muted">Quản lý chuyến bay - Huỳnh Tấn Thịnh</span>
        </div>
    </footer>

    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/main.js"></script>

</body>
</html>