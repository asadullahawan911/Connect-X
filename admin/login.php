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

            header('location:adminpanel.php?logged_in=You have successfully logged in!');

        }
        else
        {

            $msg = 'Wrong Email or Password. Try Again!';
        }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Connect X - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="uname" id="firstname" class="form-control" placeholder="Username" required pattern="^\w{8,}$" autofocus="autofocus">
              <label for="firstname">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="psw" id="inputPassword" class="form-control" placeholder="Password" required pattern="^\w{8,}$">
              <label for="inputPassword">Password</label>
            </div>
          </div>
            <div><?php echo $msg;?></div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" name="remember" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
            <input class="btn btn-primary btn-block" type="submit" name="login" value="Login" />
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
          <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
