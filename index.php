<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
}else{
  header("Location: auth.php");
  exit();
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Digital ID-card generator</title>
    <link rel="shortcut icon" href="/idicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./style/style.css" />
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
      footer{
  position: absolute;
  left: 50%;
  top:100%;
  transform: translate(-50%, -50%);
}
    </style>
</head>

<body class="body">
    <section>
        <div class="container-sm maindiv">
            <div class="container maindiv_inner1">
                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                    <a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Logout</a>
                </div>

                <!-- Dashboard -->
                <div id="main" class="dashboard">
                    <h2>Digital ID-card generator</h2>
                    <p>
                        make your work easy...! with Rats Technologies software solutions
                    </p>
                    <span style="font-size: 30px; cursor: pointer" onclick="openNav()">&#9776;Menu</span>
                    <div class="row row-cols-1 mt-3 row-cols-md-2 g-4">
                        <div class="col">
                            <div class="card border-success" id="print">
                                <!-- <img src="..." class="card-img-top" alt="..."> -->
                                <div class="card-body">
                                    <h5 class="card-title">Individual &amp; Bulk Printing</h5>
                                    <p class="card-text">
                                        Generate &amp; print ID card for Individual and Bulk Data
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border-success" id="stud_btn">
                                <!-- <img src="..." class="card-img-top" alt="..."> -->
                                <div class="card-body">
                                    <h5 class="card-title">Individual Students Registration </h5>
                                    <p class="card-text">
                                        Individual Students Registration
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border-success" id="bulk">
                                <!-- <img src="..." class="card-img-top" alt="..."> -->
                                <div class="card-body">
                                    <h5 class="card-title">Bulk Students Registration</h5>
                                    <p class="card-text">
                                        Bulk Students Registration
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border-success" id="report">
                                <!-- <img src="..." class="card-img-top" alt="..."> -->
                                <div class="card-body">
                                    <h5 class="card-title">Reports</h5>
                                    <p class="card-text">View Data</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!-- Student Register start-->
<div id="main" class="student" style="display:none;">

    <a class="back" href=""><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>

    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;Menu</span>
    <div class="row row-cols-1 mt-3 row-cols-md-1 g-4" style="border: 1px solid black;">
        <div class="col">
          <div class="container-fluid">
            <!-- <img src="..." class="card-img-top" alt="..."> -->
            <div class="card-body">
              <h5 class="card-title">Individual Register Here .!</h5>
              <p class="card-text"> Register to Generate ID card for Individual Student</p>
              <div class="alert alert-warning alert-dismissible fade show" id="alert_success" style="display:none;" role="alert">
  <strong>Data Inserted</strong>&nbsp; Thank You.!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
              <form class="row g-3 needs-validation" enctype="multipart/form-data" id="uploadForm" action="add.php" method="post">
                <div class="col-md-4">
                  <label for="validationCustom01" class="form-label">Full Name</label>
                  <input type="text" class="form-control" onkeypress="return lettersOnly(event)" name="full_name" id="full_name validationCustom01" value="" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <div class="col-md-4">
                  <label for="validationCustom02" class="form-label">Register Number</label>
                  <input type="text" class="form-control" onkeypress="return lettersOnly1(event)" name="reg_number" id="reg_number validationCustom02" value="" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <div class="col-md-4">
                  <label for="validationCustomUsername" class="form-label">Mobile number</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">+91</span>
                    <input type="text" class="form-control" onkeypress="return numbersOnly(event)" name="phone" id="phone validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                      Please choose a number.
                    </div>
                  </div>
                </div>
             
                <div class="col-md-3">
                  <label for="validationCustom04" class="form-label">Course</label>
                  <select class="form-select" name="course" id="course validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                    <option value="B.Sc. NFSM&D">B.Sc. NFSM&D</option>
                    <option value="B.Sc. BioChemistry">B.Sc. BioChemistry</option>
                    <option value="B.Com (General)">B.Com (General)</option>
                    <option value="B.A. English">B.A. English</option>
                    <option value="B.C.A">B.C.A</option>
                    <option value="B.Sc. Mathematics">B.Sc. Mathematics</option>
                    <option value="B.B.A">B.B.A</option>
                    <option value="B.Com(Computer Applications)">B.Com(Computer Applications)</option>
                    <option value="B.Sc. Computer Science">B.Sc. Computer Science</option>
                    <option value="B.Sc. Chemistry">B.Sc. Chemistry</option>
                    <option value="B.Sc. Interior Design & Decor">B.Sc. Interior Design & Decor</option>
                    <option value="B.Sc. Zoology">B.Sc. Zoology </option>
                    <option value="M.A. English">M.A. English</option>
                    <option value="M.Com">M.Com</option>
                    <option value="M.Sc. Mathematics">M.Sc. Mathematics</option>
                    <option value="M.Sc. Computer Science">M.Sc. Computer Science</option>
                    <option value="M.Sc. Foods & Nutrition">M.Sc. Foods & Nutrition</option>
                    <option value="M.Sc. Biochemistry">M.Sc. Biochemistry</option>
                    <option value="M.Phil.English">M.Phil.English</option>
                    <option value="M.Phil.Commerce">M.Phil.Commerce</option>
                    <option value="M.Phil.Mathematics">M.Phil.Mathematics</option>
                  </select>
                  <div class="invalid-feedback">
                    Please select a course.
                  </div>
                </div>
                <div class="col-md-3">
                  <label for="validationCustom04" class="form-label">Blood Group</label>
                  <select class="form-select" name="blood_group" id="blood_group validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="o+">o+</option>
                    <option value="o-">o-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                  </select>
                  <div class="invalid-feedback">
                    Please select a  Blood Group.
                  </div>
                </div>
                <div class="col-md-3">
                  <label for="validationCustom05" class="form-label">Date of birth</label>
                  <input type="date" class="form-control" name="dob" id="dob validationCustom05" required>
                  <div class="invalid-feedback">
                    Please provide a DOB.
                  </div>
                </div>
                <div class="col-md-3">
                  <label for="validationCustom05" class="form-label">Photo</label>
                  <input type="file" class="form-control" name="user_image" id="user_image validationCustom05" accept="image/x-png,image/gif,image/jpeg" required>
                  <div class="invalid-feedback">
                    Please provide a  Address.
                  </div>
                </div>
                <div class="col-md-4">
                  <label for="validationCustom05" class="form-label">Address</label>
                  <textarea type="text" class="form-control" name="address" id="address validationCustom05" required></textarea>
                  <div class="invalid-feedback">
                    Please provide a  Address.
                  </div>
                </div>
                <div class="col-12">
                  <button class="btn btn-lg btn-outline-primary" type="submit">Register</button>
                </div>
              </form>
            </div>
          </div>
        </div>
       
      
     
      </div>
  </div>
<!-- Student Register end -->
<!-- bulk registration start-->
<div id="main" class="bulk" style="display:none;">

    <a class="back" href=""><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>

    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;Menu</span>
    <div class="row row-cols-1 mt-3 row-cols-md-1 g-4" style="border: 1px solid black;">
        <div class="col">
          <div class="container-fluid">
            <!-- <img src="..." class="card-img-top" alt="..."> -->
            <div class="card-body">
              <h5 class="card-title">Bulk Register Here .! using CSV file</h5>
              <div class="alert alert-primary" role="alert">
                <i class="fa fa-info-circle" aria-hidden="true"></i> &nbsp; Ensure that the file upload is in CSV Format Otherwise it will not save
              </div>
              <div class="alert alert-primary" role="alert">
         
                    <h4 class="title">
                        <i class="fa fa-info-circle"></i>&nbsp;Steps to save the file!

                    </h4>
                <!-- start content_slider -->
                     <div class="container">
                         <ol>
                             <li> Download the sample file format ( <a href="csv.php">Download link</a> )</li>
                             <li>Fill the employee details in the columns of the file</li>
                             <li>Save the file as CSV not as xls </li>
                             <li>Upload the file</li>
                        </ol>
                    </div>
                 

                

              </div>
              <span  id="message" style="display:none;"></span>
              <form method="post" id="import_excel_form" enctype="multipart/form-data">

   
                <div class="col-md-3">
                  <label for="validationCustom05" class="form-label">Choose CSV File</label>
                  <input type="file" class="form-control" name="import_excel" id="validationCustom05"  accept=".csv" required>
                  <div class="invalid-feedback">
                    Please file.
                  </div>
                </div>          
                <div class="col-12">
                  <button class="btn btn btn-outline-primary" name="import" id="import" type="submit"><i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp;Upload To Cloud</button>
                </div>
              </form>
            </div>
          </div>
        </div>
       
      
     
      </div>
  </div>
<!-- bulk registration end -->
<!-- printing start -->
<div id="main" class="print" style="display:none;">

    <a class="back" href=""><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>

    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;Menu</span>
    <div class="row row-cols-1 mt-3 row-cols-md-1 g-4" style="border: 1px solid black;">
        <div class="col">
          <div class="container-fluid">
            <!-- <img src="..." class="card-img-top" alt="..."> -->
            <div class="card-body">
              <h5 class="card-title">Induvidual & Bulk Printing Here .!</h5>
              <p class="card-text">Fill the fields and tap on print</p>
              <form class="row g-3 needs-validation"  action="template2/" method="post">
                <div class="col-md-4">
                    <label for="validationCustomUsername" class="form-label">Register Number</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">From</span>
                      <input type="text" id="fromregval" name="fromregval" onblur="checkMailStatus()" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                    </div>
                    <div id="validity" style="color:red;">
                      
                      </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustomUsername" class="form-label">Register Number</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">To</span>
                      <input type="text" class="form-control" id="fromregval1" name="fromregval1" onblur="checkMailStatu()" aria-describedby="inputGroupPrepend" required>
                 
                    </div>
                    <div id="validity1" style="color:red;">
                   
                      </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustomUsername" class="form-label">Valid Date</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" name="pdate" id="pdate">Valid up to</span>
                      <input type="date" class="form-control" name="pdate" id="pdate" aria-describedby="inputGroupPrepend" required>
                      <div class="invalid-feedback">
                        Please choose a username.
                      </div>
                    </div>
                </div>
                <div class="col-12">
                <button type="submit" name="submit" class="btn btn-success" id="submit"><i class="fa fa-print" aria-hidden="true"></i>&nbsp; Print</button>
                </div>
              </form>
            </div>
          </div>
        </div>
       
      
     
      </div>
  </div>
<!-- printing end -->

            </div>
        </div>
    </section>
  
    <script src="./js/main.js"></script>
    <script type="text/javascript">
 
$(document).ready(function (e){
$("#uploadForm").on('submit',(function(e){ e.preventDefault();
$.ajax({
url: "action.php",
type: "POST",
data: new FormData(this),
contentType: false, cache: false, processData:false,
success: function(data){
  
  $("#alert_success").show("slow").delay(2000).hide("slow");
  $("#uploadForm")[0].reset();
},
error: function(){}
});
}));
});
</script>
<script>
$(document).ready(function(){
  $('#import_excel_form').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"excel_import/import.php",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      beforeSend:function(){
        $('#import').attr('disabled', 'disabled');
        $('#import').val('Importing...');
      },
      success:function(data)
      {
        $('#message').html(data);
        $("#message").show("slow").delay(2000).hide("slow");
        $('#import_excel_form')[0].reset();
        $('#import').attr('disabled', false);
        $('#import').val('Import');
      }
    })
  });
});
</script>
<script type="text/javascript">
function checkMailStatus(){
    //alert("came");
var fromregval=$("#fromregval").val();// value in field email
$.ajax({
    type:'post',
        url:'checkreg.php',// put your real file name 
        data:{fromregval: fromregval},
        success:function(msg){
        $("#validity").html(msg);// your message will come here.     
        }
 });
}

</script>
<script type="text/javascript">
function checkMailStatu(){
    //alert("came");
var fromregval1=$("#fromregval1").val();// value in field email
$.ajax({
    type:'post',
        url:'checkreg1.php',// put your real file name 
        data:{fromregval1: fromregval1},
        success:function(msg){
        $("#validity1").html(msg);// your message will come here.     
        }
 });
}

</script>
<script>
function lettersOnly() 
{
            var charCode = event.keyCode;

            if ((charCode > 64 && charCode < 91)  || charCode == 8 || charCode == 32)

                return true;
            else
                return false;
}
function lettersOnly1() 
{
            var charCode = event.keyCode;

            if ((charCode > 64 && charCode < 91)  || (charCode > 47 && charCode < 58) )

                return true;
            else
                return false;
}
function numbersOnly() 
{
            var charCode = event.keyCode;

            if (charCode > 47 && charCode < 58)

                return true;
            else
                return false;
}
</script>
<footer style="color:white;"> <small>&copy; Copyright  <script>document.write(new Date().getFullYear())</script> <a href="http://ratstechnologies.com" class="rats">RATS TECHNOLOGIES</a> , All Rights Reserved</small> </footer> 
</body>
</html>