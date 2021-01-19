<?php
include('includes/dbconnection.php');
error_reporting(0);
if (isset($_POST['submit'])) {
    $userid = $_GET['userid'];
    $project = $_POST['project'];
    $date = $_POST['date'];
    $hours = $_POST['hours'];
    $taskdetails = $_POST['taskdetails'];
    $created_at = date("Y-m-d h:i:sa");
    $updated_at = date("Y-m-d h:i:sa");
    $query = mysqli_query($con, "INSERT INTO `user_time_tracking` (`user_id`, `project`, `date`, `hours`, `taskdetails`) 
    VALUES ('$userid', '$project', '$date', '$hours', '$taskdetails');");

    if ($query) {
        $msg = "Tracking Details successfully registered";
    } else {
        $msg = "Something Went Wrong. Please try again";
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

    <title>Employee Managment System</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">


    <div class="container">
        <h3 align="center" style="color: black; padding-top: 1%">Employee Time Tracking</h3>

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Time Tracking</h1>
                            </div>
                            <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                                                                                        echo $msg;
                                                                                    }  ?> </p>
                            <form class="user" name="register" method="post" onsubmit="return checkpass();">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <select class="form-control form-control-user" name="project" id="project" required="true">
                                            <option value="" disabled selected>Select Project</option>
                                            <option value="project1">project1</option>
                                            <option value="project2">project2</option>
                                            <option value="project3">project3</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="date" name="date" placeholder="Date(y-m-d)" required="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="hours" name="hours" placeholder="Hours" required="true">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="taskdetails" name="taskdetails" placeholder="Task Details" required="true">
                                    </div>
                                </div>

                                <input type="submit" name="submit" value="Save" class="btn btn-primary btn-user btn-block">


                            </form>
                            <hr>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>