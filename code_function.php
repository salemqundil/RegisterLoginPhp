<?php
 include("config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete_row'])) {
        $st_id =$_POST['delete_row'];
        print($st_id);
        // Fetch the user data from the database
        $sql2 = "DELETE FROM users WHERE id = :st_id";
        $result = $conn->prepare($sql2);
        $result->execute(['st_id'=>$st_id]);
        header("Location: home.php");
    } else {
        echo "No user ID provided.";
        exit;
    }
}
?>