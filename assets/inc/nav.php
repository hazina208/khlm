<?php
    //$aid=$_SESSION['id'];
    //$ret="select * from register where id=?";
    //$stmt= $mysqli->prepare($ret) ;
    //$stmt->bind_param('i',$aid);
    //$stmt->execute() ;//ok
    //$res=$stmt->get_result();
    //$cnt=1;
    //while($row=$res->fetch_object())
    //{
?>
    <div class="navbar-custom">
        <ul class="list-unstyled topnav-menu float-right mb-0">

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="pro-user-name ml-1">
                        <?php echo $row->company_name;?> <i class="rounded-circle"></i> 
                    </span>
                    <!--<img src="assets/images/users/<?php //echo $row->ad_dpic;?>" alt="Your Picture" class="rounded-circle">-->
                    <img src="../images/logos/<?php echo $row->logo;?>" alt="" class="rounded-circle" />
                    <span class="pro-user-name ml-1">
                         <?php echo $row->email_add;?> <i class="mdi mdi-chevron-down"></i> 
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                     <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div> 

                    <!-- item-->
                     <a href="account.php" class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>My Account</span>
                    </a> 

                    <a href="reg_agency.php" class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>Register Agency</span>
                    </a> 


                    <!-- <div class="dropdown-divider"></div> -->

                    <!-- item-->
                    <a href="logout.php" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </li>

           

        </ul>

        <!-- LOGO -->
        <!--<div class="logo-box">
            <a href="dashboard.php" class="logo text-center">
                <span class="logo-lg">
                    <!--<img src="assets/images/logo-light.png" alt="" height="18">
                    <img src="../images/logos/<?php echo $row->logo;?>" alt="" height="50" />
                    <!-- <span class="logo-lg-text-light">UBold</span> 
                </span>
                <span class="logo-sm">
                    <!-- <span class="logo-sm-text-dark">U</span>
                    <img src="assets/images/logo-sm-white.png" alt="" height="24">
                </span>
            </a>
        </div> -->

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu"></i>
                </button>
            </li>

            

        </ul>
    </div>
<?php //}?>