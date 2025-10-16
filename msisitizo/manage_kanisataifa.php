<?php
  session_start();
  include('../config.php');
?>

<!DOCTYPE html>
<html lang="en">
    
<?php include('../assets/inc/headtwo.php');?>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
                <?php include('../assets/inc/navtwo.php');?>
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Kanisa Na Taifa Kufanya Kazi Pamoja</a></li>
                                            <li class="breadcrumb-item active">Manage Kanisa Na Taifa</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Manage Kanisa Na Taifa Details</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title"></h4>
                                    <div class="mb-2">
                                        <div class="row">
                                            <div class="col-12 text-sm-center form-inline" >
                                                <div class="form-group mr-2" style="display:none">
                                                    <select id="demo-foo-filter-status" class="custom-select custom-select-sm">
                                                        <option value="">Show all</option>
                                                        <option value="Discharged">Discharged</option>
                                                        <option value="OutPatients">OutPatients</option>
                                                        <option value="InPatients">InPatients</option>
                                                    </select>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <input id="demo-foo-search" type="text" placeholder="Search" class="form-control form-control-sm" autocomplete="on">
                                                </div>

                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="table-responsive">
                                        <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                            <thead>
                                            <tr>
                                                <!--<th>#</th>-->
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Image</th>
                                                
                                                
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </tr>
                                            </thead>
                                            <?php
                                            try {
                                                $stmt = $pdo->prepare("SELECT * FROM kanisataifa ORDER BY id DESC");
                                                $stmt->execute();
                                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)):
                                            ?>

                                                <tbody>
                                                <tr>
                                                    <!--<td><?php //echo $cnt;?></td>-->
                                                    <td><?= htmlspecialchars($row['title']) ?></td>
                                                     <td><?= htmlspecialchars($row['description']) ?></td>
                                                    
                                                    <td>
                                                        <img src="../uploads/kanisataifa/<?= htmlspecialchars($row['image']) ?>" height="100" width="100" >
                                                        
                                                    </td>

   
                                                    <td>  
                                                        <a target="_blank" href="updateupendo.php?id=<?= htmlspecialchars($row['id']) ?>" class="btn btn-success"><i class="mdi mdi-check-box-outline"></i> update </a>  
                                                        
                                                    </td>

                                                    <td>
                                                        <form action="deletefile.php"  method="post">
                                                            <input type="hidden"  name="id" value="<?= htmlspecialchars($row['id']) ?>" >
                                                            <input type="hidden"  name="image" value="<?= htmlspecialchars($row['image']) ?>"  >
                                                            <button type="submit" name="delete_image" class="btn btn-danger">Delete</button>
                                                            
                                                        </form>
                 
                                                    </td>
                                                </tr>
                                                <?php 
                                                endwhile;
                                                $stmt = null; // Close statement
                                            } catch (PDOException $e) {
                                            error_log("Error fetching counties: " . $e->getMessage());
                                            // Optionally display a message: echo "<tr><td colspan='3'>Error loading data</td></tr>";
                                            }
                                            ?>
                                            </tbody>
                                            
                                            <tfoot>
                                            <tr class="active">
                                                <td colspan="12">
                                                    <div class="text-right">
                                                        <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div> <!-- end .table-responsive-->
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

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

        <!-- Footable js -->
        <script src="../assets/libs/footable/footable.all.min.js"></script>

        <!-- Init js -->
        <script src="../assets/js/pages/foo-tables.init.js"></script>

        <!-- App js -->
        <script src="../assets/js/app.min.js"></script>
        
    </body>

</html>