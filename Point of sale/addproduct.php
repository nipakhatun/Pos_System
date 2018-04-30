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
          <li><a href="logout.php">View Sale</a></li>
          <
          <li><a href="logout.php">Log Out</a></li> 
        <?php } else { ?>
        <li><a href="signin.php">Login</a></li>
        <li><a href="signup.php">Sign Up</a></li>
        
        <?php } ?>
     
            </ul>
        </div>
         
        <!-- /#sidebar-wrapper -->

         <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid" >
                <div class="row">
                    <div class="col-lg-12";>

                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Click to view full screen</a>
                        
                      <center> <h2 style="background-color: #284761;width:530px;height: 50px;text-align: center;border: 1px;border-style: solid;padding-top: 5px; color:white">Add Product</h2>
                     
                    
                        <form action="addproductqury.php" method="post" enctype="multipart/form-data" class="table" style=" width:530px; border:1px;border-style:solid;padding-left:20px;" >
                        <div class="form-group">
                         <label> <input id="pr_category" type="text" placeholder="Product Category" name="pr_category" class="form-control" style="width:500px;margin-top:20px;" /></label>
                         </div>
                         <div class="form-group"><label> <input id="pr_code" type="text" placeholder="Product Code" name="pr_code"  class="form-control" style="width:500px" /></label>
                        </div>
                        <div class="form-group">
                        <label> <input id="pr_name" type="text" placeholder="Product Name" name="pr_name"  class="form-control" style="width:500px"/></label></div>
                         <div class="form-group">
                         <label> <textarea class="form-control" rows="4" cols="55" id="pr_description" name="pr_description"  placeholder="Product Description" style="width:500px" ></textarea></label>
                         </div>
                        <div class="form-group">
                       <label> <input id="suplr_name" type="text" placeholder="Suplier Name" name="suplr_name"class="form-control" style="width:500px"/></label></div>
                       <div class="form-group">
                       <label> <input id="memo_no" type="text" placeholder="Memo No" name="memo_no"class="form-control" style="width:500px"/></label></div>
                       <div class="form-group">
                       <label> <input id="quantity" type="text" placeholder="Product Quantity" name="quantity"class="form-control" style="width:500px" /></label></div>
                       <div class="form-group">
                        <label> <select class="form-control" required="" name="size" class="form-control"style="width: 500px"  >
                                      <option value="" selected="selected" >Size</option>
                                      <option value="xsmlsml">X-Small - Small</option>
                               <option value="smlmed">Small - Medium</option>
                               <option value="medlge">Medium - Large</option>
                                  </select></label></div>

                       <div class="form-group">
                       <label> <input id="datepicker" type="date" placeholder="Purchese Date" name="datepicker" class="form-control" style="width:500px"  /></label>
                        </div>
                        <div class="form-group">
                       <label> <input id="org_price" type="text" placeholder="Orginal Price" name="org_price" class='price' class="form-control" style="width:500px" /></label></div>
                       <div class="form-group">
                       <label> <input id="pr_costing" type="text" placeholder=" Costing with Price" name="pr_costing" class="form-control" style="width:500px"  /></label>
                        </div>
                        <div class="form-group">
                       <label> <input id="sell_price" type="text" placeholder=" Selling Price" name="sell_price" class="form-control" style="width:500px"  /></label>
                        </div>
                        <div class="form-group">
                       <label><input id="pr_color" type="text" placeholder=" Product Color" name="pr_color" class="form-control" style="width:500px"   /></label>
                         </div>           
                        

                                      <div class="form-group">
                                      <label> Select Product image<input id="name" type="file" name="image" style="width:500px" class="form-control"></label>
                                        
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
