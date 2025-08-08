<?php 
include '../backend/db/db.php';

if (isset($_POST['submit'])) {
    $rview = $_POST['rview'];
    $uname = $_POST['uname'];
    

    // $q = "insert into lead (fname,lname,email,phone,state,source,Inquiry,status) values ('$fname','$lname,'$email,$phn,'$state,'$source','$inquiry,'$status')";

    //$q = "INSERT INTO lead (fname, lname, email, phone, state, source, Inquiry, status) VALUES ('$fname', '$lname', '$email', '$phn', '$state', '$source', '$inquiry', '$status')";
    $q = "insert into review (txt,uname) values ('$rview','$uname')";
    // echo $rview;
    if($conn->query($q))
    echo "<script>alert('review has been sended successfully');</script>";  
else
echo "<script>alert('error');</script>"
?> <script>window.location = "../"</script><?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script>
   document.addEventListener('DOMContentLoaded', function () {
       var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
       myModal.show();
   });
</script>
<!-- Favicon -->
<link rel="shortcut icon" href="../assets/images/favicon.ico" />
      
      <link rel="stylesheet" href="../assets/css/backend-plugin.min.css">
      <link rel="stylesheet" href="../assets/css/backend.css?v=1.0.0"> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Review</h1>
      </div>
      <div class="modal-body">
        <form action="" method="post">
      <div class="form-group">
                    <label for="uname">User Name</label>
                    <!-- <textarea name="rview" id="rview" required></textarea> -->
                    <input type="text" class="form-control" name="uname" id="uname" required>
                    <label for="fname">Write Review</label>
                    <!-- <textarea name="rview" id="rview" required></textarea> -->
                    <input type="text" class="form-control" name="rview" id="rview" required>
                </div>
      </div>
      <div class="modal-footer">
        <a href="../"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></a>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>