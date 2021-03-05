<?php
include('db.php'); 

$reg=$_POST['fromregval1'];

$echeck="select * from users where reg_number='$reg'";
$echk=mysqli_query($con, $echeck);
$ecount=mysqli_num_rows($echk);
if($ecount!=0)
{
   echo "";
}else{
    echo "Not a valid Register number";
}
?>