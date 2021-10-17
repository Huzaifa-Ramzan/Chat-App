<?php 
session_start();
include "config.php";
$outgoing=$_SESSION['unique_id'];
$search=mysqli_real_escape_string($con,$_POST['searchTerm']);
$sql="SELECT * from users where not unique_id='{$outgoing}' and (fname like '%{$search}%' or lname like '%{$search}%')";
$result=mysqli_query($con,$sql);
$output="";
if(mysqli_num_rows($result)>0){ 
   include "data.php";
}
else{
    $output.="no user found for chat !";
}

echo $output;

?>