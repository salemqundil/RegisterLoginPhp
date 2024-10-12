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
    ?>
  </head>
  <body>
    <!-- Section: Design Block -->
<section class="text-center ">
  <!-- Background image -->
  <div class="p-5 bg-image" style="
        background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
        height: 300px;
        "></div>
  <!-- Background image -->


  <?php
  include("config.php");
  // var_dump($_POST['email']);
  if($_SERVER['REQUEST_METHOD'] == 'GET'){$email = $_GET['email'];}else{$email = $_POST['email'];}
      
      // Fetch the user data from the database
      $sql2 = "SELECT * FROM users WHERE email = :email";
      $result = $conn->prepare($sql2);
      $result->execute(['email'=>$email]);
      $date_login = date("Y/m/d H:i:s");
      
      if ($result) {
          // Fetch user data
          $row = $result->fetch(PDO :: FETCH_ASSOC);
          $sql = "UPDATE users SET date_login ='$date_login' WHERE email ='$email'";
          $conn->query($sql);
      } else {
          $alertLogin = "No user found.";
      }
  
  ?>
<div class="shadow p-5 container mt-5">
<h1 class="p-3">Welcome  <?php echo $row['name']; ?></h1>

</div>

</section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>