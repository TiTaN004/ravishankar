<?php
include '../db/formdb.php';
ob_start();
$id = $_GET['id'];
if (isset($_GET['r']) === true)
    $refer_code = $_GET['r'];

$stmt = $conn1->prepare("SELECT * FROM forms WHERE f_id = ?");
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();

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
    $stmt = $conn1->prepare("UPDATE forms SET status = ? WHERE res_limit = ?");
    $stmt->bind_param("ii", $status, $limit);
    $stmt->execute();
    $stmt->close();
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
                    <h4 class="card-title"><?php echo htmlspecialchars($title) ?></h4>
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
        $name = trim($_POST['name']);
        $number = trim($_POST['number']);
        $email = trim($_POST['email']);
        $vender = isset($_POST['vender']) ? trim($_POST['vender']) : '';
        $currentDateTime = date('Y-m-d g:i:s A');
        
        // Validate Indian mobile number
        if (!preg_match('/^[6-9]\d{9}$/', $number)) {
            echo "<script>alert('Invalid Indian mobile number.');</script>";
        } else {
            // DUPLICATE CHECK using prepared statement
            $duplicate_stmt = $conn1->prepare("SELECT id FROM form_data WHERE field_1 = ? AND field_2 = ? AND field_3 = ? AND f_id = ? LIMIT 1");
            $duplicate_stmt->bind_param("ssss", $name, $number, $email, $id);
            $duplicate_stmt->execute();
            $duplicate_result = $duplicate_stmt->get_result();
            
            if ($duplicate_result->num_rows > 0) {
                echo "<script>alert('You have already submitted this form. Duplicate submissions are not allowed.');</script>";
                $duplicate_stmt->close();
            } else {
                $duplicate_stmt->close();
                
                // If no duplicate found, proceed with insertion using prepared statements
                if (isset($refer_code) === true) {
                    // Insert with refer code
                    $insert_stmt = $conn1->prepare("INSERT INTO form_data (form_title, refer_num, field_1, field_2, field_3, field_4, field_5, created_at, f_id) VALUES (?, ?, ?, ?, ?, ?, '', ?, ?)");
                    $insert_stmt->bind_param("ssssssss", $title, $refer_code, $name, $number, $email, $vender, $currentDateTime, $id);
                } else {
                    // Insert without refer code
                    $insert_stmt = $conn1->prepare("INSERT INTO form_data (form_title, refer_num, field_1, field_2, field_3, field_4, field_5, created_at, f_id) VALUES (?, ?, ?, ?, ?, ?, '', ?, ?)");
                    $insert_stmt->bind_param("ssssssss", $title, '', $name, $number, $email, $vender, $currentDateTime, $id);
                }
                
                if ($insert_stmt->execute()) {
                    $last_rec = $conn1->insert_id;
                    $insert_stmt->close();
                    
                    // Update response limit if needed
                    if($limit != NULL && $limit > 0){
                        $dec_limit = $limit - 1;
                        $limit_stmt = $conn1->prepare("UPDATE forms SET res_limit = ? WHERE f_id = ? AND res_limit = ?");
                        $limit_stmt->bind_param("isi", $dec_limit, $id, $limit);
                        $limit_stmt->execute();
                        $limit_stmt->close();
                        
                        // Disable form if limit reached
                        if($dec_limit == 0){
                            $status_stmt = $conn1->prepare("UPDATE forms SET status = 0 WHERE f_id = ?");
                            $status_stmt->bind_param("s", $id);
                            $status_stmt->execute();
                            $status_stmt->close();
                        }
                    }
                    
                    // Get unique user ID and redirect
                    $uid_stmt = $conn1->prepare("SELECT u_id FROM form_data WHERE id = ?");
                    $uid_stmt->bind_param("i", $last_rec);
                    $uid_stmt->execute();
                    $uid_result = $uid_stmt->get_result();
                    $uid_row = $uid_result->fetch_assoc();
                    $uid_stmt->close();
                    
                    $refer_url = str_replace('{unique_user_id}', $uid_row['u_id'], $c_url);

                    if (isset($refer_code) === true) {
                        $refer_url = str_replace('{refer}', $refer_code, $refer_url);
                    } else {
                        $refer_url = str_replace('{refer}', "", $refer_url);
                    }
                    
                    header('location: ' . $refer_url);
                    exit();
                } else {
                    echo "<script>alert('Error submitting form. Please try again.');</script>";
                    $insert_stmt->close();
                }
            }
        }
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
<?php ob_end_flush(); ?>