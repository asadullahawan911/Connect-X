<?php
session_start();
$username="";
$password="";
$errors = array();
$msg='';
if (isset($_POST['login'])) {
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

           header('location:index.php?logged_in=You have successfully logged in!');

        }
        else
            {
          array_push($errors, "Wrong username/password combination");
            $msg = 'Wrong Email or Password. Try Again!';
        }
    }
}
