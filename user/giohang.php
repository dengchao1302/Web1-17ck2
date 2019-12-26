<?php
include_once("../DBAccess/DataProvider.php");
$tenHienThi = "";
if (isset($_GET["userid"]) && $_GET["userid"] != "") {
  $sql = "select * from TaiKhoan where MaTaiKhoan = '" . $_GET["userid"] . "' ";
  $list = DataProvider::execQuery($sql);
  while ($row = mysqli_fetch_array($list)) {
    $tenHienThi = $row["TenHienThi"];
  }
  if ($tenHienThi == "") {
    header('Location: ../index.php');
  }
} else {
  header('Location: ../index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Item cart</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>

  <?php
  $sql = "select * from HangSanXuat where BiXoa = '0'";
  $listNSX = DataProvider::execQuery($sql);
  $sql = "select * from LoaiSanPham where BiXoa = '0' ";
  $listLSP = DataProvider::execQuery($sql);
  $sql = "SELECT sp.MaSanPham, sp.TenSanPham, sp.GiaSanPham, sp.MoTa, sp.HinhUrl, ctddh.SoLuong FROM SanPham sp, DonDatHang ddh, ChiTietDonDatHang ctddh WHERE ddh.MaTaiKhoan = '". $_GET["userid"] ."' AND ddh.MaTinhTrang = 1 AND ddh.MaDonDatHang = ctddh.MaDonDatHang AND ctddh.MaSanPham = sp.MaSanPham";
  $listSP = DataProvider::execQuery($sql);
  ?>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../index.php">Trang chủ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>

   <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
       <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Loại sản phẩm
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">            
        <?php
        while ($row = mysqli_fetch_array($listLSP)) {
          ?>
          <a class="dropdown-item" href="category.php?type=1&id=<?php echo $row["MaLoaiSanPham"]; ?>"><?php echo $row["TenLoaiSanPham"]; ?></a>
          <?php
        }
        ?>
      </div>
    </li>
    <li class="nav-item dropdown">
     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Nhà sản xuất
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <?php
      while ($row = mysqli_fetch_array($listNSX)) {
        ?>
        <a class="dropdown-item" href="category.php?type=2&id=<?php echo $row["MaHangSanXuat"]; ?>"><?php echo $row["TenHangSanXuat"]; ?></a>
        <?php
      }
      ?>
    </div>
  </li>
</ul>
<form class="form-inline my-2 my-lg-0">
  <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><?php echo $tenHienThi; ?></a>
  <input class="form-control mr-sm-2" type="search" placeholder="Tên sản phẩm" aria-label="Search">
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
</form>
</div>
</nav>
<br/>
<h2 class="text-center">Giỏ hàng</h2>
<div class="container"> 
  <form action="giohang.php" method="POST">
   <table id="cart" class="table table-hover table-condensed"> 
    <thead> 
     <tr> 
      <th style="width:50%">Tên sản phẩm</th> 
      <th style="width:10%">Giá</th> 
      <th style="width:10%">Số lượng</th> 
      <th style="width:22%" class="text-center">Thành tiền</th> 
      <th style="width:10%"> </th> 
    </tr> 
  </thead> 
  <tbody>
    <?php
    $totalMoney = 0;
    while ($row = mysqli_fetch_array($listSP)) {
      ?>
      <tr> 
       <td data-th="Product"> 
        <div class="row"> 
         <div class="col-sm-2"><img src="<?php echo $row["HinhUrl"]; ?>" alt="Sản phẩm 1" class="img-responsive" width="100">
         </div> 
         <div class="col-sm-10"> 
          <h4 class="nomargin"><?php echo $row["TenSanPham"]; ?></h4> 
          <p><?php echo $row["MoTa"]; ?></p> 
        </div> 
      </div> 
    </td> 
    <td data-th="Price"><?php echo $row["GiaSanPham"]; ?></td> 
    <td data-th="Quantity"><input class="form-control text-center" value="<?php echo $row["SoLuong"]; ?>" type="number">
    </td> 
    <td data-th="Subtotal" class="text-center"><?php echo $row["GiaSanPham"]*$row["SoLuong"]; ?></td> 
    <td class="actions" data-th="">
    </td> 
  </tr> 
  <?php
  $totalMoney += $row["GiaSanPham"]*$row["SoLuong"];
  }
  ?>
<tr> 
  <td>  </td> 
  <td colspan="2"></td> 
  <td class="hidden-xs text-center"><strong>Tổng tiền:<?php echo $totalMoney; ?></strong>
  </td> 
  <td><input type="submit" name="btnPay"class="btn btn-success btn-block" value="Thanh toán" >
  </td> 
</tr> 
</tbody> 
</table>
</form>
</div>

</body>
</html>


