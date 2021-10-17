<?php 
session_start();
if(!isset($_SESSION["unique_id"])){
    header("Location:login.php");
}
?>
<?php 
include "header.php";
?>
<body class="">
    <div class="container ">
        <div class="row ">
            <div class="col-12  col-md-6 col-lg-4 mx-auto colum rounded-border shadow  ">
                <?php
                include "php-savedata/config.php";
                $unique_id=mysqli_real_escape_string($con,$_GET['user_id']); 
                $sql="SELECT * from users where unique_id={$unique_id}";
                $result=mysqli_query($con,$sql);
                if(mysqli_num_rows($result)>0){
                    $row=mysqli_fetch_assoc($result);

                }
                ?>
                <div class="card chat-card border-0">
                    <div class="card-header">
                        <div class="row">
                             <div class="col-1 p-0 m-auto">
                                <a href="users.php" class="text-reset text-decoration-none ml-1"><ib class="fa fa-arrow-left"></ib></a>
                            </div>
                            <div class="col-2 pl-0"><img src="php-savedata/upload/<?php echo $row['img'];?>"  alt="" class="img  rounded-circle "></div>
                            <div class="col-6 pl-0">
                                <span class="font-weight-bold "><?php echo $row["fname"]." ".$row["lname"];?></span>
                                <br>
                                <small><?php echo $row['status'];?></small>
                            </div>
                            <div class="col-3 "><a href="#" class="text-decoration-none text-reset"><button class="btn-sm  btn-dark">Logout</button></a></div>
                        </div>
                       
                    </div>
                  
                    <div class="card-body chat-body bg-light">
                        <!--users-->
                        

                        
                        
                        <!--end user-->
                    </div>
                    <div class="card-footer border-0 p-0">
                        <form action="" class="form-group d-flex pt-3 px-2 typing-box" autocomplete="off">
                            <input type="text" hidden name="outgoing" value="<?php echo $_SESSION["unique_id"];?>">
                            <input type="text" hidden name="incoming" value="<?php echo $unique_id;?>">
                            <input type="text" name="message" class="form-control text" placeholder="Message...">
                            <a href="" class="text-reset text-decoration-none btn-sm bg-dark button"><im class="fa-2x fa  fa-telegram text-white rounded-right"></im></a>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <script type="text/javascript" src="javascript/chat.js"></script>
</body>
</html>