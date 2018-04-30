<?php
 include 'lib/Session.php';
 Session::init();


 ?>
<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>
<?php include 'helpers/Format.php';?>
<?php
  $db=new Database();
 $fm=new Format();
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>activity</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    
    <style>
        .navbar-inner {
    background-color:transparent;
}

input[type=email]:focus, input[type=password]:focus{
    background-color: #ddd;
    outline: none;
}

    </style>

</head>

<body>

    <div id="wrapper" >

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        What do you want??
                    </a>
                 
        <?php if (isset($_SESSION['member_id'])) { ?>
          <li><a href="addproduct.php">Add Product</a></li>
          <li><a href="addsale.php">Add Sale</a></li>
          <li><a href="logout.php">Log Out</a></li> 
        <?php } else { ?>
        <li><a href="signin.php">Login</a></li>
        <li><a href="signup.php">Sign Up</a></li>
        
        <?php } ?>
     
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                        
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Click to view full screen</a>
                     
                     
         </form>
                            
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    </center>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
