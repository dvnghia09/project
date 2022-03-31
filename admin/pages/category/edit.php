<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$data = mysqli_query($conn,"SELECT * FROM category WHERE id=$id") ;

		$category = mysqli_fetch_assoc($data);
	}

   

	$err=[];

    if (isset($_POST['name'])) {
 	// lay du lieu tu form
 	$name = $_POST['name'];
 	$status = $_POST['status'];

 	$check_name = mysqli_query($conn,"SELECT * FROM category WHERE name = '$name' AND id!=$id");

 	if (mysqli_num_rows($check_name) == 1) {
 		$err['faile']	= 'Tên danh mục đã tồn tại !';
 	}

 	if ($name == '') {
 			$err['faile']	= 'Vui lòng nhập tên danh mục bạn muốn thay đổi !';
 	}

 	if (empty($err)) {
 			$sql = "UPDATE category SET name='$name',status=$status WHERE id=$id";

		 	// thuc hien truy van
		 	$query = mysqli_query($conn,$sql);

		 	if ($query) {
		 		header('location: index.php?page=category/list' );
		 	};
 		};	
 	 
 	

 }

?>


<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Nhập các trường để thêm mới danh mục</h3>
	</div>


	<form role="form" method="POST">
		<div class="box-body">
			<div class="form-group">
				<label for="namecategory">Tên danh mục</label>
				<input name="name" type="text" class="form-control" value="<?php echo $category['name'] ?>" id="namecategory" placeholder="Nhập tên danh mục">
				
					<?php foreach ($err as $key => $value): ?>
						<label class="control-label" style="color:red"><i class="fa fa-times-circle-o"></i><?php echo $value?></label>
					<?php endforeach ?>
				
			</div>
			<div class="form-group">
				<label for="exampleInputFile">Trạng Thái</label>
				<div class="radio">
					<label>
						<input type="radio" name="status" id="optionsRadios1" value="1" <?php echo ($category['status'] ==1 ? 'checked' : '') ?>>
						Hiện
					</label>
					<label>
						<input type="radio" name="status" id="optionsRadios1" value="0" <?php echo ($category['status'] ==0 ? 'checked' : '') ?>>
						Ẩn
					</label>
				</div>
			</div>
		</div>

		<div class="box-footer">
			<button type="submit" class="btn btn-primary">Chỉnh sửa danh mục</button>
		</div>
	</form>
</div>