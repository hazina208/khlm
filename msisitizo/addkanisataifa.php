<?php
session_start();
include('../config.php');

// Uncomment the session check if needed
// if (empty($_SESSION['id'])) {
//     header('location:login.php');
//     exit;
// }

if (isset($_POST['add'])) {
    try {
        $title = $_POST['title'];
        $description = $_POST['desc'];

        // Validate input
        if (empty($title) || empty($description) || empty($_FILES["pic"]["name"])) {
            $err = "Please fill all fields and select an image.";
        } else {
            // Handle file upload
            $pic = $_FILES["pic"];
            $pic_file = $pic["name"];
            $tmpNamepic = $pic["tmp_name"];
            $upload_dir = '../uploads/kanisataifa/';
            $target_file = $upload_dir . basename($pic_file);

            // Validate file type and size (optional, for security)
            $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
            if (!in_array($pic['type'], $allowed_types)) {
                $err = "Only JPEG, PNG, and GIF files are allowed.";
            } elseif ($pic['size'] > 5 * 1024 * 1024) { // Limit to 5MB
                $err = "File size exceeds 5MB limit.";
            } else {
                // Move uploaded file
                if (move_uploaded_file($tmpNamepic, $target_file)) {
                    // Insert into database using PDO
                    $query = "INSERT INTO kanisataifa (title, description, image) VALUES (?, ?, ?)";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute([$title, $description, $pic_file]);

                    $success = "Image and Data Added Successfully";
                } else {
                    $err = "Failed to upload image. Please try again.";
                }
            }
        }
    } catch (PDOException $e) {
        $err = "Database Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include('../assets/inc/headtwo.php'); ?>
<body>
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Topbar Start -->
        <?php include("../assets/inc/navtwo.php"); ?>
        <!-- end Topbar -->
        <!-- ========== Left Sidebar Start ========== -->
        <?php include("../assets/inc/msisitizosidebar.php"); ?>
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
                                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Kanisa Na Taifa</a></li>
                                        <li class="breadcrumb-item active">Add Image</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Add Image and Data</h4>
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
                                    <!-- Display success or error messages -->
                                    <?php if (isset($success)) { ?>
                                        <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
                                    <?php } ?>
                                    <?php if (isset($err)) { ?>
                                        <div class="alert alert-danger"><?php echo htmlspecialchars($err); ?></div>
                                    <?php } ?>
                                    <!-- Add Patient Form -->
                                    <form method="post" enctype="multipart/form-data">
                                        <h3 class="header-title"><u><b><center>Picture Details</center></b></u></h3>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="inputEmail4" class="col-form-label">Title</label>
                                                <input type="text" name="title" class="form-control" id="">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputEmail4" class="col-form-label">Description</label>
                                                <textarea name="desc" class="form-control" id="editor"></textarea>
                                            </div>
                                        </div>
                                        <h3 class="header-title"><u><b><center>Picture</center></b></u></h3>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="inputEmail4" class="col-form-label">Picture</label>
                                                <input type="file" name="pic" class="form-control" id="">
                                            </div>
                                        </div>
                                        <button type="submit" name="add" class="ladda-button btn btn-success" data-style="expand-right">Add Image</button>
                                    </form>
                                    <!-- End Patient Form -->
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->
                </div> <!-- container -->
            </div> <!-- content -->
            <!-- Footer Start -->
            <?php include('../assets/inc/footer.php'); ?>
            <!-- end Footer -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->
    <!-- Right bar overlay -->
    <div class="rightbar-overlay"></div>
    <!-- Vendor js -->
    <script src="../assets/js/vendor.min.js"></script>
    <!-- App js -->
    <script src="../assets/js/app.min.js"></script>
    <!-- Loading buttons js -->
    <script src="../assets/libs/ladda/spin.js"></script>
    <script src="../assets/libs/ladda/ladda.js"></script>
    <!-- Buttons init js -->
    <script src="../assets/js/pages/loading-btn.init.js"></script>
    <!-- CKEditor -->
    <script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('editor');
    </script>
</body>
</html>