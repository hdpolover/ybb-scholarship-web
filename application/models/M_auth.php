<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function setLogTime($user_id){
        $this->db->where('user_id', $user_id);
        $this->db->update('tb_auth', ['log_time' => time()]);
    }

    // main
    public function get_auth($email)
    {
        $this->db->select('*');
        $this->db->from('tb_auth a');
        $this->db->join('tb_user b', 'a.user_id = b.user_id');
        $this->db->where('a.email', $email);
        $query = $this->db->get();

        // jika hasil dari query diatas memiliki lebih dari 0 record
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function cek_auth($email)
    {
        $query = $this->db->get_where('tb_auth', ['email' => $email]);

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_userByID($user_id)
    {
        $this->db->select('*');
        $this->db->from('tb_auth a');
        $this->db->join('tb_user b', 'a.user_id = b.user_id', 'left');
        $this->db->where('a.user_id', $user_id);
        $query = $this->db->get();

        // jika hasil dari query diatas memiliki lebih dari 0 record
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function cek_userId($user_id)
    {
        $user_id = $this->db->escape($user_id);
        $query = $this->db->query("SELECT * FROM tb_auth WHERE user_id = $user_id");
        return $query->num_rows();
    }

    // pendaftaran
    public function register_user()
    {

        // TB AUTH

        $email = htmlspecialchars($this->input->post('email'), true);
        $password = htmlspecialchars($this->input->post('password'), true);

        // TB USER
        $name = htmlspecialchars($this->input->post('name'), true);
        $phone = htmlspecialchars($this->input->post('phone'), true);

        // CREATE UNIQ NAME KODE USER

        $string = preg_replace('/[^a-z]/i', '', $name);

        $vocal = ["a", "e", "i", "o", "u", "A", "E", "I", "O", "U", " "];
        $scrap = str_replace($vocal, "", $string);
        $begin = substr($scrap, 0, 5);
        $uniqid = strtoupper($begin);

        // CREATE KODE USER
        do {
            $user_id = "USR-" . $uniqid . "-" . substr(md5(time()), 0, 6);
        } while ($this->cek_userId($user_id) > 0);

        // TB AUTH
        $auth = [
            'user_id' => $user_id,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'created_at' => time()
        ];

        $this->db->insert('tb_auth', $auth);

        if ($this->db->affected_rows() == true) {

            $user = [
                'user_id' => $user_id,
                'name' => $name,
                'phone' => $phone
            ];

            $this->db->insert('tb_user', $user);

            if ($this->db->affected_rows() == true) {

                $chiper = $this->create_aktivasi();

                $aktivasi = [
                    'user_id' => $user_id,
                    'key' => $chiper,
                    'type' => 1, #VERIFIKASI email / AKTIVASI AKUN 
                    'status' => 0,
                    'date_created' => time()
                ];

                $this->db->insert('tb_token', $aktivasi);
                return ($this->db->affected_rows() != 1) ? false : true;
            } else {
                $this->del_token($user_id, 1); #VERIFIKASI email / AKTIVASI AKUN 
                $this->del_user($user_id);
                return false;
            }
        } else {
            $this->del_user($user_id);
            return false;
        }
    }

    // AKTIVASI / VERIFIKASI

    public function cek_aktivasi($user_id)
    {
        $user_id = $this->db->escape($user_id);
        $query = $this->db->query("SELECT * FROM tb_token WHERE user_id = $user_id AND type = 1");
        return $query->num_rows();
    }

    public function create_aktivasi()
    {

        // CREATE KODE AKTIVASI
        $this->encryption->initialize(['driver' => 'openssl']);
        do {
            $activation_code = random_int(100000, 999999);
            // ENCRYPT KODE AKTIVASI
            $ciphercode = $this->encryption->encrypt($activation_code);
        } while ($this->cek_aktivasi($activation_code) > 0);

        return $ciphercode;
    }

    public function get_aktivasi($user_id)
    {
        $user_id = $this->db->escape($user_id);
        $query = $this->db->query("SELECT * FROM tb_token WHERE user_id = $user_id AND type = 1");
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function aktivasi_kode($kode_aktivasi, $user_id)
    {

        $db_code = $this->encryption->decrypt($this->get_aktivasi($user_id)->key);

        if ($kode_aktivasi == $db_code) {
            return true;
        } else {
            return false;
        }
    }

    public function aktivasi_akun($user_id)
    {

        $this->db->where(['user_id' => $user_id, 'type' => 1]);
        $this->db->update('tb_token', ['status' => 1]);

        $this->db->where('user_id', $user_id);
        $this->db->update('tb_auth', ['active' => 1]);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    // LUPA password

    public function cek_tokenRecovery($token)
    {
        $token = $this->db->escape($token);
        $query = $this->db->query("SELECT * FROM tb_token a WHERE a.key = $token AND a.type = 2");

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_tokenRecovery($token)
    {
        $token = $this->db->escape($token);
        $query = $this->db->query("SELECT * FROM tb_token a WHERE a.key = $token AND a.type = 2");

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function insert_token($data)
    {
        $this->db->insert('tb_token', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    function update_passwordUser($user_id)
    {
        $password = htmlspecialchars($this->input->post("password"), true);
        $email = htmlspecialchars($this->input->post("email"), true);

        $this->db->where(['user_id' => $user_id, 'email' => $email]);
        $this->db->update('tb_auth', ['password' => password_hash($password, PASSWORD_DEFAULT)]);
        return ($this->db->affected_rows() != 1) ? false : true;
    }


    // DELETE

    public function del_token($user_id, $type)
    {
        $this->db->where(['user_id' => $user_id, 'type' => $type]);
        $this->db->delete('tb_token');
    }

    public function del_user($user_id)
    {
        $user_id = $this->db->escape($user_id);
        $this->db->where('user_id', $user_id);
        $this->db->delete('tb_auth');
    }
}
