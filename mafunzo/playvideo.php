<?php
  session_start();
  include('../assets/inc/config.php');
  
?>
<!DOCTYPE html>
<html lang="en">
    
<?php include ('../assets/inc/headtwo.php');?>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <?php include('../assets/inc/navtwo.php');?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
                <?php include("../assets/inc/usersibadamafundishosidebar.php");?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <?php
                $id=$mysqli -> real_escape_string($_GET['id']);
                //$id_no=$mysqli -> real_escape_string($_GET['id_no']);
                $ret="SELECT  * FROM ibada_mafundisho WHERE id = ?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('i',$id);
                $stmt->execute() ;//ok
                $res=$stmt->get_result();
                //$cnt=1;
                while($row=$res->fetch_object())
                {
                   
            ?>

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
                                                <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">SONGS </a></li>
                                                <li class="breadcrumb-item active">VIDEOS WINDOW</li>
                                            </ol>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>     
                            <!-- end page title --> 
                            <!--Start printing-->
                            
                            <!--End printing-->

                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box">
                                        <div class="row">
                                            
                                            <div class="col-xl-7">
                                            <h4 class="header-title"><u><b><center>Videos Playing</u></b></center></h4>
                                                <div class="pl-xl-3 mt-3 mt-xl-0">

                                                    
                                                    <p class="">
                                                        <video  width="1100px" width="1000px"  controls>
                                                        <source src="uploads/<?php echo $row->file;?>" type="video/mp4">
                                                        </video>

                                                        <h4 class=""> <?php echo $row->file;?> </h4>
                                                        <button class="btn btn-primary fa fa-download"><a target="_blank" href="uploads/<?php echo $row->file;?>" download="<?php echo $row->file;?>" style="color:white;">&nbsp;Download</a></button>
                                                    </p>
                                                    
                   
                                                    <hr>
                                
                                                </div>
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row -->


                                    </div> <!-- end card-->
                                </div> <!-- end col-->
                            </div>
                            <!-- end row-->
                            
                        </div> <!-- container -->

                    </div> <!-- content -->

                    <!-- Footer Start -->
                        <?php include('../assets/inc/footer.php');?>
                    <!-- end Footer -->

                </div>
            <?php }?>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="../assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="../assets/js/app.min.js"></script>
        
    </body>

</html>