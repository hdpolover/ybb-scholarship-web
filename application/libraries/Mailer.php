<?php defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer{
  
  public function __construct(){
    log_message('Debug', 'PHPMailer class is loaded.');
    $this->_ci = &get_instance();
    $this->_ci->load->database();
  }
  
  public function send($data){
    // Include PHPMailer library files
    require_once APPPATH.'third_party/PHPMailer/Exception.php';
    require_once APPPATH.'third_party/PHPMailer/PHPMailer.php';
    require_once APPPATH.'third_party/PHPMailer/SMTP.php';
    
    $mail = new PHPMailer(true);

    try {

        // SMTP configuration
        $mail->isSMTP();

        $mail->SMTPOptions = array(
          'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
          )
        );

        // $mail->SMTPDebug      = 1;
        $mail->SMTPAuth       = TRUE;
        $mail->SMTPKeepAlive  = TRUE;
        $mail->SMTPSecure     = "tls";
        $mail->Port           = 587;
        $mail->Host           = "smtp.gmail.com";
        $mail->Username       = "ngodingin.indonesia@gmail.com";
        $mail->Password       = "hxexyuauljnejjmq";
        
        $mail->setFrom("ngodingin.indonesia@gmail.com", "YBB Foundation");
        $mail->addReplyTo("ngodingin.indonesia@gmail.com", "YBB Foundation");
        
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
          <!DOCTYPE HTML
            PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
          <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
            xmlns:o="urn:schemas-microsoft-com:office:office">

          <head>
            <!--[if gte mso 9]>
          <xml>
            <o:OfficeDocumentSettings>
              <o:AllowPNG/>
              <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
          </xml>
          <![endif]-->
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="x-apple-disable-message-reformatting">
            <!--[if !mso]><!-->
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <!--<![endif]-->
            <title></title>

            <style type="text/css">
              @media only screen and (min-width: 570px) {
                .u-row {
                  width: 550px !important;
                }

                .u-row .u-col {
                  vertical-align: top;
                }

                .u-row .u-col-100 {
                  width: 550px !important;
                }

              }

              @media (max-width: 570px) {
                .u-row-container {
                  max-width: 100% !important;
                  padding-left: 0px !important;
                  padding-right: 0px !important;
                }

                .u-row .u-col {
                  min-width: 320px !important;
                  max-width: 100% !important;
                  display: block !important;
                }

                .u-row {
                  width: calc(100% - 40px) !important;
                }

                .u-col {
                  width: 100% !important;
                }

                .u-col>div {
                  margin: 0 auto;
                }
              }

              body {
                margin: 0;
                padding: 0;
              }

              table,
              tr,
              td {
                vertical-align: top;
                border-collapse: collapse;
              }

              p {
                margin: 0;
              }

              .ie-container table,
              .mso-container table {
                table-layout: fixed;
              }

              table,
              td {
                color: #000000;
              }

              a {
                color: #377dff;
                text-decoration: underline;
              }

              @media (max-width: 480px) {
                #u_content_image_1 .v-src-width {
                  width: auto !important;
                }

                #u_content_image_1 .v-src-max-width {
                  max-width: 55% !important;
                }

                #u_content_text_1 .v-container-padding-padding {
                  padding: 30px 30px 30px 20px !important;
                }

                #u_content_button_1 .v-container-padding-padding {
                  padding: 10px 20px !important;
                }

                #u_content_button_1 .v-size-width {
                  width: 100% !important;
                }

                #u_content_button_1 .v-text-align {
                  text-align: left !important;
                }

                #u_content_button_1 .v-padding {
                  padding: 15px 40px !important;
                }

                #u_content_text_3 .v-container-padding-padding {
                  padding: 30px 30px 80px 20px !important;
                }
              }
            </style>



            <!--[if !mso]><!-->
            <link href="https://fonts.googleapis.com/css?family=Cabin:400,700&display=swap" rel="stylesheet" type="text/css">
            <!--<![endif]-->

          </head>

          <body class="clean-body u_body"
            style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #f8f8f8;color: #000000">
            <!--[if IE]><div class="ie-container"><![endif]-->
            <!--[if mso]><div class="mso-container"><![endif]-->
            <table
              style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #f8f8f8;width:100%"
              cellpadding="0" cellspacing="0">
              <tbody>
                <tr style="vertical-align: top">
                  <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #f8f8f8;"><![endif]-->


                    <div class="u-row-container" style="padding: 0px;background-color: #ffffff">
                      <div class="u-row"
                        style="Margin: 0 auto;min-width: 320px;max-width: 550px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                        <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                          <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: #ffffff;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:550px;"><tr style="background-color: #ffffff;"><![endif]-->

                          <!--[if (mso)|(IE)]><td align="center" width="550" style="background-color: #ffffff;width: 550px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                          <div class="u-col u-col-100"
                            style="max-width: 320px;min-width: 550px;display: table-cell;vertical-align: top;">
                            <div style="background-color: #ffffff;width: 100% !important;">
                              <!--[if (!mso)&(!IE)]><!-->
                              <div
                                style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                <!--<![endif]-->

                                <table id="u_content_image_1" style="font-family:Cabin,sans-serif;" role="presentation"
                                  cellpadding="0" cellspacing="0" width="100%" border="0">
                                  <tbody>
                                    <tr>
                                      <td class="v-container-padding-padding"
                                        style="overflow-wrap:break-word;word-break:break-word;padding:30px 10px 33px;font-family:Cabin,sans-serif;"
                                        align="left">

                                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                          <tr>
                                            <td class="v-text-align" style="padding-right: 0px;padding-left: 0px;" align="center">
                                              <a href="' . base_url() . '" target="_blank">
                                                <img align="center" border="0" src="'.base_url().'assets/images/logo.png" alt="Logo" title="Logo"
                                                  style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 55%;max-width: 291.5px;"
                                                  width="291.5" class="v-src-width v-src-max-width" />
                                              </a>
                                            </td>
                                          </tr>
                                        </table>

                                      </td>
                                    </tr>
                                  </tbody>
                                </table>

                                <!--[if (!mso)&(!IE)]><!-->
                              </div>
                              <!--<![endif]-->
                            </div>
                          </div>
                          <!--[if (mso)|(IE)]></td><![endif]-->
                          <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                        </div>
                      </div>
                    </div>



                    <div class="u-row-container" style="padding: 0px;background-color: transparent">
                      <div class="u-row"
                        style="Margin: 0 auto;min-width: 320px;max-width: 550px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                        <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                          <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:550px;"><tr style="background-color: #ffffff;"><![endif]-->

                          <!--[if (mso)|(IE)]><td align="center" width="542" style="background-color: #ffffff;width: 542px;padding: 20px;border-top: 4px solid #ffffff;border-left: 4px solid #ffffff;border-right: 4px solid #ffffff;border-bottom: 4px solid #ffffff;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
                          <div class="u-col u-col-100"
                            style="max-width: 320px;min-width: 550px;display: table-cell;vertical-align: top;">
                            <div
                              style="background-color: #ffffff;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                              <!--[if (!mso)&(!IE)]><!-->
                              <div
                                style="padding: 20px;border-top: 4px solid #ffffff;border-left: 4px solid #ffffff;border-right: 4px solid #ffffff;border-bottom: 4px solid #ffffff;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                <!--<![endif]-->

                                <table id="u_content_text_1" style="font-family:Cabin,sans-serif;" role="presentation"
                                  cellpadding="0" cellspacing="0" width="100%" border="0">
                                  <tbody>
                                    <tr>
                                      <td class="v-container-padding-padding"
                                        style="overflow-wrap:break-word;word-break:break-word;padding:20px 30px 30px 40px;font-family:Cabin,sans-serif;"
                                        align="left">

                                        <div class="v-text-align"
                                          style="color: #333333; line-height: 140%; text-align: left; word-wrap: break-word;">
                                          <p style="font-size: 14px; line-height: 140%;"><span
                                              style="font-family: Cabin, sans-serif; font-size: 14px; line-height: 19.6px;"><strong><span
                                                  style="font-size: 22px; line-height: 30.8px;">Hello!</span></strong></span></p>
                                          <p style="font-size: 14px; line-height: 140%;">&nbsp;</p>
                                          <p style="font-size: 14px; line-height: 140%;"><span
                                              style="font-size: 18px; line-height: 25.2px; font-family: Cabin, sans-serif;">'.$message.'</span></p>
                                        </div>

                                      </td>
                                    </tr>
                                  </tbody>
                                </table>

                                <table id="u_content_text_3" style="font-family:Cabin,sans-serif;" role="presentation"
                                  cellpadding="0" cellspacing="0" width="100%" border="0">
                                  <tbody>
                                    <tr>
                                      <td class="v-container-padding-padding"
                                        style="overflow-wrap:break-word;word-break:break-word;padding:40px 30px 50px 40px;font-family:Cabin,sans-serif;"
                                        align="left">

                                        <div class="v-text-align"
                                          style="color: #333333; line-height: 140%; text-align: left; word-wrap: break-word;">
                                          <p style="font-size: 14px; line-height: 140%;">&nbsp;</p>
                                          <p style="font-size: 14px; line-height: 140%;"><span
                                              style="font-size: 22px; line-height: 30.8px; font-family: Cabin, sans-serif;"><strong><span
                                                  style="line-height: 30.8px; font-size: 22px;">Thanks.</span></strong></span><br /><span
                                              style="font-size: 18px; line-height: 25.2px; font-family: Cabin, sans-serif;">YBB
                                              Foundation</span></p>
                                        </div>

                                      </td>
                                    </tr>
                                  </tbody>
                                </table>

                                <!--[if (!mso)&(!IE)]><!-->
                              </div>
                              <!--<![endif]-->
                            </div>
                          </div>
                          <!--[if (mso)|(IE)]></td><![endif]-->
                          <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                        </div>
                      </div>
                    </div>



                    <div class="u-row-container" style="padding: 10px 0px 20px;background-color: #ffffff">
                      <div class="u-row"
                        style="Margin: 0 auto;min-width: 320px;max-width: 550px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                        <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                          <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 10px 0px 20px;background-color: #ffffff;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:550px;"><tr style="background-color: transparent;"><![endif]-->

                          <!--[if (mso)|(IE)]><td align="center" width="550" style="background-color: #ffffff;width: 550px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
                          <div class="u-col u-col-100"
                            style="max-width: 320px;min-width: 550px;display: table-cell;vertical-align: top;">
                            <div
                              style="background-color: #ffffff;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                              <!--[if (!mso)&(!IE)]><!-->
                              <div
                                style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                <!--<![endif]-->

                                <table style="font-family:Cabin,sans-serif;" role="presentation" cellpadding="0" cellspacing="0"
                                  width="100%" border="0">
                                  <tbody>
                                    <tr>
                                      <td class="v-container-padding-padding"
                                        style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:Cabin,sans-serif;"
                                        align="left">

                                        <h4 class="v-text-align"
                                          style="margin: 0px; line-height: 100%; text-align: center; word-wrap: break-word; font-weight: normal; font-family:Cabin,sans-serif; font-size: 10px;">
                                          This email is generate by our system, please do not reply to this email
                                          directly<br /><br />@YBB Foundation Scholarship supported by Ngodingin Indonesia
                                        </h4>

                                      </td>
                                    </tr>
                                  </tbody>
                                </table>

                                <!--[if (!mso)&(!IE)]><!-->
                              </div>
                              <!--<![endif]-->
                            </div>
                          </div>
                          <!--[if (mso)|(IE)]></td><![endif]-->
                          <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                        </div>
                      </div>
                    </div>


                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </td>
                </tr>
              </tbody>
            </table>
            <!--[if mso]></div><![endif]-->
            <!--[if IE]></div><![endif]-->
          </body>

          </html>
        ';
      }
      
    }
