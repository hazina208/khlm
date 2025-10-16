<?php
session_start();
$connection=mysqli_connect("sql309.infinityfree.com", "if0_39152860", "MZhrYPxEEwgmdPB", "if0_39152860_kanisahalisi");
if(isset($_POST['delete_book'])){
    $id=$_POST['id'];
    $image=$_POST['image'];
    $delete_image_query="DELETE FROM books WHERE id='$id'";
    $delete_image_query_run = mysqli_query($connection, $delete_image_query);
    if($delete_image_query_run)
    {
        unlink("uploads/".$image);
        //$_SESSION['status']="Image and Data Added Successful";
        $success = "File Deleted Successful";
        header("Location: manage_books.php");
    }
    else{
        //$_SESSION['status']="Image and Data Added Successful";
        $err = "File Not Deleted";
        header("Location: manage_books.php");
    }

 
}
?>