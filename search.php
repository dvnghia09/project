
<?php include 'page/header.php';

	include 'admin/database/connect.php';

	$keyword = $_GET['keyword'];

	$sql = "SELECT * FROM product WHERE name LIKE '%$keyword%'";

	$product = mysqli_query($conn, $sql);

	



 ?>



<div class="keyword" >
	<h2 class="keyword_name" >Kết quả tìm kiếm cho: "<?php echo $keyword ?>"</h2>
</div>

<div class="grid wide">
	<div class="row">
		
		
				<?php foreach ($product as $key => $value): ?>

					<div class="col l-3 m-6 c-6 ">
						<div class="product">
                                    <a href="" class="product-item">
                                        <div class="product-item__img" style="background-image:url(upimage/<?php echo $value['image'] ?>)"></div>
                                        <h4 class="product-item__name"><?php echo $value['name'] ?></h4>
                                        <div class="product-item__price">
                                            <span class="product-item__price-old"><?php echo $value['price'] ?>đ</span>
                                            <span class="product-item__price-present"><?php echo $value['sale_price'] ?>đ</span>
                                        </div>
                                        <span class="product-item__sale">Giảm: <?php echo round(($value['sale_price']/$value['price']) * 100) ?>%</span>
                                    </a>
                                    <div class="product-item__btn">
                                        <a href="" class="product-item__btn-buy">
                                            <i class="ti-shopping-cart"></i>
                                              Đặt hàng
                                        </a>
                                        <span class="product-item__btn-brick"></span>
                                        <a href="" class="product-item__btn-buy">
                                            <i class="ti-eye"></i>
                                              Xem chi tiết
                                        </a>
                                    </div>
                        </div>            
					</div>
				<?php endforeach ?>
				

					
			

		
	</div>
</div>
 
 		
 
<?php include 'page/footer.php' ?>

