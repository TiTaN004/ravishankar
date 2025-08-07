<?php

error_reporting(-1);
ini_set('display_errors', 1);
include '../db/formdb.php';
$id = $_GET['id'];

$q = "select * from forms where f_id = '$id'";

$result = $conn1->query($q);

$row = $result->fetch_assoc();

$id = $row['f_id'];
$c_url = $row['c_url'];
$title = $row['title'];
$status = $row['status'];
$isActiveVender = $row['isActiveVender'];
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
        .custom-switch-inner {
    display: flex;
    align-items: center;
    justify-content: center;
}
    </style>

</head>

<body>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit</h1>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post">
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center" for="email">Form Id<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="f_id" class="form-control" id="email" placeholder="Enter Form Title" value="<?php echo $id; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center" for="email">Form Title<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="title" class="form-control" id="email" placeholder="Enter Form Title" value="<?php echo $title; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center">Default Campaign URL<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Campaign URL" name="redirect_url" id="redirect_url" style="height: 100px"><?php echo $c_url; ?></textarea>
                                </div>
                            </div>
                            <!-- <input type="text" name="redirect_url" id="redirect_url"> -->

                        </div>
                        <?php if($row['res_limit'] != NULL) { ?>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-3 align-self-center">Limit Response</label>
                                        <div class="col-sm-9">
                                            <div class="form-floating">
                                            <input type="number" name="res_limit" id="res_limit" class="form-control" value="<?php echo $row['res_limit']; ?>">
                                            </div>
                                        </div>
                                    </div> 
                        <?php } ?>
                        
                        <div class="form-group row">
                                <label class="control-label col-sm-3 align-self-center">Show Vender Name ?</label></label>
                                <div class="col-sm-9">
                                <div class="custom-control   custom-switch custom-switch-text-center ">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch-11" name='isActiveVender' <?php echo ($isActiveVender == 1) ? "checked=''" : ""; ?> >
                                    <label class="custom-control-label" for="customSwitch-11" data-on-label="On" data-off-label="Off">
                              </label>
                           <!--</div>-->
                           </div>
                        </div>
                                    
                        <div class="form-group row">
                                <label class="control-label col-sm-3 align-self-center">Active</label></label>
                                <div class="col-sm-9">
                                <div class="custom-control   custom-switch custom-switch-text-center ">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch-11" name='active' <?php echo ($status == 1) ? "checked=''" : ""; ?> >
                                    <label class="custom-control-label" for="customSwitch-11" data-on-label="On" data-off-label="Off">
                              </label>
                           <!--</div>-->
                           </div>
                        </div>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                            <button type="submit" name="close" class="btn btn-primary">Close</button>
                            <button id="{unique_user_id}" class="btn btn-link rounded-pill mt-2">{unique_user_id}</button>
                            <button id="{refer}" type="button" class="btn btn-link rounded-pill mt-2">{refer}</button>
                            
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['submit'])) {
                        $title = $_POST['title'];
                        $redirect_url = $_POST['redirect_url'];
                        $f_id = $_POST['f_id'];
                        $limit  = $_POST['res_limit'];
                        $isActiveVender = isset($_POST['isActiveVender']) ? 1 : 0;
                        $active = isset($_POST['active']) ? 1 : 0;
                    
                        if($limit != NULL){
                        $q = "update forms set title='$title', c_url='$redirect_url' , status=$active, res_limit=$limit, isActiveVender=$isActiveVender where f_id='$f_id'";
                        }
                        else
                        $q = "update forms set title='$title', c_url='$redirect_url' , status=$active, isActiveVender=$isActiveVender where f_id='$f_id'";


                        if ($conn1->query($q)) {
                            echo "<script>alert('Form Updated successfully'); window.location = '../manage_forms.php'</script>";
                        } else {
                            echo "Error";
                        }
                    }else if(isset($_POST['close'])){
                         echo "<script>window.location = '../manage_forms.php'</script>";
                    }
                    ?>
                </div>
            </div>
        </div>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>