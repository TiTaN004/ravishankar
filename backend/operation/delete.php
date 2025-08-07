<?php
    include '../db/formdb.php';
    $id = $_GET['id'];

    $q = "delete from forms where f_id = '$id'";

    if($conn1->query($q)){
        echo "<script>alert('deleted successfully');</script>";
        ?><script>window.location = "../manage_forms.php"</script><?php
    }
?>