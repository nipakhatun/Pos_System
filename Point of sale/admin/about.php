
<?php include 'inc/header.php';?>
<?php
  
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $content = $fm->validation($_POST['content']);
         $content=mysqli_real_escape_string($db->link,$content);
          if($content==""){
              echo "<span class='error'>Field must be not empty!</span>";
               
            }
            else{
                $query="UPDATE about SET content='$content' WHERE id='1'";
               $update_row=$db->update($query);
               if ($update_row) {
                   echo "<span class='success'>Data update successfully.</span>";
               }
               else{
                echo "<span class='error'>Data not updated!</span>";
               
               }
            }
        }
    
    
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Information</h2>
        <div class="block">  
          <?php
                $query="select * from about where id='1'";
                $aboutnote=$db->select($query);
                if($aboutnote){
                    while ($result=$aboutnote->fetch_assoc()) {
                
                        
                    
                ?>             
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">			
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>About Us:</label>
                    </td>
                    <td>
                        <textarea rows="10" cols="100" class="textBox" name="content"><?php echo $result['content']; ?></textarea>
                    </td>
                </tr>
				

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
              <?php } }?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


