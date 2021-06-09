<!DOCTYPE html>
<html>
<head>
	<title>Forgot password</title>
	<!--<link rel="stylesheet" type="text/css" href="stylelogin.css">-->
	<style>
	body {
  margin: 0;
  background-color: rgba(201, 76, 76, 0.3);
  font-family: Arial, Helvetica, sans-serif;
}
nav ul {
	display: inline;
	padding: 0px;
	float: right;
}

nav ul li{
	display: inline-block;
	list-style-type: none;
	color: white;
	float: left;
	margin-left: 12px;
	

}

nav ul li a{
	color: white;
	text-decoration: none;	
}


nav ul ul{
	display: none;
	position: absolute;
}


.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: blue;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
header h1{
	display: inline;
	font-family: 'Lobster', cursive;
	font-weight: 400;
	font-size: 32px;
	float: left;
	color: white;
	margin-top: 0px;
	margin-right: 10px;
}
.loginbox{
    width: 450px;
    height: 500px;
    background: #92a8d1;
    color: coral;
    top: 60%;
    left: 50%;
    position: absolute;
    transform: translate(-50%,-50%);
    box-sizing: border-box;
    padding: 70px 30px;
}

.avatar{
    width: 100px;
    height: 100px;
    border-radius: 70%;
    position: absolute;
    top: -50px;
    left: calc(50% - 50px);
}

h1{
    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 22px;
}

.loginbox p{
    margin: 0;
    padding: 0;
    font-weight: bold;
}

.loginbox input{
    width: 100%;
    margin-bottom: 20px;
}

.loginbox input[type="text"], input[type="password"]
{
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;
}
.loginbox input[type="submit"]
{
    border: none;
    outline: none;
    height: 40px;
    background: #fb2525;
    color: #fff;
    font-size: 18px;
    border-radius: 20px;
}
.loginbox input[type="submit"]:hover
{
    cursor: pointer;
    background: #ffc107;
    color: #000;
}
.loginbox a{
    text-decoration: none;
    font-size: 15px;
    line-height: 35px;
	
}

.loginbox a:hover
{
    color: #ffc107;
}
fg{

}
</style>

</head>


	<?php 
	if(isset($_POST['sendmail'])) {
	require_once ('process\dbh.php');
	$email=$_POST['mailuid'];
	$sql = "SELECT * from `alogin` WHERE email = '$email'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) == 1){
	
	
			require 'PHPMailerAutoload.php';
			require 'credential.php';

			$mail = new PHPMailer();

			 //$mail->SMTPDebug = 4;                               // Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = "xyzcorporation7@gmail.com";                 // SMTP username
			$mail->Password = PASS;                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			$mail->setFrom(EMAIL, 'ADMIN');
			$mail->addAddress($email);     // Add a recipient

			$mail->addReplyTo(EMAIL);
			$mail->isHTML(true);                                  // Set email format to HTML

			$sqlid = "SELECT password from `alogin` WHERE email = '$email'";
			$id = mysqli_query($conn , $sqlid);
			$employee = mysqli_fetch_array($id);
			$emppas =($employee['password']);
			$mail->Subject = password;
			$mail->Body   = $emppas;

			if(!$mail->send()) {
			    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Message could not be sent.please try again later').
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
			} else {
			    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Message has been sent.')
    window.location.href='alogin.html';
    </SCRIPT>");
			}
			
		}
	else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Invalid Email or email is not registered')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}
	
}
		
	 ?>
	<div class="divider"></div>

	<div class="loginbox">
    <img src="assets/admin.png" class="avatar">
        <h1>Enter your email Here</h1>
        <form action="amail.php" method="POST">
            <p>Email</p>
			<input type="text" name="mailuid" id="email" placeholder="Enter Email Address" required="required">
            <input type="submit" name="sendmail" value="send">
        </form>
    </div>
			
</body>
</html>
