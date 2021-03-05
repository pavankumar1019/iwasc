<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
 if($_POST["operation"] == "Add")
 {
  $image = '';
  if($_FILES["user_image"]["name"] != '')
  {
   $image = upload_image();
  }
  $statement = $connection->prepare("
   INSERT INTO users (full_name, reg_number, phone, course, blood_group, dob, address, image) 
   VALUES (:full_name, :reg_number, :phone, :course, :blood_group, :dob, :address, :image)
  ");
  $result = $statement->execute(
   array(
    ':full_name' => $_POST["full_name"],
    ':reg_number' => $_POST["reg_number"],
    ':phone' => $_POST["phone"],
    ':course' => $_POST["course"],
    ':blood_group' => $_POST["blood_group"],
    ':dob' => $_POST["dob"],
    ':address' => $_POST["address"],
    ':image'  => $image
   )
  );
  if(!empty($result))
  {
   echo 'Data Inserted';
  }
 }
 if($_POST["operation"] == "Edit")
 {
  $image = '';
  if($_FILES["user_image"]["name"] != '')
  {
   $image = upload_image();
  }
  else
  {
   $image = $_POST["hidden_user_image"];
  }
  $statement = $connection->prepare(
   "UPDATE users 
   SET full_name = :full_name, reg_number = :reg_number, phone = :phone, course = :course, blood_group = :blood_group, dob = :dob, address = :address, image = :image  
   WHERE id = :id
   "
  );
  $result = $statement->execute(
   array(
    ':full_name' => $_POST["full_name"],
    ':reg_number' => $_POST["reg_number"],
    ':phone' => $_POST["phone"],
    ':course' => $_POST["course"],
    ':blood_group' => $_POST["blood_group"],
    ':dob' => $_POST["dob"],
    ':image'  => $image,
    ':address' => $_POST["address"],
    ':id'   => $_POST["user_id"]
   )
  );
  if(!empty($result))
  {
   echo 'Data Updated';
  }
 }
}

?>
   