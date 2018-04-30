<?php include 'inc\header.php';?>
<?php
global $pr_code; 
    if (Session::get("admin_id")!=null) {
            $id=Session::get("admin_id");
    }

          
    ?>
        
        <div class="grid_10">
        
            <div class="box round first grid" style="float:left;width: 1000px;">

                <h2>Add Sell Product</h2>
                <div>
                  
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
                                             <strong>Warning!</strong> Enter the full information.
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
                  
                   
             
                </div>
                
                  <?php
                  
                  
    $query = "SELECT * FROM tbl_product WHERE pr_code='$pr_code'";
    
    $result=$db->select($query);
    if($result){ 
    $row = mysqli_fetch_array($result);
    
    }

    ?> 
                 
                  
              
               <div class="block copyblock" style="width: 500px;margin-left: 30px;"> 
              
                    <form action="" enctype="multipart/form-data" method="post">
                  
                    <table class="form" >
                   
                         <tr>
                            <td>Product Code:</td>
                            <td>
                            <input id="pr_code" type="text" placeholder="Enter Product code"   name="pr_code" value="<?php if(isset($row)) echo $row['pr_code'] ;?>" 

                            </td>
                            <td>
                              <input type="submit" name="add" value="Add">
                            </td>
                        </tr>
                        <tr>
                         
                            <td>Product Category:</td>
                            <td>
                            <input id="pr_category" type="text"  placeholder=" Product Category" readonly="readonly" value="<?php if(isset($row)) echo $row['pr_category'] ;?>" name="pr_category"
                            </td>
                        </tr>
                      
                                
                        <tr>
                            <td>Product Description:</td>
                            <td>
                                <input id="pr_description" type="text" name="pr_description" placeholder=" Product Description"  readonly="readonly" value="<?php if(isset($row)) echo $row['pr_description'] ;?>"
                            </td>
                        </tr>
                      
                           
                    
                        <tr>
                            <td>Quantity:</td>
                            <td>
                            <input id="quantity" type="text" placeholder="Enter quantity" name="quantity" 
                            </td>
                        </tr>  
                        <tr>
                            <td>Discount</td>
                            <td>
                              <input id="discount" type="text" name="discount" placeholder="Discount"  readonly="readonly" class='discount' value="<?php if(isset($row)) echo $row['discount'] ;?>"
                            </td>
                        </tr>  
                                
                        <tr>
                            <td>Size:</td>
                            <td>
                                 <input id="size" type="text" placeholder="Enter size"readonly="readonly" name="size" value="<?php if(isset($row)) echo $row['size'] ;?>"
                            </td>
                        </tr>
                        <tr>
                            
                         <tr>
                            <td>Sell Date:</td>
                            <td>
                             <input type="text" id="datepicker"  placeholder="Enter selling date"  name="sell_date" ></input>
                           
                            </td>
                        </tr>
                          <tr>
                            <td>Price</td>
                            <td>
                             <input type="text" id="price"  placeholder="Enter Price"  name="price"  class='price' ></input>
                           
                            </td>
                        </tr>
                      
                      
                        <tr>
                            <td> Price with Discount:</td>
                            <td>
                                <input id="sell_price" type="text" placeholder="Selling Price" name="sell_price" 
                            </td>
                        </tr>
                        <tr>
                            <td>Product color:</td>
                            <td>
                                <input id="pr_color" type="text" placeholder="Product Color" name="pr_color" value="<?php if(isset($row)) echo $row['pr_color'] ;?>"
                            </td>
                        </tr>
                        </tr>
                           
                 
                        <tr> 
                            <td></td>
                            <td>
                               <input id="submit" type="submit" name="submit" value="Add Sale" class="btn btn-primary"  />
                               <input id="submit" type="reset" name="reset" value="Reset" class="btn btn-primary" >
                        
                        
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
   $('.discount').each(function() {
        dis= Number($(this).val()) ;
        
    });
    $('.price').each(function() {
        sum = Number($(this).val())-Number($(this).val())*dis ;
       
    });
     
    // set the computed value to 'totalPrice' textbox
    $('#sell_price').val(sum);
     
});
</script>
        

       
<?php include 'inc\footer.php';?>