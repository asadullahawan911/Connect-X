<?php
session_start();
include_once ("db_Connection.php");
$username="";
$password="";
$msg = '';
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['uname']);
    $password = mysqli_real_escape_string($conn, $_POST['psw']);

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

        header('location:adminpanel.php');

    }
    else
    {

        header('location:login.php');

    }

}
