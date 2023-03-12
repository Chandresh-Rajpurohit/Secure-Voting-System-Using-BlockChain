<?php
require_once('auth.php');
require_once('MainClass.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $login = json_decode($class->login());
    if($login->status == 'success'){
        echo "<script>location.replace('./login_verification.php');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login with OTP</title>
    <link rel="stylesheet" href="./Font-Awesome-master/css/all.min.css?v=1">
    <link rel="stylesheet" href="./css/bootstrap.min.css?v=1">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./Font-Awesome-master/js/all.min.js"></script>
    <style>
        html,body{
            height:100%;
            width:100%;
        }
        .bg-dark {
    opacity: 1;
     background-image: url("photos/img.png"); 
   
}

bg-gradient {
    background-image: url("photos/img.png");
    
}
        main{
            height:calc(100%);
            width:calc(100%);
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
        }
        .form-group-text-cneter{
            margin-top:20px;
            color:#000;
            padding: 6px;
            border-radius: 1px;
            border: #000 2px solid;
            margin-right:100px;
             background: rgb(10, 119, 243); 
            font-weight:bold;
            display: inline-block
            
        }
        .form-group-text-cneter a{
            
            color:#000;
            font-weight:bold;

            
        }
       
        .btn {
            color:#000;
            font-weight:bold;
            border: #000 2px solid;
        }
        .btn:hover {
            color:#000;
            font-weight:bold;
            border: #000 2px solid;
        }
        
       .label-control{
            color:#000;
            font-weight:600;
        }
        .text-light {
            color: black;
    background-color: aqua;
    margin-top:-70px;
    padding: 7px 7px;
    font-weight: bold;
    border: 2px solid black;
   
}
    </style>
</head>
<body class="bg-dark bg-gradient">
    <main>
       <div class="col-lg-7 col-md-9 col-sm-12 col-xs-12 mb-4">
           <h1 class="text-light text-center"> SECURE VOTING SYSTEM</h1>
        </div>
       <div class="col-lg-3 col-md-8 col-sm-12 col-xs-12">
           <div class="card shadow rounded-0">
               <div class="card-header py-1">
                   <h4 class="card-title text-center">LOGIN</h4>
               </div>
               <div class="card-body py-4">
                   <div class="container-fluid">
                       <form action="./login.php" method="POST">
                       <?php 
                            if(isset($_SESSION['flashdata'])):
                        ?>
                        <div class="dynamic_alert alert alert-<?php echo $_SESSION['flashdata']['type'] ?> my-2 rounded-0">
                            <div class="d-flex align-items-center">
                                <div class="col-11"><?php echo $_SESSION['flashdata']['msg'] ?></div>
                                <div class="col-1 text-end">
                                    <div class="float-end"><a href="javascript:void(0)" class="text-dark text-decoration-none" onclick="$(this).closest('.dynamic_alert').hide('slow').remove()">x</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php unset($_SESSION['flashdata']) ?>
                        <?php endif; ?>
                           <div class="form-group">
                               <label for="email" class="label-control">Email</label>
                               <input type="email" name="email" id="email" class="form-control rounded-0" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" autofocus required>
                            </div>
                           <div class="form-group">
                               <label for="password" class="label-control">Password</label>
                               <input type="password" name="password" id="password" class="form-control rounded-0" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>" required>
                            </div>
                            <div class="clear-fix mb-4"></div>
                            <div class="form-group text-end">
                                <button class="btn btn-primary bg-gradient rounded-0">LOGIN</button>
                            </div>
                            <div class="form-group-text-cneter">
                                <a href="registration.php">Create a New Account</a>
                            </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
    </main>
</body>
</html>