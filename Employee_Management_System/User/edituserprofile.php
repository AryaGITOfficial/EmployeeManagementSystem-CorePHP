<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//error_reporting(0);
if (strlen($_SESSION['aid'] != 0)) {
  header('location:logout.php');
} else {


  if (isset($_POST['submit'])) {
    $eid = $_GET['editid'];
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
    $query = mysqli_query($con, "update users set first_name='$first_name', last_name='$last_name', designation='$designation', email='$email', phone_number='$phone_number', gender='$gender', address='$address',user_category='$user_category', skills='$skills', username='$username', password='$password' where id='$eid'");
    if ($query) {
      $msg = "Employee profile has been updated.";
    } else {
      $msg = "Something Went Wrong. Please try again.";
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

    <title>Edit Employee Profile</title>

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
            <h1 class="h3 mb-4 text-gray-800">Edit User Profile</h1>

            <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                                                                    echo $msg;
                                                                  }  ?> </p>

            <form class="user" method="post" action="">
              <?php
              $aid = $_GET['editid'];
              $ret = mysqli_query($con, "select * from users where id='$aid'");
              $cnt = 1;
              while ($row = mysqli_fetch_array($ret)) {

              ?>
                <div class="row">
                  <div class="col-4 mb-3">First Name</div>
                  <div class="col-8 mb-3"> <input type="text" class="form-control form-control-user" id="first_name" name="first_name" aria-describedby="emailHelp" value="<?php echo $row['first_name']; ?>"></div>
                </div>
                <div class="row">
                  <div class="col-4 mb-3">Last Name </div>
                  <div class="col-8 mb-3"> <input type="text" class="form-control form-control-user" id="last_name" name="last_name" aria-describedby="emailHelp" value="<?php echo $row['last_name']; ?>"></div>
                </div>



                <div class="row">
                  <div class="col-4 mb-3">Designation </div>
                  <div class="col-8 mb-3">
                    <input type="text" class="form-control form-control-user" id="designation" name="designation" aria-describedby="emailHelp" value="<?php echo $row['designation']; ?>"></div>
                </div>

                <div class="row">
                  <div class="col-4 mb-3">Email</div>
                  <div class="col-8 mb-3">
                    <input type="text" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" value="<?php echo $row['email']; ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-4 mb-3">Phone Number</div>

                  <div class="col-8 mb-3">
                    <input type="text" class="form-control form-control-user" id="phone_number" name="phone_number" aria-describedby="emailHelp" value="<?php echo $row['phone_number']; ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-4 mb-3">Gender</div>
                  <div class="col-4 mb-3">

                    <?php if ($row['gender'] == "Male") { ?>
                      <input type="radio" id="gender" name="gender" value="Male" checked="true">Male

                      <input type="radio" name="gender" value="Female">Female
                    <?php } else { ?>
                      <input type="radio" id="gender" name="gender" value="Male">Male
                      <input type="radio" name="gender" value="Female" checked="true">Female
                    <?php } ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-4 mb-3">Address</div>
                  <div class="col-8  mb-3">
                    <input type="text" class="form-control form-control-user" value="<?php echo $row['address']; ?>" id="address" name="address" aria-describedby="emailHelp">
                  </div>
                </div>
                <div class="row">
                  <div class="col-4 mb-3">User Category</div>
                  <div class="col-8  mb-3">
                    <input type="text" class="form-control form-control-user" value="<?php echo $row['user_category']; ?>" id="user_category" name="user_category" aria-describedby="emailHelp">
                  </div>
                </div>
                <div class="row">
                  <div class="col-4 mb-3">Skills</div>
                  <div class="col-8  mb-3">
                    <input type="text" class="form-control form-control-user" value="<?php echo $row['skills']; ?>" id="skills" name="skills" aria-describedby="emailHelp">
                  </div>
                </div>
                <div class="row">
                  <div class="col-4 mb-3">Username</div>
                  <div class="col-8  mb-3">
                    <input type="text" class="form-control form-control-user" value="<?php echo $row['username']; ?>" id="username" name="username" aria-describedby="emailHelp">
                  </div>
                </div>
                <div class="row">
                  <div class="col-4 mb-3">Password</div>
                  <div class="col-8  mb-3">
                    <input type="text" class="form-control form-control-user" value="<?php echo $row['password']; ?>" id="password" name="password" aria-describedby="emailHelp">
                  </div>
                </div>                              
              <?php } ?>
              <div class="row" style="margin-top:4%">
                <div class="col-4"></div>
                <div class="col-4">
                  <input type="submit" name="submit" value="Update" class="btn btn-primary btn-user btn-block">
                </div>
              </div>

            </form>





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
    <script type="text/javascript">
      $(".jDate").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
      }).datepicker("update", "10/10/2016");
    </script>

  </body>

  </html>
<?php }  ?>