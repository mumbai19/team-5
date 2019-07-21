<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$message;
$subject;
$email;
if(isset($_POST['subject']))
{
$subject = $_POST['subject'];
}

if(isset($_POST['msg']))
{
$msg = $_POST['msg'];
}

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "uploads/".$_FILES['fileToUpload']['name'])) {
        $url =  "http://{$_SERVER['HTTP_HOST']}:80/jpmc12/team-5/ecommdevang/EcommerceSitePHP/ecommerce/uploads/".$_FILES['fileToUpload']['name'];
        echo $url;




      echo "Uploaded successfully";
   } else {
      echo "Upload failed!";
   }
}

?>

<?php


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

            
            $mail->AddAddress('','Name');
            


            //$mail->addAddress($storeArray,'fdgfgr');     // Add a recipient
            $mail->addReplyTo('info@example.com', 'Information');

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = "This is the body in plain text for non-HTML mail clients $url msg";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients $url';

            $mail->send();
            header('location:index.php');
            alert('sent mail successfully');
        } catch (Exception $e) {
            echo "Error: {$mail->ErrorInfo}";
        }
        exit();
}

?>
<!--  ------------------------------------------------------------------------------------ -->
