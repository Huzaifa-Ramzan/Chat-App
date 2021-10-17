<?php 
include "header.php";
?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4 mx-auto rounded-border pt-4 pb-2 shadow input-form">
                <h3 class="font-weight-bold">Chat App</h3>

            <form action="" class="form form-group" enctype="multipart/form-data">
                <div class=" error-message text-center rounded mb-2 "></div>
                <div class="row justify-content-between padding">
                    <div class="col">
                        <label for=""> First Name</label>
                        <input type="text" name="fname" placeholder="First Name" class="form-control" required="";>
                    </div>
                    <div class="col">
                        <label for=""> Last Name</label>
                        <input type="text" name="lname" placeholder="Last Name" class="form-control" required="">
                    </div>
                </div>
                <div class="padding">
                    <label for="">Email</label>
                    <input type="email" name="email" placeholder="Enter your Email" class="form-control" required="">
                </div>
                <div class="padding feild">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Enter your Password" class="form-control" required="">
                    <i class="fa fa-eye i"></i>
                </div>
                <div class="padding">
                    <label for="">Select Image</label><input type="file" name="img" required="">
                </div>
                <div class="padding">
                    <button type="button" name="submit" class="submit btn btn-dark form-control">
                        <a href="#" class="text-reset text-decoration-none">Continue to Chat</a>
                    </button>
                </div>
                <div class="padding">
                    <div class="link">Already Signed Up?<a href="login.php " class="text-reset"> Login Now</a></div>
                </div>
            </form>
            </div>
            
        </div>
    </div>
    <script type="text/javascript" src="javascript/password.js"></script>
    <script type="text/javascript" src="javascript/signup.js"></script>
</body>
</html>