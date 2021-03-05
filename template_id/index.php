<?php
include('../db.php'); 
require "../vendor/autoload.php";
// $serial="31218u04054";
$generator = new \Picqer\Barcode\BarcodeGeneratorPNG();

?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Digital ID-card generator</title>

    <link rel="stylesheet" href="style.css" />

    <!-- Bootstrap  -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
      crossorigin="anonymous"
    ></script>

    <!-- jquery -->
    <script
      src="https://code.jquery.com/jquery-3.5.1.js"
      integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="//bootstrap-extension.com/css/4.6.1/bootstrap-extension.min.css"
      type="text/css"
    />
    <script src="//bootstrap-extension.com/js/4.6.1/bootstrap-extension.min.js"></script>
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
     <div class="card" style="margin: 0px" id="outprint">
      <div class="head">
        <div class="d-flex mt-4 justify-content-center align-items-center">
          <img
            src="./logo.png"
            class="img-fluid"
            style="width: 170px"
            alt=""
          />
          <!-- <h1 class="title">islamiah womens arts and science college</h1> -->
        </div>
        <div class="d-flex justify-content-center align-items-center">
          <p class="title">
            islamiah women's <br />
            arts and science college
          </p>
        </div>
      </div>
      <div class="container-fluid head1 d-flex px-5 justify-content-center align-items-center">
        <div class="mx-4">
          <p class="title1">
          Accredited by NAAC with B Grade <br>
            Recognised by the UGC under section 2(f) &amp; 12(B) of the UGC Act 1956
  ,Permanently Affilated with Thiruvalluvar University and Approved by The Government of Tamil Nadu
          </p>
        </div>
      </div>
      <div>
        
        <div class="container">
          <div class="row justify-content-center">
          <div class="col-3"><p class="stud">STUDENT IDENTITY CARD</p></div>
          <div class="col-6">
           
              <div class="d-flex mt-3 justify-content-center align-items-center">
                <img
                  src="../crud_operations/upload/<?php echo $img;?>"
                  class="img-fluid mt-1 profile"
                  style="width: 280px;height:250px;"
                  alt="" 
                />
                <!-- <h1 class="title">islamiah womens arts and science college</h1> -->
              </div>
           
          </div>
          <div class="col-3 justify-content-end align-items-end"><div class="d-flex mt-5 justify-content-end align-items-end">
            <img src="./blood.png" style="width:30px;" alt="">&nbsp;
          <h1><?php echo $blood_group;?></h1></div></div>

        </div>
        </div>
      </div>
      <div class="body1">
        <div class="d-flex justify-content-center align-items-center">
          <p class="name">
           <?php echo $fullname;?><br /><span style="color: rgb(19, 18, 18)"
              ><?php echo $regnumber;?></span
            >
            <br /><span style="color: rgb(19, 18, 18)"><?php echo $course;?></span>
          </p>
        </div>
        <div class="mx-6 d-flex justify-content-end align-items-end">
          <p>Principal...</p>
        </div>
        <div class="mx-6 d-flex justify-content-end align-items-end">
          <p style="font-weight: bold">Principal</p>
        </div>
        <div class="d-flex justify-content-center align-items-center">
       <?php echo  ' <img width="400px;" src="data:image/png;base64,'. $barcode .'"/>';?>
        </div>
        
      </div>
      <div class="d-flex justify-content-center align-items-center">
          <p class="" style="font-size:25px;">Valid upto &nbsp; <?php echo $pdate;?> </p>
        </div>
      <div class="fotter1">
        <div class="d-flex justify-content-center align-items-center">
    
        </div>
      </div>
    </div>
    <div class="card" style="margin: 0px" id="outprint">
      <div class="head_b">
       
      </div>
      <div class="head1">
        <div class="d-flex mt-1 mb-2 justify-content-center align-items-center">
          <p class="title1_b">DATE OF BIRTH</p>
        </div>
      </div>
      <div class="head1_b">
        <div class="d-flex mt-1 mb-2 justify-content-center align-items-center">
          <p class="title1_b" style="color: black"><?php echo $dob;?></p>
        </div>
      </div>
      <div class="head1">
        <div class="d-flex mt-1 mb-2 justify-content-center align-items-center">
          <p class="title1_b">address</p>
        </div>
      </div>
      <div class="head1_b">
        <div class="d-flex mt-1 mb-2 justify-content-center align-items-center">
          <p class="title1_b" style="color: black;text-align:center;">
           <?php echo $address;?>
          </p>
        </div>
      </div>
      <div class="head1">
        <div class="d-flex mt-1 mb-2 justify-content-center align-items-center">
          <p class="title1_b">MOBILE</p>
        </div>
      </div>
      <div class="head1_b">
        <div class="d-flex mt-1 mb-1 justify-content-center align-items-center">
          <p class="title1_b" style="color: black"><?php echo $phone;?></p>
        </div>
      </div>
      <div class="body1">
        <div class="">
          <img
            src="./1.jpg"
            class="img-fluid mt-5 profile"
            style="width: 100%; height: 360px"
            alt=""
          />
          <!-- <h1 class="title">islamiah womens arts and science college</h1> -->
        </div>
      </div>
      <div class="fotter">
        <div class="d-flex justify-content-center align-items-center">
          <p class="mt-3">#10,BYPASS ROAD NEW TOWN ,VANIYAMBADI-635752</p>
        </div>
      </div>
    </div>
    <?php
  }
} else {
  echo "0 results";
}

 ?>
   
  </body>
  <script>
    window.print();
  </script>
</html>
