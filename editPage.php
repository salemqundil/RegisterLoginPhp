<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
    <?php
    include("config.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        print($id);
        $sql = "SELECT * FROM users WHERE id = :id";
        $result = $conn->prepare($sql);
        $result->execute(['id'=>$id]);

        if ($result) {
            $row = $result->fetch(PDO :: FETCH_ASSOC);
            if($row['admin']){ 
                $adminLabel = "Remove Admin"; 
                $adminCheck="checked"; 
            }else{ 
                $adminLabel="Add Admin";
                $adminCheck=""; 
            };
        } else {
            $alertLogin = "No user found.";
        }
    } else {
        $alertLogin = "No user ID provided.";
        exit;
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $admin = $_POST['admin'];

    
        $sql = "UPDATE users SET name='$name', email='$email', phone='$phone', password='$password',admin='$admin' WHERE id=$id";
    
        if ($conn->query($sql) == true) {
            $alertLogin = "Record updated successfully";
            header("Location: home.php");
        } else {
            $alertLogin = "Error updating record: " ;
        }
    }
    ?>
</head>
<body>
    <div class="container">
<form action='' method='POST'>
  <div class="mb-3">
  <input name="id"  class="form-control"style='visibility: hidden;' id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row['id'];?>">
    <label for="exampleInputEmail1" class="form-label">Name</label>
         <input name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row['name'];?>">
    <label for="exampleInputEmail1" class="form-label"></label>
         <input name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row['email'];?>">
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Phone</label>
    <input name="phone" class="form-control" id="exampleInputPassword1" value="<?php echo $row['phone'];?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input name="password" class="form-control" id="exampleInputPassword1" value="<?php echo $row['password'];?>">
  </div>
  <div class="form-check">
  <input name="admin" class="form-check-input" type="checkbox" value="1" id="adminBox" <?php echo $adminCheck;?>>
  <label class="form-check-label" for="adminBox">
  <?php echo $adminLabel;?>
  </label>
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
</html>