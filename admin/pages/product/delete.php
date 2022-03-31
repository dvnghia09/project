<?php 
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		// Xóa ảnh mô tả
		$querys = mysqli_query($conn,"DELETE FROM img_product WHERE product_id = $id");

        // Xóa sản phẩm
		$sql = "DELETE FROM product WHERE id=$id";
		$query = mysqli_query($conn,$sql);



		if($query) {
			header('location: index.php?page=product/list');
		};
	}
 ?>