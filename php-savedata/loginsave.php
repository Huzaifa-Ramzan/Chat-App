<?php 
session_start();
include "config.php";
$email=mysqli_real_escape_string($con,$_POST['email']);
$password=mysqli_real_escape_string($con,$_POST['password']);
if(!empty($email)&&!empty($password)){
    $sql="SELECT * from users where '{$email}'=email and '{$password}'=password";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result); 
        
       $status="Active now";
       $sql1="UPDATE users set status='{$status}' where unique_id={$row['unique_id']}";
        if(mysqli_query($con,$sql1)){
            $_SESSION["unique_id"]=$row['unique_id'];
        echo "success";
        }

    }
    else{
        echo "invalid email or password!";
    }
}
else{
    echo"All feilds are required!";
}
?>