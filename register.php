<?php
include_once("DBAccess/DataProvider.php");
$check = -1;

if(isset($_POST["btnRegister"]))
{
	$tenHienThi = $_POST["TenHienThi"];
	$diaChi = $_POST["DiaChi"];
	$dienThoai = $_POST["DienThoai"];
	$email = $_POST["Email"];
	$tenDangNhap = $_POST["TenDangNhap"];
	$matKhau = $_POST["MatKhau"];
	$sql = "select * from TaiKhoan where TenDangNhap = '" . $tenDangNhap . "' ";
          //DataProvider::execQuery($sql);
	$list = DataProvider::execQuery($sql);

	if (mysqli_num_rows($list) == 0) {

		$sql = "insert into TaiKhoan(TenDangNhap,MatKhau,TenHienThi,DiaChi,DienThoai,Email,MaLoaiTaiKhoan) values ('". $tenDangNhap ."', '" . $matKhau ."', '" . $tenHienThi ."', '" . $diaChi ."', '" . $dienThoai ."', '" . $email ."', '1')";
		$check = DataProvider::execQ($sql);

		if ($check == 1) {
			$sql = "select * from TaiKhoan where TenDangNhap = '" . $tenDangNhap . "' and MatKhau = '" . $matKhau . "' ";
          //DataProvider::execQuery($sql);
			$list = DataProvider::execQuery($sql);
			$userid = 0;
			while ($row = mysqli_fetch_array($list)) {
				$userid = $row["MaTaiKhoan"];
			}
			header('Location: index.php?userid='.$userid);
		}

		header('Location: index.php?userid='.$userid);
	} else {
		$check = 0;
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Register page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="index.php">Trang chủ</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				
			</ul>
			<form class="form-inline my-2 my-lg-0" action="detail.php">
				<a class="nav-link" href="login.php">Đăng nhập</a>
				<input class="form-control mr-sm-2" type="search" placeholder="Tên sản phẩm" aria-label="Search" id="itemName" name="itemName">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
			</form>
		</div>
	</nav>
	<br />
	<div class="container">
		<div class="row">
			<div class="col-md-8 order-md-1">
				<?php if ($check == 0) { ?>
					<h3 style="color: red" class="mb-3">Đăng ký tài khoản thất bại. Thử lại sau.</h3>
				<?php } ?>
				<h4 class="mb-3">Thông tin cá nhân</h4>
				<form class="needs-validation" novalidate="" action="register.php" method="POST">
					<div class="mb-3">
						<label for="TenHienThi">Họ tên của bạn</label>
						<div class="input-group">
							<input type="text" class="form-control" id="TenHienThi" name="TenHienThi" placeholder="Họ tên" required="">
							<div class="invalid-feedback" style="width: 100%;">
								Hãy nhập họ tên.
							</div>
						</div>
					</div>
					<div class="mb-3">
						<label for="DiaChi">Địa chỉ của bạn</label>
						<div class="input-group">
							<input type="text" class="form-control" id="DiaChi" name="DiaChi" placeholder="Địa chỉ" required="">
							<div class="invalid-feedback" style="width: 100%;">
								Hãy nhập địa chỉ
							</div>
						</div>
					</div>
					<div class="mb-3">
						<label for="DienThoai">Số điện thoại</label>
						<div class="input-group">
							<input type="text" class="form-control" id="DienThoai" name="DienThoai" placeholder="Điện thoại" required="">
							<div class="invalid-feedback" style="width: 100%;">
								Hãy nhập số điện thoại.
							</div>
						</div>
					</div>
					<div class="mb-3">
						<label for="Email">Email</label>
						<div class="input-group">
							<input type="text" class="form-control" id="Email" name="Email" placeholder="Email" required="">
							<div class="invalid-feedback" style="width: 100%;">
								Hãy nhập email.
							</div>
						</div>
					</div>

					<div class="mb-3">
						<h4>Thông tin tài khoản</h4>
					</div>
					<div class="mb-3">
						<label for="TenDangNhap">Tên đăng nhập</label>
						<div class="input-group">
							<input type="text" class="form-control" id="TenDangNhap" name="TenDangNhap" placeholder="Tên đăng nhập" required="">
							<div class="invalid-feedback" style="width: 100%;">
								Hãy nhập tên đăng nhập
							</div>
						</div>
					</div>
					<div class="mb-3">
						<label for="MatKhau">Mật khẩu</label>
						<div class="input-group">
							<input type="password" class="form-control" id="MatKhau" name="MatKhau" placeholder="Mật khẩu" required="">
							<div class="invalid-feedback" style="width: 100%;">
								Hãy nhập mật khẩu
							</div>
						</div>
					</div>
					<button class="btn btn-primary btn-lg btn-block" type="submit" name="btnRegister">Đăng ký</button>
				</form>
			</div>
		</div>
	</div>

    <!-- Bootstrap core JavaScript
    	================================================== -->
    	<!-- Placed at the end of the document so the pages load faster -->
    	<script src="./Checkout example for Bootstrap_files/jquery-3.2.1.slim.min.js.download" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    	<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    	<script src="./Checkout example for Bootstrap_files/popper.min.js.download"></script>
    	<script src="./Checkout example for Bootstrap_files/bootstrap.min.js.download"></script>
    	<script src="./Checkout example for Bootstrap_files/holder.min.js.download"></script>
    	<script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
      	'use strict';

      	window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
          	form.addEventListener('submit', function(event) {
          		if (form.checkValidity() === false) {
          			event.preventDefault();
          			event.stopPropagation();
          		}
          		form.classList.add('was-validated');
          	}, false);
          });
      }, false);
      })();
  </script>
</body>
</html>