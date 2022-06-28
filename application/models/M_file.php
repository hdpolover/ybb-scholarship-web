<?php class M_file extends CI_Model

{



    public function insert($data)

    {

        $this->db->insert('tbl_file', $data);

        return $this->db->insert_id();

    }



    public function update($data, $id)

    {

        $this->db->where('id_file', $id);

        $this->db->update('tbl_file', $data);

    }



    public function update_status($id)

    {

        $this->db->where('id_file', $id);

        $this->db->update('tbl_file', ['status' => 2]);

    }



    public function update_message($id, $message)

    {

        $this->db->where('id_file', $id);

        $this->db->update('tbl_file', ['message' => $message]);

    }



    public function get_all()

    {

        $this->db->select('*');

        $this->db->from('tbl_file tf');

        $this->db->join('tbl_user tu', 'tu.id_user = tf.id_user', 'inner');

        $this->db->where(['tu.username' => $this->session->userdata('username')]);

        return $this->db->get()->result();

    }





    public function get_all_admin()

    {

        $this->db->select('*');

        $this->db->from('tbl_file tf');

        $this->db->join('tbl_user tu', 'tu.id_user = tf.id_user', 'inner');

        return $this->db->get()->result();
    }





    public function get_all_user($id_user)

    {

        $this->db->select('*');

        $this->db->from('tbl_file tf');

        $this->db->join('tbl_user tu', 'tu.id_user = tf.id_user', 'inner');
        $this->db->where('tf.id_user', $id_user);

        return $this->db->get()->result();
    }



    public function detail($id_file)

    {

        return $this->db->get_where('tbl_file', ['id_file' => $id_file])->row_array();
    }



    public function total_encrypt_pengguna($id_user)

    {

        $this->db->select('*');

        $this->db->from('tbl_file tf');

        $this->db->join('tbl_user tu', 'tu.id_user = tf.id_user', 'left');
        $this->db->where('tf.id_user', $id_user);

        // $this->db->where(['tu.username' => $this->session->userdata('username')]);

        $this->db->where('tf.status', '1');

        return $this->db->get()->num_rows();
    }



    public function total_decrypt_pengguna($id_user)

    {

        $this->db->select('*');

        $this->db->from('tbl_file tf');

        $this->db->join('tbl_user tu', 'tu.id_user = tf.id_user', 'inner');
        $this->db->where('tf.id_user', $id_user);

        // $this->db->where('tu.username', $this->session->userdata('username'));

        $this->db->where('tf.status', '2');

        return $this->db->get()->num_rows();
    }



    public function total_encrypt()

    {

        $this->db->select('*');

        $this->db->from('tbl_file tf');

        $this->db->join('tbl_user tu', 'tu.id_user = tf.id_user', 'left');

        $this->db->where(['tu.username' => $this->session->userdata('username')]);

        $this->db->where('tf.status', '1');

        return $this->db->get()->num_rows();

        

    }



    public function total_decrypt()

    {

        $this->db->select('*');

        $this->db->from('tbl_file tf');

        $this->db->join('tbl_user tu', 'tu.id_user = tf.id_user', 'inner');

        $this->db->where('tu.username', $this->session->userdata('username'));

        $this->db->where('tf.status', '2');

        return $this->db->get()->num_rows();

    }



    public function detail_confirm($id_file, $password)

    {

        return $this->db->get_where('tbl_file', ['id_file' => $id_file, 'password' => $password])->row_array();

    }



    function escape_string($val) {

        $db = $this->db->conn_id;

        $val = mysqli_real_escape_string($db, $val);

        return $val;

    }

}

