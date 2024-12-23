<?php include('layouts/header.php'); ?>
<?php include('server/connection.php');

//use the search section
if (isset($_POST['search'])) {

    //1. determine the page number
    if(isset($_GET['page_no']) && $_GET['page_no'] != ""){
      //if user has already entered page
      $page_no = $_GET['page_no'];
    }else{
      //if user just entered the page
      $page_no = 1;
    }



      $category = $_POST['category'];
      $price = $_POST['price'];
  

    //2. return number of products
      $stmt1 = $conn->prepare("SELECT COUNT(*) As total_records FROM products WHERE product_category = ? AND product_price <= ?");
      $stmt1->bind_param('si',$category,$price);
      $stmt1 ->execute();
      $stmt1->bind_result($total_records);
      $stmt1->store_result();
      $stmt1->fetch();

        //3. products per page
      $total_records_per_page = 12;
      $offset = ($page_no - 1) * $total_records_per_page;

      $previous_page = $page_no - 1;
      $next_page = $page_no + 1;

      $adjacents = "2";

      $total_no_of_pages = ceil($total_records / $total_records_per_page);


        // 4. get all products

      $stmt2 = $conn->prepare("SELECT * FROM products WHERE product_category = ? AND product_price <= ?  LIMIT $offset, $total_records_per_page");
      $stmt2->bind_param('si',$category , $price);
      $stmt2->execute();
      $products = $stmt2->get_result();



  //return all products
} else {

  //1. determine the page number
  if(isset($_GET['page_no']) && $_GET['page_no'] != ""){
    //if user has already entered page
    $page_no = $_GET['page_no'];
  }else{
    //if user just entered the page
    $page_no = 1;
  }

  //2. return number of products
  $stmt1 = $conn->prepare("SELECT COUNT(*) As total_records FROM products");
  $stmt1 ->execute();
  $stmt1->bind_result($total_records);
  $stmt1->store_result();
  $stmt1->fetch();


  //3. products per page
  $total_records_per_page = 12;
  $offset = ($page_no - 1) * $total_records_per_page;

  $previous_page = $page_no - 1;
  $next_page = $page_no + 1;

  $adjacents = "2";

  $total_no_of_pages = ceil($total_records / $total_records_per_page);


  // 4. get all products

  $stmt2 = $conn->prepare("SELECT * FROM products LIMIT $offset, $total_records_per_page");
  $stmt2->execute();
  $products = $stmt2->get_result();



}




?>






  <style>
    
    .product img {
      width: 75% !important;
      height: 250px !important;
      box-sizing: border-box !important;
      object-fit: cover !important;
      margin-top: 0px;
    }

    .pagination a {
      color: coral;
    }

    .pagination li:hover a {
      color: #fff;
      background-color: coral;
    }
/* General styles for layout */
#search {
  display: inline-block;
  width: 15%; /* Adjust width as needed */
  vertical-align: top;
  margin-right: 20px;

}

#shop {
  display: inline-block;
  width: 82%; /* Adjust width as needed */
  vertical-align: top;
}

/* Additional styling for the search section */
#search form {
  background-color: #f8f9fa; /* Optional: Add background color */
  margin-left: 10px;
  margin-right: -15px;

  padding-top: 20px;
  padding-bottom: 20px;
  padding-left: 10px;
  border-radius: 5px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
  
}

/* Styling for products */
#shop .product {
  display: inline-block;
  margin: 10px;
  width: calc(25% - 20px); /* Adjust for spacing between products */
  vertical-align: top;
  text-align: center;



  padding: 10px;
  transition: transform 0.3s ease;
}

#shop .product:hover {
  transform: scale(1.05);
}


/* Adjustments for smaller screens */
@media (max-width: 768px) {
  #search {
    width: 100%;
    margin-right: 0;
    margin-bottom: 20px;
  }

  #shop {
    width: 100%;
  }

  #shop .product {
    width: calc(50% - 20px); /* Adjust product width for smaller screens */
  }
}

@media (max-width: 576px) {
  #shop .product {
    width: 100%; /* Full width for very small screens */
  }
}
.font-weight-bold{
  font-weight: 900;
}

