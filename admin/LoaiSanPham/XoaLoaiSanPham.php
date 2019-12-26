<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin</title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="../index.php">Admin page</a>
  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span>Sản phẩm</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Sản phẩm:</h6>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../SanPham/ThemSanPham.php">Thêm sản phẩm</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../SanPham/XoaSanPham.php">Xóa sản phẩm</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../SanPham/LietKeSanPham.php">Liệt kê sản phẩm</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../SanPham/TimKiemSanPham.php">Tìm kiếm sản phẩm</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span>Loại sản phẩm</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Loại sản phẩm:</h6>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../LoaiSanPham/ThemLoaiSanPham.php">Thêm loại sản phẩm</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../LoaiSanPham/XoaLoaiSanPham.php">Xóa loại sản phẩm</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../LoaiSanPham/LietKeLoaiSanPham.php">Liệt kê loại sản phẩm</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../LoaiSanPham/TimKiemLoaiSanPham.php">Tìm kiếm loại sản phẩm</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span>Nhà sản xuất</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Nhà sản xuất:</h6>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../NhaSanXuat/ThemNhaSanXuat.php">Thêm nhà sản xuất</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../NhaSanXuat/XoaNhaSanXuat.php">Xóa nhà sản xuất</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../NhaSanXuat/LietKeNhaSanXuat.php">Liệt kê nhà sản xuất</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../NhaSanXuat/TimKiemNhaSanXuat.php">Tìm kiếm nhà sản xuất</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span>Tài khoản người dùng</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Tài khoản người dùng:</h6>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../TaiKhoanNguoiDung/ThemTaiKhoanNguoiDung.php">Thêm tài khoản người dùng</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../TaiKhoanNguoiDung/XoaTaiKhoanNguoiDung.php">Xóa tài khoản người dùng</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../TaiKhoanNguoiDung/LietKeTaiKhoanNguoiDung.php">Liệt kê tài khoản người dùng</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../TaiKhoanNguoiDung/TimKiemTaiKhoanNguoiDung.php">Tìm kiếm tài khoản người dùng</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span>Đơn đặt hàng</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Đơn đặt hàng:</h6>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../DonDatHang/ThemDonDatHang.php">Thêm đơn đặt hàng</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../DonDatHang/XoaDonDatHang.php">Xóa đơn đặt hàng</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../DonDatHang/LietKeDonDatHang.php">Liệt kê đơn đặt hàng</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../DonDatHang/TimKiemDonDatHang.php">Tìm kiếm đơn đặt hàng</a>
        </div>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="../index.php">Admin page</a>
          </li>
          <li class="breadcrumb-item active">Loại sản phẩm</li>
        </ol>

        <?php
        include_once("../../DBAccess/DataProvider.php");
        $check = -1;

        if(isset($_POST["btnDel"]))
        {
          $maLoaiSanPham = $_POST["MaLoaiSanPham"];
          $sql = "delete from LoaiSanPham where MaLoaiSanPham= '" . $maLoaiSanPham . "' ";
          //DataProvider::execQuery($sql);
          $check = DataProvider::execQ($sql);
        }
        ?>

        <div class="card mb-3">
          <div class="card-header">
          Xóa loại sản phẩm</div>
          <div class="card-body">
            <div class="table-responsive">
              <form action="XoaLoaiSanPham.php" method="POST" name="frmDelete" id="frmDelete">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <col width="20%">
                  <col width="80%">
                  <thead>
                    <tr>
                      <th>Tên trường</th>
                      <th>Giá trị</th>
                    </tr>
                    <?php
                    if ($check == 1) {
                      ?>
                      <tr>
                        <td colspan="2" style="background-color: green"> Cập nhật thành công </td>
                      </tr>
                      <?php 
                    } else if ($check == 0) {
                      ?>
                      <tr>
                        <td colspan="2" style="background-color: red"> Cập nhật thất bại </td>
                      </tr>
                      <?php 
                    }
                    ?>
                  </thead>
                  <tfoot>
                    <tr>
                      <td></td>
                      <td>
                        <input type="submit" name="btnDel" value="Xóa" />
                      </td>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <th>Mã loại sản phẩm:</th>
                      <td><input type="text" name="MaLoaiSanPham"></td>
                    </tr>
                  </tbody>
                </table>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /#wrapper -->
    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="../../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>

  </body>

  </html>
