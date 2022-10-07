<?php
require_once('../PHPMailer/mailer.php');
// $email = array("tricktips123.sa@gmail.com", "sajid320sa.@gmail.com", "israfil123.sa@gmail.com", "hayat123.sasa@gmail.com");
$email = array(
    array(
        "email"=>"israfil123.sa@gmail.com", 
        "name"=>"Sajid Ali", 
        "subject"=>"MY First Email Subject", 
        "HTMLBody"=>"<h1 style='color:red'> I am love to work </h1>", 
        "TextBody"=>"I am love to work"
    ),
    array(
        "email"=>"tricktips123.sa@gmail.com", 
        "name"=>"Karun Yadav", 
        "subject"=>"MY Second Email Subject", 
        "HTMLBody"=>"<h1 style='color:red'> I am love to work </h1>", 
        "TextBody"=>"I am love to work"
    ),
    array(
        "email"=>"sajid.sa@gmail.com", 
        "name"=>"Ashwani Yadav", 
        "subject"=>"MY Second Email Subject", 
        "HTMLBody"=>"<h1 style='color:red'> I am love to work </h1>", 
        "TextBody"=>"I am love to work"
    ),
);

for($i=0; count($email) > $i; $i++ ){
    $mail = new Mailer();
    $mail-> smtp = "smtp.gmail.com";
    $mail->fromEmail = "Your email";
    $mail->fromPassword = " Your gmail pass";
    $mail->fromName = $email[$i]['name'];
    $mail->toEmail = $email[$i]['email'];;

    $mail->subject = $email[$i]['subject'];;
    $mail->bodyHTML = $email[$i]['HTMLBody'];
    $mail->bodyText = $email[$i]['TextBody'];;
    $mail->sendMail();
    echo $mail->getResult();
}  
?>