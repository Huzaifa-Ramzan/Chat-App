<?php
include "config.php"; 
 while($row=mysqli_fetch_assoc($result)){
     $sql2="SELECT * from messages where (upcoming_msg_id={$row['unique_id']}
     or outgoing_msg_id={$row['unique_id']}) and (outgoing_msg_id={$outgoing}
     or upcoming_msg_id={$outgoing}) ORDER by msg_id DESC limit 1";
     $result2=mysqli_query($con,$sql2) or die('query not run in data');
     $row2=mysqli_fetch_assoc($result2);
     if(mysqli_num_rows($result2)>0){
        $text=$row2['msg'];
     }
     else{
         $text="no message available!";
     }
    
     //triming msg if message is greater then 25 words
    (strlen($text)>25)? $msg=substr($text,0,20)."..." : $msg=$text;    

    //display that message is sending by you or other user
    $you="";
    if(isset($row2["outgoing_msg_id"])){
        
     ($outgoing==$row2["outgoing_msg_id"])? $you.="You:" : $you.="";
    }
    
    ($row['status']=="Offline now")?$offline="text-light":$offline="";
    $output.='
        <a href="chat.php?user_id='.$row['unique_id'].'" class="text-decoration-none text-reset">
        <div class="row mb-4">
            <div class="col-2  p-0  "><img src="php-savedata/upload/'.$row['img'].'"  alt="" class="imge  rounded-circle "></div>
            <div class="col-8 p-0">
                <span class="font-weight-bold">'.$row['fname'].' '.$row['lname'].'</span>
                <br>
                <small class="">'.$you . $msg.'</small>
            </div>
            <div class="col-2  text-center"><small class="dot  "><ic class="fa fa-circle '.$offline.'"></ic></small></div>
        </div>
    </a>';
}
?>