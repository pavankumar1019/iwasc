<?php
include('../db.php'); 
require "../vendor/autoload.php";
// $serial="31218u04054";
$generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous"></script>
</head>
<body>
<?php

$fromreg=$_POST['fromregval'];
$toreg=$_POST['fromregval1'];
$pdate=$_POST['pdate'];

$sql = "SELECT * FROM users WHERE reg_number>='$fromreg' && reg_number<='$toreg'";
if ($result = mysqli_query($con, $sql)) {
  // output data of each row
  while($row = mysqli_fetch_row($result)) {
    $fullname= $row[1];
    $regnumber= $row[2];
    $phone= $row[3];
    $course= $row[4];
    $blood_group= $row[5];
    $dob= $row[6];
    $address= $row[7];
    $img= $row[8];
    $barcode = $generator->getBarcode($regnumber, $generator::TYPE_CODE_128, 3);
    $barcode = base64_encode($barcode);
    ?>
    <!-- card front -->
    <div class="maindiv1">
        <div class="vector1">
            <img src="./Group1.png" class="img-fluid" alt="" srcset="" />
        </div>
    </div>
    <div class="" style="margin-top: -100px;">
        <div class="row">
            <div class="col" style="display: flex;flex-direction: column; -ms-flex-wrap: wrap;
            flex-wrap: wrap;align-items: center;justify-content: center;">
            <div style="text-align: center;">
                <h3 style="font-weight: bolder;"> <?php echo $fullname;?>
                </h3>
                <p class="title"><?php echo $course;?><br>
                    Register No: <?php echo $regnumber;?> <br>
                    valid upto:  <?php echo $pdate;?>
                </p>
                <img src="./logo.jpeg" class="img-fluid" alt=""><br>
                <img src="./principal.png" width="100px" alt="">
                <h2>PRINCIPAL</h2>
            </div>
               

            </div>
            <div class="col">
<img src="../crud_operations/upload/<?php echo $img;?>" alt="" class="img-fluid"  style="border: solid black 1px;width:250px;min-height: 200px; margin-top: 215px;">
            </div>
           
        </div>
        <div class="barcode mt-5 mb-5">
        <?php echo  ' <img width="600px"  height="105px" src="data:image/png;base64,'. $barcode .'"/>';?>
        </div>
      
        <div class="fotter1 p-4" style="width:100%;background: #130060">
    <h1>STUDENT IDENTITY CARD</h1>
    </div>
    </div>


    <!-- card back -->
    <div class="backcard">
    <div class="col backdiv"style="display: flex;flex-direction: column; -ms-flex-wrap: wrap;
            flex-wrap: wrap;align-items: start;justify-content: start;">
            
            <div class="backp">
                <p>
                   Blood Group  &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $blood_group;?> <br>
                   Date of Birth &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $dob;?> <br>
                   Mobile Number  &nbsp;&nbsp;&nbsp;: <?php echo $phone;?> <br>
                </p>
                <p>
                    <b>Address</b> <br>
                    <?php echo $address;?>
                </p>
            </div>
            <div class="backp">
                <p>
                    <b>If Found, Please return this card to</b> <br>
                    <br><br>
                   THE PRINCIPAL<br>
                    ISLAMIAH WOMEN'S ARTS AND SCIENCE COLLEGE <br>
                    #10, BYPASS ROAD, NEW TOWN <br>
                    VANIYAMBADI-635752 <br>
                    TIRUPATTUR DISTRICT, TAMIL NADU, INDIA
                </p>
            </div>
            </div>
    </div>
    <?php
  }
} else {
  echo "0 results";
}

 ?>
    <script>
      window.print();
    </script>
</body>
</html>