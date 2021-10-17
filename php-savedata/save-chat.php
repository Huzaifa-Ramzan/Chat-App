<?php 
session_start();
if(isset($_SESSION["unique_id"])){
    include "config.php";
    $incoming=mysqli_real_escape_string($con,$_POST['incoming']);
    $outgoing=mysqli_real_escape_string($con,$_POST['outgoing']);
    $message=mysqli_real_escape_string($con,$_POST['message']);
    if(!empty($message)){
        $sql="INSERT into messages(upcoming_msg_id, outgoing_msg_id, msg) 
                            values({$incoming}, {$outgoing}, '{$message}')" or die("query not run");
        $result=mysqli_query($con,$sql);

    }
   
}
else{
    header("Location:../login.php");
}
?>