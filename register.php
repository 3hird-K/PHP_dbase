 <?php
    include("databases/register_db.php");
    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
     <link rel="stylesheet" href="css/register.css">

     <title>Create Account</title>
 </head>

 <body>
     <!----------------------- Main Container -------------------------->
     <div class="container d-flex justify-content-center align-items-center min-vh-100">
         <!----------------------- Login Container -------------------------->
         <div class="row border rounded-5 p-3 bg-white shadow box-area">
             <!--------------------------- Left Box ----------------------------->
             <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box p-5" style="background: #05013b;">
                 <div class="featured-image mb-3 " style="background-color: #050145;">
                     <img src="img/ustp-logo.png" class="img-fluid rounded-5  shadow-lg" style="width: 250px;">
                 </div>
                 <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">CREATE ACCOUNT</p>
                 <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">this project is made for backend PHP purposes.</small>
             </div>
             <!-------------------- ------ Right Box ---------------------------->

             <div class="col-md-6 right-box">
                 <div class="row align-items-center">
                     <div class="header-text mb-4">
                         <h2>Hello,Again</h2>
                         <p>Register Account Here!</p>
                     </div>
                     <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                         <div class="input-group mb-3">
                             <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Firstname" name="fname">
                             <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Lastname" name="lname">

                         </div>
                         <div class="input-group mb-3">
                             <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Username" name="username">
                         </div>
                         <div class="input-group mb-3">
                             <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password" name="password">
                         </div>
                         <div class="input-group mb-3">
                             <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Retyped password" name="retyped_pass">
                         </div>
                         <?php if (isset($_SESSION["unmatched_key"])) : ?>
                             <div class="alert alert-danger" role="alert">
                                 <?= $_SESSION["unmatched_key"] ?>
                             </div>
                             <?php unset($_SESSION["unmatched_key"]); ?>
                         <?php endif; ?>
                         <!-- <p class="text-danger">Password do not match!</p> -->
                         <?php if (isset($_SESSION["fields_required"])) : ?>
                             <div class="alert alert-danger" role="alert">
                                 <?= $_SESSION["fields_required"] ?>
                             </div>
                             <?php unset($_SESSION["fields_required"]); ?>
                         <?php endif; ?>


                         <div class="input-group mb-3">
                             <button class="btn btn-lg btn-primary w-100 fs-6" name="register" data-bs-toggle="modal" data-bs-target="#account_create">Create Account</button>
                         </div>
                         <div class="input-group mb-3">
                             <button class="btn btn-lg btn-light w-100 fs-6 disabled "><img src="img/google.png" style="width:20px" class="me-2"><small>Sign In with Google</small></button>
                         </div>
                         <div class="row">
                             <small>Already have an account? <a href="login.php">Login</a></small>
                         </div>
                     </form>

                 </div>
             </div>
         </div>
     </div>
 </body>

 </html>