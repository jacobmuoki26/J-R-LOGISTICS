
<?php

$conn =new mysqli( "localhost","root","","Users");

if($conn->connect_error){
die(
"Connection failed: ".$conn->connect_error);
}

$fullname =$_POST["fullname"];
$username =$_POST["username"];
$email =$_POST["email"];
$phoneNumber =$_POST["phoneNumber"];
$password =$_POST["password"];
$confirmPassword =$_POST["confirmPassword"];

if($password != $confirmPassword){
die( "Passwords do not match"); }

$hashedPassword =password_hash($password,PASSWORD_DEFAULT);

$stmt =$conn->prepare(
"INSERT INTO users( fullname,username,email,phoneNumber,password)VALUES(?,?,?,?,?)");

$stmt->bind_param("sssss",$fullname,$username,$email,$phoneNumber,$hashedPassword);

$stmt->execute();
echo "Account Created Successfully";
?>