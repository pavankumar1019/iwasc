<html>
 <head>
  <title>Digital ID-card generator</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />

  <style>
   body
   {
    margin:0;
    padding:0;
    background-color:#f1f1f1;
   }
   .box
   {
    width:1270px;
    padding:20px;
    background-color:#fff;
    border:1px solid black;
    border-radius:5px;
    margin-top:25px;
   }

      footer{
  position: absolute;
  left: 50%;
  top:100%;
  transform: translate(-50%, -50%);
}

  </style>
 </head>
 <body>
  <div class="container box">
   <h1 align="center">Digital ID-card generator system</h1>
   <h2 align="center">Report</h2>
   <br />
   <div align="center"> <a class="back" style="font-size:40px;"  href="../"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a></div>
   <br/>
   <div class="table-responsive">
    <br />
    <div align="right">
     <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info  btn-lg">Register Student</button>
    </div>
    <br /><br />
    <table id="user_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th width="10%">Image</th>
       <th width="35%">Full Name</th>
       <th width="35%">Register number</th>
       <th width="35%">Mobile Number</th>
       <th width="35%">Course </th>
       <th width="35%">Blood Group </th>
       <th width="35%">DOB</th>
       <th width="35%">address</th>
       <th width="10%">Edit</th>
       <th width="10%">Delete</th>
      </tr>
     </thead>
    </table>
    
   </div>
  </div>
<div align="center">&copy; Copyright  <script>document.write(new Date().getFullYear())</script> PAVAK KUMAR .S, All Rights Reserved</div>
 </body>
</html>

<div id="userModal" class="modal fade">
 <div class="modal-dialog">
  <form method="post" id="user_form" enctype="multipart/form-data">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Add User</h4>
    </div>
    <div class="modal-body">
     <label>Full Name</label>
     <input type="text" name="full_name"  onkeypress="return lettersOnly(event)" id="full_name" class="form-control" required/>
     <br />
     <label>Register Number</label>
     <input type="text" name="reg_number"  onkeypress="return lettersOnly1(event)" id="reg_number" class="form-control" required/>
  
     <br />
     <label>phone</label>
     <input type="number" name="phone" id="phone" class="form-control" required/>
   
     <br />
     <label>course </label>
     <select type="text" name="course" id="course" class="form-control" required>
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
     <br />
     <label>Blood Group </label>
     <select  type="text" name="blood_group" id="blood_group" class="form-control" required>
                    <option selected disabled value="">Choose...</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="OB+">OB-</option>
                  </select>
     <br />
     <label>DOB</label>
     <input type="date" name="dob" id="dob" class="form-control" required/>
     <br />
     <br />
     <label>Address</label>
     <textarea  name="address" id="address" class="form-control" required></textarea>
     <br />
     <label>Select User Image</label>
     <input type="file" name="user_image" id="user_image" />
     <span id="user_uploaded_image" ></span>
    </div>
    <div class="modal-footer">
     <input type="hidden" name="user_id" id="user_id" />
     <input type="hidden" name="operation" id="operation" />
     <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
   </div>
  </form>
 </div>
</div>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 $('#add_button').click(function(){
  $('#user_form')[0].reset();
  $('.modal-title').text("Add User");
  $('#action').val("Add");
  $('#operation').val("Add");
  $('#user_uploaded_image').html('');
 });
 
 var dataTable = $('#user_data').DataTable({
  "processing":true,
  "serverSide":true,
  "order":[],
  "ajax":{
   url:"fetch.php",
   type:"POST"
  },
  "columnDefs":[
   {
    "targets":[0, 3, 4],
    "orderable":false,
   },
  ],

 });

 $(document).on('submit', '#user_form', function(event){
  event.preventDefault();
  var firstName = $('#full_name').val();
  var lastName = $('#reg_number').val();
  var extension = $('#user_image').val().split('.').pop().toLowerCase();
  if(extension != '')
  {
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    alert("Invalid Image File");
    $('#user_image').val('');
    return false;
   }
  } 
  if(firstName != '' && lastName != '')
  {
   $.ajax({
    url:"insert.php",
    method:'POST',
    data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data)
    {
     alert(data);
     $('#user_form')[0].reset();
     $('#userModal').modal('hide');
     dataTable.ajax.reload();
    }
   });
  }
  else
  {
   alert("All Fields are Required");
  }
 });
 
 $(document).on('click', '.update', function(){
  var user_id = $(this).attr("id");
  $.ajax({
   url:"fetch_single.php",
   method:"POST",
   data:{user_id:user_id},
   dataType:"json",
   success:function(data)
   {
    $('#userModal').modal('show');
    $('#full_name').val(data.full_name);
    $('#reg_number').val(data.reg_number);
    $('#phone').val(data.phone);
    $('#course').append('<option value='+data.course+' selected>'+data.course+'</option>');
    $('#blood_group').append('<option value='+data.blood_group+' selected>'+data.blood_group+'</option>');
    $('#dob').val(data.dob);
    $('#address').val(data.address);
    $('.modal-title').text("Edit User");
    $('#user_id').val(user_id);
    $('#user_uploaded_image').html(data.user_image);
    $('#action').val("Edit");
    $('#operation').val("Edit");
   }
  })
 });
 
 $(document).on('click', '.delete', function(){
  var user_id = $(this).attr("id");
  if(confirm("Are you sure you want to delete this?"))
  {
   $.ajax({
    url:"delete.php",
    method:"POST",
    data:{user_id:user_id},
    success:function(data)
    {
     alert(data);
     dataTable.ajax.reload();
    }
   });
  }
  else
  {
   return false; 
  }
 });
 
 
});
</script>
<script>
function lettersOnly() 
{
            var charCode = event.keyCode;

            if ((charCode > 64 && charCode < 91)  || charCode == 8 || charCode == 32)

                return true;
            else
               
                alert("Only A-Z are allowed");
                return false;
}
function lettersOnly1() 
{
            var charCode = event.keyCode;

            if ((charCode > 64 && charCode < 91)  || (charCode > 47 && charCode < 58) )

                return true;
            else
               
                alert("Only A-Z,0-1 are allowed");
                return false;
}
</script>

