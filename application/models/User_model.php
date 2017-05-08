<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function cek_user(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $id = $this->GetUser(['username'=>$username])->row('id');
        $nama = $this->GetUser(['username'=>$username])->row('nama');

        $query = $this->db->where('username', $username)->where('password', md5($password))->get('tb_admin');
        if ($query->num_rows() > 0) {
            $data = [
                'logged_id'     => $id,
                'logged_name'   => $nama,
                'logged_in'     => TRUE
            ];
            $this->session->set_userdata( $data );
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function add_user(){
        $int = (int) $this->GetLastId('tb_admin', 'id');
        $nowid = $int + 1;
        $id = sprintf("%08d", $nowid);
        $id = 'PGS'.$id;
        $username = $this->input->post('username');

        $query = $this->db->insert('tb_admin', array(
            'id'        => $id,
            'nama'      => $this->input->post('nama'),
            'jk'        => $this->input->post('jk'),
            'telp'      => $this->input->post('telp'),
            'alamat'    => $this->input->post('alamat'),
            'username'  => $username,
            'password'  => md5($this->input->post('password'))
        ));
        if ($this->db->affected_rows() > 0) {
            $data = [
                'logged_name'   => $nama,
                'logged_id'     => $id,
                'logged_in'     => TRUE
            ];
            $this->session->set_userdata( $data );
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function edit_admin(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $this->db->where(['id'=>$id])->update('tb_admin', array(
            'nama'      => $nama,
            'jk'        => $this->input->post('jk'),
            'telp'      => $this->input->post('telp'),
            'alamat'    => $this->input->post('alamat')
        ));
        if ($this->db->affected_rows() > 0) {
            $this->session->set_userdata( array('logged_name' => $nama) );
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function GetLastId($table, $field) {
        return $this->db->order_by($field, 'desc')->limit(1)->get($table)->row($field);
    }

    public function GetUser($where)
    {
      return $this->db->where($where)->get('tb_admin');
    }
}
/* End of file ${TM_FILENAME:${1/(.+)/lAdmin_model.php/}} */
/* Location: ./${TM_FILEPATH/.+((?:application).+)/Admin_model/:application/models/${1/(.+)/lAdmin_model.php/}} */
