
<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {       
        $name = strip_tags(trim($_POST["fullname"]));
        $phone=trim($_POST["mobile"]);    
        if ( empty($name) OR empty($phone) ) {          
            http_response_code(400);
            echo "Oops! There was a problem with your submission. Please complete the form and try again.";
            exit;
        }
    }else{
        http_response_code(400);
        echo "Oops! There was a problem with your submission. Please complete the form and try again.";
        exit;        
    }

require 'PHPMailerAutoload.php';
 
$mail = new PHPMailer;
 
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
// $mail->Username = 'care@cambaytiger.com';                   // SMTP username
// $mail->Password = 'ctcare15#';               // SMTP password
$mail->Username = 'sanket@practicenext.com';                   // SMTP username
$mail->Password = 'a1g2o3g4';            
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
$mail->setFrom('care@cambaytiger.com', 'Team Cambay Tiger');     //Set who the message is to be sent from
//$mail->addReplyTo('labnol@gmail.com', 'First Last');  //Set an alternative reply-to address
//$mail->addAddress('josh@example.net', 'Josh Adams');  // Add a recipient
$mail->addAddress('priyanka.a@west-coast.in');               // Name is optional
$mail->addCC('sidharth.c@west-coast.in, pinkesh.s@west-coast.in, rajesh.s@west-coast.in');
$mail->addBCC('sanket@practicenext.com');
$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->addAttachment('/usr/labnol/file.doc');         // Add attachments
//$mail->addAttachment('/images/image.jpg', 'new.jpg'); // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
 
$mail->Subject = 'New Callback Request Received';
$mail->Body    = 'Hello,<br/><br/>You have received a new call back request from <b>'.$name.'</b> with mobile number <b>'.$phone.'</b><br/><br/>Regards,<br/> Team Cambay Tiger';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($mail->Body , dirname(__FILE__));
 
if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}