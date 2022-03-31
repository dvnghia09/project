<?php ;


	

	include 'admin/database/connect.php';

	$sql = "SELECT * FROM product";

	$product = mysqli_query($conn, $sql);

	$category = mysqli_query($conn, "SELECT * FROM category");

	if (isset($_GET['pro'])) {

		$id_pro = $_GET['pro'];

		$product = mysqli_query($conn, "SELECT * FROM product WHERE category_id = $id_pro ");
		
	}

?>


		<?php include 'page/header.php' ?>

        <div class="app__container">
            <!-- slider -->
             <div class="slide">
                  <div class="slide-move">
                         <div class="slide-move__item active">
                             <a href="" class="slide-move__item-link">
                                   <img class="slide-move__item-img" src="./assests/img/slide5.jpg"alt="">
                             </a>
                         </div>
                         <div class="slide-move__item">
                            <a href="" class="slide-move__item-link">
                                  <img class="slide-move__item-img" src="./assests/img/slide2.jpg"alt="">
                            </a>
                        </div>
                        <div class="slide-move__item">
                            <a href="" class="slide-move__item-link">
                                  <img class="slide-move__item-img" src="./assests/img/slide4.jpg"alt="">
                            </a>
                        </div>
                       
                  </div>
                  <div class="slide-next">
                      <span class="slide-up"><i class="ti-angle-right"></i></span>
                      <span class="slide-back"><i class="ti-angle-left"></i></span>
                  </div>
             </div>

             <div class="products">
                <div class="grid wide">
                    <div class="product-new">
                          <div class="product-heading">
                             <h2 class="product-heading__title">SẢN PHẨM MỚI</h2>
                             <h3 class="product-heading__subtitle">New Arrival</h3>
                          </div>
                          <div class="row">

                          	<?php foreach ($product as $key => $value): ?>

                          		<div class="col l-3 m-6 c-6 ">
                                <div class="product">
                                    <a href="product_detail.php?id=<?php echo $value['id'] ?>" class="product-item">
                                        <div class="product-item__img" style="background-image:url(upimage/<?php echo $value['image'] ?>)"></div>
                                        <h4 class="product-item__name"><?php echo $value['name'] ?></h4>
                                        <div class="product-item__price">
                                            <span class="product-item__price-old"><?php echo number_format($value['price'])  ?>đ</span>
                                            <span class="product-item__price-present"><?php echo number_format($value['sale_price'])  ?>đ</span>
                                        </div>
                                        <span class="product-item__sale">Giảm: <?php echo round(($value['sale_price']/$value['price']) * 100) ?>%</span>
                                    </a>
                                    <div class="product-item__btn">
                                    	
                                        <form method="POST" action="cart.php" class = "purchase-info">
								            <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
								            <input type ="hidden" name="quantity"  value = "1">
								            <input type="hidden" name="action" value="add">

								            <button class="product-item__btn-buy" type = "submit" class = "btn">
								              Thêm giỏ hàng <i class="ti-shopping-cart"></i>
								            </button>
								            
								         </form>
                                        <span class="product-item__btn-brick"></span>
                                        <a href="product_detail.php?id=<?php echo $value['id'] ?>" class="product-item__btn-buy">
                                            <i class="ti-eye"></i>
                                              Xem chi tiết
                                        </a>
                                    </div>
                                </div>                               
                            </div>
                          		
                          	<?php endforeach ?>
                            
                            
                          </div>
                          <div class="see-all">
                              <a href="" class="see-all-link">Xem tất cả mẫu mới</a>
                          </div>
                    </div>
                    <div class="product-new">
                        <div class="product-heading">
                           <h2 class="product-heading__title">Siêu sale tháng 9</h2>
                           <h3 class="product-heading__subtitle">Sale off</h3>
                        </div>
                        <div class="row">
                          <div class="col l-3 m-6 c-6 ">
                              <div class="product">
                                  <a href="" class="product-item">
                                      <div class="product-item__img" style="background-image:url(./assests/img/product2.jpg)"></div>
                                      <h4 class="product-item__name">Váy lụa NB02</h4>
                                      <div class="product-item__price">
                                          <span class="product-item__price-old">500.000đ</span>
                                          <span class="product-item__price-present">299.000đ</span>
                                      </div>
                                      <span class="product-item__sale">Giảm 30%</span>
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
                          <div class="col l-3 m-6 c-6 ">
                              <div class="product">
                                  <a href="" class="product-item">
                                      <div class="product-item__img" style="background-image:url(./assests/img/product2.jpg)"></div>
                                      <h4 class="product-item__name">Váy lụa NB02</h4>
                                      <div class="product-item__price">
                                          <span class="product-item__price-old">500.000đ</span>
                                          <span class="product-item__price-present">299.000đ</span>
                                      </div>
                                      <span class="product-item__sale">Giảm 30%</span>
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
                          <div class="col l-3 m-6 c-6 ">
                              <div class="product">
                                  <a href="" class="product-item">
                                      <div class="product-item__img" style="background-image:url(./assests/img/product2.jpg)"></div>
                                      <h4 class="product-item__name">Váy lụa NB02</h4>
                                      <div class="product-item__price">
                                          <span class="product-item__price-old">500.000đ</span>
                                          <span class="product-item__price-present">299.000đ</span>
                                      </div>
                                      <span class="product-item__sale">Giảm 30%</span>
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
                          <div class="col l-3 m-6 c-6 ">
                              <div class="product">
                                  <a href="" class="product-item">
                                      <div class="product-item__img" style="background-image:url(./assests/img/product2.jpg)"></div>
                                      <h4 class="product-item__name">Váy lụa NB02</h4>
                                      <div class="product-item__price">
                                          <span class="product-item__price-old">500.000đ</span>
                                          <span class="product-item__price-present">299.000đ</span>
                                      </div>
                                      <span class="product-item__sale">Giảm 30%</span>
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
                          <div class="col l-3 m-6 c-6 ">
                              <div class="product">
                                  <a href="" class="product-item">
                                      <div class="product-item__img" style="background-image:url(./assests/img/product2.jpg)"></div>
                                      <h4 class="product-item__name">Váy lụa NB02</h4>
                                      <div class="product-item__price">
                                          <span class="product-item__price-old">500.000đ</span>
                                          <span class="product-item__price-present">299.000đ</span>
                                      </div>
                                      <span class="product-item__sale">Giảm 30%</span>
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
                          <div class="col l-3 m-6 c-6 ">
                              <div class="product">
                                  <a href="" class="product-item">
                                      <div class="product-item__img" style="background-image:url(./assests/img/product2.jpg)"></div>
                                      <h4 class="product-item__name">Váy lụa NB02</h4>
                                      <div class="product-item__price">
                                          <span class="product-item__price-old">500.000đ</span>
                                          <span class="product-item__price-present">299.000đ</span>
                                      </div>
                                      <span class="product-item__sale">Giảm 30%</span>
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
                          <div class="col l-3 m-6 c-6 ">
                              <div class="product">
                                  <a href="" class="product-item">
                                      <div class="product-item__img" style="background-image:url(./assests/img/product2.jpg)"></div>
                                      <h4 class="product-item__name">Váy lụa NB02</h4>
                                      <div class="product-item__price">
                                          <span class="product-item__price-old">500.000đ</span>
                                          <span class="product-item__price-present">299.000đ</span>
                                      </div>
                                      <span class="product-item__sale">Giảm 30%</span>
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
                          <div class="col l-3 m-6 c-6 ">
                              <div class="product">
                                  <a href="" class="product-item">
                                      <div class="product-item__img" style="background-image:url(./assests/img/product2.jpg)"></div>
                                      <h4 class="product-item__name">Váy lụa NB02</h4>
                                      <div class="product-item__price">
                                          <span class="product-item__price-old">500.000đ</span>
                                          <span class="product-item__price-present">299.000đ</span>
                                      </div>
                                      <span class="product-item__sale">Giảm 30%</span>
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
                        </div>
                        <div class="see-all">
                            <a href="" class="see-all-link">Xem tất cả</a>
                        </div>
                    </div>
                    <div class="product-new">
                        <div class="product-heading">
                           <h2 class="product-heading__title">TOP BÁN CHẠY NHẤT</h2>
                           <h3 class="product-heading__subtitle">Hot Item</h3>
                        </div>
                        <div class="row">
                            <!-- img top bán CHẠY -->
                            <div class="col l-6 m-12 c-12">                               
                                <a class="hot-item" href="">
                                    <img class="hot-item-img" src="./assests/img/product-1.jpg" alt="">
                               </a>                               
                            </div>


                            <div class="col l-6 m-12 c-12">
                                <div class="row ">
                                    <div class="col l-2-6 m-6 c-6 ">
                                        <div class="product">
                                            <a href="" class="product-item">
                                                <div class="product-item__img" style="background-image:url(./assests/img/product-1.jpg)"></div>
                                                <h4 class="product-item__name">Váy lụa NB02</h4>
                                                <div class="product-item__price">
                                                    <span class="product-item__price-old">500.000đ</span>
                                                    <span class="product-item__price-present">299.000đ</span>
                                                </div>
                                                <span class="product-item__sale">Giảm 30%</span>
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
                                    <div class="col l-2-6 m-6 c-6 ">
                                        <div class="product">
                                            <a href="" class="product-item">
                                                <div class="product-item__img" style="background-image:url(./assests/img/product-5.jpg)"></div>
                                                <h4 class="product-item__name">Váy lụa NB02</h4>
                                                <div class="product-item__price">
                                                    <span class="product-item__price-old">500.000đ</span>
                                                    <span class="product-item__price-present">299.000đ</span>
                                                </div>
                                                <span class="product-item__sale">Giảm 30%</span>
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
                                    <div class="col l-2-6 m-6 c-6 ">
                                        <div class="product">
                                            <a href="" class="product-item">
                                                <div class="product-item__img" style="background-image:url(./assests/img/product-3.jpg)"></div>
                                                <h4 class="product-item__name">Váy lụa NB02</h4>
                                                <div class="product-item__price">
                                                    <span class="product-item__price-old">500.000đ</span>
                                                    <span class="product-item__price-present">299.000đ</span>
                                                </div>
                                                <span class="product-item__sale">Giảm 30%</span>
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
                                    <div class="col l-2-6 m-6 c-6 ">
                                        <div class="product">
                                            <a href="" class="product-item">
                                                <div class="product-item__img" style="background-image:url(./assests/img/product-2.jpg)"></div>
                                                <h4 class="product-item__name">Váy lụa NB02</h4>
                                                <div class="product-item__price">
                                                    <span class="product-item__price-old">500.000đ</span>
                                                    <span class="product-item__price-present">299.000đ</span>
                                                </div>
                                                <span class="product-item__sale">Giảm 30%</span>
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
                                </div>
                            </div>
                            
                            <div class="see-all">
                                <a href="" class="see-all-link">Xem tất cả</a>
                            </div>
                        </div>
                    </div>
                    
             </div>
        </div>

        <?php include 'page/footer.php' ?>

 
 		
 


