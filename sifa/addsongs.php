<!--Server side code to handle  Patient Registration-->
<?php
	session_start();
	include('../assets/inc/config.php');
    
    //if(empty($_SESSION['id']))
    //{
        //header('location:login.php');
    //}
		if(isset($_POST['add']))
		{
            
			$title=$mysqli -> real_escape_string($_POST['title']);
			$description=$mysqli -> real_escape_string($_POST['desc']);
            

            $pic=$_FILES["video"];
            $tmpNamepic=$_FILES["video"]["tmp_name"];
            $video_file=$_FILES["video"]["name"];
            
            
            move_uploaded_file($tmpNamepic,'uploads/'.$video_file);

   
            //sql to insert captured values
			$query="INSERT INTO sifa ( title,description,file) values(?,?,?)";
            
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('sss', $title,$description, $video_file ); 
            
			$stmt->execute();

			

			if($stmt)
			{
				$success = "File Added Successful";
			}
			else {
				$err = "Please Try Again Or Try Later";
			}
			
			
		}



?>
<!--End Server Side-->
<!--End Patient Registration-->
<!DOCTYPE html>
<html lang="en">
    
    <?php include('../assets/inc/headtwo.php');?>

    

    <body>

        <!-- Begin page -->
        <div id="wrapper">

           <!-- Topbar Start -->
            <?php include("../assets/inc/navtwo.php");?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <?php include("../assets/inc/sifasidebar.php");?>
            <!-- Left Sidebar End -->
           
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
                                            <li class="breadcrumb-item"><a href="sifa.php">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">SONGS</a></li>
                                            <li class="breadcrumb-item active">Add Songs</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Add Songs Here </h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="page-title">Fill the fields in the form</h4>

                                        
                                        <!--Add Patient Form-->
                                        <form method="post" enctype="multipart/form-data">
                                        <h3 class="header-title"><u><b><center>Songs Details </u></b></center></h3>
                                            <div class="form-row">
                                                
                                                <div class="form-group col-md-3">
                                                    <label for="inputEmail4" class="col-form-label">Title</label>
                                                    <input type="text"  name="title" class="form-control" id="" >
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label for="inputEmail4" class="col-form-label">Description</label>
                                                    <textarea type="text"  name="desc" class="form-control" id="editor" ></textarea>
                                                    
                                                </div>
       
                                            </div>

                                            

                                            <h3 class="header-title"><u><b><center>Song </u></b></center></h3>

                                            <div class="form-row">

                                                

                                                <div class="form-group col-md-3">
                                                    <label for="inputEmail4" class="col-form-label">Song</label>
                                                    <input type="file"  name="video" class="form-control" id="" >
                                                </div>

                                               

                                            </div>

                                         

                                           
                                            <button type="submit" name="add" class="ladda-button btn btn-success" data-style="expand-right">Add Song</button>

                                        </form>
                                        <!--End Patient Form-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->
                
                <?php //}?>

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




