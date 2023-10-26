<?php
session_start();
$con=mysqli_connect('localhost','root','','clothingstore');
$newsemail=$_POST['email'];
$res=mysqli_query($con,"select * from user where email='$newsemail'");
$count=mysqli_num_rows($res);
$html="Welcome You have Subscribed to Our NewsLetter. Stay tuned for regular Updates <br>";
$_SESSION['EMAIL']=$email;
	smtp_mailer($email,'NewsLetter',$html);
	echo "yes";

function smtp_mailer($to,$subject, $msg){
	require_once("smtp/class.phpmailer.php");
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPDebug = 1; 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'TLS'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "gala.ps@somaiya.edu";
	$mail->Password = "(parth6703)";
	$mail->SetFrom("gala.ps@somaiya.edu");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	if(!$mail->Send()){
		return 0;
	}else{
		return 1;
	}
}
?>