<?php
$username="";
$password="";
$errors = array();
if (isset($_POST['loginbtn'])) {
    $username = mysqli_real_escape_string($conn, $_POST['uname']);
    $password = mysqli_real_escape_string($conn, $_POST['psw']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {

        $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $results = mysqli_query($conn, $query);
        if (mysqli_num_rows($results) == 1) {

           header('location: index.php');

        }
        else
            {
            array_push($errors, "Wrong username/password combination");
        }
    }
}
