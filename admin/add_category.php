<?php include "header.php";
    include '../backend/db/db.php';
 include "left.php"; ?>
 <?php
 if(isset($_POST['btn_submit']))
 {
	 $count=0;
	 $nm=$_POST['txt_name'];
	 $file=$_FILES['file'];
	 $desc=$_POST['desc'];
	 if($nm=="")
	 {
		 $err_name="enter name";
		 $count++;
	 }
 }
 ?>
 <?php
 if(isset($_POST['btn_submit']) && $count==0)
 {
	 $ins="insert into product (name,img_url,description) values('$nm','$file','$desc');";
	 $q=$conn->query(ins);
	 ?>
	 <script>
	 alert("course added successfully");
	 </script>
	 <?php
	 
	 
	 
 }
 ?>

        

<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
           


<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Add Department</h2>

                <div class="box-icon">
                    
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form name="frm_pro" action="uplode.php" enctype="multipart/form-data" method="post">
                    
					
					<div class="form-group">
                        
                        <label for="exampleInputEmail1">Product Name</label>
                        <input type="text" max="100" min="1" name="txt_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Name">
						<strong><span style="color:#FF0000;"><?php echo $err_name; ?></span></strong>
                        <label for="file">images</label>
                        <input type="file" max="100" min="1" name="file" class="form-control" id="file" placeholder="">
						<strong><span style="color:#FF0000;"><?php echo $err_name; ?></span></strong>
                        <label for="desc ">description</label>
                        <input type="text" max="100" min="1" name="desc" class="form-control" id="desc" placeholder="Enter Description">
						<strong><span style="color:#FF0000;"><?php echo $err_name; ?></span></strong>
                        
                    </div>
					
										
					
<button class="btn btn-primary btn-sm" type="submit" name="btn_submit">Add
</button>
<a class="btn btn-primary btn-sm" href="manage_category.php" name="btn_back">Back to List </a>
</button>
                </form>

            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->

    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    <!-- Ad, you can remove it -->
    
    <!-- Ad ends -->

    <hr>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Settings</h3>
                </div>
                <div class="modal-body">
                    <p>Here settings can be configured...</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
                </div>
            </div>
        </div>
    </div>
<style>
.select
{
	border:#D6D6D6 solid 2px;
	border-radius:3px;
}
</style>

    <?php include "footer.php"; ?>
