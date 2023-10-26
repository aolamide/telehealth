<?php
//App::import('Vendor', 'PhpMailer', array('file' => 'phpmailer' . DS . 'class.phpmailer.php'));

App::import('Vendor', 'PhpMailer', array('file' => 'PhpMailer' . DS . 'class.phpmailer.php'));
//require_once("../Vendor/PhpMailer/class.phpmailer.php");
/*
    Depends on "unhtml"
*/
class PhpMailerEmailComponent extends Component
{
        // phpmailer
	var $Mailer = 'sendmail'; // choose 'sendmail', 'mail', 'smtp'
	var $unhtml_bin = '/usr/bin/unhtml';
	 
    var $smtpserver    =  "mail.yourdomain.com";
	/*
	var $host          =  "smtp.gmail.com";
	var $SMTPDebug     =  1;
	var $mailPort      =  465;
	var $mail_username =  "debiprasad.sahoo@navsoft.in";
	var $mail_password =  'zxcvbnm!@'; 
	*/
	
	/*var $host          =  "";
	var $SMTPDebug     =  "";
	var $mailPort      =  "";
	var $mail_username =  "";
	var $mail_password =  '';*/ 
	
	var $host          =  "ssl://smtp.gmail.com";
	var $SMTPDebug     =  "";
	var $mailPort      =  "465";
	var $mail_username =  "singkishor@gmail.com";
	var $mail_password =  'prativasing';
	//var $mail_set_from =  FROMEMAIL;
	//var $mail_reply_to =  FROMEMAIL;
          
	
	function send_mail($mailTo, $mailToName, $subject, $body, $from,$filename=null,$bounce=null)
	{
		$successmail=false;
		$mailTitle = "Newsletter";
		$mailBodyContent='';
			 
		$headers  = "MIME-Version: 1.0\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\n";
		//$headers .= "From: info@performanceathletes.com <info@performanceathletes.com>\n";
		$headers .= "Return-Path: ".$bounce."<".$bounce.">"."\n";
		
		$mail             = new PHPMailer();

		$body             = $body;
		$body             = eregi_replace("[\]",'',$body);
		// 			$body             ;die();
		$mail->IsSMTP(); // telling the class to use SMTP
		$mail->Host       = $this->smtpserver; // SMTP server
		$mail->SMTPDebug  = $this->SMTPDebug; 
		// enables SMTP debug information (for testing)
	   // 1 = errors and messages
       // 2 = messages only
		$mail->SMTPAuth   = true;
		// enable SMTP authentication
		$mail->SMTPSecure = "ssl";  
		// sets the prefix to the servier
		$mail->Host       = $this->host;
		// sets GMAIL as the SMTP server
		$mail->Port       = $this->mailPort;  
		// set the SMTP port for the GMAIL server
		$mail->Username   = $this->mail_username; 
		// GMAIL username
		$mail->Password   = $this->mail_password; 
		// GMAIL password
		
		$mail->SetFrom($this->mail_set_from, $from);
		
		$mail->AddReplyTo($this->mail_reply_to, $from);
		
		$mail->Subject    = $subject;
  if(isset($filename[1])){
		for($i=0; $i < count($filename[1]); $i++){
		$mail->AddAttachment($filename[0].$filename[1][$i],$filename[1][$i]);
		 }
	}
		$mail->AltBody    = "Akamido.To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
		
		$mail->MsgHTML($body);
		$mail->IsHTML(true);
		
		$mail->AddAddress($mailTo, $mailToName);
		//$mail->AddCC(FROMEMAIL, "poorvi"); // check the mailing functionality.
		
		$mail->CharSet="windows-1251";
		
		$mail->CharSet="utf-8";
		
		$mail->Send();
	}
}
?>