<?php 
session_start();
if(!isset($_SESSION["unique_id"])){
    header("location:login.php");
}
?>
<?php 
include "header.php";
?>
<body>
    <div class="container">
        <div class="row">
            <?php 
            include "php-savedata/config.php";
            $sql="SELECT * from users where unique_id={$_SESSION['unique_id']}";
            $result=mysqli_query($con,$sql) or die("query not run");
            if(mysqli_num_rows($result)>0){
                $row=mysqli_fetch_assoc($result)or die("result not fetch");
            }
            ?>
            <div class="col-12 col-md-6 col-lg-4 mx-auto colum rounded-border px-3 py-2 shadow">
                <div class="card border-0">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-2 pl-0"><img src="php-savedata/upload/<?php echo $row['img'];?>"  alt="" class="img  rounded-circle "></div>
                            <div class="col-7 pl-0">
                                <span class="font-weight-bold"><?php echo $row["fname"]." ".$row["lname"];?></span>
                                <br>
                                <small><?php echo $row['status'];?></small>
                            </div>
                            <div class="col-3  "><button class=" btn-sm  btn-dark"><a href="php-savedata/logout.php?user_id=<?php echo $row['unique_id'];?>" class="text-decoration-none text-reset">Logout</a></button></div>
                        </div>
                       
                    </div>
                    <!--search-->
                    <div class="row">
                        
                        <div class="col-12 user">
                            <form action="" class="search d-flex">
                            <span class="text">&nbsp; Select an user to start chat</span>
                            <input type="search" placeholder="Enter name to search..." name="search">
                            <ia class="ml-auto button fa fa-search"></ia>
                            </form>
                        </div>
                    </div>
                    <div class="card-body chat-body mb-4">
                        
                        <!--users-->
                        <div class="user-list ">
                            
                        </div>
                        <!--end user-->
                    </div>
                  
                </div>
            </div>
            
        </div>
    </div>
    <script type="text/javascript" src="javascript/users.js"></script>
</body>
</html>