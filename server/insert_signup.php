<?php
$username="";
$email="";
$password1="";
$password2="";
$dob="";
$errors = array();

if(isset($_POST['signupbtn'])) {
    $username = mysqli_real_escape_string($conn, $_POST['uname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password1 = mysqli_real_escape_string($conn, $_POST['psw']);
    $password2 = mysqli_real_escape_string($conn, $_POST['psw-repeat']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
}
$user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
$result = mysqli_query($conn, $user_check_query);
$user = mysqli_fetch_assoc($result);

if ($user) { // if user exists
    if ($user['username'] === $username) {
        array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
        array_push($errors, "email already exists");
    }
}
if (count($errors) == 0) {
    $query = "INSERT INTO user (Username,email,password,RepeatPassword,rating,DOB,Profile_image) 
  			  VALUES('$username', '$email', '$password1','$password2','0.0','$dob','')";
    mysqli_query($conn, $query);
}