<!--Server side code to handle  Patient Registration-->
<?php
	session_start();
	include('config.php');
    
    
?>
<!--End Server Side-->
<!--End Patient Registration-->
<!DOCTYPE html>
<html lang="en">
    
    <?php include('assets/inc/head.php');?>

    

    <body>

        <!-- Begin page -->
        <div id="wrapper">

           <!-- Topbar Start -->
            <?php include("assets/inc/nav.php");?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <?php include("assets/inc/userssidebar.php");?>
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
                                            <li class="breadcrumb-item"><a href="index.php">BRAIN OF</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">THE </a></li>
                                            <li class="breadcrumb-item ">CREATO<a href="adminindex.php">R</a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">DATA OF THE CREATOR </h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="page-title"> ALL DETAILS ARE HERE</h4>

                                        
                                        <!--Add Patient Form-->
                                        
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
                <?php include('assets/inc/footer.php');?>
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
        <script src="assets/js/jquery.min.js"></script>

        <script src="assets/js/jquery.ui.js"></script>
        
        <script src="assets/js/jquery-3.6.0.js"></script>
        <!-- jquery js -->
        <script type="text/javascript" src="script/script.js"></script>
        
        <script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
        <script type="text/javascript">
        CKEDITOR.replace('editor')
        </script>


        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js-->
        <script src="assets/js/app.min.js"></script>

        <!-- Loading buttons js -->
        <script src="assets/libs/ladda/spin.js"></script>
        <script src="assets/libs/ladda/ladda.js"></script>

        <!-- Buttons init js-->
        <script src="assets/js/pages/loading-btn.init.js"></script>
   
        
    </body>

</html>




