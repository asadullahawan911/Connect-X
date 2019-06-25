<?php
session_start();
require_once "db_Connection.php";
$userName = $_SESSION['uname'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

if(isset($_POST["submit"])) {

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $query = "SELECT is_admin,username FROM user WHERE username='$userName'";
        $result = mysqli_query($conn, $query);
        $profileUser = mysqli_fetch_row($result);

        $query= "UPDATE user SET Profile_image = '$target_file' WHERE user.username = '$profileUser[1]'";
//        $query = "INSERT INTO user (Profile_image)
//  			  VALUES('$target_file')";
        mysqli_query($conn, $query);
if($profileUser[0]=='yes')
        header("location:adminpanel.php");
else
    header("location:userpanel.php");
    }
}


