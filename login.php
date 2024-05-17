 <?php
    include("databases/login_db.php");
    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
     <link rel="stylesheet" href="css/register.css">
     <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
     <title>Login Account</title>
 </head>

 <body>
     <!----------------------- Main Container -------------------------->
     <div class="container d-flex justify-content-center align-items-center min-vh-100">
         <!----------------------- Login Container -------------------------->
         <div class="row border rounded-5 p-3 bg-white shadow box-area">
             <!--------------------------- Left Box ----------------------------->
             <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #05013b;">
                 <div class="featured-image mb-3">
                     <img src="img/user.png" class="img-fluid rounded-5  p-4" style="width: 250px;">
                 </div>
                 <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">LOGIN ACCOUNT</p>
                 <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">this project is made for backend PHP purposes.</small>
             </div>
             <!-------------------- ------ Right Box ---------------------------->

             <div class="col-md-6 right-box">
                 <div class="row align-items-center">
                     <div class="header-text mb-4">
                         <h2>Hello,Again</h2>
                         <p>Login Account Here!</p>
                     </div>

                     <form action="<?= $_SERVER["PHP_SELF"]; ?>" method="post">

                         <div class="input-group mb-3">
                             <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Username" name="username">
                         </div>
                         <div class="input-group mb-1">
                             <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password" name="password">
                         </div>



                         <div class="input-group mb-4 d-flex justify-content-between">
                             <div class="form-check">
                                 <input type="checkbox" class="form-check-input" id="formCheck">
                                 <label for="formCheck" class="form-check-label text-secondary"><small>Remember Me</small></label>
                             </div>
                             <div class="forgot">
                                 <small><a href="#">Forgot Password?</a></small>
                             </div>
                         </div>
                         <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) : ?>
                             <?php if (isset($_SESSION["ID"])) : ?>
                                 <p class="text-dark">Username: <?= $_SESSION['username']; ?></p>
                                 <?= $_SESSION["success_message"] ?>
                                 <?php else :
                                    if (isset($_SESSION["error_message"])) : ?>
                                     <div class="alert alert-danger" role="alert">
                                         <?= $_SESSION["error_message"] ?>
                                     </div>
                                     <?php unset($_SESSION["error_message"]); ?>
                                 <?php endif; ?>
                             <?php endif; ?>
                         <?php endif; ?>
                         <div class="input-group mb-2">
                             <button class="btn btn-lg btn-primary w-100 fs-6" name="login">Login</button>
                         </div>



                     </form>


                     <div class="input-group mb-3">
                         <a href="admin.php" class="btn btn-lg btn-light w-100 fs-6"><img src="img/admin.png" style="width:20px" class="me-2"><small>Sign In with Administrator</small></a>
                     </div>
                     <div class="row">
                         <small>Don't have account? <a href="register.php">Sign Up</a></small>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </body>

 </html>