<?php include "header.php"; ?>
    <!-- topbar ends -->
<?php include "left.php"; ?>

<?php include "../backend/db/db.php"; ?>
        <!--/span-->
        <!-- left menu ends --><noscript>
           
        </noscript>

        

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
                <div>
        
    </div>
<script src="js/jquery-3.1.0.min.js"></script>
	
 
<form method="post" enctype="multipart/form-data">
    <div class="row">
	<div class="col-md-4"> 
	 <input type="text" class="form-control" name="txt_search"  value="<?php echo $_POST['txt_search']; ?>" autocomplete="off">
    </div>
	<div class="col-md-4">
	<input type="submit" class="btn btn-info" name="btn_search" value="Search" >
	<button type="submit" name="asc_btn" class="btn btn-info"><span class="glyphicon glyphicon-sort-by-alphabet"  style="line-height: 1.4"></span></button>
	<button type="submit" name="desc_btn" class="btn btn-info"><span class="glyphicon glyphicon-sort-by-alphabet-alt" style="line-height: 1.4"></span></button>
	</div>
		<a class="btn btn-info" href="add_category.php" style="float:right;">Add New</a>
	</div>
</form>
	
	<div class="row">
	<div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <a href=""><h2><i class="glyphicon glyphicon-wrench"></i> Manage Product</h2></a>

        <!-- <div class="box-icon">
            
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
        </div> -->
    </div>

    <div class="box-content">
    <div style="overflow:auto"> 
  
	<table class="table table-bordered bootstrap-datatable">
    <thead>
    <tr>
	     <th class="text-center">Sr. No</th>
        <th>Product Name </th>
        <th>description </th>
		<th class="text-center">Actions</th>
    </tr>
    </thead>
    <tbody>
	<?php
	$sel="select * from product;";
	$q=$conn->query($sel);
	while($row=$q->fetch_assoc())
	{
	?>
    <tr>
	     <td class="text-center"><?php echo $row['id'];?></td>
        <td><?php echo $row['name'];?></td>
		<td class="text-center"><?php echo $row['description'];?></td>
        <td class="text-center" >
<a href="./operation/delete.php ? id=<?php echo $row['id'] ?>"  class="btn_delete">												
<img src="img/delete.png" height="30px" width="30px" data-toggle="tooltip" title="Delete"></a>

<a href="./operation/edit.php ? id=<?php echo $row['id'] ?>">												
<img src="img/edit.png" height="30px" width="30px" data-toggle="tooltip" title="Edit"></a>
	</td>
           
   </tr>
   <?php
	}
	?>
    </tbody>
    </table>
    
	
	</div>
	
    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->

    <!--/span-->

    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    <!-- Ad, you can remove it -->
  

    </div>
    <!-- Ad ends -->

    


   <?php include "footer.php"; ?>