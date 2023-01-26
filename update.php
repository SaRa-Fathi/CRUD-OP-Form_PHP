<?php
require_once "config.php";
if(isset($_POST['update']) )
{
    $ID = mysqli_real_escape_string($connect ,$_POST['ID']);
    $username = mysqli_real_escape_string($connect,$_POST['username']);
    $email =mysqli_real_escape_string($connect,$_POST['email']);
    $gender=mysqli_real_escape_string($connect,$_POST['gender']);
    $mail_status=mysqli_real_escape_string($connect,$_POST['mail_status']);

    $query ="UPDATE Users SET Name = '$username', E_mail = '$email', Gender = '$gender', Mail_Status = '$mail_status' 
            WHERE ID='$ID' ";
    $query_run = mysqli_query($connect,$query);

    if($query_run){
        
        header("Location : displayUsers.php");
        echo "Student Updated Successfully";
        exit(0);
    }
    else{
        echo "Something Error";
        header("Location : edit.php");
        exit(0);
    }
}
if(isset($_POST['delete']) ){
    $ID = mysqli_real_escape_string($connect ,$_POST['delete']);

    $query ="DELETE FROM Users WHERE ID='$ID' ";
    
    $query_run = mysqli_query($connect,$query);

    if($query_run){
        
        header("Location : displayUsers.php");
        echo "Student Deleted Successfully";
        exit(0);
    }
    else{
        echo "Something Error";
        header("Location : edit.php");
        exit(0);
    }
}
?>