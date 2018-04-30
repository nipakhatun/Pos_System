<?php include 'inc\header.php';?>
<?php
    if (Session::get("admin_id")!=null) {
            $id=Session::get("admin_id");
    }

          
    ?>

        <div class="grid_10">
        
            <div class="box round first grid" style="float:left;width: 1000px;">

                <h2>Add Sell Product</h2>
                <div>
                  <?php
               extract($_POST);
               if(isset($add))
                   {
                    $res=$org_price+($org_price*.2);
                      }   
 
                   ?>
                   <script type="text/javascript">
                     $( "#org_price" ).keyup(function() {
                     var bitcoinvalue = $( "#org_price" ).val() * 200;
                  $("#pr_costing").val(bitcoinvalue);
                 });
                   </script>
                   <?php
                   $db=new Database();
                   if($_SERVER ['REQUEST_METHOD']=="POST" ) {
                    $pr_code=$_POST['pr_code'];
                    $pr_category=$_POST['pr_category'];
                    $pr_description=$_POST['pr_description'];
                    $quantity=$_POST['quantity'];
                    $size=$_POST['size'];
                    $datepicker=$_POST['datepicker'];
                    $sell_price=$_POST['sell_price'];
                    $pr_color=$_POST['pr_color'];


                   
                    if(empty( $pr_category) or empty($pr_code) or empty($pr_name) or 
                        empty($pr_description)or empty($suplr_name)or empty($memo_no)or empty($quantity)or empty($size) or empty($datepicker)or empty($org_price)or empty($pr_color)or empty($unique_image)){
                          echo "<div class='alert alert-warning'>
                                             <strong>Warning!</strong> Field must not be empty.
                                        </div>";
                         
                     }
                     
                     else{
                        
                        $query = "INSERT INTO tbl_product(pr_category,pr_code,pr_name,pr_description,suplr_name,memo_no,quantity,size,datepicker,org_price,pr_costing,sell_price,pr_color,image) 
                   VALUES ('$pr_category','$pr_code','$pr_name','$pr_description','$suplr_name','$memo_no','$quantity','$size','$datepicker','$org_price','$pr_costing','$sell_price','$pr_color','$unique_image')";
                         $result=$db->insert($query);
                         if ($result) {
                          echo "<div class='alert alert-success'>
                                             <strong>Success!</strong> Add Product Successfully!.
                                        </div>";
                                    }else{
                                         echo "No Product Added!!";
                                }

                     }

                   
               }

               ?> 
             
                </div>
                
               <div class="block copyblock" style="width: 500px;margin-left: 30px;"> 

              
                    <form action="" enctype="multipart/form-data" method="post">
                  
                    <table class="form" >
                 
                        
                         <tr>
                            <td>Product Code:</td>
                            <td>
                            <input id="pr_code" type="text" placeholder="Enter Product code" name="pr_code"
                            </td>
                        </tr>
                        <tr>
                            <td>Product Category:</td>
                            <td>
                            <input id="pr_category" type="text" placeholder="Enter Category" name="pr_category"
                            </td>
                        </tr>
                      
                                
                        <tr>
                            <td>Product Description:</td>
                            <td>
                                <input id="pr_description" type="text" placeholder="Enter Product description" name="pr_description"
                            </td>
                        </tr>
                        
                    
                        <tr>
                            <td>Quantity:</td>
                            <td>
                            <input id="quantity" type="text" placeholder="Enter quantity" name="quantity" 
                            </td>
                        </tr>   
                                
                        <tr>
                            <td>Size:</td>
                            <td>
                                <select name="size">
                               <option value="xsmlsml">X-Small - Small</option>
                               <option value="smlmed">Small - Medium</option>
                               <option value="medlge">Medium - Large</option>
                               </select>
                            </td>
                        </tr>
                        <tr>
                            
                         <tr>
                            <td>Sell Date:</td>
                            <td>
                             <input type="text" id="datepicker" name="datepicker" ></input>
                           
                            </td>
                        </tr>
                      
                        <tr>
                            <td>Selling Price:</td>
                            <td>
                                <input id="sell_price" type="text" placeholder="Selling Price" name="sell_price"
                            </td>
                        </tr>
                        <tr>
                            <td>Product color:</td>
                            <td>
                                <input id="pr_color" type="text" placeholder="Product Color" name="pr_color">
                            </td>
                        </tr>
                        </tr>
                           
                          
                        <tr> 
                            <td></td>
                            <td>
                               <input id="submit" type="submit" name="submit" value="Add Product" class="btn btn-primary"  />
                            </td>
                        </tr>
                    </table>
   
                    </form>
                </div>

            </div>


            
        </div>
        
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
        sum1=sum+sum*.3
    });
     
    // set the computed value to 'totalPrice' textbox
    $('#pr_costing').val(sum);
    $('#sell_price').val(sum1);
     
});
</script>
        

       
<?php include 'inc\footer.php';?>