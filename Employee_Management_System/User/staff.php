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

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Personnel Details</h1>

                    <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                                                                                echo $msg;
                                                                            }  ?> </p>

                    <div class="table-responsive">


                        <table class="table table-bordered" id="dataTable" width="100%" cellspfirst_nameacing="0">


                            <?php
                            $userid = $_GET['userid'];
                            $ret = mysqli_query($con, "SELECT * FROM `users` where id=$userid");
                            while ($row = mysqli_fetch_array($ret)) {

                            ?>

                                <tr id="lg-1">
                                    <td class="tl-1">
                                        <div align="left" id="tb-name">Name:</div>
                                    </td>
                                    <td class="tl-4"><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></td>
                                </tr>
                                <tr id="lg-1">
                                    <td class="tl-1">
                                        <div align="left" id="tb-name">Designation:</div>
                                    </td>
                                    <td class="tl-4"><?php echo $row['designation']; ?></td>
                                </tr>
                                <tr id="lg-1">
                                    <td class="tl-1">
                                        <div align="left" id="tb-name">Email:</div>
                                    </td>
                                    <td class="tl-4"><?php echo $row['email']; ?></td>
                                </tr>
                                <tr id="lg-1">
                                    <td class="tl-1">
                                        <div align="left" id="tb-name">Phone Number:</div>
                                    </td>
                                    <td class="tl-4"><?php echo $row['phone_number']; ?></td>
                                </tr>
                                <tr id="lg-1">
                                    <td class="tl-1">
                                        <div align="left" id="tb-name">Gender:</div>
                                    </td>
                                    <td class="tl-4"><?php echo $row['gender']; ?></td>
                                </tr>
                                <tr id="lg-1">
                                    <td class="tl-1">
                                        <div align="left" id="tb-name">Address:</div>
                                    </td>
                                    <td class="tl-4"><?php echo $row['address']; ?></td>
                                </tr>
                                <tr id="lg-1">
                                    <td class="tl-1">
                                        <div align="left" id="tb-name">Skills:</div>
                                    </td>
                                    <td class="tl-4"><?php echo $row['skills']; ?></td>
                                </tr>
                                <tr id="lg-1">
                                    <td class="tl-1">
                                        <div align="left" id="tb-name">User Category:</div>
                                    </td>
                                    <td class="tl-4"><?php echo $row['user_category']; ?></td>
                                </tr>
                                <tr id="lg-1">
                                    <td class="tl-1">
                                        <div align="left" id="tb-name">Username:</div>
                                    </td>
                                    <td class="tl-4"><?php echo $row['username']; ?></td>
                                </tr>
                                <tr id="lg-1">
                                    <td class="tl-1">
                                        <div align="left" id="tb-name">Password:</div>
                                    </td>
                                    <td class="tl-4"><?php echo $row['password']; ?></td>
                                </tr>
                                <tr id="lg-1">
                                    <td>
                                        <a href="edituserprofile.php?editid=<?php echo $row['id']; ?>">Edit Profile Details</a> |
                                        <a href="timeTracking.php?userid=<?php echo $row['id']; ?>">Time Tracking</a>
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