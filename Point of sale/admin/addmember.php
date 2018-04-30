<?php include 'inc\header.php';?>
<?php
    if (Session::get("admin_id")!=null) {
            $id=Session::get("admin_id");
    }

          
    ?>

        <div class="grid_10">
        
            <div class="box round first grid" style="float:left;width: 502px;">
                <h2>Add Member</h2>
                <div>
                   <?php
                   $db=new Database();
                   if($_SERVER ['REQUEST_METHOD']=="POST" ) {
                    $name=$_POST['name'];
                    $email=$_POST['email'];
                    $username=$_POST['username'];
                    $password=md5($_POST['password']);
                    if(empty($name) or empty($email) or empty($username) or 
                        empty($password)){
                          echo "<div class='alert alert-warning'>
                                             <strong>Warning!</strong> Field must not be empty.
                                        </div>";
                         
                     }
                     else{
                        $query = "INSERT INTO tbl_member (name,email,username,password) 
                        VALUES ('$name','$email','$username','$password')";
                         $result=$db->insert($query);
                         if ($result) {
  
                          echo "<div class='alert alert-success'>
                                             <strong>Success!</strong> Add member Successfully!.
                                        </div>";
                                    }else{
                                         echo "No member Added!!";
                                }

                     }

                   }

               ?> 
                </div>
                
               <div class="block copyblock" style="width: 400px;margin-left: 20px;"> 

              
                 <form action="" method="post">
                  
                    <table class="form" >
                 
                        <tr>
                            <td>Name:</td>
                            <td>
                            <input id="name" type="text" placeholder="Enter full name" name="name"/>
                            </td>
                        </tr>
                    
                        <tr>
                            <td>Email Address:</td>
                            <td>
                            <input id="email" type="email" placeholder="Email" name="email"/>
                            </td>
                        </tr>   
                                
                        <tr>
                            <td>User Name:</td>
                            <td>
                                <input id="username" type="text" placeholder="Enter user name" name="username"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td>
                                <input id="password" type="password" placeholder="password" name="password" maxlength="8"/>
                            </td>
                        </tr>
                          
                        <tr> 
                            <td></td>
                            <td>
                                <input id="myPopup" type="submit" name="submit" Value="Save" onclick="myFunction()"  />
                                
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
<script>
// When the user clicks on div, open the popup
function myFunction() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
}
</script>
            
        </div>
       
        
<?php include 'inc\footer.php';?>