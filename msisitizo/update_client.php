<?php
	session_start();
	include('assets/inc/config.php');
    if(empty($_SESSION['id']))
    {
      header('location:login.php');
    }
    
	if(isset($_POST['update']))
	{
        
        $id=$mysqli -> real_escape_string($_GET['id']);
        $clid=$mysqli -> real_escape_string($_POST['clid']);
		$fname=$mysqli -> real_escape_string($_POST['fname']);
		$mname=$mysqli -> real_escape_string($_POST['mname']);
        $lname=$mysqli -> real_escape_string($_POST['lname']);
        $gender=$mysqli -> real_escape_string($_POST['gender']);
        $dob=$mysqli -> real_escape_string($_POST['dob']);
        $idno=$mysqli -> real_escape_string($_POST['id_no']);
        $phone=$mysqli -> real_escape_string($_POST['phne']);
        $passno=$mysqli -> real_escape_string($_POST['passno']);
        $pass_app_date=$mysqli -> real_escape_string($_POST['pass_app_date']);
        $pass_ex=$mysqli -> real_escape_string($_POST['pass_ex_date']);
        $agency=$mysqli -> real_escape_string($_POST['agency']);
        $nok=$mysqli -> real_escape_string($_POST['fullnames']);
        $nok_phone=$mysqli -> real_escape_string($_POST['nok_no']);
        $nok_id=$mysqli -> real_escape_string($_POST['nok_id_no']);
        $nok_rela=$mysqli -> real_escape_string($_POST['nokrelation']);
        $pcad=$mysqli -> real_escape_string($_POST['pcad']);
        $gd_ex=$mysqli -> real_escape_string($_POST['gd_ex']);
        $medi_date=$mysqli -> real_escape_string($_POST['medi_date']);
        $intvw_date=$mysqli -> real_escape_string($_POST['intvw_date']);
        $training_date =$mysqli -> real_escape_string($_POST['t_date']);
        $training_venue=$mysqli -> real_escape_string($_POST['t_venue']);
        $wrk_exp=$mysqli -> real_escape_string($_POST['wrk_exp']);
        $cntry_name=$mysqli -> real_escape_string($_POST['country']);
        $workcity_name=$mysqli -> real_escape_string($_POST['citywork']);
        $desg2=$mysqli -> real_escape_string($_POST['desg2']);
        $duration=$mysqli -> real_escape_string($_POST['dur']);
        $employer =$mysqli -> real_escape_string($_POST['employer']);
        //$amount=$mysqli -> $_POST['amount'];
        //$paid=$mysqli -> $_POST['paid'];
        //$acc_balance=$mysqli -> $_POST['acc_balance'];
        //$pay_balance=$mysqli -> $_POST['pay_balance'];
        //$balance=$mysqli -> $_POST['balance'];
        //$serialno=$mysqli -> real_escape_string($_POST['clid']);

        //$sum_bal=0;
        //$sum_bal=$paid+$pay_balance;

        
        
        
        $visatyp=$mysqli -> real_escape_string($_POST['visatyp']);
        $visa_status=$mysqli -> real_escape_string($_POST['visastatus']);
        $method=$mysqli -> real_escape_string($_POST['method']);
        $dest1=$mysqli -> real_escape_string($_POST['dest1']);
        $dest2=$mysqli -> real_escape_string($_POST['dest2']);
        $dest3=$mysqli -> real_escape_string($_POST['dest3']);
        $city1=$mysqli -> real_escape_string($_POST['city1']);
        $city2=$mysqli -> real_escape_string($_POST['city2']);
        $city3=$mysqli -> real_escape_string($_POST['city3']);
        $purp1=$mysqli -> real_escape_string($_POST['purp1']);
        $purp2=$mysqli -> real_escape_string($_POST['purp2']);
        $purp3=$mysqli -> real_escape_string($_POST['purp3']);
        $dest=$mysqli -> real_escape_string($_POST['dest']);
        $city=$mysqli -> real_escape_string($_POST['city']);
        $designatio=$mysqli -> real_escape_string($_POST['designatio']);
        $trav_date=$mysqli -> real_escape_string($_POST['trav_date']);
        $arr_date=$mysqli -> real_escape_string($_POST['arr_date']);
        $return_date=$mysqli -> real_escape_string($_POST['return_date']);
        $nea_status=$mysqli -> real_escape_string($_POST['nea_status']);
        $pass_status=$mysqli -> real_escape_string($_POST['pass_status']);
        $client_experi=$mysqli -> real_escape_string($_POST['client_ex']);
        $describe_client_cond=$mysqli -> real_escape_string($_POST['desc_client_cond']);

        

        //sql to insert captured values
		$query="UPDATE clients SET client_id=?, first_name=?, middle_name=?, last_name=?, gender=?, dateofbirth=?, id_no=?, phone_no=?, passport_no=?, pass_application_date=?,pass_ex_date=?,agency=?,next_of_kin=?,nok_phone=?,nok_id=?,nok_relation=?,police_clearencedate=?,gd_expiry=?,medical_date=?,interview_date=?,training_date=?,
        training_venue=?,work_experience=?,work_country=?, work_city=?,designation=?,duration=?,employer=?,visatype=?,visa_status=?,dest_option1=?, dest_option2=?, dest_option3=?, city_option1=?, city_option2=?, city_option3=?,purpose_option1=?, purpose_option2=?, purpose_option3=?,destination=?,
        city_town=?,designation=?,  travelling_date=?, arriving_date=?,return_date=?,nea_status=?,passport_status=?, client_condition=?,desc_client_cond=? WHERE id = ?";
           
		$stmt = $mysqli->prepare($query);
		$rc=$stmt->bind_param('sssssssssssssssssssssssssssssssssssssssssssssssssi', $clid, $fname, $mname, $lname, $gender, $dob, $idno, $phone, $passno, $pass_app_date, $pass_ex, $agency, $nok,$nok_phone, $nok_id, $nok_rela,$pcad,$gd_ex,$medi_date,$intvw_date, $training_date,$training_venue, $wrk_exp,$cntry_name,$workcity_name,$desg2,$duration,$employer,
        $visatyp,$visa_status,$dest1, $dest2,$dest3,$city1, $city2,$city3,$purp1, $purp2,$purp3,$dest,$city,$designatio,$trav_date, $arr_date, $return_date,$nea_status,$pass_status,$client_experi, $describe_client_cond,$id);  
			
		$stmt->execute();

        
			
		if($stmt)
		{
			$success = "Applicant Information Details Updated Successfully";
		}
		else {
			$err = "Please Try Again Or Try Later";
		}
			
			
			
	}

    

  



    

    
    


?>
<!--End Server Side-->
<!DOCTYPE html>
<html lang="en">
    
    <!--Head-->
    <?php include('assets/inc/head.php');?>

    
    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <?php include("assets/inc/nav.php");?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <?php include("assets/inc/sidebar.php");?>
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
                                $ret="SELECT  * FROM upendo WHERE id=?";
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
                                                
                                                <div class="form-group col-md-3">
                                                    <label for="inputEmail4" class="col-form-label">Image</label>
                                                    <img src=   name="desc" class="form-control"  />
                                                </div> 


                                                

                                               
                                            </div>

                         
                                            <button type="submit" name="update" class="ladda-button btn btn-success" data-style="expand-right">Update Client</button>

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

