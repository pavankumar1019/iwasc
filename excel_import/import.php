<?php

//import.php

include '../vendor/autoload.php';

$connect = new PDO("mysql:host=localhost;dbname=crud", "root", "");

if($_FILES["import_excel"]["name"] != '')
{
 $allowed_extension = array('xls', 'csv', 'xlsx');
 $file_array = explode(".", $_FILES["import_excel"]["name"]);
 $file_extension = end($file_array);

 if(in_array($file_extension, $allowed_extension))
 {
  $file_name = time() . '.' . $file_extension;
  move_uploaded_file($_FILES['import_excel']['tmp_name'], $file_name);
  $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
  $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

  $spreadsheet = $reader->load($file_name);

  unlink($file_name);

  $data = $spreadsheet->getActiveSheet()->toArray();

  foreach($data as $row)
  {
   $insert_data = array(
    ':full_name' => $row[0],
    ':reg_number' => $row[1],
    ':phone' => $row[2],
    ':course' => $row[3],
    ':blood_group' => $row[4],
    ':dob' => $row[5],
    ':address' => $row[6],
   );

   $query = "
   INSERT INTO users (full_name, reg_number, phone, course, blood_group, dob, address) 
   VALUES (:full_name, :reg_number, :phone, :course, :blood_group, :dob, :address )
  ";

   $statement = $connect->prepare($query);
   $statement->execute($insert_data);
  }
  $message = '<div class="alert alert-success">Data Imported Successfully</div>';

 }
 else
 {
  $message = '<div class="alert alert-danger">Only .xls .csv or .xlsx file allowed</div>';
 }
}
else
{
 $message = '<div class="alert alert-danger">Please Select File</div>';
}

echo $message;

?>
