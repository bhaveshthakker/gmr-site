<?php
require_once('PHPMailer/class.phpmailer.php');
function phpMailerSend($relative_url, $act_key, $email_addr, $firstname, $template, $subject) {
	
	//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

	$url = $_SERVER['HTTP_HOST'].$relative_url;
	$mail = new PHPMailer();

	$body = file_get_contents($template); 
	$body = eregi_replace("[\]",'',$body);
	$body = str_replace('%FIRST_NAME%', $firstname, $body);
	$body = str_replace('%ACT_URL%', $url.$act_key, $body);

	$mail->IsSMTP(); // telling the class to use SMTP
	$mail->Host       = "mail.getmereferred.com"; // SMTP server
	//$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
	                                           // 1 = errors and messages
	                                           // 2 = messages only
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->Host       = "mail.getmereferred.com"; // sets the SMTP server
	//$mail->Port       = 25;                    // set the SMTP port for the GMAIL server
	$mail->Username   = "mail@getmereferred.com"; // SMTP account username
	$mail->Password   = "Admin123!";        // SMTP account password

	$mail->From = 'mail@getmereferred.com';
	$mail->FromName =  'Get Me Referred';
	$mail->addAddress($email_addr, $firstname.' '.$lastname);
	$mail->addBCC('malav@getmereferred.com');
	$mail->addBCC('bhavesh@getmereferred.com');
	$mail->addReplyTo("malav@getmereferred.com","GMR Admin");
	
	$mail->Subject = $subject; // "Thanks for registering!";
	$mail->Body = $body;
	//$mail->AltBody = "We will soon come here with the activation link, once we do that, you activate and register yoursel, till then, THANK YOU";
	$mail->isHTML(true);

	//$mail->AddAttachment("img/portrait-3.jpg");      // attachment
	//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

		if(!$mail->Send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
			return false;
		} else {
			echo "Message sent!";
			return true;
		}
	}
	?>