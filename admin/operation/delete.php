<?php

    include '../../backend/db/db.php';

    $id = $_GET['id'];

    $q = "delete from product where id = $id";

    $conn->query($q);

    ?><script>
    alert("Product Deleted Successfully")
    window.location = "../manage_category.php";</script><?php
?>