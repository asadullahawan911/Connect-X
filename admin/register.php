<?php
include_once ("db_Connection.php");
$username="";
$email="";
$password1="";
$password2="";
$dob="";
$is_admin="yes";
$errors=array();
if (isset($_POST['register'])) {
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
if(count($errors)==0)
{
    $password=$password1;
    $query = "INSERT INTO user (is_admin,username,email,password,rating,DOB,Profile_image) VALUES('$is_admin','$username', '$email', '$password','0.0','$dob','')";
    $results = mysqli_query($conn, $query);
    //if (mysqli_num_rows($results)) {
        /*$_SESSION['uname']=$username;
        $_SESSION['psw']=$password;*/

        header('location:adminpanel.php');

    //}
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

  <title>Connect X - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form method="post" action="register.php">
          <!--<div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                  <label for="firstName">First name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="lastName" class="form-control" placeholder="Last name" required="required">
                  <label for="lastName">Last name</label>
                </div>
              </div>
            </div>
          </div>-->
          <div class="form-group">
              <div class="form-label-group">
                  <input type="text" id="firstName" name="uname" class="form-control" placeholder="Enter Username" required pattern="^\w+(?:\.|\-|_)?\w+$" autofocus="autofocus">
                  <label for="firstName">Username</label>
              </div>
            <div class="form-label-group">
              <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required pattern="^[a-z0-9_\-\.]+@\w+\.\w+\.?\w+$" autofocus="autofocus">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="psw" required pattern="^\w{8,}$">
                  <label for="inputPassword">Password</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm password" name="psw-repeat" required pattern="^\w{8,}$">
                  <label for="confirmPassword">Confirm password</label>
                </div>
              </div>
            </div>
          </div>
            <label for="dob">DOB</label>
            <input type="date"  placeholder="Enter DOB" name="dob" required pattern="^([0-9]{2})\/([1-9]{1}|[10-12]{2})\/([0-9]{4})">
          <button class="btn btn-primary btn-block" type="submit" name="register">Register</button>
          <!--  <button name="register" type="submit">Register</button>-->
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.php">Login Page</a>
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
