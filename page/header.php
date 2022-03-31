<?php 
	include 'admin/database/connect.php';
	session_start();
	$category = mysqli_query($conn, "SELECT * FROM category");

	if (isset($_SESSION['cart'])) {
		$cart = $_SESSION['cart'];
	}
	


	
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="./assests/img/logo.jpg"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
	<link rel="stylesheet" href="./assests/css/style.css">
	<link rel="stylesheet" href="./assests/css/base.css">
	<link rel="stylesheet" href="./assests/css/grid.css">
	
	<link rel="stylesheet" href="./assests/css/responsive.css">
	<link rel="stylesheet" href="assests/css/product_detail.css">
	
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="./assests/font/themify-icons/themify-icons.css">
	<link rel="stylesheet" href="./assests/font/fontawesome-free-5.15.3-web/fontawesome-free-5.15.3-web/css/all.css">


	<title>Nabi</title>
</head>
<body>
	<div id="app">


		<header class="header">

			<!-- navbar and search on mobile-table -->
			<div class="header-left">
				<div class="header-menu-mobile">
					<i class="ti-menu header-menu-mobile-icon"></i>
				</div>

				<div class="nav-mobile-overlay">

				</div>

				<nav class="nav-mobile">
					<div class="nav-mobile-title">
						<h4 class="nav-mobile-title-sub">
							MENU
						</h4>
					</div>
					<ul class="nav-mobile-list">
						<li class="nav-mobile-item">
							<a href="" class="nav-mobile-item__link">SIÊU SALE THÁNG 9</a>
						</li>
						<li class="nav-mobile-item ">
							<a href="#" class="nav-mobile-item__link">
								BỘ SƯU TẬP
								<i class="ti-arrow-circle-down sb-caret"></i>
							</a>

							<ul class="nav-mobile__child">
								<li class="nav-mobile__child-item">
									<a href="" class="nav-mobile__child-item-link">Đầm</a>
								</li>
								<li class="nav-mobile__child-item">
									<a href="" class="nav-mobile__child-item-link">Áo</a>
								</li>
								<li class="nav-mobile__child-item">
									<a href="" class="nav-mobile__child-item-link">Chân váy</a>
								</li>
								<li class="nav-mobile__child-item">
									<a href="" class="nav-mobile__child-item-link">Quần</a>
								</li>
							</ul>

						</li>
						<li class="nav-mobile-item">
							<a href="" class="nav-mobile-item__link">PHỤ KIỆN</a>
						</li>
						<li class="nav-mobile-item">
							<a href="" class="nav-mobile-item__link">ALBUM</a>
						</li>
						<li class="nav-mobile-item">
							<a href="" class="nav-mobile-item__link">TIN TỨC</a>
						</li>

					</ul>
					<div class="nav-close">
						<i class="ti-close nav-close-icon"></i>
					</div>
				</nav>

				<div class="header-menu-mobile">
					<i class="ti-search header-menu-mobile-search"></i>
				</div>


			</div>

			<div class="header-logo">
				<a class="header-logo__link" href="index.php">
					<h2 class="header-logo__link-title">Nabi</h2>
				</a>
			</div>
			<div class="header-menu  hide-on-mobile-table">
				<ul class="header-menu-list">
					<li class="header-menu__item">
						<a href="#" class="header-menu__item-link">Siêu sale tháng 9</a>
						<ul class="header-menu__child">
							<li class="header-menu__child-item">
								<a href="" class="header-menu__child-item-link">sale 99k</a>
							</li>
							<li class="header-menu__child-item">
								<a href="" class="header-menu__child-item-link">sale 199k</a>
							</li>
							<li class="header-menu__child-item">
								<a href="" class="header-menu__child-item-link">sale 299k</a>
							</li>
							<li class="header-menu__child-item">
								<a href="" class="header-menu__child-item-link">sale 399k</a>
							</li>
						</ul>
					</li>
					<li class="header-menu__item">
						<a href="" class="header-menu__item-link">BỘ SƯU TẬP</a>
						<ul class="header-menu__child">

							<?php foreach ($category as $key => $value): ?>

								<li class="header-menu__child-item">
									<a href="?pro=<?php echo $value['id'] ?>" class="header-menu__child-item-link"><?php echo $value['name'] ?></a>
								</li>
								
							<?php endforeach ?>

							
							
						</ul>
					</li>
					<li class="header-menu__item">
						<a href="" class="header-menu__item-link">Phụ kiện</a>
					</li>
					<li class="header-menu__item">
						<a href="" class="header-menu__item-link">Album</a>
					</li>
					<li class="header-menu__item">
						<a href="" class="header-menu__item-link">Tin tức</a>
					</li>
				</ul>

			</div>
			<div class="header-right ">
				<div class="header-search hide-on-mobile-table">
					<form class="header-search__form" action="search.php">
						<input class="header-search__form-input" type="text" name="keyword" placeholder="Tìm kiếm...">
						<button type="submit" class="header-search__form-btn">
							<i class="ti-search"></i>
						</button>

					</form>
				</div>
				<div class="header-function">

					<div class="header-function-sub">
						<a href="user.php" class="header-user__link" title="Người dùng" ><i class="ti-user"></i></a>

					</div>
					<div class="header-function-sub">
						<a href="show-cart.php" class="header-user__link" title="Giỏ hàng">
							<i class="ti-shopping-cart"></i>
							<span class="noti_cart-quantity"><?php echo isset($cart) ? count($cart) : 0 ?></span>
						</a> 
					</div>
				</div>
			</div>

		</header>