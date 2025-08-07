<?php
include '../db/formdb.php';
ob_start();
$id = $_GET['id'];
if (isset($_GET['r']) === true)
    $refer_code = $_GET['r'];

$q = "select * from forms where f_id = '$id'";

$result = $conn1->query($q);

$row = $result->fetch_assoc();
$id = $row['f_id'];
$c_url = $row['c_url'];
$title = $row['title'];
$img_url = $row['img_url'];
$status = $row['status'];
$isActiveVender = $row['isActiveVender'];
$limit = $row['res_limit'];
if($limit==NULL && $status == 1){
    $status=1;
}
else if ($limit==NULL && $status == 0){
    $status=0;
}
else if ($limit==0){
    $status=0;
            $q2 = "UPDATE forms SET status = $status  WHERE res_limit=$limit ";
            $conn1->query($q2);  
}

?>

<!DOCTYPE html>
<html lang="en">
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FormFusion</title>

    <link rel="stylesheet" href="../../assets/css/backend-plugin.min.css">
    <link rel="stylesheet" href="../../assets/css/backend.css?v=1.0.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
            myModal.show();
        });
    </script>
    <style>
        .bg-img{
            z-index: -100;
            width: 100vw;
            height: 30vh;
            background-color: black;
            background: url('../<?php echo $img_url; ?>');
            background-size: cover;
            background-position: 50%;
        }
        .card {
            width: 50%; /* For larger screens */
        }
        
        /* Media query for mobile devices */
        @media (max-width: 576px) { /* This targets screens smaller than 576px */
            .card {
                width: 80%; /* Set the width to 75% on small screens */
            }
        }
    </style>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-17398416336"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-17398416336');
</script>

</head>
<?php 
if($status==1){
    ?>


<body class="">
    <div class="bg-img position-absolute">
        
    </div>
    <div class="d-flex justify-content-center align-items-center vw-100 vh-100">
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <div class="header-title ">
                    <h4 class="card-title"><?php echo $title ?></h4>
                </div>
            </div>
            <div class="card-body">
                <form class="form-horizontal" method="post">
                    <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center" for="name">Name<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center" for="number">Number<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="number" maxlength="10" name="number" class="form-control" id="number" placeholder="Enter Number" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center" for="email">Email<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" required>
                        </div>
                    </div>
                    <?php if ($isActiveVender): ?>
                    <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center" for="vender">Vender Name<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="vender" class="form-control" id="vender" placeholder="Enter Vender Name" required>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="form-group d-flex justify-content-center">
                        <button type="submit" name="submit" class="btn btn-primary w-50 rounded">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $number = $_POST['number'];
        $email = $_POST['email'];
        $vender = isset($_POST['vender']) ? $_POST['vender'] : '' ;
        $currentDateTime = date('Y-m-d g:i:s A');
        
        
        if (!preg_match('/^[6-9]\d{9}$/', $number)) {
            echo "<script>alert('Invalid Indian mobile number.');</script>";
            return;
        }
        

        if (isset($refer_code) === true){
            $q = "insert into form_data (form_title, refer_num, field_1, field_2, field_3, field_4,created_at,f_id) values ('$title',$refer_code,'$name','$number','$email','$vender','$currentDateTime','$id')";
    
            if($limit!=NULL){
            $dec_limit=$limit-1;
            $q1 = "UPDATE forms SET res_limit = $dec_limit  WHERE res_limit=$limit ";
            $conn1->query($q1);
            }
              if($limit==1){
                        $q2 = "UPDATE forms SET status = 0  WHERE f_id='$id' ";
                        $conn1->query($q2);
            }
            }

        else{
            $q = "insert into form_data (form_title, field_1, field_2, field_3, field_4,created_at,f_id) values ('$title','$name','$number','$email','$vender','$currentDateTime','$id')";
        
            if($limit!=NULL){
            $dec_limit=$limit-1;
            $q1 = "UPDATE forms SET res_limit = $dec_limit  WHERE res_limit=$limit ";
            $conn1->query($q1);
            }
             if($limit==1){
                        $q2 = "UPDATE forms SET status = 0  WHERE f_id='$id' ";
                        $conn1->query($q2);
            }
        }

        if ($conn1->query($q)) {
            $last_rec = $conn1->insert_id;
            $sql = "select u_id from form_data where id = $last_rec";
            $result = $conn1->query($sql);
            $row = $result->fetch_assoc();
            $refer_url = str_replace('{unique_user_id}', $row['u_id'], $c_url);

            if (isset($refer_code) === true) {
                // Replace {refer} in the redirect URL with the unique identifier
                $refer_url = str_replace('{refer}', $refer_code, $refer_url);
                header('location: ' . $refer_url);
            } else {
                $refer_url = str_replace('{refer}', "", $refer_url);
                header('location: ' . $refer_url);
            }
        } else {
            echo "<script>alert('error submitting form');</scrip>";
        }
        // echo "<script>alert('Form Updated successfully'); window.location = '".$c_url."'</script>";
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
<?php
}
else{
?>
<?php

    echo "This Form is inactive";
}
?>
</html>
<?php ob_end_flush();  ?>
    
