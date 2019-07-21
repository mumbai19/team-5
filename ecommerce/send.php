<?php 


$email;
if(isset($_POST['email']))
{
$email = $_POST['email'];
}



?>


<!--  ------------------------------------------------------------------------------------ -->

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
// Load Composer's autoloader

if(isset($_POST['submit']))
{
		$mail = new PHPMailer(true);

		try {
		    //Server settings
		    
		    $mail->isSMTP();                                            // Set mailer to use SMTP
		    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		    $mail->Username   = '';                     // SMTP username
		    $mail->Password   = '';                               // SMTP password
		    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
		    $mail->Port       = 587;                                    // TCP port to connect to

		    //Recipients
		    $mail->setFrom('', 'Mailer');

		    
			$mail->AddAddress($email);



		    //$mail->addAddress($storeArray,'fdgfgr');     // Add a recipient
		    $mail->addReplyTo('info@example.com', 'Information');

		    // Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = $subject;
		    $mail->Body    = $message;
		    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		    $mail->send();
		    alert("u have subscribed succefully");
		    echo 'all message has been sent';
		} catch (Exception $e) {
		    echo "Error: {$mail->ErrorInfo}";
		}
		exit();
}

?>
<!--  ------------------------------------------------------------------------------------ -->
