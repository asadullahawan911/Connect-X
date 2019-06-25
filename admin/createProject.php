<?php
include 'db_Connection.php';
if (isset($_POST['create'])) {
//getting text data from the fields
    $proj_name = test_input($_POST['proj_name']);
    $proj_budget = test_input($_POST['budget']);
    $proj_desc = test_input($_POST['desc']);
    $proj_status = test_input($_POST['status']);
//getting image from the field
    if (!preg_match("/[a-zA-Z0-9]+/", $proj_name) || strlen($proj_name) < 2) {
        $response = array(
            "type" => "warning",
            "message" => "Enter Valid Project Name."
        );
    } else if ($proj_status == "Enter Status") {
        $response = array(
            "type" => "warning",
            "message" => "Select Project Status."
        );
    } else if ($proj_desc == "Enter Project Detail") {
        $response = array(
            "type" => "warning",
            "message" => "Select Project Detail."
        );
    } else if (!preg_match("/\d+(.\d+)?/", $proj_budget && $proj_budget > 0)) {
        $response = array(
            "type" => "warning",
            "message" => "Enter Valid Project Budget."
        );
    }
    $insert_project = "insert into projects (Project_name,Budget,Description,status) 
                  VALUES ('$proj_name','$proj_budget','$proj_desc','$proj_status')";
    $insert_pro = mysqli_query($conn, $insert_project);
    if ($insert_pro) {
        //header("location: ".$_SERVER['PHP_SELF']);
        $response = array(
            "type" => "success",
            "message" => "Product uploaded successfully."
        );
    } else {
        $response = array(
            "type" => "warning",
            "message" => "Problem in uploading image files."
        );
    }

}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Startup</title>
    <meta name="viewport" content="width=device-width, initial-scale= 1.0">
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

<div class="container-fluid">
    <h1 class="text-center my-4"><span class="d-none d-sm-inline"> Create Your </span>
        Project </h1>
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
                <button type="submit" name="create" class="btn btn-primary btn-block">
                    Create
                </button>
            </div>
        </div>
    </form>
</div>

</body>
</html>
