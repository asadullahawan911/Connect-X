<?php
include 'db_Connection.php';
$user_id="";
$user_id = $_GET['del_user'];
$update_user = "delete from user where id='$user_id'";
$update_data = mysqli_query($conn, $update_user);
    if ($update_data) {
         header("location: adminpanel.php");
    }

