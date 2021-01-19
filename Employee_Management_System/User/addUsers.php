<?php
include('includes/dbconnection.php');
error_reporting(0);
if (isset($_POST['submit'])) {
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $designation = $_POST['designation'];
  $email = $_POST['email'];
  $phone_number = $_POST['phone_number'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  $user_category = $_POST['user_category'];
  $skills = $_POST['skills'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $assigned_user = $_POST['assigned_user'];
  $ret = mysqli_query($con, "select email from users where email='$email'");
  $result = mysqli_fetch_array($ret);
  if ($result > 0) {
    $msg = "This email already associated with another account";
  } else {
    $query = mysqli_query($con, "INSERT INTO users (`first_name`, `last_name`, `designation`, `email`, `phone_number`, `gender`, `address`, `skills`, `username`, `password`, `user_category`) 
    VALUES ('$first_name', '$last_name', '$designation', '$email', '$phone_number', '$gender', '$address', '$skills', '$username', '$password', '$user_category')");
    $newuserid = mysqli_insert_id($con);
    mysqli_query($con, "INSERT INTO user_allocation (`user_id`, `assigned_user`) 
    VALUES ('$newuserid', '$assigned_user')");

    if ($query) {
      $msg = "New User have been successfully registered";
    } else {
      $msg = "Something Went Wrong. Please try again";
    }
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
    <h3 align="center" style="color: black; padding-top: 1%">Employee Managment System</h3>

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Add New User</h1>
              </div>
              <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                                                                      echo $msg;
                                                                    }  ?> </p>
              <form class="user" name="register" method="post" onsubmit="return checkpass();">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="first_name" name="first_name" placeholder="First Name" pattern="[A-Za-z]+" required="true">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="last_name" name="last_name" placeholder="Last Name" pattern="[A-Za-z]+" required="true">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="designation" name="designation" placeholder="Designation" pattern="[A-Za-z]+" required="true">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="true">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="phone_number" name="phone_number" placeholder="Phone Number" pattern="[0-9]+" required="true">
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0">

                    <?php if ($row['gender'] == "Male") { ?>
                      <input type="radio" id="gender" name="gender" value="Male" checked="true">Male

                      <input type="radio" name="gender" value="Female">Female
                    <?php } else { ?>
                      <input type="radio" id="gender" name="gender" value="Male">Male
                      <input type="radio" name="gender" value="Female" checked="true">Female
                    <?php } ?>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="address" name="address" placeholder="Address" pattern="[A-Za-z]+" required="true">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <select class="form-control form-control-user" name="user_category" id="user_category" required="true">
                      <option value="" disabled selected>Select User Category</option>
                      <option value="admin">admin</option>
                      <option value="manager">Manager</option>
                      <option value="staff">Staff</option>
                    </select>
                  </div>

                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="skills" name="skills" placeholder="Skills" pattern="[A-Za-z]+" required="true">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" pattern="[A-Za-z]+" required="true">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="password" name="password" placeholder="Password" pattern="[A-Za-z]+" required="true">
                  </div>
                </div>
                <div class="form-group">
                  <select name="assigned_user" class="form-control">
                    <option value="pick">Select Assigned User</option>
                    <?php
                    $sql = mysqli_query($con, "SELECT *  FROM `users` WHERE `user_category` != 'admin'");
                    $row = mysqli_num_rows($sql);
                    while ($row = mysqli_fetch_array($sql)) {
                      echo "<option value='" . $row['id'] . "'>" . $row['first_name'] . "</option>";
                    }
                    ?>
                  </select>



                </div>

                <input type="submit" name="submit" value="Register New User" class="btn btn-primary btn-user btn-block">


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