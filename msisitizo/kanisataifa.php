<?php
  session_start();
  include('../config.php');
 
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
                <?php include("../assets/inc/usersmsisitizosidebar.php");?>
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
                                                <li class="breadcrumb-item"><a href="usersmsisitizo.php">Dashboard</a></li>
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
                                            <h4 class="header-title"><u><b><center>KANISA NA TAIFA KUFANYA KAZI PAMOJA</u></b></center></h4>
                                            
                                                <div class="pl-xl-3 mt-3 mt-xl-0">
                                                    <?php
                                                // Use PDO to query the database
                                                $ret = "SELECT * FROM kanisataifa";
                                                try {
                                                    $stmt = $pdo->prepare($ret);
                                                    $stmt->execute();
                                                    while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                                                ?>
                                                    <h4 class="mb-1"><?php echo htmlspecialchars($row->title); ?></h4>
                                                    <hr>
                                                    <p class="">
                                                        <img src="../uploads/kanisataifa/<?php echo htmlspecialchars($row->image); ?>" width="700px" height="700" />
                                                    </p>
                                                    <hr>
                                                    <h4 class="mb-1"><?php echo htmlspecialchars($row->description); ?></h4>
                                                    <button class="btn btn-primary fa fa-download">
                                                        <a target="_blank" href="../uploads/kanisataifa/<?php echo htmlspecialchars($row->image); ?>" download="<?php echo htmlspecialchars($row->image); ?>" style="color:white;">&nbsp;Download</a>
                                                    </button>
                                                    <br>
                                                    <hr>
                                                <?php 
                                                    }
                                                } catch (PDOException $e) {
                                                    echo "<p>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
                                                }
                                                ?>
                  
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