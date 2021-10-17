<?php 
session_start();
include "config.php";
$fname=mysqli_real_escape_string($con,$_POST["fname"]);
$lname=mysqli_real_escape_string($con,$_POST["lname"]);
$email=mysqli_real_escape_string($con,$_POST["email"]);
$password=mysqli_real_escape_string($con,$_POST["password"]);
if(!empty($fname) &&!empty($lname) &&!empty($email) &&!empty($password)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){//CHECKING EMAIL IS VALID OR NOT
        // checking emal is already exist inthe database or not
        $sql="SELECT email from users where email='{$email}'";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0){
            echo "$email - This email already exist";
        }
        else{
            if(isset($_FILES["img"])){
                $img_name=$_FILES["img"]["name"];
                $img_type=$_FILES["img"]["type"];
                $img_tmp=$_FILES["img"]["tmp_name"];
                $txt=explode(".",$img_name);
                $img_ext=end($txt); 
                $ext=strtolower($img_ext);
                $extensions=["jpg","png","jpeg"];
                if(in_array($ext,$extensions)===true){
                    $img_name=time().'-'.$img_name;
                   $new_file_name=$img_name;
                     $target='upload/'.$new_file_name;
                  
                    if(move_uploaded_file($img_tmp,$target)){
                        $status="Active now";
                        $random_id=rand(time(),1000);
                        $sql2="INSERT into users(unique_id, fname, lname, email, password,	img, status) 
                                           values('{$random_id}','{$fname}','{$lname}','{$email}','{$password}','{$new_file_name}','{$status}')";
                        $result2=mysqli_query($con,$sql2);
                        if($result2){
                            $sql3="SELECT * FROM users where '{$email}'= email";
                            $result3=mysqli_query($con,$sql3);
                            if(mysqli_num_rows($result3)>0){
                                $row=mysqli_fetch_assoc($result3);
                                $_SESSION["unique_id"]=$row['unique_id'];
                                echo "success";
                            }
                        }
                        
                        else{
                            echo "something wrong!";
                        }
                    }
                    
                }
                else{
                    echo "please choose file - jpg, png or jpeg!";
                }

            }
            else{

            }
        }
    }
    else{
        echo "Email is not valid email";

    }
}
else{
    echo "All feilds are required";
}


?>