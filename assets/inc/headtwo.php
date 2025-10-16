<head>
        <meta charset="utf-8" />
        <title>Akili ya Muumba</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="MartDevelopers" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/images/favicon.ico">

        <!-- Plugins css -->
        <link href="../assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" />
         <!-- Loading button css -->
        <link href="../assets/libs/ladda/ladda-themeless.min.css" rel="stylesheet" type="text/css" />

       
        <!-- Footable css -->
        <link href="../assets/libs/footable/footable.core.min.css" rel="stylesheet" type="text/css" />

       <!--Load Sweet Alert Javascript-->
       <script src="../assets/js/swal.js"></script>

        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/boostrap.min.js"></script>
        <script src="../assets/js/validate.js"></script>

        <!--prevent page reloading-->
       <script>
            if(window.history.replaceState)
            {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
        <!--end prevent page reloading-->
        
       
        <!--Inject SWAL-->
        <?php if(isset($success)) {?>
        <!--This code for injecting an alert-->
                <script>
                            setTimeout(function () 
                            { 
                                swal("Success","<?php echo $success;?>","success");
                            },
                                100);
                </script>

        <?php } ?>

        <?php if(isset($err)) {?>
        <!--This code for injecting an alert-->
                <script>
                            setTimeout(function () 
                            { 
                                swal("Failed","<?php echo $err;?>","Failed");
                            },
                                100);
                </script>

        <?php } ?>

        <style>
           .ck-editor__editable[role="textbox"]  
           {
            min-height:300px;
           }        
        </style>
        
                <script>
                    function GetPrint(){
                        window.print();
                    }
                            
                </script>

        <script>
        $(document).ready(function(){
            $('#taifa').on('change', function(){
                var countryID = $(this).val();
                if(countryID){
                    $.ajax({
                        type:'POST',
                        url:'ajaxData.php',
                        data:'id='+countryID,
                        success:function(html){
                            $('#city').html(html);
                            //$('#city').html('<option value="">Select state first</option>'); 
                        }
                    }); 
                }else{
                    $('#city').html('<option value="">Select country first</option>');
                    //$('#city').html('<option value="">Select state first</option>'); 
                }
            });
    
            //$('#state').on('change', function(){
                //var stateID = $(this).val();
                //if(stateID){
                    //$.ajax({
                        //type:'POST',
                        //url:'ajaxData.php',
                        //data:'state_id='+stateID,
                        //success:function(html){
                            //$('#city').html(html);
                        //}
                    //}); 
                //}else{
                    //$('#city').html('<option value="">Select state first</option>'); 
                //}
            //});
        });
        </script>

<script>
    var _delay = 3000;
    function checkLoginStatus(){
     $.get("checkStatus.php", function(data){
        if(!data) {
            window.location = "../..admin/logout.php"; 
        }
        setTimeout(function(){  checkLoginStatus(); }, _delay); 
        });
    }
checkLoginStatus();
</script>







</head>