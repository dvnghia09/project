<?php 
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$sql = "DELETE FROM category WHERE id=$id";

		$query = mysqli_query($conn,$sql);

		if($query) {
			header('location: index.php?page=category/list');
		};
	}
 ?>