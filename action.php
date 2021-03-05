<?php

//DB Connection
include('db.php'); 

$full_name = $_POST["full_name"];
$reg_number = $_POST["reg_number"];
$phone = $_POST["phone"];
$course = $_POST["course"];
$blood_group = $_POST["blood_group"];
$dob = $_POST["dob"];
$address = $_POST["address"];

//image uploading
if($_FILES['user_image']['name']){
 
    $code=mt_rand(10,100000);
    /* rename the file name*/
    // $code= $reg_number;
    $ext = strtolower(pathinfo($_FILES['user_image']['name'], PATHINFO_EXTENSION));
    move_uploaded_file($_FILES['user_image']['tmp_name'], "crud_operations/upload/". $code.'.'.$ext);

    $img = $code.'.'.$ext;

    }
    $sql="INSERT INTO users (`full_name`, `reg_number`, `phone`, `course`, `blood_group`, `dob`, `address`, `image`) 
    VALUES ('$full_name','$reg_number','$phone','$course ','$blood_group','$dob ','$address','$img')";

mysqli_query($con, $sql);
  
  ?>