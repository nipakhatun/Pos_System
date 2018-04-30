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
  global $pr_code;
 ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>productadd</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    
    <style>
        .navbar-inner {
    background-color:transparent;
}

input[type=email]:focus, input[type=password]:focus,input[type=text]:focus{
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
          <li><a href="#">Add Product</a></li>
          <li><a href="addsale.php">Add Sale</a></li>
          <li><a href="productlist.php">View Product</a></li>
          <li><a href="salelist.php">View Sale</a></li>
          <
          <li><a href="logout.php">Log Out</a></li> 
        <?php } else { ?>
        <li><a href="signin.php">Login</a></li>
        <li><a href="signup.php">Sign Up</a></li>
        
        <?php } ?>
     
            </ul>
        </div>
     
           
         <?php 
                  if($_SERVER ['REQUEST_METHOD']=="POST" ) {
                    $pr_code=$_POST['pr_code'];
                    $quantity=$_POST['quantity'];
                    $size=$_POST['size'];
                    $datepicker=$_POST['sell_date'];
                    $sell_price=$_POST['sell_price'];
                    $pr_color=$_POST['pr_color'];
                    if(empty($pr_code) or empty($quantity)or empty($datepicker)or empty($sell_price)or empty($pr_color) or empty($size)){
                          echo "<div class='alert alert-warning'>
                                             <strong>Warning!</strong> Enter the other field.
                                        </div>";
                         
                     }
                     else{
                      $query = "INSERT INTO tbl_sale(pr_code,quantity,size,sell_date,sell_price,pr_color) 
                   VALUES ('$pr_code','$quantity','$size','$datepicker','$sell_price','$pr_color')";
                         $result=$db->insert($query);
                         if ($result) {
                          echo "<div class='alert alert-success'>
                                             <strong>Success!</strong> Add Sale Product Successfully!.
                                        </div>";
                                    }else{
                                         echo "No Product Added!!";
                                }

                     }
                  } 
                  ?>
                  
        <!-- /#sidebar-wrapper -->

         <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid" >
                <div class="row">
                    <div class="col-lg-12";>
                       <?php
                         $query = "SELECT * FROM tbl_product WHERE pr_code='$pr_code'";
                         $result=$db->select($query);
                         if($result){ 
                         $row = mysqli_fetch_array($result);
    
                         }

                         ?> 
    
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Click to view full screen</a>
                        
                      <center> <h2 style="background-color: #284761;width:530px;height: 50px;text-align: center;border: 1px;border-style: solid;padding-top: 5px; color:white">Add Sale Product</h2>
                     

                    
                        <form action="addsale.php" method="post" enctype="multipart/form-data" class="table" style=" width:530px; border:1px;border-style:solid;padding-left:20px;" >
                        
                         <div class="form-group">
                          <label> <input id="pr_code" type="text" placeholder="Product Code" value="<?php if(isset($row)) echo $row['pr_code'] ;?>" name="pr_code"  class="form-control" style="width:500px; margin-top:20px" /></label>
                           </div>
                           <input id="button1" type="submit" name="submit" value="AddProduct" style="margin-left: 400px; margin-bottom: 10px" class="btn btn-primary"  />
                       
                          
                           
                    
                           <div class="form-group">
                          <label> <input id="pr_category" type="text" value="<?php if(isset($row)) echo $row['pr_category'] ;?>" name="pr_category" class="form-control" style="width:500px;margin-top:20px;" /></label>
                        
                        </div>
                        
                  
                         <div class="form-group">
                         <label> <textarea class="form-control" rows="4" cols="55" id="pr_description" name="pr_description"  placeholder="<?php if(isset($row)) echo $row['pr_description'] ;?>"   style="width:500px" ></textarea></label>
                         </div>
                        
                       
                       <div class="form-group">
                       <label> <input id="quantity" type="text" placeholder="Product Quantity" name="quantity"class="form-control" style="width:500px" /></label></div>
                       <div class="form-group">
                        <label> <input id="size" type="text" value="<?php if(isset($row)) echo $row['size'] ;?>" name="size" class="form-control" style="width:500px;margin-top:20px;" /></label></div>

                       <div class="form-group">
                       <label> <input id="datepicker" type="date" placeholder="Purchese Date" name="sell_date" class="form-control" style="width:500px"  /></label>
                        </div>
                        
                       
                        <div class="form-group">
                       <label> <input id="sell_price" type="text" placeholder=" Selling Price" name="sell_price" class="form-control" style="width:500px"  /></label>
                        </div>
                        <div class="form-group">
                       <label><input id="pr_color" type="text" placeholder=" Product Color" name="pr_color" class="form-control" style="width:500px"   /></label>
                         </div>           
                            
                            
                             <div class="form-group">
                        <input id="button1" type="submit" name="submit" value="AddProduct" class="btn btn-primary"  />
                       
                         <input id="button1" type="reset" name="reset" value="Reset" class="btn btn-primary" >
                        
                        
                    
                      <span class="text-danger"</span>
                        

                             
                        
                             
                         
                     </form>
                    
                 
                          
                           
                    
                  </div>
                    </div>
                </div>
            </div>


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
    <script>
// we used jQuery 'keyup' to trigger the computation as the user type
$('.price').keyup(function () {
 
    // initialize the sum (total price) to zero
    var sum ;
    var sum1;
     
    // we use jQuery each() to loop through all the textbox with 'price' class
    // and compute the sum for each loop
    $('.price').each(function() {
        sum = Number($(this).val())+Number($(this).val())*.2;
        sum1=sum+sum*.5
    });
     
    // set the computed value to 'totalPrice' textbox
    $('#pr_costing').val(sum);
    $('#sell_price').val(sum1);
     
});
</script>

</body>

</html>
