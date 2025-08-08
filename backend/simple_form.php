<?php 
error_reporting(-1);
ini_set('display_errors', 1);
?>
 
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FormFusion</title>


    <link rel="stylesheet" href="../assets/css/backend-plugin.min.css">
    <link rel="stylesheet" href="../assets/css/backend.css?v=1.0.0">
</head>

<body class=" color-light ">
    <div class="wrapper">
        <?php include './component/nav.php';
        include './component/sidebar.php';
        include './db/formdb.php'; ?>

        <div class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Offers Details</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="control-label col-sm-3 align-self-center" >Form Title<span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="title" class="form-control" required placeholder="Enter Form Title">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-3 align-self-center">Default Campaign URL<span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <div class="form-floating">
                                                <textarea class="form-control" required placeholder="Campaign URL" name="redirect_url" id="redirect_url" style="height: 100px"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-3 align-self-center">Limit Response</label>
                                        <div class="col-sm-9">
                                            <div class="form-floating">
                                            <input type="number" name="res_limit" id="res_limit" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-3 align-self-center">Show Vender Name ?</label>
                                        <div class="col-sm-9">
                                            <div class="form-floating">
                                            <input type="checkbox" name="isActiveVender" id="isActiveVender" class="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-3 align-self-center">Background Image</label>
                                        <div class="col-sm-9">
                                            <div class="input-group mb-4">
                                               <div class="input-group-prepend">
                                                  <span class="input-group-text">Upload</span>
                                               </div>
                                               <div class="custom-file">
                                                  <input type="file" name="bg-img" class="custom-file-input" id="inputGroupFile01">
                                                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                               </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="control-label col-sm-3 align-self-center"><span class="text-danger"></span></label>
                                        <div class="col-sm-9">
                                            <div class="form-floating">
                                                <button id="{unique_user_id}" class="btn btn-link rounded-pill mt-2">{unique_user_id}</button>
                                                <button id="{refer}" type="button" class="btn btn-link rounded-pill mt-2">{refer}</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <button type="submit" name="submit" class="btn btn-primary">Create</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    
    // Function to generate a random unique ID
    function generateUniqueId($length = 10)
    {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }

    if (isset($_POST['submit'])) {
        

        
    $img_path = ''; // Initialize as empty string

    if(isset($_FILES["bg-img"]) && $_FILES["bg-img"]["error"] == 0) {
        $target_dir = "uploads/";
        $currentDateTime = date('Y-m-d_g-i-s_A');
        $target_file = $target_dir .$currentDateTime;

        // Move uploaded file to target directory
        if (move_uploaded_file($_FILES["bg-img"]["tmp_name"], $target_file)) {
            // File uploaded successfully, store the file path
            $img_path = $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    
        
        $title = $_POST['title'];
        $redirect_url = $_POST['redirect_url'];
        $unique_id = generateUniqueId();
        $res_limit = (isset($_POST['res_limit']) && $_POST['res_limit'] !== '') ? intval($_POST['res_limit']) : 'NULL';
        // $res_limit = $_POST['res_limit'];
        $currentDateTime = date('Y-m-d g:i:s A');
        $isActiveVender = isset($_POST['isActiveVender']) ? 1 : 0;


        if($_POST['res_limit'] != NULL){
            $res = $_POST['res_limit'];
        $q = "INSERT INTO forms (f_id, title, c_url,created_at,status,img_url,res_limit,isActiveVender) VALUES ('$unique_id', '$title', '$redirect_url','$currentDateTime',1,'$target_file','$res','$isActiveVender')";
        }
        
        else 
        $q = "INSERT INTO forms (f_id, title, c_url,created_at,status,img_url,isActiveVender) VALUES ('$unique_id', '$title', '$redirect_url','$currentDateTime',1,'$target_file','$isActiveVender')";
        
        if ($conn1->query($q) === true) {
            echo "<script>alert('success');</script>";
        } else {
            echo "<script>alert('failed');</script>";
        }
    }

    ?>

    <!-- Wrapper End-->
    <footer class="iq-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="../backend/privacy-policy.html">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="../backend/terms-of-service.html">Terms of Use</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right">
                    <span class="mr-1">
                        Copyright
                        <script>
                            document.write(new Date().getFullYear())
                        </script>© <a href="#" class="">FormFusion</a>
                        All Rights Reserved.
                    </span>
                </div>
            </div>
        </div>
    </footer> <!-- Backend Bundle JavaScript -->
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
    <script src="../assets/js/app.js"></script>
    <script>
            let ta = document.getElementById('redirect_url');
        const uuid = (e) => {
            e.preventDefault()
            // console.log(ta)
            let newVal = ta.value += '{unique_user_id}'
            ta.innerHTML = newVal
        }
        const refer = (e) => {
            e.preventDefault()
            let newVal = ta.value += '{refer}'
            ta.innerHTML = newVal
        }
        // Adding an event listener to the button to call the function on click
    document.getElementById('{unique_user_id}').addEventListener('click', uuid);
    document.getElementById('{refer}').addEventListener('click', refer);
    </script>
</body>

</html>