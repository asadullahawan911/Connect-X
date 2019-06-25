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
if (empty($username)) { array_push($errors, "Username is required"); }
if (empty($email)) { array_push($errors, "Email is required"); }
if (empty($password1)) { array_push($errors, "Password is required"); }
if ($password1 != $password2) { array_push($errors, "The two passwords do not match");}
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
    $password = $password1;
    $query = "INSERT INTO user (username,email,password,rating,DOB,Profile_image) 
  			  VALUES('$username', '$email', '$password','0.0','$dob','')";
    mysqli_query($conn, $query);
    $results = mysqli_query($conn, $query);
    if (mysqli_num_rows($results)==1) {
        $_SESSION['uname']=$username;
        $_SESSION['psw']=$password;
        if(!empty($_POST['remember']))
        {
            setcookie('uname',$username,time()+(10*365*24*60*60));
            setcookie('psw',$password,time()+(10*365*24*60*60));
        }
        else
        {
            setcookie('uname','' );
            setcookie('psw', '');
        }

        header('location:index.php?logged_in=You have successfully signed in!');

    }
}