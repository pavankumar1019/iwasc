<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: auth.php?error=U_ID is required");
	    exit();
	}else if(empty($pass)){
        header("Location: auth.php?error=Key is required");
	    exit();
	}else{
		$sql = "SELECT * FROM admin WHERE user_name='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: index.php");
		        exit();
            }else{
				header("Location: auth.php?error=Incorect U_ID  or Key");
		        exit();
			}
		}else{
			header("Location: auth.php?error=Incorect  U_ID or Key");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}