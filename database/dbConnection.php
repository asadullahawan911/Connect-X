<?php
$connection = mysqli_connect("localhost","root","","connectX_db");
if(!$connection){
    die("Connection to database failed");
}