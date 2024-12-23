<?php

session_start();

include('./server/connection.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ShoeSphere</title>
    <link rel="icon" href="assets/imgs/footer-logo.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="./assets/css/style.css" />
  <style>
    .cart-quantity{
    background: #fb774b ;
    color: #fff;
    padding: 3px 5px;
    border-radius: 50%;
    margin: -5px;
    font-size: 10px;

}
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white py-2 fixed-top">
    <div class="container">
      <a href="index.php"><img class="main-logo" src="./assets/imgs/mainlogo.png" alt="" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="shop.php">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>
          <li class="nav-item">
            <a href="cart.php" style="color: black; margin: 0 10px;">
              <i class="fa-duotone fa-solid fa-cart-shopping ">
                <?php if(isset($_SESSION['quantity']) && $_SESSION['quantity'] != 0){ ?>
                  <span class="cart-quantity"><?php echo $_SESSION['quantity']; ?></span>
                <?php } ?>
              </i></a>
            <a href="account.php" style="color: black; margin: 0 10px;"><i class="fa-duotone fa-solid fa-user"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>