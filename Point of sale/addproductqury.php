
<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>
<?php include 'helpers/Format.php';?>
<?php
 include 'lib/Session.php';
 Session::init();


 ?>
<?php
  $db=new Database();
 $fm=new Format();
 ?>
<?php
                   $db=new Database();
                   if($_SERVER ['REQUEST_METHOD']=="POST" ) {
                    $pr_category=$_POST['pr_category'];
                    $pr_code=$_POST['pr_code'];
                    $pr_name=$_POST['pr_name'];
                    $pr_description=$_POST['pr_description'];
                    $suplr_name=$_POST['suplr_name'];
                    $memo_no=$_POST['memo_no'];
                    $quantity=$_POST['quantity'];
                    $size=$_POST['size'];
                    $datepicker=$_POST['datepicker'];
                    $org_price=$_POST['org_price'];
                    $pr_costing=$_POST['pr_costing'];
                    $sell_price=$_POST['sell_price'];
                    $pr_costing=$_POST['pr_costing'];
                    $pr_color=$_POST['pr_color'];

                 $permited = array('jpg', 'jpeg', 'png', 'gif');
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_temp = $_FILES['image']['tmp_name'];
                        $div = explode('.', $file_name);
                        $file_ext = strtolower(end($div));
                        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
                        $uploaded_image = "upload/".$unique_image;

                   
                    if(empty( $pr_category) or empty($pr_code) or empty($pr_name) or 
                        empty($pr_description)or empty($suplr_name)or empty($memo_no)or empty($quantity)or empty($size) or empty($datepicker)or empty($org_price)or empty($pr_color)or empty($unique_image)){
                          echo "<div class='alert alert-warning'>
                                             <strong>Warning!</strong> Field must not be empty.
                                        </div>";
                         
                     }
                     elseif ($file_size > 1048567) {
                            echo "<span class='error'>Image Size should be less then 1MB!</span>";
                        } elseif (in_array($file_ext, $permited) === false) {
                            echo "<span class='error'>You can upload only:-"
                                . implode(', ', $permited) . "</span>";
                        }
                     else{
                        move_uploaded_file($file_temp, $uploaded_image);
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