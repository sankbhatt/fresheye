
<?php
require 'PHPMailer-master/PHPMailerAutoload.php';
 
$mail = new PHPMailer;
 
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'sanket@practicenext.com';                   // SMTP username
$mail->Password = 'a1g2o3g4';               // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
$mail->setFrom('sanket@practicenext.com', 'Sanket Bhatt');     //Set who the message is to be sent from
$mail->addReplyTo('sanket@practicenext.com', 'Sanket Bhatt');  //Set an alternative reply-to address
$mail->addAddress($_POST['emailid'], $_POST['fullname']);  // Add a recipient
//$mail->addCC('cc@example.com');
$mail->addBCC('sanket@practicenext.com');
$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->addAttachment('/usr/labnol/file.doc');         // Add attachments
//$mail->addAttachment('/images/image.jpg', 'new.jpg'); // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
 
$mail->Subject = 'Welcome to fresh eye';
$mail->Body    = 'Hii '.$_POST['fullname'].", <br/>Thank you for subscribing to FreshEye.<br/>someone from our team would get back to you soon";
$mail->AltBody = 'Hii'.$_POST['fullname'].", <br/>Thank you for subscribing to FreshEye.<br/>someone from our team would get back to you soon";
 
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
 
if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}
 
echo 'Message has been sent';