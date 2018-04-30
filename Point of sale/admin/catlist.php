<?php include 'inc\header.php';?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <?php
		            if(isset($_GET['catid'])){
		            	 $id=$_GET['catid'];
			                $query="DELETE FROM tbl_product WHERE pr_code='$id'";
							$category=$db->delete($query);
							if ($category) {
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
							<td>Serial No.</td>
							<td>Product Code</td>
							<td>Category Name</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
					<?php
						$query="SELECT * FROM tbl_product";
						$category=$db->select($query);
						if ($category) {
							$i=1;
							while ($result=$category->fetch_assoc()) {
							

					?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['pr_code'];?></td>
							<td><?php echo $result['pr_category'];?></td>

							<td><a href="editcat.php?catid=<?php echo $result['pr_code'];?>">Edit</a> || <a onclick="return confirm('Are you Sure to Delete!');" href="?catid=<?php echo $result['pr_code'];?>">Delete</a></td>
						</tr>
					<?php
							$i++;
							}
						}
					?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
<script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();


        });
    </script>
    
<?php include 'inc\footer.php';?>