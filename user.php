<?php 
	session_start();
 ?>

<?php if (isset($_SESSION['user'])) { ?>
				<?php include 'page/header.php';?>
				
			    <div class="box">
			        <div class="grid wide">
			            <div class="row">
			                <div class="col l-3">
			                    <ul class="cate_user">
			                        <li class="cate_user_list">
			                            <a href="" class="cate_usre_link">Đơn hàng</a>
			                        </li>
			                        <li class="cate_user_list">
			                            <a href="user.php?page=show-cart" class="cate_usre_link">Giỏ hàng</a>      
			                        </li>
			                        <li class="cate_user_list">
			                            <a href="logout.php" class="cate_usre_link">Đăng xuất</a>
			                        </li>
			                    </ul>
			                </div> 
                            
                            <div class="col l-9">
                                <!-- <?php 
                                /*
                                		if(isset($_GET['page'])) {
									        $page = $_GET['page'];
									        include 'page/'.$page.'.php';
									      }
								*/
                                 ?> -->
                            </div>
			            </div>
			        </div>
			    </div>



			    <?php include 'page/footer.php'; ?>
         	
<?php }else{ ?>	

		<?php header('location: login.php');  ?>

      <?php } ?>




