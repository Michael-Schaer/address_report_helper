<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class MailController{
	var $persons;
	var $ini;
	var $log;

	function __construct($log, $persons)
	{
		$this->ini = parse_ini_file(__DIR__.'/../config/app.ini');
		$this->log = $log;
		$this->persons = $persons;
	}

	function send($to, $subject, $body){
		$mail = new PHPMailer(false);
		$mail->CharSet = 'UTF-8';
		try {
			//Server settings
			$mail->SMTPDebug = 0;                                 // Enable verbose debug output
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = $GLOBALS['smtp-config']['host'];        // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = $GLOBALS['smtp-config']['username'];// SMTP username
			$mail->Password = $GLOBALS['smtp-config']['password'];// SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			//Custom connection options
			//Note that these settings are INSECURE
			$mail->SMTPOptions = array(
				'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
				),
			);
			$mail->Port = $GLOBALS['smtp-config']['port'];                                    // TCP port to connect to
			//Recipients
			$mail->setFrom('ecamp@pfadiluzern.ch', 'eCamp');
			$mail->addAddress($to);     // Add a recipient
			//Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = $subject;
			$mail->Body    = $body;
			$mail->AltBody = $body;
			$mail->send();
		} catch (Exception $e) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		}
	}
}
