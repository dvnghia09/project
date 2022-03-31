<?php ;
	
	$no_cart = [];
	if (!empty($_SESSION['cart'])) {
		$cart = $_SESSION['cart'];
	}else{
		$no_cart['faile'] = 'Không có sản phẩm nào trong giỏ hàng của bạn';
	}

	
	
	
	

   

 ?>


		<div style="margin-top: 90px">
			
		</div>

		<?php if (!empty($no_cart)){ ?>
			<h1 style="text-align: center;" ><?php echo $no_cart['faile'] ?></h1>
		<?php }else{ ?>
				<table border="1px" >
			<tr>
				<th>STT</th>
				<th>Ảnh</th>
				<th>Tên sản phẩm</th>
				<th>Số lượng</th>
				<th>Giá</th>
				<th>Tổng giá</th>
				<th>Hành Động</th>

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
					<form action="cart.php" method="POST" accept-charset="utf-8">
						<input type="hidden" name="id" value="<?php echo $value['id'] ?>">
						<input type="hidden" name="action" value="update">
						<input type="number" name="quantity" value="<?php echo $value['quantity'] ?>">
						<button type="submit">Cập nhật</button>
					</form>
				</th>
				<th><?php echo number_format($value['price'])  ?>đ</th>
				<th><?php echo number_format($value['price'] * $value['quantity'])  ?>đ</th>
				<th><a href="cart.php?id=<?php echo $value['id'] ?>">Xóa</a></th>

			</tr>
			<?php endforeach ?>
			<tr>
				<th colspan="" rowspan="" headers="" scope="">Tổng Tiền</th>
				<th colspan="6" rowspan="" headers="" scope=""><?php echo number_format($total_price) ?>đ</th>

			</tr>
			</table>

			<!-- Đặt hàng -->
			<a href="" class="btn-check-out">
                    <i class="ti-shopping-cart"></i>
                    Đặt hàng
            </a>
		<?php } ?>


		
		
		
	
