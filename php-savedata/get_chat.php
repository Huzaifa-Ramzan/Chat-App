<?php 
session_start();
if(isset($_SESSION["unique_id"])){
    include "config.php";
    $incoming=mysqli_real_escape_string($con,$_POST['incoming']);
    $outgoing=mysqli_real_escape_string($con,$_POST['outgoing']); 
    $output="";	
    $sql="SELECT * from messages 
        join users on unique_id= outgoing_msg_id
     where (upcoming_msg_id='{$incoming}' and outgoing_msg_id='{$outgoing}')
                                    or (upcoming_msg_id='{$outgoing}' and outgoing_msg_id='{$incoming}') 
                                    order by msg_id";
    $result=mysqli_query($con,$sql) or die("query not run in get chat");
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            if($outgoing===$row['outgoing_msg_id']){
                $output.='
                <div class="chat-outgoing d-flex">
                    <div class="detail">
                        <p class=" bg-dark text-white">
                            '.$row['msg'].'
                        </p>
                    </div>
                </div>';
            }
            else{
                $output.='
                <div class="chat-incoming d-flex align-items-end">
                            
                            <img <img src="php-savedata/upload/'.$row['img'].'"  alt="" class="rounded-circle mb-3 mr-1">
                            <div class="detail">
                                <p class="shadow">
                                '.$row['msg'].'
                                </p>
                            </div>
                        </div>
                ';
            }
        }
        echo $output;
    }
   
}
else{
    header("Location:../login.php");
}
?>