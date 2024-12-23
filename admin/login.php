<?php include('header.php')?>

<?php


include('../server/connection.php');

if (isset($_SESSION['admin_logged_in'])) {
  header('location: index.php');
  exit;
}



if (isset($_POST['login_btn'])) {

  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $stmt = $conn->prepare("SELECT admin_id,admin_name,admin_email,admin_password FROM admins WHERE admin_email = ? AND admin_password = ? LIMIT 1");

  $stmt->bind_param('ss', $email, $password);

  if ($stmt->execute()) {
    $stmt->bind_result($admin_id, $admin_name, $admin_email, $admin_password);
    $stmt->store_result();

    if ($stmt->num_rows() == 1) {
      $row = $stmt->fetch();

      $_SESSION['admin_id'] = $admin_id;
      $_SESSION['admin_name'] = $admin_name;
      $_SESSION['admin_email'] = $admin_email;
      $_SESSION['admin_logged_in'] = true;

      header('location: index.php?login_success=logged in Successfully');

    } else {
      header('location: login.php?error=could not verify account');
    }

  } else {
    //error
    header('location:login.php?error=something went wrong');
  }
}
?>



<main class="container-fluid">
  <div class="" style="min-height:1000px">

    <main class="col-md-6 mx-auto col-lg-6 px-md-4 text-center">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items">
        <h1 class="h2"></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">

          </div>
        </div>
      </div>



      <!--Login-->

      <h2>Login</h2>
      <div class="table-responsive"></div>


      <div class="mx-auto container">
        <form id="login-form" enctype="multipart/form-data" method="POST" action="login.php">
          <p style="color:red" class="text-center"><?php if (isset($_GET['error'])) {
            echo $_GET['error'];
          } ?></p>
          <div class="form-group mt-2">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="product-name" name="email" placeholder="email" required>
          </div>
          <div class="form-group mt-2">
            <label>Password</label>
            <input type="password" class="form-control" id="product-desc" name="password" placeholder="password"
              required>
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" name="login_btn" value="Login">
          </div>


        </form>
      </div>

      </section>
    </main>
  </div>

</main>