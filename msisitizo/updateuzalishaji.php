<?php
	session_start();
	include('../assets/inc/config.php');
    
	if(isset($_POST['update']))
	{
        
        $id=$mysqli -> real_escape_string($_GET['id']);
        $title=$mysqli -> real_escape_string($_POST['title']);
		$desc=$mysqli -> real_escape_string($_POST['desc']);
	
        $pic=$_FILES["pic"];
        $old_image = mysqli_real_escape_string($mysqli,$_POST['old_pic']);    
        $pic_file=mysqli_real_escape_string($mysqli,$_FILES["pic"]["name"]);
        $tmpNamepic=$_FILES["pic"]["tmp_name"];
        

        if($pic !='')
            {
                $update_filename = mysqli_real_escape_string($mysqli,$_FILES['pic']['name']);
            }
            else
            {
                $update_filename = $old_image;
            }
            
            if(file_exists('uploads/uzalishaji/'.$_FILES['pic']['name']))
            {
                $filename=mysqli_real_escape_string($mysqli,$_FILES['pic']['name']);
                $err = "This Picture Already Exist:   ".$filename;
                
            }

            else
            {
                $query="UPDATE uzalishaji SET title=?, description=?, image=? WHERE id = ?";
                $stmt = $mysqli->prepare($query);
		        $rc=$stmt->bind_param('sssi', $title, $desc, $pic_file, $id);  
			
		        $stmt->execute();

                if($stmt)
	            {
                    if(mysqli_real_escape_string($mysqli,$_FILES['pic']['name'] !=''))
                    {
                        unlink("uploads/uzalishaji/".$old_image);
            
                        move_uploaded_file($tmpNamepic,'uploads/uzalishaji/'.$pic_file);
            
                    }
            
            
		            $success = "Details Updated Successfully";
	            }
	            else {
		            $err = "Details Not Updated";
	            }
    
            }

        

	}




?>
<!--End Server Side-->
<!DOCTYPE html>
<html lang="en">
    
    <!--Head-->
    <?php include('../assets/inc/headtwo.php');?>

    
    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <?php include("../assets/inc/navtwo.php");?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <?php include("../assets/inc/msisitizosidebar.php");?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Applicant</a></li>
                                            <li class="breadcrumb-item active">Manage Applicant</li>
                                        </ol>
                                    </div>
                                    
                                    <h4 class="page-title">Update Applicants Details</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
                        <?php
                            if(isset($_GET['id']))
                            {
                                $id=$mysqli -> real_escape_string($_GET['id']);
                                $ret="SELECT  * FROM uzalishaji WHERE id=?";
                                $stmt= $mysqli->prepare($ret) ;
                                $stmt->bind_param('i',$id);
                                $stmt->execute() ;//ok
                                $res=$stmt->get_result();
                            }
                            
                            //$cnt=1;
                            while($row=$res->fetch_object())
                            {
                        ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">update necessary fields</h4>


                                         
                                        <!--Add Patient Form-->
                                        
                                        <form method="post" enctype="multipart/form-data">
                                           
                                            <h3 class="header-title"><u><b><center> Details to Update</u></b></center></h3>
                                            <div class="form-row">

                                                
                                                <div class="form-group col-md-3">
                                                    <label for="inputEmail4" class="col-form-label">Title</label>
                                                    <input type="text"  name="title" class="form-control" value="<?php echo $row->title;?>" >
                                                    
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label for="inputEmail4" class="col-form-label">Description</label>
                                                    <textarea  type="text" name="desc" class="form-control"  id="editor"><?php echo $row->description ;?></textarea>
                                                </div>
                                                
                                                

                                                <div class="form-group col-md-5">
                                                    <label for="inputEmail4" class="col-form-label">Image </label>
                                                    
                                                    <img src="uploads/uzalishaji/<?php echo $row->image;?>"  width="500px" height="" />
                                                    <input type="file"  name="pic" class="form-control">
                                                    <input type="hidden" name="old_pic" class="form-control" value="<?php echo $row->image; ?>">
                                                
                                                </div>

                                            </div>

                         
                                            <button type="submit" name="update" class="ladda-button btn btn-success" data-style="expand-right">Update Details</button>

                                        </form>
                                        <!--End Patient Form-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                        <?php }?>

                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <?php include('../assets/inc/footer.php');?>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

       
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>
        <!-- jquery js -->
        <script src="../assets/js/jquery.min.js"></script>

        <script src="../assets/js/jquery.ui.js"></script>
        
        <script src="../assets/js/jquery-3.6.0.js"></script>
        <!-- jquery js -->
        <script type="text/javascript" src="script/script.js"></script>
        
        <script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
        <script type="text/javascript">
        CKEDITOR.replace('editor')
        </script>


        <!-- Vendor js -->
        <script src="../assets/js/vendor.min.js"></script>

        <!-- App js-->
        <script src="../assets/js/app.min.js"></script>

        <!-- Loading buttons js -->
        <script src="../assets/libs/ladda/spin.js"></script>
        <script src="../assets/libs/ladda/ladda.js"></script>

        <!-- Buttons init js-->
        <script src="../assets/js/pages/loading-btn.init.js"></script>
        
    </body>

</html>

