<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Employees Details</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include_once('includes/sidebar.php') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Assigned User Details</h1>

                    <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                                                                                echo $msg;
                                                                            }  ?> </p>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Designation</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>Skills</th>
                                <th>User Category</th>
                                <th>User Edit</th>
                            </tr>

                            <?php
                            $userid = $_GET['userid'];
                            $ret = mysqli_query($con, "SELECT * FROM `users` LEFT JOIN `user_allocation` ON user_allocation.user_id= users.id where assigned_user=$userid");
                            
                            while ($user = mysqli_fetch_array($ret)) {
                               
                            ?>

                                <tr>
                                    <td><?php echo $user['first_name']; ?></td>
                                    <td><?php echo $user['last_name']; ?></td>
                                    <td><?php echo $user['designation']; ?></td>
                                    <td><?php echo $user['email']; ?></td>
                                    <td><?php echo $user['phone_number']; ?></td>
                                    <td><?php echo $user['gender']; ?></td>
                                    <td><?php echo $user['address']; ?></td>
                                    <td><?php echo $user['skills']; ?></td>
                                    <td><?php echo $user['user_category']; ?></td>
                                    <td>
                                        <a href="edituserprofile.php?editid=<?php echo $user['0']; ?>">Edit</a> |
                                        <a href="usertimetracking.php?editid=<?php echo $user['0']; ?>">Time Tracking</a>
                                    </td>
                                </tr>

                            <?php
                            } ?>

                        </table>

                    </div>






                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>
</body>

</html>
<?php   ?>