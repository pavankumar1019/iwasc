
$(document).ready(function(){
  $("#hamburger_close").click(function(){
    $(".side_bar").animate({width: '0px'});
    $(this).hide();
  });
  $("#stud_btn").click(function(){

    $(".student").show();
    $(".dashboard").hide();
  });
  $("#bulk").click(function(){

    $(".bulk").show();
    $(".dashboard").hide();
    $(".student").hide();
  });
  $("#print").click(function(){

    $(".print").show();
    $(".dashboard").hide();
    $(".bulk").hide();
    $(".student").hide();
  });
  $("#report").click(function(){
    $(".report").show();
    $(".dashboard").hide();
    $(".print").hide();
    $(".bulk").hide();
    $(".student").hide();
  });
  $("#report").click(function(){
    window.location.href = "./crud_operations/";
  });

  $(".card").mouseover(function(){
    $(this).addClass('bg-success');
  });
  $(".card").mouseleave(function(){
    $(this).removeClass('bg-success');
  });
});


function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
  }
  
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "#2D2926FF";
  }


// insert into data base studens induvidual data
//  $(document).on('submit', '#user_form', function(event){
//   event.preventDefault();
//   var firstName = $('#full_name').val();
//   var regnumber = $('#reg_number').val();
//   var phone = $('#phone').val();
//   var course = $('#course').val();
//   var blood_group = $('#blood_group').val();
//   var dob = $('#dob').val();
//   var address = $('#address').val();
//   var extension = $('#user_image').val().split('.').pop().toLowerCase();
//   if(extension != '')
//   {
//    if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
//    {
//     alert("Invalid Image File");
//     $('#user_image').val('');
//     return false;
//    }
//   } 
//   if(firstName != '' || regnumber != '' || phone != '' || course != ''|| blood_group != '' || dob != '' || address != ''    )
//   {
//    $.ajax({
//     url:"./crud_operations/insert.php",
//     method:'POST',
//     data:new FormData(this),
//     contentType:false,
//     processData:false,
//     success:function(data)
//     {
//      alert(data);
//     }
//    });
//   }
//   else
//   {
//    alert("All Fields are Required");
//   }
//  });   