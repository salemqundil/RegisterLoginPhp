<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php
    include("config.php");
    $sql = "SELECT * FROM users;";

    $start = $conn->query($sql);
    if ($start) {
        $row = $start->fetchAll(PDO::FETCH_ASSOC);
         
      } else {
        echo "0 results";
      }
      
    ?>
    <div class="container">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><?php echo  $alertLogin ; ?></strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    </div>
    <table class="table table-striped container p-5">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Password</td>
            <td>Data Created</td>
            <td>Date Last Login</td>
            <td>Action</td>
        </tr>
        <?php
         foreach($row as $data){
            if($data["admin"]!=1){
                $delBtn =  "<button type='submit' name='delete_row' value='".$data["id"]."' class='btn btn-danger'>Delete</button>";}else{$delBtn="";};
         echo "<tr><td id=id_".$data["id"].">".$data["id"].
        "</td><td>".$data["name"].
        "</td><td>".$data["email"].
        "</td><td>".$data["password"].
        "</td><td>".$data["date_create"]."
        </td><td>".$data["date_login"]."</td><td>
        <div >
        <form class='d-flex' action='code_function.php' method='POST'>
        <a href='editPage.php?id=".$data["id"]."' class='btn btn-warning'>Edit</a>
        <input name='id' style='visibility: hidden; width:10px' class='form-control' id='exampleInputPassword1' value=".$data["id"].">
        ".$delBtn."
        </form></div>
        </td></tr>";}
        ?>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>