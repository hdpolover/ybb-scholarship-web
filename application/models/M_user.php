<?php class M_user extends CI_Model

{





    // login data user atau admin

    public function login($data)

    {

        $result = $this->db->where('username', $data['username'])

            ->where('password', $data['password'])

            ->get('tbl_user');



        if ($result->num_rows() > 0) {

            $this->update_lastonline($result->row()->id_user);

            return $result->row();

        } else {

            return null;

        }

    }

    

    public function signup($data)

    {

        $this->db->insert('tbl_user', $data);

        return $this->db->insert_id();

    }



    //update terakhir online user pada sistem

    public function update_lastonline($id_user)

    {

        date_default_timezone_set('Asia/Jakarta');



        $data = [

            'last_activity' => date("Y-m-d H:i:s")

        ];

        $this->db->where('id_user', $id_user);

        $this->db->update('tbl_user', $data);
    }



    public function total_admin()
    {

        $this->db->select('*');

        $this->db->from('tbl_user');

        $this->db->where('hak_akses', 'admin');

        return $this->db->get()->num_rows();
    }



    public function total_pengguna()
    {

        $this->db->select('*');

        $this->db->from('tbl_user');

        $this->db->where('hak_akses', 'pengguna');

        return $this->db->get()->num_rows();
    }





    public function get_admin(){

        $this->db->select('*');

        $this->db->from('tbl_user');

        $this->db->where('hak_akses', 'admin');

        return $this->db->get()->result();   

    }



    public function get_pengguna(){

        $this->db->select('*');

        $this->db->from('tbl_user');

        $this->db->where('hak_akses', 'pengguna');

        return $this->db->get()->result();
    }



    public function get_penggunaDetail($id_user)
    {

        $this->db->select('*');

        $this->db->from('tbl_user');

        $this->db->where('id_user', $id_user);

        return $this->db->get()->row();
    }



    public function insert($data){

        $this->db->insert('tbl_user', $data);

    }



    

    public function update($data, $id_user){

        $this->db->where('id_user', $id_user);

        $this->db->update('tbl_user', $data);

    }



    public function delete($id_user){

        $this->db->where('id_user', $id_user);

        $this->db->delete('tbl_user');

    }





    public function cek_email($email){

        $this->db->where('email', $email);

        return $this->db->get('tbl_user')->num_rows();

    }



    public function update_byemail($data, $email){

        $this->db->where('email', $email);

        $this->db->update('tbl_user', $data);   

    }

}

