<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
      
    </style>
    <?PHP 
        include("config.php");
        $alertLogin2="";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $username = $_POST['email'];
      $password = $_POST['password'];
  
      $sql = "SELECT * FROM users WHERE email = '$username'";
      $result = $conn->query($sql);
  
      if ($result) {
          $user = $result->fetch();
  
          if($user && $username == $user['email']){
          if ($password == $user['password']){
               $alertLogin = "Login successful! Welcome, " . $username;
               $alertLogin2="";
              if($user['admin']){
                header("Location: home.php"); 
              }else{
                header("Location: user.php?email=".$username);
              }
          } else {
            $alertLogin2 = "Invalid password!";
            $alertLogin="";
          }}else{
            $alertLogin2 = "Invalid email!";
          }
      } else {
        $alertLogin2 = "No user found with that username!";
        $alertLogin="";
      }
    }
    ?>
  </head>
  <body>
    <div class="container">
      <?php
      if($alertLogin2!=""){
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>".$alertLogin2."</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
      }else if($alertLogin){
         "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>".$alertLogin."</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
      }
      ?>
    </div>
    <!-- Section: Design Block -->
<section class="text-center ">
  <!-- Background image -->
  <div class="p-5 bg-image" style="
        background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
        height: 300px;
        "></div>
  <!-- Background image -->

  <div class="card w-50 shadow bg-body-tertiary" style="
        margin-top: -100px;
        margin-left: 25%;
        backdrop-filter: blur(30px);
        ">
    <div id="loginCard" class="card-body py-5 px-md-5 ">

      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-5">Log in now</h2>
          <form action="" method="POST">
            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input name="email" placeholder="Email" type="email" id="form3Example3" class="form-control" />
            </div>

            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input name="password" placeholder="Password" type="password" id="form3Example4" class="form-control" />
            </div>

            <!-- Submit button -->
            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">
              Login
            </button>
            <!-- Register buttons -->
            <div class="text-center">
            <a href="signUp.php">Don't Have an account?<b> Sign in..</b></a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>