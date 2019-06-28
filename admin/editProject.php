<?php
include 'db_Connection.php';
$proj_id="";
$proj_id = $_GET['edit_pro'];

    if (isset($_POST['update'])) {

        //getting text data from the fields
        $proj_name = $_POST['proj_name'];
        $proj_budget = $_POST['budget'];
        $proj_desc = $_POST['desc'];
        $proj_status = $_POST['status'];

          $update_product = "update projects set Project_name = '$proj_name', Budget='$proj_budget', Description='$proj_desc' , status='$proj_status'where Project_id='$proj_id'";
        $update_pro = mysqli_query($conn, $update_product);
        if ($update_pro) {
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
                <h2 class="offset-lg-3 offset-md-2 offset-1 "> Edit & Update Project </h2>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="d-none d-sm-block col-sm-3 col-md-4 col-lg-2 col-xl-2 mt-auto">
                        <label for="pro_title" class="float-md-right"> <span class="d-sm-none d-md-inline"> Project </span>
                            Name:</label>
                    </div>
                    <div class="col-sm-9 col-md-8 col-lg-4 col-xl-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"></div>
                            </div>
                            <input type="text" class="form-control" id="pro_title" name="proj_name"
                                   placeholder="Enter Project Name">
                        </div>
                    </div>
                    <div class="col-sm-9 col-md-8 col-lg-4 col-xl-4 mt-3 mt-lg-0">
                    </div>
                </div>
                <div class="row my-3">
                    <div class="d-none d-sm-block col-sm-3 col-md-4 col-lg-2 col-xl-2 mt-auto">
                        <label for="pro_price" class="float-md-right">
                            Budget:</label>
                    </div>
                    <div class="col-sm-9 col-md-8 col-lg-4 col-xl-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"></div>
                            </div>
                            <input class="form-control" id="pro_price" name="budget" placeholder="Enter Budget">
                        </div>
                    </div>
                    <div class="col-sm-9 col-md-8 col-lg-4 col-xl-4 mt-3 mt-lg-0">
                    </div>
                </div>
                <div class="row my-3">
                    <div class="d-none d-sm-block col-sm-3 col-md-4 col-lg-2 col-xl-2 mt-auto">
                        <label for="pro_desc" class="float-md-right">
                            Decsription:</label>
                    </div>
                    <div class="col-sm-9 col-md-8 col-lg-4 col-xl-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"></div>
                            </div>
                            <textarea class="form-control" type="file" id="pro_desc" name="desc"
                                      placeholder="Enter Project Detail"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="d-none d-sm-block col-sm-3 col-md-4 col-lg-2 col-xl-2 mt-auto">
                        <label for="pro_desc" class="float-md-right">
                            Status:</label>
                    </div>
                    <div class="col-sm-9 col-md-8 col-lg-4 col-xl-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"></div>
                            </div>
                            <input class="form-control" type="text" id="pro_keywords" name="status" placeholder="Enter Status">
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="d-none d-sm-block col-sm-3 col-md-4 col-lg-2 col-xl-2 mt-auto"></div>
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