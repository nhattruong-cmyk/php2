<?php
if (isset($_POST['logout'])) {
  $_SESSION['user'] = "";
  echo "<script>window.location.href = '?pages=login';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <title>BookingStorm</title>

  <!-- Bootstrap core CSS -->
  <link href="public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Thư viện Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Thư viện Bootstrap Icons (nếu bạn chưa sử dụng CDN khác) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.19.0/font/bootstrap-icons.css" rel="stylesheet">



  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="public/assets/css/style.css">
  <link rel="stylesheet" href="public/assets/css/fontawesome.css">
  <link rel="stylesheet" href="public/assets/css/templatemo-villa-agency.css">
  <link rel="stylesheet" href="public/assets/css/owl.css">
  <link rel="stylesheet" href="public/assets/css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <link rel="stylesheet" href="public/fontawesome/css/fontawesome.min.css">
  <!--

TemplateMo 591 villa agency

https://templatemo.com/tm-591-villa-agency

-->
</head>
<style>
  .logo img {
    width: 120px;
    height: 100px;

  }

  .logout {
    height: 30px;
  }

  input[type="submit"][name="logout"] {
    width: 50px;
    height: 30px;
    padding: 5px 5px;
    /* Điều chỉnh giá trị này để thay đổi kích thước của nút */
    font-size: 12px;
    /* Điều chỉnh giá trị này để thay đổi kích thước chữ */
    border-radius: 5px;
    /* Bo tròn góc nếu muốn */
  }

  .xinchao {
    width: 20%;
    height: 100px;
    display: flex;
  }
</style>

<body>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="?pages=home" class="logo">
              
              <img src="./public/images/logo.png" style="padding:15px 0;" alt="">
              
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="?pages=home" class="active">Home</a></li>
              <li><a href="?pages=blog">Blogs</a></li>
              <li><a href="?pages=contact">Contact</a></li>

              <?php
              if (!empty($_SESSION['user'])) {
                $retrieved_data = unserialize($_SESSION['user']);

                if ($retrieved_data['QuyenTruyCap'] == "Quản trị viên") {
                  // If the user is an administrator, redirect to the admin page
                  echo '<div class="xinchao">Xin chào ' . $retrieved_data['TenNguoiDung'] . '-> <a href="admin/index.php">Admin</a></div>
                 
                  <form class=logout method="post" action=""><input type="submit" name="logout" value="Logout"></form>';

                } else {
                  // If the user is not an administrator, display user information
                  echo '<div class="xinchao">Xin chào ' . $retrieved_data['TenNguoiDung'] . '</div></li><form class=logout method="post" action="">
                  <input type="submit" name="logout" value="Logout">
                </form>
                ';
                }
              } else {
                // If the user is not logged in, display login and register links
                echo '<li class="login-li"><a href="?pages=login">Login</a></li>
                      <li class="register-li"><a href="?pages=register">Registre</a></li>';
              }
              ?>

              <li><a href="?pages=cart"><i class="fa fa-calendar"></i>Cart</a></li>
            </ul>


            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->