.form-range{
  width: 100% !important;

}
.btn-primary{
  margin: auto !important;
  width: 92.5%;
}

  
  </style>


  <!--search-->

  <section id="search" class="my-5 py-5 ms-2">
    <div class="container mt-5 py-5">
      <p class="font-weight-bold text-center">Search Products</p>
      <hr class="mx-auto">
      <p class="text-center">Search here</p>
      </div>

      <form action="shop.php" method="POST">
        <div class="row mx-auto container">
          <div class="col-lg-12 col-md-12 col-sm-12">

            <p>Category</p>

            </div>
            <div class="form-check">
              <input class="form-check-input" value="nike" type="radio" name="category" id="category_one" <?php if(isset($category) && $category== 'nike'){ echo 'checked' ;}?>>
              <label class="form-check-label" for="flexRadioDefault1">
                Nike
              </label>

            </div>
            <div class="form-check">
              <input class="form-check-input" value="exclusive" type="radio" name="category" id="category_two" <?php if(isset($category) && $category=='exclusive'){ echo 'checked' ;}?>>
              <label class="form-check-label" for="flexRadioDefault2">
                exclusive
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" value="party" type="radio" name="category" id="category_two" <?php if(isset($category) && $category == 'party'){ echo 'checked' ;}?>>
              <label class="form-check-label" for="flexRadioDefault2">
                party
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" value="featured" type="radio" name="category" id="category_two" <?php if(isset($category) && $category =='featured'){ echo 'checked' ;}?>>
              <label class="form-check-label" for="flexRadioDefault2">
                featured
              </label>
            </div>

          </div>
        </div>


        <div class="row mx-auto container mt-5">
          <div class="col-lg-12 col-md-12 col-sm-12">

            <p>Price</p>
            <input type="range" class="form-range w-50" name="price" value="<?php if(isset($price)){echo $price;} else{echo "100";} ?>" min="1" max="10000" id="customRange2">
            <div class="w-100 ">
              <span style="float:left;">1</span>
              <span style="float:right;">10000</span>
            </div>
          </div>
        </div>

        <div class="form-group my-3 mx-3">
          <input type="submit" name="search" value="Search" class="btn btn-primary">
        </div>

      </form>


  </section>


  <!--shop-->
  <section id="shop" class="my-5 py-5 ">
    <div class="container text-center mt-5 py-5">
      <h3>Our Products</h3>
      <hr class="mx-auto" />
      <p>Here you can check out all our Shoes</p>
    </div>
    <div class="row mx-auto container">



      <?php while ($row = $products->fetch_assoc()) { ?>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3" src="./assets/imgs/<?php echo $row['product_image']; ?>" />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name"><?php echo $row['product_name']; ?> </h5>
          <h4 class="p-price">Rs.<?php echo $row['product_price']; ?> </h4>
          <a class="btn shop-buy-btn" href="<?php echo "single_product.php?product_id=" . $row['product_id']; ?>">Buy
            Now</a>
        </div>
      <?php } ?>


      <!--Pagination-->
      <nav aria-label="Page navigation example" class="mx-auto">
        <ul class="pagination mt-5 mx-auto">


          <li class="page-item <?php if($page_no<= 1){echo 'disabled';}?>">
            <a class="page-link" href="<?php if($page_no<=1){ echo'#';} else {echo "?page_no=".($page_no-1);}?>">Previous</a>
          </li>
          <li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>
          <li class="page-item"><a class="page-link" href="?page_no=2">2</a></li>

          <?php if($page_no >= 3){ ?>
            <li class="page-item"><a class="page-link" href="">...</a></li>
            <li class="page-item"><a class="page-link" href="<?php echo "?page_no=".$page_no; ?>"><?php echo $page_no; ?></a></li>

          <?php }?>

          <li class="page-item  <?php if($page_no>= $total_no_of_pages){echo 'disabled';}?>">
            <a class="page-link" href="<?php if($page_no >= $total_no_of_pages){ echo'#';} else {echo "?page_no=".($page_no+1);}?>">Next</a>
          </li>
        </ul>
      </nav>
    </div>
  </section>

  <!--footer-->
  <?php include('layouts/footer.php')?>