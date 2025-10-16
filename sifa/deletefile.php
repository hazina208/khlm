<?php
session_start();
$connection=mysqli_connect("sql309.infinityfree.com", "if0_39152860", "MZhrYPxEEwgmdPB", "if0_39152860_kanisahalisi");
if(isset($_POST['delete_songs'])){
    $id=$_POST['id'];
    $image=$_POST['image'];
    $delete_image_query="DELETE FROM sifa WHERE id='$id'";
    $delete_image_query_run = mysqli_query($connection, $delete_image_query);
    if($delete_image_query_run)
    {
        unlink("uploads/".$image);
        //$_SESSION['status']="Image and Data Added Successful";
        $success = "Song Deleted Successful";
        header("Location: manage_songs.php");
    }
    else{
        //$_SESSION['status']="Image and Data Added Successful";
        $err = "Song Not Deleted";
        header("Location: manage_songs.php");
    }

 
}



?>