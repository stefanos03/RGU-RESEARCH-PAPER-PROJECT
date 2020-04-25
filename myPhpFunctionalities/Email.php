<?php
	use PHPMailer\PHPMailer\PHPMailer;
				use PHPMailer\PHPMailer\Exception;

class Email
{

	private $_email;
	private $_firstname;
	private $_lastname;
	private $_fullname;
	private $_password;
	private $_message;
	private $_subject;
	private $_mailbody;
	
//Construct starts

	public function __construct($fields)
	{
	   $this->_email = $fields['email'];
	   $this->_firstname = $fields['firstname'];
	   $this->_lastname = $fields['lastname'];
	   $this->_password = $fields['password'];
	   $this->_fullname = $this->_lastname." ".$this->_firstname;
	   $this->_message = $fields['message'];
	   $this->_subject = $fields['subject'];	
	   


	}

//sendMail to new members 
	public function sendMail($mailcontent)
	{
		    $this->_message = $mailcontent;


				require 'PHPMailer-master/src/Exception.php';
				require 'PHPMailer-master/src/PHPMailer.php';
				require 'PHPMailer-master/src/SMTP.php';




				$mail = new PHPMailer(true);
				try 
				{

				    $mail->SMTPDebug = 1;
				    $mail->isSMTP();
				    $mail->Host = 'smtp.gmail.com';
				    $mail->SMTPAuth = true;
				    $mail->Username = 'stefanoschatz13@gmail.com';
				    $mail->Password = 'panatha';
				    $mail->SMTPSecure = 'tls';
				    $mail->Port = 587;

				    //Recipients
				    $mail->setFrom('rguresearchpaper@mail.com', 'RGU-RESEARCH-PAPER');
				    $mail->addAddress($this->_email, $this->_fullname);     // Add a recipient


                    $mail->IsHTML(true);
                    $mail->AddAddress("bazzytube@gmail.com", "recipient-name");
                    $mail->SetFrom("bazzykhil@gmail.com", "from-name");
                    $mail->AddReplyTo("Bazzytube@gmail.com", "reply-to-name");
                    $mail->AddCC("Charnamdesign@gmail.com", "cc-recipient-name");
                    $mail->Subject = "Test is Test Email sent via Gmail SMTP Server using PHP Mailer";
                    $content = "<b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class.</b>";
                    ob_start();
                    $mail->send();
                    ob_end_clean();
                    echo 'Message has been sent';
                } catch (Exception $e) {

                }

	}


}

?>