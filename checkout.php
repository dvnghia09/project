<?php include 'page/header.php';
	$user = $_SESSION['user'];
	

	
	
	
	

   // echo '<pre>';
   // print_r($cart);
   // echo '</pre>';

 ?>


		<div class="grid wide" style="margin-top: 90px">
			
		

		<?php if (!isset($_SESSION['user'])){ ?>
			<div>
				Bạn chưa đăng nhập , vui lòng đăng nhập tài khoản của bạn để đặt hàng
				<a href="login.php?action=checkout.php">Đăng Nhập</a>
			</div>
		<?php }else{ ?>
			<div class="row">
				<div class="col l-6">
				<table style="width: 100%" border="1px" >
			<tr>
				<th>STT</th>
				<th>Ảnh</th>
				<th>Tên sản phẩm</th>
				<th>Số lượng</th>
				<th>Giá</th>
				<th>Tổng giá</th>
				

			</tr>
			<?php $stt = 0 ?>
			<?php $total_price = 0 ?>
			<?php foreach ($cart as $key => $value): ++$stt  ?>
				<?php $total_price +=  $value['price'] * $value['quantity']  ?>
			<tr>
				<th><?php echo $stt ?></th>
				<th><img width="100px" src="upimage/<?php echo $value['image'] ?>" alt=""></th>
				<th><?php echo $value['name'] ?></th>
				<th>
					<?php echo $value['quantity'] ?>				
				</th>
				<th><?php echo number_format($value['price'])  ?>đ</th>
				<th><?php echo number_format($value['price'] * $value['quantity'])  ?>đ</th>
				
			</tr>
			<?php endforeach ?>
			<tr>
				<th colspan="" rowspan="" headers="" scope="">Tổng Tiền</th>
				<th colspan="5" rowspan="" headers="" scope=""><?php echo number_format($total_price) ?>đ</th>

			</tr>
			</table>
				</div>
				<div class="col l-6">
					<!-- ------------form đặt hàng--------------- -->

					<form action="" method="POST" accept-charset="utf-8">
						Tên
						<input style="width: 100%" type="text" name="name">
						Email
						<input style="width: 100%" type="email" value="<?php echo $user['email'] ?>" name="email">
						Số điện thoại
						<input style="width: 100%" type="text" name="phone">
						Địa chỉ
						<input style="width: 100%" type="text" name="address">
						Lời nhắn
						<input style="width: 100%" type="text" rows="3" name="address">
						<button type="submit">Đặt hàng</button>
					</form>	

			
				</div>
			</div>
			


			
		<?php } ?>


		</div>
		
		
	
<?php include 'page/footer.php' ?>