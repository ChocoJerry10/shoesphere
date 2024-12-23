

<?php include('layouts/header.php'); ?>
  <!--Home-->
  <section id="home">
    <div class="container">
      <h5>NEW ARRIVALS</h5>
      <h1><span>Best Prices</span> This Season</h1>
      <p>
        ShoeSphere offers the best products for the most affordable prices
      </p>
      <button >Shop Now</button>
    </div>
  </section>
  <!--Brands-->
  <section id="brand" class="container">
    <div class="row">
      <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="./assets/imgs/reebok.png" alt="reebok logo" />
      <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="./assets/imgs/nike.jpg" alt="" />
      <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="./assets/imgs/Adidas_logo.png" alt="" />
      <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="./assets/imgs/puma.jpg" alt="" />
    </div>
  </section>

  <!--NEW-->
  <section id="new" class="w-100">
    <div class="row p-0 m-0">
      <!--One-->
      <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
        <img class="img-fluid" src="./assets/imgs/new-2.jpg" alt="" />
        <div class="details">
          <h2>Awesome Nike Shoes</h2>
          <button class="text-upppercase">Shop Now</button>
        </div>
      </div>
      <!--Two-->
      <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
        <img class="img-fluid" src="./assets/imgs/new-1.avif" alt="" />
        <div class="details">
          <h2>Awesome Adidas Shoes</h2>
          <button class="text-upppercase">Shop Now</button>
        </div>
      </div>
      <!--Three-->
      <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
        <img class="img-fluid" src="./assets/imgs/new-3.jpg" alt="" />
        <div class="details">
          <h2>Awesome Reebok Shoes</h2>
          <button class="text-upppercase">Shop Now</button>
        </div>
      </div>
    </div>
  </section>

  <!--Featured-->
  <section id="featured" class="my-5 pb-3">
    <div class="container text-center mt-5 py-5">
      <h3>Our Featured</h3>
      <hr class="mx-auto" />
      <p>Here you can check out our featured shoes</p>
    </div>
    <div class="row mx-auto container-fluid">

      <?php include('server/get_featured_products.php'); ?>

      <?php while ($row = $featured_products->fetch_assoc()) { ?>


        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3" src="./assets/imgs/<?php echo $row['product_image']; ?>" alt="" />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
          <h4 class="p-price">Rs.<?php echo $row['product_price']; ?></h4>
          <a href="<?php echo "single_product.php?product_id=" . $row['product_id']; ?>"><button class="buy-btn">Buy
              Now</button></a>
        </div>
      <?php } ?>
    </div>
  </section>

  <!--Banner-->
  <section id="banner" class="my-5 py-5">
    <div class="container">
      <h4>MID SEASON SALE</h4>
      <h1>
        Autumn Collection <br />
        UPTO 30% OFF
      </h1>
      <button class="text-upppercase">Shop Now</button>
    </div>
  </section>

  <!--Exclusives-->
  <section id="featured" class="my-5">
    <div class="container text-center mt-5 py-5">
      <h3>Our Exclusives</h3>
      <hr class="mx-auto" />
      <p>Here you can check out our exclusive shoes</p>
    </div>
    <div class="row mx-auto container-fluid">

      <?php include('server/get_exclusives_product.php') ?>

      <?php while ($row = $exclusives_products->fetch_assoc()) {
        ?>

        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3" src="./assets/imgs/<?php echo $row['product_image']; ?>" alt="" />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
          <h4 class="p-price">Rs.<?php echo $row['product_price']; ?></h4>
          <a href="<?php echo "single_product.php?product_id=" . $row['product_id']; ?>"><button class="buy-btn">Buy
              Now</button></a>
        </div>
      <?php } ?>
    </div>
  </section>

  <!--Party wear-->
  <section id="featured" class="my-5">
    <div class="container text-center mt-5 py-5">
      <h3>Our Party Wear</h3>
      <hr class="mx-auto" />
      <p>Here you can check out our exclusive shoes</p>
    </div>
    <div class="row mx-auto container-fluid">

      <?php include('server/get_party_product.php') ?>

      <?php while ($row = $party_products->fetch_assoc()) {
        ?>


        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3" src="./assets/imgs/<?php echo $row['product_image']; ?>" />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
          <h4 class="p-price">Rs.<?php echo $row['product_price']; ?></h4>
          <a href="<?php echo "single_product.php?product_id=" . $row['product_id']; ?>"><button class="buy-btn">Buy
          Now</button></a>
        </div>
      <?php } ?>
    </div>

  </section>


  <!--Nike-->
  <section id="featured" class="my-5">
    <div class="container text-center mt-5 py-5">
      <h3>Nike</h3>
      <hr class="mx-auto" />
      <p>Check our awesome nike collection</p>
    </div>
    <div class="row mx-auto container-fluid">

      <?php include('server/get_nike.php') ?>

      <?php while ($row = $nike->fetch_assoc()) {
        ?>


        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3" src="./assets/imgs/<?php echo $row['product_image']; ?>" />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
          <h4 class="p-price">Rs.<?php echo $row['product_price']; ?></h4>
          <a href="<?php echo "single_product.php?product_id=" . $row['product_id']; ?>"><button class="buy-btn">Buy
          Now</button></a>
        </div>
      <?php } ?>
    </div>
  </section>

<?php include('layouts/footer.php')?>