<?php include './backend/db/db.php'; 

// echo password_hash("manan", PASSWORD_BCRYPT);

// $hashpass = password_hash("manan", PASSWORD_BCRYPT);
//  $verify = password_verify('manan',$hashpass);


//  echo $verify;

?>

 
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>FormFusion</title>
      
      <!-- Favicon -->
      <link rel="shortcut icon" href="./assets/images/favicon.ico" />
      
      <link rel="stylesheet" href="./assets/css/backend-plugin.min.css">
      <link rel="stylesheet" href="./assets/css/backend.css?v=1.0.0">  </head>
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
                        <div class="auth-logo">
                           <!-- <img src="../../assets/images/logo.png " class="img-fluid  rounded-normal  darkmode-logo" alt="logo"> -->
                           <img src="../../assets/images/logo-dark.png" class="img-fluid rounded-normal light-logo" alt="logo">
                        </div>
                        <h3 class="mb-3 font-weight-bold text-center">Getting Started</h3>
                        <form method="post">
                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label class="text-secondary">Name</label>
                                    <input class="form-control" name="name" type="text" placeholder="Enter Name" required>
                                 </div>
                              </div>
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label class="text-secondary">Number</label>
                                    <input class="form-control" name="num" type="number" placeholder="Enter Phone" required>
                                 </div>
                              </div>
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label class="text-secondary">Country</label>
                                    <input class="form-control" name="country" type="text" placeholder="Enter Country" required>
                                 </div>
                              </div>
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label class="text-secondary">Email</label>
                                    <input class="form-control" name="email" type="email" placeholder="Enter Email" required>
                                 </div>
                              </div>
                              <div class="col-lg-12 mt-2">
                                 <div class="form-group">
                                    <label class="text-secondary">Password</label>
                                    <input class="form-control" name="pass" type="password" placeholder="Enter Password" required>
                                 </div>
                              </div>
                              <div class="col-lg-12 mt-2">
                                    <div class="form-check form-check-inline">
                                       <div class="custom-control custom-checkbox custom-control-inline mb-3">
                                          <input type="checkbox" class="custom-control-input m-0" id="inlineCheckbox1">
                                          <label class="custom-control-label pl-2" for="inlineCheckbox1">I agree to the <a href="terms-of-service.html">Terms of Service </a> and <a href="privacy-policy.html">Privacy Policy</a></label>
                                       </div>
                                    </div>
                              </div>
                           </div>
                           <button type="submit" name="submit" class="btn btn-primary btn-block mt-2">Create Account</button>
                           <div class="col-lg-12 mt-3">
                                <p class="mb-0 text-center">Do you have an account? <a href="../index.php">Sign In</a></p>
                           </div>
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
            $name = $_POST['name'];
         $num = $_POST['num'];
         $country = $_POST['country'];
         $email = $_POST['email'];
         $pass = $_POST['pass'];

         $q = "select * from user where email = '$email'";

         $pass = password_hash($pass,PASSWORD_DEFAULT);

         // echo $pass;

         $result = $conn->query($q);

         if($result->num_rows >= 1){
            echo "<script>alert('User already exist');</script>";
         }
         else{
            $q = "insert into user (uname,email,pass,num,count) values ('$name','$email','$pass',$num,'$country')";

            if($conn->query($q)){
               echo "<script>alert('User Created');</script>";
               ?> <!--<script>window.location = "../index.php"</script> <?php
            }
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