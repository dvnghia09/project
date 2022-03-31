<?php 
	$conn = mysqli_connect('localhost','root','','shop');

	session_start();

	if (isset($_POST['email'])) {

		$email = $_POST['email'];
		$password = $_POST['password'];

		$query = mysqli_query($conn,"SELECT * FROM user WHERE email = '$email' AND role = 1");

		$data = mysqli_fetch_assoc($query);

		$checkEmail = mysqli_num_rows($query);
		
		if ($checkEmail == 1) {

			// hàm check password trả về true hoặc false
			$checkPass = password_verify($password, $data['password']);

			if ($checkPass) {
				$_SESSION['admin'] = $data;
				header('location: index.php');
				echo "admin ok ok";
			}else{
				echo "vui lòng nhập lại mật khẩu";
			}
			
		}else{
			echo "email ko chính xác";
		}
	};

	




 ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../../../../favicon.ico">

	<title>Nabi Closet</title>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">

	<!-- Custom styles for this template -->
	<link href="blog.css" rel="stylesheet">
</head>

<body>
	<div class="wrapper fadeInDown">
		<div id="formContent">
			<!-- Tabs Titles -->

			<!-- Icon -->
			<div class="fadeIn first">
				<h1 style="margin-top:30px; "	>Login Admin</h1>
			</div>

			<!-- Login Form -->
			<form method="POST">
				<input type="text" id="login" class="fadeIn second" name="email" placeholder="Nhâp email của bạn ...">
				<input type="password" id="password" class="fadeIn third" name="password" placeholder="Nhập mật khẩu của bạn ...">
				<input type="submit" class="fadeIn fourth" value="Log In">
			</form>

			<!-- Remind Passowrd -->
			<div id="formFooter">
				<a class="underlineHover" href="http://localhost/project/login.php">Đăng ký quản trị viên</a>
			</div>

		</div>
	</div>


		<!-- Bootstrap core JavaScript
			================================================== -->
			<!-- Placed at the end of the document so the pages load faster -->
			<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

			<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
			<script src="../../../../assets/js/ie10-viewport-bug-workaround.js"></script>
		</body>
		</html>