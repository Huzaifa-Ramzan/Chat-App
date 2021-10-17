<?php 
session_start();
include "config.php";
$outgoing=$_SESSION['unique_id'];
$sql="SELECT * from users where not unique_id='{$outgoing}'";
$result=mysqli_query($con,$sql);
$output="";
if(mysqli_num_rows($result)==1){
    $output.= "There is no user available";
}
elseif(mysqli_num_rows($result)>0){
    include "data.php";
}
echo $output;
?>