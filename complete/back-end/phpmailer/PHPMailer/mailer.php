<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'src/Exception.php';
    require 'src/PHPMailer.php';
    require 'src/SMTP.php';

    class Mailer{

        public $smtp;
        public $debug = "true"; // enable this true if u have error while sending email;
        public $fromEmail;
        public $fromName;
        public $fromPassword;
        public $toEmail;
        public $toName;
        public $subject;
        public $bodyHTML;
        public $bodyText;
        private $result = array();

        public function sendMail(){
            $mailer["sentMail"] = array();
            $mail = new PHPMailer(true);
            try {
                //Server settings
                if($this->debug=="true"){
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                }
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = $this->smtp;                      //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = $this->fromEmail;                     //SMTP username
                $mail->Password   = $this->fromPassword;                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom($this->fromEmail, $this->fromName);
                $mail->addAddress($this->toEmail);

                $mail->addReplyTo($this->toEmail, $this->toName);
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                $mail->isHTML(true); // sent email from html formate
                $mail->Subject = $this->subject;
                $mail->Body    = $this->bodyHTML;
                $mail->AltBody = $this->bodyText;
                if($mail->send()){
                    // array_push($mailer, array("message"=>"mail sent", "status"=>1));
                    return true;
                }else {
                    array_push($mailer, array("message"=>"mail could not sent", "status"=>3));
                }
            } catch (Exception $e) {
                array_push($mailer, "Mail could not sent - Error : {$mail->ErrorInfo}");
            }
            array_push($this->result, $mailer);
        }

        public function getResult(){
            $val = $this->result;
            $this->result = array();
            return json_encode($val, JSON_PRETTY_PRINT);
        }
    }
?>
