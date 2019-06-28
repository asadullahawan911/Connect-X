<?php
include 'db_Connection.php';
$user_id="";
$user_id = $_GET['edit_user'];

if (isset($_POST['update'])) {

    //getting text data from the fields

    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $update_user = "update user set username = '$user_name', email='$email'where id='$user_id'";
    $update_data = mysqli_query($conn, $update_user);
    if ($update_data) {
         header("location: adminpanel.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Startup</title>
    <link rel="stylesheet" href="css/bootstrap1.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bangers|Old+Standard+TT">
    <style>
        * {
            font-family: 'Lobster', cursive;
        }
    </style>
</head>
<body>
<div class="row">
    <div class="offset-md-2 col-md-8">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <h2 class="offset-lg-3 offset-md-2 offset-1 "> Add User </h2>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="d-none d-sm-block col-sm-3 col-md-4 col-lg-2 col-xl-2 mt-auto">
                           User Name:</label>
                    </div>
                    <div class="col-sm-9 col-md-8 col-lg-4 col-xl-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"></div>
                            </div>
                            <input type="text" class="form-control" id="user_name" name="user_name"
                                   placeholder="Enter User Name">
                        </div>
                    </div>
                    <div class="col-sm-9 col-md-8 col-lg-4 col-xl-4 mt-3 mt-lg-0">
                    </div>
                </div>
                <div class="row my-3">
                    <div class="d-none d-sm-block col-sm-3 col-md-4 col-lg-2 col-xl-2 mt-auto">
                        <label for="email" class="float-md-right">
                            Email:</label>
                    </div>
                    <div class="col-sm-9 col-md-8 col-lg-4 col-xl-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"></div>
                            </div>
                            <input class="form-control" id="email" name="email" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="col-sm-9 col-md-8 col-lg-4 col-xl-4 mt-3 mt-lg-0">
                    </div>
                </div>
                </div>
<div class="col-sm-9 col-md-8 col-lg-4 col-xl-4">
                        <button type="submit" name="update" class="btn btn-primary btn-block">
                            Update
                        </button>
</div>
                </div>
            </form>
    </div>

</body>
</html>