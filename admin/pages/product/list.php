<?php 
	$conn = mysqli_connect('localhost','root','','shop');
	mysqli_set_charset($conn,'utf8');

	$sql = "SELECT * FROM product";

	$product = mysqli_query($conn,$sql);

	// Tổng số sản phẩm
	$total_product = mysqli_num_rows($product);


		//Page hiện tại 
	$curent_page = (isset($_GET['page_item'])) ? $_GET['page_item'] : 1 ;

	// Giới hạn sản phẩm trên 1 trang
	$limit = 5;

	// Biến bắt đầu khi limit
	$start = ($curent_page-1) * $limit;

	// tổng số trang
	$totalPageProduct = ceil($total_product / $limit);

	


	$sql = "SELECT product.*, category.name as 'cate_name' FROM product JOIN category ON product.category_id = category.id LIMIT $start,$limit";

	$product = mysqli_query($conn,$sql);

	



 ?>

<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Danh sách sản phẩm của bạn</h3>
	</div>

	<div class="box-body">
		<table class="table table-bordered">
			<tbody>

			<tr>
				<th style="width: 10px">STT</th>
				<th>Thuộc Danh Mục</th>
				<th>Tên sản phẩm</th>
				<th>Ảnh sản phẩm</th>
				<th>Giá sản phẩm</th>
				<th>Sale</th>
				<th>Trạng thái</th>
				<th style="width: 50px">Sửa</th>
				<th style="width: 50px">Xóa</th>
			</tr>

			<?php foreach ($product as $key => $value) : ?>
			<tr>
				<td><?php echo $key +1 ?></td>
				<td><?php echo $value['cate_name'] ?></td>
				<td><?php echo $value['name'] ?></td>
				<td><img width="50px" src="../upimage/<?php echo $value['image'] ?>" alt=""></td>
				<td><?php echo $value['price'] ?></td>
				<td><?php echo $value['sale_price'] ?></td>
				<td>
					<?php if ($value['status'] == 1) { ?>
						<span class="badge bg-red">Hiện</span></td>
					<?php }else{ ?>
						<span class="badge bg-black">Ẩn</span></td>
					<?php } ?>
				</td>
				<td>
					<a href="index.php?page=product/edit&id=<?php echo $value['id'] ?>" >
					   <i class="fa fa-fw fa-edit"></i>
				    </a>
				</td>
				<td>
					<a href="index.php?page=product/delete&id=<?php echo $value['id'] ?>" >
					   <i class="fas fa-trash-alt"></i>
				    </a>
				</td>
			</tr>
			<?php endforeach ?>
			
		    </tbody>
	</table>
	</div>

	<div class="box-footer clearfix">
		<ul class="pagination pagination-sm no-margin pull-right">
			<li style="display:<?php echo ($curent_page <= 1) ?  'none' : '' ?>"><a href="index.php?page=product/list&page_item=<?php echo $curent_page - 1 ?>">«</a></li>

			<?php for($i = 0; $i < $totalPageProduct ; $i++): ?>

				<li class="<?php echo (($i + 1) == $curent_page)? "active" : "" ?>"><a href="index.php?page=product/list&page_item=<?php echo $i + 1 ?>"><?php echo $i + 1?></a> </li>
				
			<?php endfor ?>

			<li style="display:<?php echo ($curent_page >= $totalPageProduct) ?  'none' : '' ?>" ><a href="index.php?page=product/list&page_item=<?php echo $curent_page + 1 ?>">»</a></li>
		</ul>
	</div>
</div>