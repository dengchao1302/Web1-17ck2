<?php
include_once("DBAccess/DataProvider.php");
$check = -1;

if(isset($_POST["btnLogin"]))
{
  $tenDangNhap = $_POST["TenDangNhap"];
  $matKhau = $_POST["MatKhau"];
  $sql = "select * from TaiKhoan where TenDangNhap = '" . $tenDangNhap . "' and MatKhau = '" . $matKhau . "' ";
          //DataProvider::execQuery($sql);
  $list = DataProvider::execQuery($sql);

  if (mysqli_num_rows($list) > 0) {
  	$userid = 0;
  	while ($row = mysqli_fetch_array($list)) {
  		$userid = $row["MaTaiKhoan"];
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
	<title>Login page</title>
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
				<a class="nav-link" href="register.php">Đăng ký</a>
				<input class="form-control mr-sm-2" type="search" placeholder="Tên sản phẩm" aria-label="Search" id="itemName" name="itemName">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
			</form>
		</div>
	</nav>
	<br />
	<div class="container">
		<form class="form-signin" action="login.php" method="POST">
			<img class="mb-4" src="./Signin Template for Bootstrap_files/bootstrap-solid.svg" alt="" width="72" height="72">
			<?php if ($check == 0) { ?>
				<h1 class="h3 mb-3 font-weight-normal">Thông tin đăng nhập không chính xác</h1>
			<?php } else { ?>
				<h1 class="h3 mb-3 font-weight-normal">Vui lòng đăng nhập</h1>
			<?php } ?>
			<input type="text" id="inputEmail" class="form-control" placeholder="Username" required="" autofocus="" name="TenDangNhap">
			<input type="password" id="inputPassword" class="form-control" placeholder="Password" required="" name="MatKhau">
			<br/>
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="btnLogin">Đăng nhập</button>
		</form>
	</div>
</body>
</html>