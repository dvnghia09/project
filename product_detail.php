<?php 
    include 'admin/database/connect.php';
    $id = $_GET['id'];

    $sql = "SELECT * FROM product WHERE id = $id";

    $query = mysqli_query($conn, $sql);

    $product = mysqli_fetch_assoc($query);


    $img_product = mysqli_query($conn, "SELECT * FROM img_product WHERE product_id = $id");


    

 ?>




    <?php include 'page/header.php' ?>

    
    <div class = "card-wrapper">
      <div class = "card">
        <!-- card left -->
        <div class = "product-imgs">
          <div class = "img-display">
            <div class = "img-showcase">
              <img style="width: 100%" src = "upimage/<?php echo $product['image'] ?>" >
              
              <?php foreach ($img_product as $key => $value): ?>
                <img style="width: 100%" src = "upimage/<?php echo $value['image'] ?>" >
              <?php endforeach ?>
            </div>
          </div>
          <div class = "img-select">
            <div class = "img-item">
              <a href = "#" data-id = "1">
                <img style="width: 100%" src = "upimage/<?php echo $product['image'] ?>" alt = "shoe image">
              </a>
            </div>

            <?php foreach ($img_product as $key => $value): ?>
                
                <div class = "img-item">
                  <a href = "#" data-id = "<?php echo $key + 2 ?>">
                      <img style="width: 100%" src = "upimage/<?php echo $value['image'] ?>" alt = "shoe image">
                  </a>
                </div>

            <?php endforeach ?>

            
            
            
          </div>
        </div>
        <!-- card right -->
        <div class = "product-content">
          <h2 class = "product-title"><?php echo $product['name'] ?></h2>
          <a href = "index.php" class = "product-link">Quay lại cửa hàng</a>
          <div class = "product-rating">
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star-half-alt"></i>
            <span>4.7(21)</span>
          </div>

          <div class = "product-price">
            <p class = "last-price">Old Price: <span><?php echo $product['price'] ?>đ</span></p>
            <p class = "new-price">New Price: <span><?php echo $product['sale_price'] ?>đ</span></p>
          </div>

          <div class = "product-detail">
            <h2>Mô tả về sản phẩm: </h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo eveniet veniam tempora fuga tenetur placeat sapiente architecto illum soluta consequuntur, aspernatur quidem at sequi ipsa!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, perferendis eius. Dignissimos, labore suscipit. Unde.</p>
            <ul>
              <li>Màu: <span>Black</span></li>
              <li>Available: <span>in stock</span></li>
              <li>Thuộc danh mục: <span>Shoes</span></li>
              <li>Shipping Area: <span>All over the world</span></li>
              <li>Shipping Fee: <span>Free</span></li>
            </ul>
          </div>

          <form method="POST" action="cart.php" class = "purchase-info">
            <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
            <input type ="number" min="1" name="quantity"  value = "1">
            <input type="hidden" name="action" value="add">

            <button type = "submit" class = "btn">
              Thêm vào giỏ hàng <i class = "fas fa-shopping-cart"></i>
            </button>
            <button type = "button" class = "btn">Mua ngay</button>
          </form>

          <div class = "social-links">
            <p>Chia sẻ tới: </p>
            <a href = "#">
              <i class = "fab fa-facebook-f"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-twitter"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-instagram"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-whatsapp"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-pinterest"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
    <?php include 'page/footer.php' ?>
    
 

