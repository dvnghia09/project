<?php 
	$category = mysqli_query($conn,"SELECT * FROM category");

 ?>

<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Danh sách danh mục của bạn</h3>
	</div>

	<div class="box-body">
		<table class="table table-bordered">
			<tbody>

			<tr>
				<th style="width: 10px">STT</th>
				<th>Tên danh mục</th>
				<th>Trạng thái</th>
				<th style="width: 50px">Sửa</th>
				<th style="width: 50px">Xóa</th>
			</tr>

			<?php foreach ($category as $key => $value) : ?>
			<tr>
				<td><?php echo $key ?></td>
				<td><?php echo $value['name'] ?></td>
				<td>
					<?php if ($value['status'] == 1) { ?>
						<span class="badge bg-red">Hiện</span></td>
					<?php }else{ ?>
						<span class="badge bg-black">Ẩn</span></td>
					<?php } ?>
				</td>
				<td>
					<a href="index.php?page=category/edit&id=<?php echo $value['id'] ?>" >
					   <i class="fa fa-fw fa-edit"></i>
				    </a>
				</td>
				<td>
					<a href="index.php?page=category/delete&id=<?php echo $value['id'] ?>" >
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
			<li><a href="#">«</a></li>
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">»</a></li>
		</ul>
	</div>
</div>