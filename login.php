<?php 
  include 'admin/database/connect.php';
  session_start();

  

  if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query($conn,"SELECT * FROM user WHERE email = '$email' ");

    $data = mysqli_fetch_assoc($query);

    $checkEmail = mysqli_num_rows($query);

    if ($checkEmail == 1) {
      $checkPass = password_verify($password, $data['password']);

      if ($checkPass) {
        $_SESSION['user'] = $data;

        if (isset($_GET['action'])) {
          $action = $_GET['action'];
          header('location: '.$action);
        }else{
          header('location: user.php');
        }
        
      }else{
        echo "vui lòng nhập lại mật khẩu";
      }
    }else{
      echo "Email không chính xác";
    }
    

  }


  

 ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
  <link rel="stylesheet" href="./assests/font/fontawesome-free-5.15.3-web/fontawesome-free-5.15.3-web/css/all.css">

<style>

    * {
      box-sizing: inherit;
    }

    html{
      scroll-behavior: smooth;
      font-family: 'Roboto', sans-serif;
      box-sizing: border-box; 
      font-size: 62.5%;
      line-height: 1.6rem;
    }

    @keyframes modal{
      from{
        opacity: 0;
        transform: scale(0.7);
      }
      to{ 
        opacity: 1;
        transform: scale(1);
      }
    }

    .header_login {
    height: 60px;
    width: 100%;
    background: #ffffff;
    z-index: 16;
    display: flex;
    align-items: center;
  }

  .header_login_name {
    font-size: 4rem;
    margin: 0;
    margin-left: 36px;
    display: block;
    text-decoration: none;
    color: #000;
    line-height: 4rem;
    font-weight: 700;
}

.header_login_name_sub {
    margin-top: 27px;
    font-size: 2.5rem;
    margin-left: 20px;
    opacity: 0.6;
}


    .modal {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-image: linear-gradient(to bottom right , rgb(158 158 231) , rgb(255 255 255));
      animation:fadeIn linear 0.1s;
      z-index: 5;
      margin-top: 60px

    }

    .err {
    text-align: center;
    margin: 0;
    padding: 10px 0;
}

    .modal-active{
      display: flex;
    }

    .modal__form{
      margin-top: 20px !important;
      border-radius: 5px;
      margin: auto;
      width: 500px;
      overflow: hidden;
      animation: modal linear 0.1s;
      display: block ;
      display: none; 

    }

    .modal__form-active{
      display: block;
    }

    .modal__form-container{
      background-color: #fff;
    }


    .modal__form-form{
      padding: 0 32px;
    }

    .modal__form-header{
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 8px 44px;
    }

    .modal__form-heading{
      font-size: 2.2rem;
      font-weight: 400;
      color: #000;
    }

    .modal__form-btn{
      font-size: 1.6rem;
      font-weight: 600;
      color: red;
      cursor: pointer;
    }

    .modal__form-control{
      width: 100%;
      margin-top: 16px;
      height: 40px;
      border: 1px solid #ccc;
      border-radius:2px ;
      padding: 0 12px;
      font-size: 1.4rem;
    }

    .modal__form-note{
      margin-top: 20px;
      padding: 0 44px ;
      text-align: center;
    }


    .modal__form-text{
      font-size: 1.2rem; 
    }

    .modal__form-text-link{
      text-decoration: none;
      color: red;
    }

    .modal__form-button{
      margin-top: 78px;
      display: flex;
      justify-content: flex-end;
      padding: 22px 32px;
    }

    .btn-back{
      margin-right:8px ;
    }

    .btn-back:hover{
      background-color: rgba(0,0,0, 0.05);
    }

    .modal__form-socials{
      background-color: #f5f5f5;
      padding: 12px 32px;
      display: flex;
      justify-content: space-between;
    }

    .btn--fb{
      background-color: #0751af !important;
      color: #fff !important;

    }

    .btn--fb-icon{
      font-size: 1.8rem;
      position: absolute;
      left: 10px;
    }

    .size-icon-google{
      width: 20px;
      position: absolute;
      left: 10px;
    }

    .modal__form-social-title{
      margin:0 15%;
    } 

    .btn--fb,.btn--gg{
      width: 48%;
      position: relative;
    }


    .modal__form-help{
      margin-top: 20px;
      padding: 0 32px;
      display: flex;
      justify-content: flex-end;
    }

    .modal__form-help-link{
      text-decoration: none;
      font-size: 1.4rem;
      color: #939393;
    }

    .modal__form-help-brick{
      border-left: 1px solid #bfbebe;
      margin: 0 16px;
    }

    .modal__form-help-forgot{
      color: red;
      font-weight: 550;
    }

    .btn{
      min-width: 124px;
      height: 34px;
      text-decoration: none;
      border: none;
      border-radius: 3px;
      font-size: 1.5rem;
      padding: 0;
      cursor: pointer;
      color: #000;
      background-color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      display: inline-flex;

    }

    .btn.btn--size-s{
      height: 30px;
      font-size: 1.2rem;
    }

    .btn.btn--primary{
      color: #fff;
      background-color:red;
    }

    /* select */

    .select-input{
      min-width: 120px;
      height: 34px;
      background-color: #fff;
      padding: 0 12px;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 2px;
    }
</style>
</head>

<body>

  <div class="header_login">
      <a href="index.php" class="header_login_name">Nabi</a>
      <h2 class="header_login_name_sub">Đăng nhập</h2>
  </div>
  <div class="modal">

      <!-- form đăng nhập -->
      <div class="modal__form modal__form-active">
        <div class="modal__form-container">

          <div class="modal__form-header">
            <h3 class="modal__form-heading">Đăng nhập</h3>
            <a href="register.php" class="modal__form-btn">Đăng ký</a>
          </div>

                <form class="modal__form-form" method="POST">

              <div class="modal__form-group">
                <input type="email" class="modal__form-control" name="email" placeholder="Nhâp email của bạn...">
              </div>
              <div class="modal__form-group">
                <input type="password" class="modal__form-control" name="password" placeholder="Mật khẩu của bạn">
              </div>
              


              <div class="modal__form-help">
                      <a href="" class="modal__form-help-link modal__form-help-forgot">Quên Mật Khẩu</a>
                      <span class="modal__form-help-brick"></span> 
                      <a href="" class="modal__form-help-link">Cần trợ giúp?</a>
                  </div>

          <div class="modal__form-button">
            <a href="index.php" class="btn btn-back">TRỞ LẠI</a>
            <button type="submit" class="btn btn--primary">ĐĂNG NHẬP</button>
          </div>
        </div>

           

        </form>


                
          
          
        
                <div class="modal__form-socials">
                  <a href="https://www.facebook.com/" class="btn btn--size-s btn--fb">
                    <i class="fab fa-facebook-square btn--fb-icon"></i>
                    <span class="modal__form-social-title">Kết nối với Facebook</span>

                  </a>
                  <a href="" class="btn btn--size-s btn--gg">
                    <img class="size-icon-google" src="https://img.icons8.com/color/48/000000/google-logo.png"/>
                    <span class="modal__form-social-title">Kết nối với Google</span>
                    
                  </a>

                </div>


      </div>
    </div>

  </body>
  </html>