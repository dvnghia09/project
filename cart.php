<?php
	include 'admin/database/connect.php' ;
   

   session_start();

   if (isset($_POST['id'])) {
   	$id_product = $_POST['id'];
   	$quantity = $_POST['quantity'];
   	$action = $_POST['action'];

   	if ($action == 'add') {
   		$product_arr = mysqli_query($conn,"SELECT * FROM product WHERE id = $id_product");

	  	$product = mysqli_fetch_assoc($product_arr);

	  	$item = [
	  		'id' => $product['id'],
	  		'name' => $product['name'],
	  		'price' => $product['sale_price'] > 0 ? $product['sale_price'] : $product['price'],
	  		'image' => $product['image'],
	  		'quantity' => $quantity,

	  	];


	  	if (isset($_SESSION['cart'][$id_product])) {
	  		$_SESSION['cart'][$id_product]['quantity'] = $_SESSION['cart'][$id_product]['quantity'] + $quantity;
	  		echo '<br>';
	  		echo $_SESSION['cart'][$id_product]['quantity'];
	  	}else{
	  		$_SESSION['cart'][$id_product] = $item;
	  	}
   	}
    
    // khi tăng số lượng sản phẩm
   	if ($action == 'update') {
   		$_SESSION['cart'][$id_product]['quantity'] = $quantity;
   		
   	}


   }
   // xóa sản phẩm trong giỏ hàng
   if (isset($_GET['id'])) {
   		$id = $_GET['id'];

   		unset($_SESSION['cart'][$id]);
   	}

   	header('location: show-cart.php');

   

 ?>