<?php


class Sendmail
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function get($email, $subject, $message, $file)
    {
        // $mail = $this->ci->phpmailer_lib->load();
        // // SMTP configuration
        // $mail->isSMTP();
        // $mail->Host     = 'smtp.gmail.com';
        // $mail->SMTPAuth = true;
        // $mail->Username = 'alfredobisma4@gmail.com';
        // $mail->Password = 'gimanabro';
        // $mail->SMTPSecure = 'tls';
        // $mail->Port     = 587;

        // $mail->setFrom('alfredobisma4@gmail.com', 'It Dev AES');
        // $mail->addReplyTo('alfredobisma4@gmail.com', 'It Dev AES');

        // // email tujuan mu
        // $mail->addAddress($email);
        // $mail->AddAttachment($file);
        // $mail->Subject = $subject;
        // $mail->Body = $message;

        // if(!$mail->send()){
        //     return true;
        // }else{
        //     return false;
        // }

        // return false;

        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'alfredobisma4@gmail.com',  // Email gmail
            'smtp_pass'   => 'gimanabro',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        $this->ci->load->library('email', $config);

        // Email dan nama pengirim
        $this->ci->email->from('alfredobisma4@gmail.com', 'alfredobisma4');

        // Email penerima
        $this->ci->email->to($email); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        $this->ci->email->attach($file);

        // Subject email
        $this->ci->email->subject($subject);

        // Isi email
        $this->ci->email->message($message);

        // Tampilkan pesan sukses atau error
        if ($this->ci->email->send()) {
            return true;
            
        } else {
            return false;
            
        }

        
        return false;
    }
}
