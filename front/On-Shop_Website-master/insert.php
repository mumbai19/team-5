<?php

include 'config.php';

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$address = $_POST["address"];
$city = $_POST["city"];
$pin = $_POST["pin"];
$email = $_POST["email"];
$pwd = $_POST["pwd"];
$phone_no = $_POST["phone_no"];

if($mysqli->query("INSERT INTO users (fname, lname, address, city, pin, email, password, phone_no) VALUES('$fname', '$lname', '$address', '$city', $pin, '$email', '$pwd', '$phone_no')")){
	echo 'Data inserted';
	echo '<br/>';
}

header ("location:login.php");

?>
