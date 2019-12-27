<!DOCTYPE html>
<html>
<head>
	<title>Child shop</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>

	<?php
	include_once("DBAccess/DataProvider.php");
	$sql = "select * from HangSanXuat where BiXoa = '0'";
	$listNSX = DataProvider::execQuery($sql);
	$sql = "select * from LoaiSanPham where BiXoa = '0' ";
	$listLSP = DataProvider::execQuery($sql);
	$sql = "select * from SanPham where BiXoa = '0' order by NgayNhap DESC LIMIT 10 ";
	$listSPnew = DataProvider::execQuery($sql);
	$sql = "select * from SanPham where BiXoa = '0' order by SoLuongBan DESC LIMIT 10 ";
	$listSPhot= DataProvider::execQuery($sql);
	$isLogged = false;
	$tenHienThi = "";
	$itemUrl = "";
	if (isset($_GET["userid"]) && $_GET["userid"] != "") {
		$isLogged = true;
		$sql = "select * from TaiKhoan where MaTaiKhoan = '" . $_GET["userid"] . "' ";
		$list = DataProvider::execQuery($sql);
		while ($row = mysqli_fetch_array($list)) {
			$tenHienThi = $row["TenHienThi"];
		}
		$itemUrl = '&userid=' . $_GET["userid"];
	}
	?>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="index.php">Trang chủ</a>
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
							<a class="dropdown-item" href="category.php?type=1&id=<?php echo $row["MaLoaiSanPham"]. $itemUrl; ?>"><?php echo $row["TenLoaiSanPham"]; ?></a>
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
							<a class="dropdown-item" href="category.php?type=2&id=<?php echo $row["MaHangSanXuat"] . $itemUrl; ?>"><?php echo $row["TenHangSanXuat"]; ?></a>
							<?php
						}
						?>
					</div>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0" action="detail.php">
				<?php if (!$isLogged) { ?>
					<a class="nav-link" href="login.php">Đăng nhập</a>
					<a class="nav-link" href="register.php">Đăng ký</a>
				<?php } else { ?>
					<a class="nav-link" href="user/giohang.php?userid=<?php echo $_GET["userid"]; ?>"><?php echo $tenHienThi; ?></a>
				<?php } ?>
				<input class="form-control mr-sm-2" type="search" placeholder="Tên sản phẩm" aria-label="Search" id="itemName" name="itemName">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
			</form>
		</div>
	</nav>
	<br />
	<div class="container">
		<h2>Sản phẩm mới nhất</h2>
		<p>Danh sách 10 sản phẩm mới nhất:</p>
		<table>
			<col width="50%">
			<col width="50%">
			<tr>
				<?php
			$i = 0;
			while ($row = mysqli_fetch_array($listSPnew)) {
				$i++;
				?>
				<td>
					<img src="images/<?php echo $row["HinhURL"]; ?>" width="60" height="60" alt="">
					<a class="nav-link navbar-text" href="detail.php?itemID=<?php echo $row["MaSanPham"] . $itemUrl; ?>"><?php echo $row["TenSanPham"]; ?></a>
				</td>
				<?php if ($i %2 == 0) { ?>
				</tr>
				<tr>
				<?php }
			} ?>
			</tr>
		</table>
	</div>
	<br/>
	<div class="container">
		<h2>Sản phẩm bán chạy nhất</h2>
		<p>Danh sách 10 sản phẩm bán chạy nhất:</p>
		<table>
			<col width="50%">
			<col width="50%">
			<tr>
				<?php
			$i = 0;
			while ($row = mysqli_fetch_array($listSPhot)) {
				$i++;
				?>
				<td>
					<img src="images/<?php echo $row["HinhURL"]; ?>" width="60" height="60" alt="">
					<a class="nav-link navbar-text" href="detail.php?itemID=<?php echo $row["MaSanPham"] . $itemUrl; ?>"><?php echo $row["TenSanPham"]; ?></a>
				</td>
				<?php if ($i %2 == 0) { ?>
				</tr>
				<tr>
				<?php }
			} ?>
			</tr>
		</table>
	</div>
</body>
</html>
