<?php

$sname= "localhost";
$unmae= "u815129216_iwasc";
$password = "Iwasc5639";

$db_name = "u815129216_iwasc";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}