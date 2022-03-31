<?php 

	$category = mysqli_query($conn,'SELECT * FROM category');

	$err=[];

if (isset($_POST['name'])) {
 	// lay du lieu tu form
	$name = $_POST['name'];
	$price = $_POST['price'];
	$sale_price = $_POST['sale_price'];
	$status = $_POST['status'];
	$category_id = $_POST['category_id'];



echo "anh ơi ";


	// up 1 ảnh 
	if (isset($_FILES['image'])) {
    	$type = $_FILES['image']['type'];
    	if ($type == 'image/jpeg' || $type == 'image/png' || $type == 'image/jpg') {
    		$tmp_name = $_FILES['image']['tmp_name'];
            $img_name = $_FILES['image']['name'];

            move_uploaded_file($tmp_name,'../upimage/'.$img_name);

    	    };
        };


    

	if (empty($err)) {
		$sql = "INSERT INTO product(name,price,sale_price,image,status,category_id) VALUES ('$name',$price,'$sale_price','$img_name',$status,$category_id)";

		var_dump($sql);
		 	// thuc hien truy van
		$query = mysqli_query($conn,$sql);

		print_r($query);

		if ($query) {
			header('location: index.php?page=product/list') ;
			echo "thành công";
		}else{
			echo 'Thên mới thất bại';
		};
	}

	// Up lên nhiều ảnh và lưu vao database
    if (isset($_FILES['images'])) {

    	// Lấy ra id sản phẩm đang thêm
    	$id_product = mysqli_insert_id($conn);

        foreach ($_FILES['images']['type'] as $key => $value) {
        	if ($value == 'image/jpeg' || $value == 'image/png' || $value == 'image/jpg') {
        		
        			move_uploaded_file($_FILES['images']['tmp_name'][$key],'../upimage/'.$_FILES['images']['name'][$key]);

        			$name_imgs = $_FILES['images']['name'][$key];
 					
 					// LƯU VÀO DATABASE
        			$querys =mysqli_query($conn,"INSERT INTO img_product(image,product_id) VALUES ('$name_imgs',$id_product)");

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
				<input name="name" type="text" class="form-control" id="namepro" placeholder="Nhập tên sản phẩm">			
			</div>

			<div class="form-group">
				<label for="price">Giá sản phẩm</label>
				<input name="price" type="number" class="form-control" id="price" placeholder="Nhập giá sản phẩm">			
			</div>

			<div class="form-group">
				<label for="pricesale">Giá khuyến mãi</label>
				<input name="sale_price" type="number" class="form-control" id="pricesale" placeholder="Nhập giá khuyến mãi">			
			</div>

			<div class="form-group">
				<label for="image">Ảnh sản phẩm</label>
				<input name="image" type="file" class="form-control" id="" >			
			</div>

			<div class="form-group">
				<label for="images">Ảnh mô tả</label>
				<input name="images[]" type="file" class="form-control" id="" multiple>			
			</div>

			<div class="form-group">
				<label for="image">Danh mục</label>
				<select class="form-control" name="category_id">
					<?php foreach ($category as $key => $value) { ?>
						<option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
					<?php } ?>
							
				</select>		
			</div>

			<div class="form-group">
				<label for="exampleInputFile">Trạng Thái</label>
				<div class="radio">
					<label>
						<input type="radio" name="status" id="optionsRadios1" value="1" checked>
						Hiện
					</label>
					<label>
						<input type="radio" name="status" id="optionsRadios1" value="0" >
						Ẩn
					</label>
				</div>
			</div>
		</div>

		<div class="box-footer">
			<button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
		</div>
	</form>
</div>