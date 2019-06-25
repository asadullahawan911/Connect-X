<?php
require_once "db_Connection.php";

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

if(isset($_POST["submit"])) {

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $query = "INSERT INTO user (Profile_image) 
  			  VALUES('$target_file')";
        mysqli_query($conn, $query);

        header("location:userpanel.php");
    }
}


