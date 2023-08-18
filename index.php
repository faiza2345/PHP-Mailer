<?php
include('smtp/PHPMailerAutoload.php');
$html='This Email is sent from the PHP-Mailer,<br> Do not reply this email.';
echo smtp_mailer('faizanrehmanje@gmail.com','subject',$html);
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer();
	// $mail->SMTPDebug  = true;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPDebug = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "jokerjokerdotjoker@gmail.com";
	$mail->Password = "dceayytkeiyjfdli";
	$mail->SetFrom("jokerjokerdotjoker@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		return 'Email Sent!';
	}
}
?>