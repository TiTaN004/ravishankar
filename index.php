<?php
session_start();
?>

<?php 
include './backend/db/db.php';  ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>FormFusion</title>
      <link rel="stylesheet" href="./assets/css/backend-plugin.min.css">
      <link rel="stylesheet" href="./assets/css/backend.css?v=1.0.0"> 
    </head>

  <body class=" ">
    <!-- loader Start -->
    <!-- <div id="loading">
          <div id="loading-center">
          </div>
    </div> -->
    <!-- loader END -->
    
      <div class="wrapper">
    <section class="login-content">
         <div class="container h-100">
            <div class="row align-items-center justify-content-center h-100">
               <div class="col-md-5">
                  <div class="card p-3">
                     <div class="card-body">
                        <!-- <div class="auth-logo">
                           <img src="../assets/images/logo.png " class="img-fluid  rounded-normal  darkmode-logo" alt="logo">
                           <img src="../assets/images/logo-dark.png" class="img-fluid rounded-normal light-logo" alt="logo">
                        </div> -->
                        <h3 class="mb-3 font-weight-bold text-center">Sign In</h3>
                        <form method="post">
                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label class="text-secondary">Email</label>
                                    <input class="form-control" type="email" name="email" placeholder="Enter Email">
                                 </div>
                              </div>
                              <div class="col-lg-12 mt-2">
                                 <div class="form-group">
                                     <div class="d-flex justify-content-between align-items-center">
                                         <label class="text-secondary">Password</label>
                                         <label><a href="auth-recover-pwd.html">Forgot Password?</a></label>
                                     </div>
                                    <input class="form-control" type="password" name="pass" placeholder="Enter Password">
                                 </div>
                              </div>
                           </div>
                           <button type="submit" name="submit" class="btn btn-primary btn-block mt-2">Log In</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      </div>

      <?php

      if(isset($_POST['submit'])){
         $email = $_POST['email'];
         $pass = $_POST['pass'];

         $q = "select * from user where email = '$email'";
         $_SESSION["email"] = $email;
         
         $result = $conn->query($q);


         if ($result->num_rows > 0) {
            // $row = $result->fetch_assoc();
            // $_SESSION['uname'] = $row['uname'];
               $row=$result->fetch_assoc();
               $hash=$row['pass'];
               // echo $hash."<br>";
               $verify = password_verify($pass,$hash);
               // echo $verify;

               if ($verify == 1) {
                  ?><script>window.location = "./backend/home.php"</script><?php
               }
         }
         else{
            ?><script>alert("login or Password incorrect");</script><?php
         }
      }
         

      ?>
    
    <!-- Backend Bundle JavaScript -->
    <script src="../assets/js/backend-bundle.min.js"></script>
    <!-- Chart Custom JavaScript -->
    <script src="../assets/js/customizer.js"></script>
    
    <script src="../assets/js/sidebar.js"></script>
    
    <!-- Flextree Javascript-->
    <script src="../assets/js/flex-tree.min.js"></script>
    <script src="../assets/js/tree.js"></script>
    
    <!-- Table Treeview JavaScript -->
    <script src="../assets/js/table-treeview.js"></script>
    
    <!-- SweetAlert JavaScript -->
    <script src="../assets/js/sweetalert.js"></script>
    
    <!-- Vectoe Map JavaScript -->
    <script src="../assets/js/vector-map-custom.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script src="../assets/js/chart-custom.js"></script>
    <script src="../assets/js/charts/01.js"></script>
    <script src="../assets/js/charts/02.js"></script>
    
    <!-- slider JavaScript -->
    <script src="../assets/js/slider.js"></script>
    
    <!-- Emoji picker -->
    <script src="../assets/vendor/emoji-picker-element/index.js" type="module"></script>
    
    
    <!-- app JavaScript -->
    <script src="../assets/js/app.js"></script>  </body>
</html>