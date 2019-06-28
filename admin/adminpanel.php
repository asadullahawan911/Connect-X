<?php
session_start();
require_once "db_Connection.php";
$userName = $_SESSION['uname'];
if(!isset($userName)){
    header('location: login.php?not_admin=You are not Admin!');
}
$query = "SELECT Profile_image FROM user WHERE username='$userName'";
$result = mysqli_query($conn, $query);
global $profileImage;
$profileImage = mysqli_fetch_row($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Connect X Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="adminpanel.php">Connect X</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i>
<img src = '<?php echo $profileImage[0]?>' alt="Profile" width="50" height="50">
            </a>
            <div> <font color="white" > <?php echo $userName;?> </font> </div>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="uploadForm.php">Upload Media</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </div>
        </li>
    </ul>

</nav>

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="adminpanel.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>Pages</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <h6 class="dropdown-header">Login Screens:</h6>
                <a class="dropdown-item" href="login.php">Login</a>
                <a class="dropdown-item" href="register.php">Register</a>
                <a class="dropdown-item" href="forgot-password.php">Forgot Password</a>
                <div class="dropdown-divider"></div>
                <h6 class="dropdown-header">Options:</h6>
                <a class="dropdown-item" href="createProject.php">Create Project</a>
                <a class="dropdown-item" href="editProject.php">Edit Project</a>
                <a class="dropdown-item" href="editUser.php">Add User</a>
                <a class="dropdown-item" href="deleteUser.php">Delete User</a>
            </div>
        </li>

    </ul>

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Overview</li>
            </ol>

            <!-- Projects Data Table -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Projects Data Table</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Project Name</th>
                                <th>Budget</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>

                                <th>Project Name</th>
                                <th>Budget</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
                            $query = "SELECT * FROM projects";
                            $result = mysqli_query($conn, $query);
                            ?>
                            <?php
                            while($row = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?php
                                        echo $row["Project_name"];
                                        ?></td>
                                    <td><?php
                                        echo $row["Budget"];
                                        ?></td>
                                    <td><?php
                                        echo $row["Description"];
                                        ?></td>
                                    <td><?php
                                        echo $row["status"];
                                        ?></td>
                                    <td>
                                        <a href="editProject.php?edit_pro=<?php echo $proj_id = $row["Project_id"]?>" class="btn btn-primary">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <a href="deleteProject.php?del_pro=<?php echo $del_id = $row["Project_id"]?>" class="btn btn-danger">
                                            <i class="fa fa-trash-alt"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Users Data Table  -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Users Data Table</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Is Admin</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Rating</th>
                                <th>Profile Picture</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Is Admin</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Rating</th>
                                <th>Profile Picture</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
                            $query = "SELECT * FROM user";
                            $result = mysqli_query($conn, $query);
                            ?>

                            <?php
                            while($row = $result->fetch_assoc())
                            {
                                ?>
                                <tr>
                                    <td><?php
                                        echo $row["is_admin"];
                                        ?></td>
                                    <td><?php
                                        echo $row["username"];
                                        ?></td>
                                    <td><?php
                                        echo $row["email"];
                                        ?></td>
                                    <td><?php
                                        echo $row["rating"];
                                        ?></td>
                                    <td>
                                        <img src = '<?php echo $row["Profile_image"]; ?>'
                                             alt="Profile" width="50" height="50">
                                    </td>

                                    <td><a href="editUser.php?edit_user=<?php echo $user_id= $row["id"]?>" class="btn btn-primary">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <a href="deleteUser.php?del_user=<?php echo $user_id= $row["id"]?>" class="btn btn-danger">
                                            <i class="fa fa-trash-alt"></i> Delete
                                        </a></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © Connect X 2019</span>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->
<script src="vendor/chart.js/Chart.min.js"></script>
<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin.min.js"></script>

<!-- Demo scripts for this page-->
<script src="js/demo/datatables-demo.js"></script>
<script src="js/demo/chart-area-demo.js"></script>

</body>

</html>
