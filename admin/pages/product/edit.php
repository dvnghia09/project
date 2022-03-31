<?php
if (isset($_GET['id'])) {
	$id_product = $_GET['id'];

	$data_product = mysqli_query($conn,"SELECT * FROM product WHERE id=$id_product"); 

	$product = mysqli_fetch_assoc($data_product);


	$img_product = mysqli_query($conn,"SELECT * FROM img_product WHERE product_id = $id_product");
};

$category = mysqli_query($conn,'SELECT * FROM category');



$err=[];

if (isset($_POST['name'])) {
 	// lay du lieu tu form
	$name = $_POST['name'];
	$price = $_POST['price'];
	$sale_price = $_POST['sale_price'];
	$status = $_POST['status'];
	$category_id = $_POST['category_id'];



	// edit 1 ảnh
	if ($_FILES['image']['name'] != '') {
		$type = $_FILES['image']['type'];
		if ($type == 'image/jpeg' || $type == 'image/png' || $type == 'image/jpg') {
			$tmp_name = $_FILES['image']['tmp_name'];
			$img_name = $_FILES['image']['name'];

			move_uploaded_file($tmp_name,'../upimage/'.$img_name);

		}else{
			echo "File Không Hợp Lệ";
		};
	}else{
		$img_name = $product['image'];
	};



	if (empty($err)) {
		$sql = "UPDATE product SET name = '$name' ,price = $price,sale_price = '$sale_price',status = $status,category_id =$category_id ,image = '$img_name' WHERE id = $id_product";

		var_dump($sql);
		 	// thuc hien truy van
		$query = mysqli_query($conn,$sql);

		print_r($query);

		if ($query) {
			header('location: index.php?page=product/list') ;
		}else{
			echo 'Thên mới thất bại';
		};
	}

	// Sửa ảnh mô tả
    if ($_FILES['images']['name'][0] != '') {

    	// xóa ảnh mô tả cũ
    	mysqli_query($conn,"DELETE FROM img_product WHERE product_id = $id_product");

        foreach ($_FILES['images']['type'] as $key => $value) {
        	if ($value == 'image/jpeg' || $value == 'image/png' || $value == 'image/jpg') {
        		
        			move_uploaded_file($_FILES['images']['tmp_name'][$key],'../upimage/'.$_FILES['images']['name'][$key]);

        			$name_imgs = $_FILES['images']['name'][$key];
 					
 					// LƯU VÀO DATABASE
        			$querys = mysqli_query($conn,"INSERT INTO img_product(image,product_id) VALUES ('$name_imgs',$id_product)");

        			if ($querys) {
        				echo "thành công up nhiều anh";
        			}else{
        				echo "ko up đk nhiều ảnh";
        			}
        		
        	}
        }

      };		



}

?>


<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Nhập các trường để thêm mới sản phẩm</h3>
	</div>


	<form role="form" method="POST" enctype="multipart/form-data">
		<div class="box-body">
			<div class="form-group">
				<label for="namepro">Tên sản phẩm</label>
				<input name="name" type="text" class="form-control" value="<?php echo $product['name'] ?>" id="namepro" placeholder="Nhập tên sản phẩm">			
			</div>

			<div class="form-group">
				<label for="price">Giá sản phẩm</label>
				<input name="price" type="number" class="form-control" value="<?php echo $product['price'] ?>" id="price" placeholder="Nhập giá sản phẩm">			
			</div>

			<div class="form-group">
				<label for="pricesale">Giá khuyến mãi</label>
				<input name="sale_price" value="<?php echo $product['sale_price'] ?>" type="number" class="form-control" id="pricesale" placeholder="Nhập giá khuyến mãi">			
			</div>

			<div class="form-group">
				<label for="image">Ảnh sản phẩm</label>
				<input name="image" type="file" class="form-control" id="" >
				<img width="60px" src="../upimage/<?php echo $product['image'] ?>" alt="">			
			</div>

			<div class="form-group">
				<label for="images">Ảnh mô tả</label>
				<input name="images[]" type="file" class="form-control" id="" multiple>	
				<div class="img_list" >
				    <?php foreach ($img_product as $key => $value) : ?>

							<img width="50px" src="../upimage/<?php echo $value['image'] ?>" alt="">
					<?php endforeach ?>		
				</div>		
			</div>

			<div class="form-group">
				<label for="image">Danh mục</label>
				<select class="form-control" name="category_id">
					<?php foreach ($category as $key => $value) { ?>
						<option value="<?php echo $value['id'] ?>" <?php echo ($product['category_id'] == $value['id']) ? 'selected': "" ?> ><?php echo $value['name'] ?></option>
					<?php } ?>
							
				</select>		
			</div>

			<div class="form-group">
				<label for="exampleInputFile">Trạng Thái</label>
				<div class="radio">
					<label>
						<input type="radio" name="status" id="optionsRadios1" value="1" <?php echo ($product['status'] ==1 ? 'checked' : '') ?> >
						Hiện
					</label>
					<label>
						<input type="radio" name="status" id="optionsRadios1" value="0" <?php echo ($product['status'] ==0 ? 'checked' : '') ?>>
						Ẩn
					</label>
				</div>
			</div>
		</div>

		<div class="box-footer">
			<button type="submit" class="btn btn-primary">Chỉnh sử sản phẩm</button>
		</div>
	</form>
</div>