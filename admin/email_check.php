<?php
require_once "db_connection.php";
$email = $_POST['email'];
$sel_email = "select * from user where email = '$email'";
$sel_result = mysqli_query($conn,$sel_email);
if(mysqli_num_rows($sel_result) > 0){
    echo "<i> Already Taken </i>";
}