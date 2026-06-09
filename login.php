<?php
$conn = new mysqli( "localhost", "root", "", "Users" );

$email = $_POST["email"];

$password = $_POST["password"];

$stmt = $conn->prepare( "SELECT password FROM users WHERE email=?" );

$stmt->bind_param("s", $email);

$stmt->execute();

$result = $stmt->get_result();

if( $result->num_rows==1){ $row= $result->fetch_assoc();

if( password_verify( $password, $row["password"])){
echo "Login Successful";
}

else{
echo "Account not found";
}}

else{
echo "Account not found";
}

$conn =
new mysqli( "localhost","root","","Users");
$email =$_POST["email"];

$otp =rand(100000, 999999);

$expiry = date( "Y-m-d H:i:s", strtotime( "+20 minutes"));
$stmt = $conn->prepare( "UPDATE users SET otp_code=?, otp_expiry=? WHERE email=?" );

$stmt->bind_param( "sss", $otp, $expiry, $email );

$stmt->execute();

echo "OTP Generated";
$newPassword =
password_hash(

$_POST["password"],

PASSWORD_DEFAULT

);

$stmt = $conn->prepare( "UPDATE users SET password=?, otp_code=NULL, otp_expiry=NULL WHERE email=?"
);

$stmt->bind_param( "ss", $newPassword, $email
);
$stmt->execute();
?>