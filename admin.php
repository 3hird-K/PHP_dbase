 <?php
    include("databases/admin_db.php");
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
     <title>Create Account</title>
 </head>

 <body>
     <!----------------------- Main Container -------------------------->
     <div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
         <!----------------------- Login Container -------------------------->
         <div class="row border rounded-5 p-3 bg-white shadow box-area">
             <!--------------------------- Left Box ----------------------------->
             <div class="col-md-12 rounded-4 d-flex justify-content-center align-items-center flex-column left-box p-4" style="background: #100e0e;">
                 <div class="row align-items-center"></div>
                 <div class="featured-image mb-3">
                     <img src="img/user.png" class="img-fluid rounded-3 p-4" style="width: 200px;">
                 </div>
                 <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">ADMINISTRATOR</p>

                 <div class="row align-items-center justify-content-center ">

                     <form action="<?= $_SERVER["PHP_SELF"]; ?>" method="post">


                         <div class="input-group mb-3 w-100">
                             <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Username" name="username">
                         </div>
                         <div class="input-group mb-1 w-100">
                             <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password" name="password">
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

                         <div class="input-group mb-3 w-100 ">
                             <button class="btn btn-lg btn-success w-100  fs-6 mt-3 justify-self-center" name="admin">Privileged User</button>
                         </div>

                     </form>

                     <div class="row w-100 mb-5 ">
                         <small class="text-white">Don't have account? <a href="register.php">Sign Up</a></small>
                     </div>

                 </div>


             </div>
         </div>
 </body>

 </html>