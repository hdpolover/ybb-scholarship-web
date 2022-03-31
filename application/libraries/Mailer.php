<?php defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer{
  
  public function __construct(){
    log_message('Debug', 'PHPMailer class is loaded.');
    $this->_ci = &get_instance();
    $this->_ci->load->database();
  }
  
  public function get_data($param){
    $query = $this->_ci->db->query("SELECT a.VALUE FROM tb_pengaturan a WHERE a.KEY = '$param'");
    return $query->row()->VALUE;
  }
  
  public function send($data){
    // Include PHPMailer library files
    require_once APPPATH.'third_party/PHPMailer/Exception.php';
    require_once APPPATH.'third_party/PHPMailer/PHPMailer.php';
    require_once APPPATH.'third_party/PHPMailer/SMTP.php';
    
    $mail = new PHPMailer(true);
    
    // SMTP configuration
    if ($this->get_data("MAILER_SMPT") == true) {
      $mail->isSMTP();
    }
    try {
      $mail->SMTPDebug  = $this->get_data("MAILER_DEBUG");
      
      // SMTP configuration
      if ($this->get_data("MAILER_SMPT") == true) {
        $mail->SMTPAuth   = TRUE;
      }
      $mail->SMTPOptions = array(
        'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
          )
        );
        
        $mail->SMTPSecure = "ssl";
        $mail->Port       = $this->get_data("MAILER_PORT");
        $mail->Host       = $this->get_data("MAILER_HOST");
        $mail->Username   = $this->get_data("MAILER_USERNAME");
        $mail->Password   = $this->get_data("MAILER_PASSWORD");
        
        $mail->setFrom($this->get_data("MAILER_USERNAME"), $this->get_data("MAILER_ALIAS"));
        $mail->addReplyTo($this->get_data("MAILER_USERNAME"), $this->get_data("MAILER_ALIAS"));
        
        // Add a recipient
        $mail->addAddress($data['to']);
        
        // Email subject
        $mail->Subject = $data['subject'];
        
        // Set email format to HTML
        $mail->isHTML(true);
        // Email body content
        $mail->Body = $this->body_html($data['message']);
        
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
        $mail->clearAddresses();
        $mail->clearAttachments();
      } catch (Exception $e) {
        echo 'Message could not be sent. <br>';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        echo '<br>Contact ADMIN ';
        die();
      }
    }
      
      function body_html($message){
        return '
        <html>
        
        <head>
        <title>APTISI Wilayah VII JATIM</title>
        </head>
        
        <body style="
        font-family: -webkit-pictograph;
        color: #333333;
        font-size: 16px;
        background:#EEEEEE;">
        <div style="margin: 0 auto 0 auto; width: 560px;">
        <div style="padding-top: 55px; text-align : center;">
        <div style="font-weight: 700;font-size: 32px;">
        <span style="font-size: 32px; ">APTISI VII JATIM</span>
        </div>
        </div>
        <div style="background: white">
        <main><div style="margin-top: 32px;">
        <div style="height: 12px; background: #C04239;"></div>
        <div style="margin: 32px 56px 0 56px">
        <div>
        <span style="font-size: 16px;">
        '.$message.'
        <br><br><br>
        <span class="text-muted">Regards,<br>APTISI VII JATIM</span>
        </span>
        </div>
        </div>
        </div>
        
        </main>
        <hr style="
        width: 513px; 
        margin-top: 34px;
        border-top: 1px solid #cecece; 
        border-bottom: none;" />
        <div>
        <div style="margin: 32px 56px 0 56px">
        <div style="margin-top: 32px">
        <img style="margin: auto;display: block;" src="https://i.ibb.co/zV1JGjd/aptisi.png" width="75px" height="auto" alt="APTISI VII JATIM logo">
        <div style="text-align: center; font-size: 10px; margin-top:10px">APTISI VII JATIM 2021</div>
        </div>
        </div>
        </div>
        <hr style="border-top: 1px dashed #CECECE; margin-top: 24px; border-bottom: none;">
        <div style="margin-top: 13px; text-align : center; font-size:10px;">This email has been generated
        automatically, please do not reply.</div>
        <div style="height: 12px; background: #C04239; margin-top:10px;"></div>
        </div>
        <br>
        <br>
        </body>
        ';
      }
      
    }
