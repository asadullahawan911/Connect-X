<?php
include 'db_Connection.php';
    $del_id = $_GET['del_pro'];
    $del_pro = "delete from projects where Project_id='$del_id'";
    $run_del = mysqli_query($conn,$del_pro);
    if($run_del){
         header('location: adminpanel.php');

    }
