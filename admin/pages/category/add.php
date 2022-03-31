<?php 

	$err=[];

 if (isset($_POST['name'])) {
 	// lay du lieu tu form
 	$name = $_POST['name'];
 	$status = $_POST['status'];

 	$check_name = mysqli_query($conn,"SELECT * FROM category WHERE name = '$name'");

 	if (mysqli_num_rows($check_name) == 1) {
 		$err['faile']	= 'Tên danh mục đã tồn tại !';
 	}

 	if ($name == '') {
 			$err['faile']	= 'Vui lòng nhập tên danh mục bạn muốn thêm !';
 	}


 	if (empty($err)) {
 			$sql = "INSERT INTO category(name,status) VALUES ('$name',$status)";

		 	// thuc hien truy van
		 	$query = mysqli_query($conn,$sql);

		 	if ($query) {
		 		header('location: index.php?page=category/list' );
		 	}else{
		 		$err['faile'] = 'Tên danh mục đã tồn tại !';
		 	};
 		}	
 	 
 	

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
				<input name="name" type="text" class="form-control" id="namecategory" placeholder="Nhập tên danh mục">
				
					<?php foreach ($err as $key => $value): ?>
						<label class="control-label" style="color:red"><i class="fa fa-times-circle-o"></i><?php echo $value?></label>
					<?php endforeach ?>
				
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
			<button type="submit" class="btn btn-primary">Thêm danh mục</button>
		</div>
	</form>
</div>