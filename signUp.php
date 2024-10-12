<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
    <?php 
  include("config.php");
  $alertLogin2="";
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $name = $_POST['name'];
  $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];
  $date_create = date("Y/m/d H:i:s");
  $date_login = date("Y/m/d H:i:s");

  if($password == $password2){
    if(preg_match('/^\d{12}$/', $phone)){
      $sql = "INSERT INTO users ( name , email ,phone, password , date_create , date_login ) VALUES ('$name' , '$email', '$phone', '$password', '$date_create', '$date_login')";  
      $stmt = $conn->prepare($sql);
      if ($conn->query($sql) == true) {
        echo "Record updated successfully";
        header("Location: user.php?email=".$email."");
    } else {
        echo "Error updating record: " ;
    }
    }else{
      $alertLogin2 = "Invalid phone number!must be 12 number";
    }
   
  
  }else {
    $alertLogin2 = "Invalid password!";
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
<section class="text-center mb-5">
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
  </div>
  <div id="signIn" class="card w-50 shadow bg-body-tertiary" style="
        margin-top: -100px;
        margin-left: 25%;
        backdrop-filter: blur(30px);
        ">
    <div class="card-body py-5 px-md-5 ">

      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-5">Sign up now</h2>
          <form action="" method="POST">
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4">
                <div data-mdb-input-init class="form-outline">
                  <input name="name" placeholder="Name" type="text" id="form3Example1" class="form-control" />
                </div>
            </div>

            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input name="email" placeholder="Email" type="email" id="form3Example3" class="form-control" />
            </div>
            <div data-mdb-input-init class="form-outline mb-4">
              <input name="phone" placeholder="Phone" type="number" id="form3Example2" class="form-control" />
            </div>

            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input name="password" placeholder="Password" type="password" id="form3Example4" class="form-control" />
            </div>
            <div data-mdb-input-init class="form-outline mb-4">
              <input name="password2" placeholder="Password" type="password" id="form3Example5" class="form-control" />
            </div>

            <!-- Submit button -->
            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">
              Sign up
            </button>

            <!-- Register buttons -->
            <div class="text-center">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script>
  </script>
  </body>
</html>