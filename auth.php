<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="./style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
  
</style>
<script>
$(document).ready(function(){

    $("#img1").animate({width: "300px"},
    2000, function() {
       $('.img').hide(2000,
        function() {
            $("#div3").fadeIn(3000);
       $("#div3").fadeOut(3000,
       function() {
       $('#form').show();
       }
       );
        }
       );
    }
    );

});
</script>
</head>
<body>
     <form   action="login.php" method="post">
         <h2 id="div3" style="display:none;color:black;">Digital ID-card generator...</h2>
    <div class="img" align="center"><img src="rats.png" id="img1" alt="" srcset=""></div>
     <div id="form" style="display:none"> <h2><i class="fa fa-sign-in" aria-hidden="true"></i>
&nbsp;LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>U_ID</label>
     	<input type="text" name="uname" placeholder="User Name"><br>

     	<label>Key</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit">Login</button> </div>
     	
     </form>
     <footer style="color:white;"> <small>&copy; Copyright  <script>document.write(new Date().getFullYear())</script> <a  class="foot" href="http://ratstechnologies.com">RATS TECHNOLOGIES</a> , All Rights Reserved</small> </footer> 
</body>
</html>