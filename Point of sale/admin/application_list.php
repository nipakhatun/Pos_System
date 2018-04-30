<?php include 'inc\header.php';?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>User Application   <button onclick="myFunction()" style="margin-left:800px;" >Print this page </button>
              </h2>
                <?php
		            if(isset($_GET['delid'])){
		            	 $id=$_GET['delid'];
			                $query="DELETE FROM tbl_application WHERE id='$id'";
							$delmsg=$db->delete($query);
							if ($delmsg) {
				                 echo "<div class='alert alert-success'>
				                         <strong>Success!</strong> Category delete Successfully!.
				                    </div>";
				             }else{
				                 echo "Category Not deleted!!";
				             }
				         }
       			 ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>

							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>About</th>
							<th>Message</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$query="SELECT * FROM tbl_product order by pr_code desc";
						$application=$db->select($query);
						if ($application) {
							$i=1;
							while ($result=$application->fetch_assoc()) {
							

					?>
					<tr>
						<td><?php echo $result['pr_code'];?></td>
							<td><?php echo $result['pr_category'];?></td>
							<td><?php echo $result['pr_description'];?></td>
							<td><?php echo $result['sell_price'];?></td>
							<td><?php echo $result['quantity'];?></td>
							<td><?php echo $result['pr_color'];?></td>
							
							<td><a href="editpost.php?editpostid=<?php echo $result['pr_code'];?>">Edit</a> || <a onclick="return confirm('Are you Sure to Delete!');" href="?delpostid=<?php echo $result['pr_code'];?>">Delete</a></td>
							</tr>
						</<?php $i++;}}?>
						
					</tbody>
				</table>

               </div>
            </div>
        </div>
         <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();


        });
    </script>
    <script>
function myFunction() {
    window.print();
}
</script>

<?php include 'inc\footer.php';?>