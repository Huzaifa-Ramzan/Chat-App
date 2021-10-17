<?php 
include "header.php";
?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4 mx-auto rounded-border p-4 shadow">
                <h3 class="font-weight-bold">Chat App</h3>
            <form action="" class="form form-group">
                <div class="padding error-message form-control text-center">This is an error message</div>
              
                <div class="padding"><label for="">Email Address</label><input type="email" name="email" placeholder="Enter your Email" class="form-control" required=""></div>
                <div class="padding feild">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Enter your Password" class="form-control" required="">
                    <i class="fa fa-eye i"></i>
                </div>
                
                <div class="padding"><button type="button" name="submit" class="btn btn-dark form-control">Continue to Chat</button></div>
                <div class="padding"><div class="link">Not set signed up?<a href="index.php" class="text-reset"> Signup Now</a></div></div>
            </form>
            </div>
            
        </div>
    </div>
    <script type="text/javascript" src="javascript/password.js"></script>
    <script type="text/javascript" src="javascript/login.js"></script>
</body>
</html>

