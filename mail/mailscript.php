<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_STRICT);
	ini_set('display_errors', 1);
	include "classes/class.phpmailer.php";

if(isset($_POST['Send'])) {
	$username = $_POST['name'];
    $emails = $_POST['email']; 
    $phonenumber = $_POST['phonenumber'];
    $comments = $_POST['mind']; 

	//Receiver Info
	$email = "#";
	$name = "#";
	
	//Sender Info
	$sender_name = " ";
	$sender_email = " ";
	$sender_password = " ";
	
	$mail_subject = "Hello";
	$message = "<html><body><table style='border-collapse: collapse; border-spacing: 0; border-color:#202c62; display: inline-block;'><tr><td style='border:1px solid #202c62; padding:5px;'>Name :</td><td style='border:1px solid #202c62; padding:5px;'> " . $username . "</td><tr><td style='border:1px solid #202c62; padding:5px;'> Email : </td><td style='border:1px solid #202c62; padding:5px;'>" . $emails . "</td></tr><td style='border:1px solid #202c62; padding:5px;'> Phonenumber : </td><td style='border:1px solid #202c62; padding:5px;'>" . $phonenumber . " </td><tr><td style='border:1px solid #202c62; padding:5px;'>Comments : </td><td style='border:1px solid #202c62; padding:5px;'>" . $comments . "</td><tr></table></body></html>";
	
	}

	$mail = new PHPMailer;
	$mail->IsSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465;
	$mail->SMTPAuth = true;
	$mail->SMTPDebug = 1;
	$mail->SMTPSecure = "ssl";
	$mail->Username = $sender_email;
	$mail->Password = $sender_password;
	$mail->AddReplyTo($sender_email, $sender_name);
	$mail->SetFrom($sender_email,$sender_name);
	$mail->Subject = $mail_subject;
	$mail->AddAddress($email, $name);
	$mail->MsgHTML($message);
	$send = $mail->Send();
	
	//$mail->AddAttachment("images/phpmailer.gif");      // attachment
	//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment
	if($send) {
	    header("Location: #");
	} else {
		$replay = $mail->ErrorInfo;
	}
	// print_r($replay);
	
?>