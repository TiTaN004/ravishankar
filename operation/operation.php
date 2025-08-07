<?php 
include '../backend/db/db.php';

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phn = $_POST['phn'];
    $state = $_POST['state'];
    $inquiry = $_POST['inquiry'];
    $status = 'inquiry';
    $source = 'website'; 

    // $q = "insert into lead (fname,lname,email,phone,state,source,Inquiry,status) values ('$fname','$lname,'$email,$phn,'$state,'$source','$inquiry,'$status')";

    $q = "INSERT INTO lead (fname, lname, email, phone, state, source, Inquiry, status) VALUES ('$fname', '$lname', '$email', '$phn', '$state', '$source', '$inquiry', '$status')";


    if($conn->query($q))
    echo "<script>alert('Inquiry has been sended successfully');</script>";  
?><script>window.location = "../"</script> <?php
}
?>