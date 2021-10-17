<?php 
session_start();
if(isset($_SESSION["unique_id"])){
   include "config.php";
   $logout_id=mysqli_real_escape_string($con,$_GET['user_id']);
   if(isset($logout_id)){
       $status="Offline now";
       $sql="UPDATE users set status='{$status}' where unique_id={$logout_id}";
       $result=mysqli_query($con,$sql);
       if($result){
           session_unset();
           session_destroy();
           header("location:../login.php");
       }
   }
   else{
       
    header("location:../users.php");
   }
}
else{
    header("location:../login.php");
}
?>