<?php defined('BASEPATH') or exit('No direct script access allowed');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer
{

    public function __construct()
    {
        log_message('Debug', 'PHPMailer class is loaded.');
        $this->_ci = &get_instance();
        $this->_ci->load->database();
    }

    public function send($email, $subject, $message, $file)
    {
        // Include PHPMailer library files
        // require_once APPPATH . 'third_party/PHPMailer/Exception.php';
        // require_once APPPATH . 'third_party/PHPMailer/PHPMailer.php';
        // require_once APPPATH . 'third_party/PHPMailer/SMTP.php';
        //Load Composer's autoloader
        // require 'vendor/autoload.php';

        $mail = new PHPMailer(true);

        // SMTP configuration
        $mail->isSMTP();

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        //$mail->SMTPDebug      = 1;
        $mail->SMTPAuth = true;
        $mail->SMTPKeepAlive = true;
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;
        $mail->Host = "smtp.gmail.com";
        $mail->Username = "alfredobisma4@gmail.com";
        $mail->Password = "gimanabro";

        $mail->setFrom('alfredobisma4@gmail.com', 'alfredobisma4');

        // Add a recipient
        $mail->addAddress($email);

        // Email subject
        $mail->Subject = $subject;

        // Set email format to HTML
        $mail->isHTML(true);
        // Email body content
        $mail->Body = $message;
        $mail->addAttachment('./assets/uploads/encrypt/' . $file);

        // Send email
        if (!$mail->send()) {
            echo 'Message could not be sent. <br>';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            echo '<br>Contact ADMIN ';
            die();
            return false;
        } else {
            return true;
        }
    }
}
