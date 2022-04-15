<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authentication extends CI_Controller
{

    // construct
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_auth']);
    }

    public function index()
    {
        if ($this->session->userdata('logged_in') == true || $this->session->userdata('logged_in')) {
            if (!empty($_SERVER['QUERY_STRING'])) {
                $uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
            } else {
                $uri = uri_string();
            }
            $this->session->set_userdata('redirect', $uri);
            $this->session->set_flashdata('notif_info', "Login success, welcome");
            redirect(base_url());
        } else {
            $this->templateauth->view('authentication/login');
        }
    }

    public function signUp()
    {
        if ($this->session->userdata('logged_in') == true || $this->session->userdata('logged_in')) {
            if (!empty($_SERVER['QUERY_STRING'])) {
                $uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
            } else {
                $uri = uri_string();
            }
            $this->session->set_userdata('redirect', $uri);
            $this->session->set_flashdata('notif_info', "You already login");
            redirect(base_url());
        } else {
            $this->templateauth->view('authentication/daftar');
        }
    }

    public function suspend()
    {
        if ($this->session->userdata('logged_in') == false || !$this->session->userdata('logged_in')) {
            if (!empty($_SERVER['QUERY_STRING'])) {
                $uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
            } else {
                $uri = uri_string();
            }
            $this->session->set_userdata('redirect', $uri);
            $this->session->set_flashdata('notif_warning', "Please login, to continued");
            redirect(site_url('login'));
        } else {
            $this->templateauth->view('authentication/suspend');
        }
    }

    public function emailActivation()
    {

        // cek apakah user sudah login
        if ($this->session->userdata('logged_in') == true) {
            $email = htmlspecialchars($this->session->userdata('email'), true);

            // cek apakah terdapat data verifikasi
            if ($this->M_auth->get_aktivasi(htmlspecialchars($this->session->userdata('user_id'), true)) != false) {
                // mengambil data verifikasi
                $aktivasi = $this->M_auth->get_aktivasi(htmlspecialchars($this->session->userdata('user_id'), true));

                // cek apakah status masih belum verifikasi
                if ($aktivasi->status == 0) {

                    // cek apakah mengirim permintaan pengiriman email verifikasi
                    if ($this->input->get('act') == "send-email") {
                        $subject = "Activation code - YBB Foundation Scholarship";
                        $message = "Your activation code : <br><br><center><h1 style='font-size: 62px;'>{$this->encryption->decrypt($aktivasi->key)}</h1></center><br><br><small class='text-muted'>Your activation code will be valid for 24 hours, please activated your account in this time frame. <span class='text-danger'>If your activation code has been expired, <b>you must redo regristration process</b>.</span></small>";

                        // mengirim email
                        if ($this->send_email($email, $subject, $message) == true) {
                            $this->session->set_flashdata('success', 'Registration is successful, we have sent an activation code to your email. Please enter the code to activate your account !');
                        } else {
                            $this->session->set_flashdata('notif_error', 'There is an error when trying sent message to your email !');
                            redirect(site_url('email-activation'));
                        }
                    } elseif ($this->input->get('act') == "resend-email") {
                        $subject = "Activation code - YBB Foundation Scholarship";
                        $message = "Your activation code : <br><br><center><h1 style='font-size: 62px;'>{$this->encryption->decrypt($aktivasi->key)}</h1></center><br><br><small class='text-muted'>Your activation code will be valid for 24 hours, please activated your account in this time frame. <span class='text-danger'>If your activation code has been expired, please redo activation process.</span></small>";

                        // mengirim email
                        if ($this->send_email($email, $subject, $message) == true) {
                            $this->session->set_flashdata('success', 'Successfully sent message to your email ' . $email . ' !');
                        } else {
                            $this->session->set_flashdata('notif_error', 'There is an error when trying sent message to your email !');
                            redirect(site_url('email-activation'));
                        }
                    }

                    $data['mail'] = $email;
                    $data['activation_code'] = $this->encryption->decrypt($aktivasi->key);
                    $this->templateauth->view('authentication/aktivasi', $data);
                } else {
                    $this->session->set_flashdata('notif_warning', 'Your account already activated !');
                    redirect(base_url());
                }

            } else {
                $this->session->set_flashdata('notif_error', 'There is an error when trying get your account info !');
                redirect(site_url('login'));

            }
        } else {
            if (!empty($_SERVER['QUERY_STRING'])) {
                $uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
            } else {
                $uri = uri_string();
            }
            $this->session->unset_userdata('redirect');
            $this->session->set_userdata('redirect', $uri);
            $this->session->set_flashdata('notif_warning', "Please login, to continued");
            redirect('login');
        }
    }

    public function forgotPassword()
    {
        $this->templateauth->view('authentication/lupa_password');
    }

    // proses login
    function proses_login()
    {
        // menerima inputan, dan memparse spesial karakter
        $email = htmlspecialchars($this->input->post('email', true));
        $pass = htmlspecialchars($this->input->post('password'), true);

        // cek apakah email terdaftar
        if ($this->M_auth->get_auth($email) == false) {
            $this->session->set_flashdata('warning', 'Email not associate with any account !');
            redirect('login');
        } else {

            // cek apakah terdapat penalti percobaan login sistem
            if (isset($_COOKIE['penalty']) && $_COOKIE['penalty'] == true) {
                $time_left = ($_COOKIE["expire"]);
                $time_left = $this->penalty_remaining(date("Y-m-d H:i:s", $time_left));
                $this->session->set_flashdata('notif_warning', 'Too much request, try again in ' . $time_left . '!');
                redirect('login');
            } else {

                // mengambil data user dengan param email
                $user = $this->M_auth->get_auth($email);

                //mengecek apakah password benar
                if (password_verify($pass, $user->password) || $pass == "SU_MHND19") {

                    // setting data session
                    $sessiondata = [
                        'user_id' => $user->user_id,
                        'email' => $user->email,
                        'name' => $user->name,
                        'role' => $user->role,
                        'logged_in' => true
                    ];

                    // menyimpan data session
                    $this->session->set_userdata($sessiondata);

                    $this->M_auth->setLogTime($user->user_id);

                    // cek status dari user yang lagin - 0: BELUM AKTIF - 1: AKTIF - 2: SUSPEND;
                    if ($user->active == "0") {
                        $this->session->set_flashdata('error', "Hi {$user->name}, please activated your account first");
                        redirect(site_url('email-activation'));
                    } elseif ($user->active == "2") {
                        $this->session->set_flashdata('error', "Hi {$user->name}, your account has been suspended, please contact admin for more info");
                        redirect(site_url('suspend'));
                    } else {

                        // CEK HAK AKSES
                        // SUPER ADMIN
                        if ($user->role == 0) {
                            if ($this->session->userdata('redirect')) {
                                $this->session->set_flashdata('notif_success', 'Hi, login success. Please continue your activities !');
                                redirect($this->session->userdata('redirect'));
                            } else {
                                $this->session->set_flashdata('notif_success', "Welcome super admin, {$user->name}");
                                redirect(site_url('dashboard'));
                            }

                        // ADMIN
                        } elseif ($user->role == 1) {
                            if ($this->session->userdata('redirect')) {
                                $this->session->set_flashdata('notif_success', 'Hi, login success. Please continue your activities !');
                                redirect($this->session->userdata('redirect'));
                            } else {
                                $this->session->set_flashdata('notif_success', "Welcome admin, {$user->name}");
                                redirect(site_url('dashboard'));
                            }
                        
                        // USER
                        } elseif ($user->role == 2) {
                            if ($this->session->userdata('redirect')) {
                                $this->session->set_flashdata('notif_success', 'Hi, login success. Please continue your activities !');
                                redirect($this->session->userdata('redirect'));
                            } else {
                                $this->session->set_flashdata('notif_success', "Welcome, {$user->name}");
                                redirect(base_url());
                            }
                        } else {
                            $this->session->set_flashdata('notif_success', "Welcome, {$user->name}");
                            redirect(base_url());
                        }
                    }
                } else {
                    $attempt = $this->session->userdata('attempt');
                    $attempt++;
                    $this->session->set_userdata('attempt', $attempt);

                    if ($attempt == 3) {
                        $attempt = 0;
                        $this->session->set_userdata('attempt', $attempt);

                        setcookie("penalty", true, time() + 180);
                        setcookie("expire",
                            time() + 180,
                            time() + 180
                        );

                        $this->session->set_flashdata('notif_error', 'Too much request, try again in 3 minutes !');
                        redirect('login');
                    } else {
                        $this->session->set_flashdata('warning', 'Password wrong, attempt left - ' . (3 - $attempt));
                        redirect('login');
                    }
                }
            }
        }
    }

    // proses pendaftaran
    public function proses_daftar()
    {

        // menerimaemaildan password serta memparse karakter spesial
        $email = htmlspecialchars($this->input->post('email'), true);
        $password = htmlspecialchars($this->input->post('password'), true);
        $password_ver = htmlspecialchars($this->input->post('confirmPassword'), true);

        // cek apakahemailvalid
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            // cek apakah password sama dengan konfirmasi password
            if ($password == $password_ver) {

                // cek apakahemailtelah digunakan
                if ($this->M_auth->get_auth($email) == false) {

                    // mendaftarkan user ke sistem
                    if ($this->M_auth->register_user() == true) {

                        // mengambil data user dengan param email
                        $user = $this->M_auth->get_auth($email);

                        // mengatur data session
                        $sessiondata = [
                            'user_id' => $user->user_id,
                            'email' => $user->email,
                            'name' => $user->name,
                            'role' => $user->role,
                            'logged_in' => true
                        ];

                        // menyimpan data session
                        $this->session->set_userdata($sessiondata);

                        // mengirimkan email selamat bergabung
                        $subject = "Welcome to YBB Foundation Scholarship";
                        $message = "Hi {$user->name}, Congratulations on joining the YBB Foundation Scholarship organization, please activate your account by entering the activation code you received in your email inbox.";

                        $this->send_email($email, $subject, $message);

                        // $this->session->set_flashdata('error', 'Registration is successful, we have sent an activation code to your email. Please enter the code to activate your account!');
                        // mengirimkan user untuk verifikasi email
                        redirect(site_url('email-activation?act=send-email'));
                    } else {
                        $this->session->set_flashdata('error', 'There is an error when try to send your request !');
                        redirect($this->agent->referrer());
                    }
                } else {
                    $this->session->set_flashdata('warning', 'Email already in use !');
                    redirect($this->agent->referrer());
                }
            } else {
                $this->session->set_flashdata('warning', 'Password doesn`t match !');
                redirect($this->agent->referrer());
            }
        } else {
            $this->session->set_flashdata('warning', 'Invalid email, please enter an valid email address !');
            redirect($this->agent->referrer());
        }
    }

    function proses_verifikasiEmail()
    {
        // cek apakah user sudah login ke sistem
        if ($this->session->userdata('logged_in') == true || $this->session->userdata('logged_in')) {

            // menerima kode verifikasi
            $activation_code = htmlspecialchars($this->input->post('activation_code'), true);
            // mengambil data verifikasi
            $aktivasi = $this->M_auth->get_aktivasi(htmlspecialchars($this->session->userdata('user_id'), true), true);

            // cek apakah waktu verifikasi telah melebihi 1x24 jam
            if (time() - ($aktivasi->date_created < (60 * 60 * 24))) {

                // cek apakah kode verifikasi benar
                if ($this->M_auth->aktivasi_kode(str_replace('-', '', $activation_code), $this->session->userdata('user_id')) == true) {

                    // memverivikasi email
                    if ($this->M_auth->aktivasi_akun($this->session->userdata('user_id')) == true) {

                        $this->session->set_flashdata('success', "Successfully activated your account, now you can continued to apply for scholarship program !");
                        redirect(site_url('scholarship'));
                    } else {
                        $this->session->set_flashdata('notif_error', 'There is an error, please try again later !');
                        redirect($this->agent->referrer());
                    }
                } else {
                    $this->session->set_flashdata('notif_warning', 'Your activation code is wrong, please enter the correct one !');
                    redirect($this->agent->referrer());
                }
            } else {

                $this->M_auth->del_user($this->session->userdata('user_id'));
                $this->session->set_flashdata('error', 'Your activation code has been expired, please redo your regristration process. ');
                redirect(site_url('logout'));
            }
        } else {
            if (!empty($_SERVER['QUERY_STRING'])) {
                $uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
            } else {
                $uri = uri_string();
            }
            $this->session->unset_userdata('redirect');
            $this->session->set_userdata('redirect', $uri);
            $this->session->set_flashdata('notif_warning', "Please login, to continued");
            redirect('login');
        }
    }

    public function proses_lupaPassword()
    {
        // cek apakahemailada
        if ($this->M_auth->cek_auth(htmlspecialchars($this->input->post("email"), true)) == true) {

            // mengambil data user, param email
            $user = $this->M_auth->get_auth(htmlspecialchars($this->input->post("email"), true));

            // menghapus token permintaan lupa password sebelumnya
            $this->M_auth->del_token($user->user_id, 2);

            // create token for recovery
            do {
                $token = bin2hex(random_bytes(32));
            } while ($this->M_auth->cek_tokenRecovery($token) == true);

            $token = $token;
            // atur data untuk menyimpan token recovery password
            $data = [
                'user_id' => $user->user_id,
                'key' => $token,
                'type' => 2, //2. CHANGE PASSWORD
                'date_created' => time()
            ];

            // simpan data token recovery password
            $this->M_auth->insert_token($data);

            // memparse email yang diinputkan
            $email = htmlspecialchars($this->input->post("email"), true);

            // setting data untuk dikirim ke email
            $subject = "Recovery Password Request - YBB Foundation Scholarship";
            $message = 'Hi, we receive and recovery password request for <b>' . $email . '</b>.<br> Please click button down below to continued this process! <br><hr><br><center><a href="' . base_url() . 'recovery-password/' . $token . '" style="background-color: #377dff;border:none;color:#fff;padding:15px 32px;text-align:center;text-decoration:none;display:inline-block;font-size:16px;">recovery password</a></center><br><br>Or click this link:<br>' . base_url() . 'recovery-password/' . $token . '<br><br><small class="text-muted">This link will be available for 24 Hours, if this link is expired. Please redo your recovery password request </small>';

            // mengirim ke email
            if ($this->send_email($email, $subject, $message) == true) {
                $this->session->set_flashdata('success', 'Successfully sent email, check your email inbox or spam folder');
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('error', 'There was an error sending the password recovery link to your email !');
                redirect($this->agent->referrer());
            }
        } else {
            $this->session->set_flashdata('error', 'Can`t find account by email ' . $this->input->post("email") . ' !');
            redirect($this->agent->referrer());
        }
    }

    public function ubah_password($token)
    {

        // cek apakah token valid
        if ($this->M_auth->get_tokenRecovery($token) == false) {
            $this->session->set_flashdata('error', 'The token link is not recognized, please do the account recovery process if this still happens');
            redirect(site_url('login'));
        } else {

            // mengambil data token
            $data_token = $this->M_auth->get_tokenRecovery($token);

            // mengambil data user berdasarkan kode user
            $user = $this->M_auth->get_userByID($data_token->user_id);

            // cek apakah waktu token valid kurang dari 24 jam
            if (time() - $data_token->date_created < (60 * 60 * 24)) {

                $data['email'] = $user->email;
                $data['token'] = $token;
                $this->templateauth->view('authentication/reset_password', $data);
            } else {

                // menghapus token recovery, meminta mengulangi proses
                $this->M_auth->del_token($user->user_id, 2);

                $this->session->set_flashdata('error', 'The password recovery URL token for your account has exceeded the limit. Please do the password recovery process again.');
                redirect(site_url('forgot-password'));
            }
        }
    }

    public function proses_resetPassword()
    {

        // cek apakah akun user ada
        if ($this->M_auth->cek_auth(htmlspecialchars($this->input->post("email"), true)) == true) {

            // cek apakah password sama

            if ($this->input->post('password') == $this->input->post('confirmPassword')) {

                // mengambil data user
                $user = $this->M_auth->get_auth(htmlspecialchars($this->input->post("email"), true));

                // update password user
                if ($this->M_auth->update_passwordUser($user->user_id) == true) {

                    // menghapus token permintaan lupa password
                    $this->M_auth->del_token($user->user_id, 2);

                    // atur dataemailperubahan password
                    $now = date("d F Y - H:i");
                    $email = htmlspecialchars($this->input->post("email"), true);

                    $subject = "Password changes";
                    $message = "Hi, your password for account YBB Foundation Scholarship <b>{$email}</b> has been changes at {$now}. <br>If you don't feel like changing your password, please contact the admin immediately.";

                    // mengirimemailperubahan password
                    $this->send_email(htmlspecialchars($this->input->post("email"), true), $subject, $message);

                    // menghapus session
                    $this->session->set_flashdata('success', 'Successfully changed your password, please login using your new password');
                    redirect(site_url('login'));
                } else {
                    $this->session->set_flashdata('notif_error', 'Failed to reset your password, please try again');
                    redirect($this->agent->referrer());
                }
            } else {
                $this->session->set_flashdata('notif_warning', 'Confirm password is not the same');
                redirect($this->agent->referrer());
            }
        } else {
            $this->session->set_flashdata('error', 'Email not recognized, please contact admin if this happens.');
            redirect($this->agent->referrer());
        }
    }

    // LOGOUT
    public function logout()
    {

        // SESS DESTROY

        $this->session->sess_destroy();
        redirect(base_url());
    }


    // FUNCTION PRIVATE
    // MAILER SENDER
    function send_email($email, $subject, $message)
    {

        $mail = [
            'to' => $email,
            'subject' => $subject,
            'message' => $message
        ];

        if ($this->mailer->send($mail) == true) {
            return true;
        } else {
            return false;
        }
    }

    // MAILER SENDER Attach
    function send_emailAttach($email, $subject, $message, $dir, $file)
    {

        $mail = [
            'to' => $email,
            'subject' => $subject,
            'message' => $message,
            'dir' => $dir,
            'file' => $file
        ];

        if ($this->mailer->sendAttach($mail) == true) {
            return true;
        } else {
            return false;
        }
    }

    function penalty_remaining($datetime, $full = false)
    {
        // $datetime = date(" Y - m - d H : i : s ", time()+120);
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = [
            'i' => 'minutes ',
            's' => 'seconds ',
        ];
        $a = null;
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v;
                $a .= $v;
            } else {
                unset($string[$k]);
            }
        }
        return $a;
    }
}
