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
                <?php include("../assets/inc/userssifasidebar.php");?>
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
                                                <li class="breadcrumb-item"><a href="msisitizo.php">Dashboard</a></li>
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">DETAILS</a></li>
                                                <li class="breadcrumb-item active">VIEW DETAILS</li>
                                            </ol>
                                        </div>
                                      
                                    </div>
                                </div>
                            </div>     
                            
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box">
                                        <div class="row">
                                            
                                            <div class="col-xl-7">
                                            <h4 class="header-title"><u><b><center>SIFA ZA MUUMBA</u></b></center></h4>
                                            
                                                <div class="pl-xl-3 mt-3 mt-xl-0">
                                                    <?php
          
                                                    $ret="SELECT  * FROM sifa ORDER BY id DESC";
                                                    $stmt= $mysqli->prepare($ret) ;
                                                    //$stmt->bind_param('i',$id);
                                                    $stmt->execute() ;//ok
                                                    $res=$stmt->get_result();
                                                    //$cnt=1;
                                                    while($row=$res->fetch_object())
                                                    {
                   
                                                    ?>
                                                    <h4 class="mb-1"><?php echo $row->title;?></h4>
                                                    <hr>
                                                   
                                                    <hr>
                                                    
                                                    <video  width="900px" width="900px"  controls>
                                                        <source src="uploads/<?php echo $row->file;?>" type="">
                                                        
                                                    </video>
                                                    <hr>
                                                    <h4 class="mb-1 "><?php echo $row->description;?></h4>
                                                    <button class="btn btn-primary fa fa-download"><a target="_blank" href="uploads/<?php echo $row->file;?>" download="<?php echo $row->file;?>" style="color:white;">&nbsp;Download</a></button>
                                                    <button class="btn btn-secondary fa fa-play"><a target="_blank" href="usersplaysong.php?id=<?php echo $row->id;?>"  style="color:white;">&nbsp;Play</a></button>
                                                    <br>
                                                    <hr>

                                                    <?php }?>

                                                    
                                                    
                  
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