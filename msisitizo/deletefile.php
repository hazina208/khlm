<?php
session_start();
$connection=mysqli_connect("sql309.infinityfree.com", "if0_39152860", "MZhrYPxEEwgmdPB", "if0_39152860_kanisahalisi");

if(isset($_POST['delete_image'])){
    $id=$_POST['id'];
    $image=$_POST['image'];
    $delete_image_query="DELETE FROM upendo WHERE id='$id'";
    $delete_image_query_run = mysqli_query($connection, $delete_image_query);
    if($delete_image_query_run)
    {
        unlink("uploads/upendo/".$image);
        //$_SESSION['status']="Image and Data Added Successful";
        $success = "Image and Data Deleted Successful";
        header("Location: manage_upendo.php");
    }
    else{
        //$_SESSION['status']="Image and Data Added Successful";
        $err = "Image and Data Not Deleted";
        header("Location: manage_upendo.php");
    }

 
}

if(isset($_POST['delete_amani'])){
    $id=$_POST['id'];
    $image=$_POST['image'];
    $delete_image_query="DELETE FROM amani WHERE id='$id'";
    $delete_image_query_run = mysqli_query($connection, $delete_image_query);
    if($delete_image_query_run)
    {
        unlink("uploads/amani/".$image);
        //$_SESSION['status']="Image and Data Added Successful";
        $success = "Image and Data Deleted Successful";
        header("Location: manage_amani.php");
    }
    else{
        //$_SESSION['status']="Image and Data Added Successful";
        $err = "Image and Data Not Deleted";
        header("Location: manage_amani.php");
    }

 
}
if(isset($_POST['delete_uzalishaji'])){
    $id=$_POST['id'];
    $image=$_POST['image'];
    $delete_image_query="DELETE FROM uzalishaji WHERE id='$id'";
    $delete_image_query_run = mysqli_query($connection, $delete_image_query);
    if($delete_image_query_run)
    {
        unlink("uploads/uzalishaji/".$image);
        //$_SESSION['status']="Image and Data Added Successful";
        $success = "Image and Data Deleted Successful";
        header("Location: manage_uzalishaji.php");
    }
    else{
        //$_SESSION['status']="Image and Data Added Successful";
        $err = "Image and Data Not Deleted";
        header("Location: manage_uzalishaji.php");
    }

 
}

if(isset($_POST['delete_kanisataifa'])){
    $id=$_POST['id'];
    $image=$_POST['image'];
    $delete_image_query="DELETE FROM kanisataifa WHERE id='$id'";
    $delete_image_query_run = mysqli_query($connection, $delete_image_query);
    if($delete_image_query_run)
    {
        unlink("uploads/kanisataifa/".$image);
        //$_SESSION['status']="Image and Data Added Successful";
        $success = "Image and Data Deleted Successful";
        header("Location: manage_kanisataifa.php");
    }
    else{
        //$_SESSION['status']="Image and Data Added Successful";
        $err = "Image and Data Not Deleted";
        header("Location: manage_kanisataifa.php");
    }

 
}

if(isset($_POST['delete_baba'])){
    $id=$_POST['id'];
    $image=$_POST['image'];
    $delete_image_query="DELETE FROM baba WHERE id='$id'";
    $delete_image_query_run = mysqli_query($connection, $delete_image_query);
    if($delete_image_query_run)
    {
        unlink("uploads/baba/".$image);
        //$_SESSION['status']="Image and Data Added Successful";
        $success = "Image and Data Deleted Successful";
        header("Location: manage_baba.php");
    }
    else{
        //$_SESSION['status']="Image and Data Added Successful";
        $err = "Image and Data Not Deleted";
        header("Location: manage_baba.php");
    }

 
}

if(isset($_POST['delete_familia'])){
    $id=$_POST['id'];
    $image=$_POST['image'];
    $delete_image_query="DELETE FROM familiamoja WHERE id='$id'";
    $delete_image_query_run = mysqli_query($connection, $delete_image_query);
    if($delete_image_query_run)
    {
        unlink("uploads/familia/".$image);
        //$_SESSION['status']="Image and Data Added Successful";
        $success = "Image and Data Deleted Successful";
        header("Location: manage_familia.php");
    }
    else{
        //$_SESSION['status']="Image and Data Added Successful";
        $err = "Image and Data Not Deleted";
        header("Location: manage_familia.php");
    }

 
}

?>