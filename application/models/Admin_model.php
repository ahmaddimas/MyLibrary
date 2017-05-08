<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function add_buku($foto){
        $this->db->insert('tb_buku', array(
            'id_buku'       => $this->input->post('id'),
            'judul'         => $this->input->post('judul'),
            'penerbit'      => $this->input->post('penerbit'),
            'pengarang'     => $this->input->post('pengarang'),
            'jumlah'        => $this->input->post('jumlah'),
            'foto'          => $foto['file_name']
        ));
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function edit_buku($foto){
        $id = $this->input->post('id');
        $current_photo = $this->GetData(['id_buku'=>$id], 'tb_buku')->foto;
        $path = './assets/images/'.$current_photo;
        unlink($path);
        $this->db->where(['id_buku'=>$id])->update('tb_buku', array(
            'judul'         => $this->input->post('judul'),
            'penerbit'      => $this->input->post('penerbit'),
            'pengarang'     => $this->input->post('pengarang'),
            'jumlah'        => $this->input->post('jumlah'),
            'foto'          => $foto['file_name']
        ));
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function add_anggota($foto){
        $this->db->insert('tb_anggota', array(
            'id_anggota'=> $this->input->post('id'),
            'nama'      => $this->input->post('nama'),
            'jk'        => $this->input->post('jk'),
            'telp'      => $this->input->post('telp'),
            'alamat'    => $this->input->post('alamat'),
            'foto'      => $foto['file_name']
        ));
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function edit_anggota($foto){
        $id = $this->input->post('id');
        $current_photo = $this->GetData(['id_anggota'=>$id], 'tb_anggota')->foto;
        $path = './assets/images/'.$current_photo;
        unlink($path);
        $this->db->where(['id_anggota'=>$id])->update('tb_anggota', array(
            'nama'      => $this->input->post('nama'),
            'jk'        => $this->input->post('jk'),
            'telp'      => $this->input->post('telp'),
            'alamat'    => $this->input->post('alamat'),
            'foto'      => $foto['file_name']
        ));
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function Pinjam($data)
    {
        $transaksi = "INSERT INTO tb_transaksi (id_transaksi,id_anggota,nama,tgl_pinjam,tgl_kembali,status) VALUES ";
        $buku_pinjam = "INSERT INTO tb_buku_transaksi (id_transaksi,id_buku) VALUES ";
        $kurangi = "UPDATE tb_buku SET jumlah = jumlah - 1 WHERE ";
        $id = $data[0][0];
        $id_anggota = $data[0][1];
        $nama = $data[0][2];
        $tgl_pinjam = $data[0][3];
        $tgl_kembali = $data[0][4];
        $transaksi .= "('$id','$id_anggota','$nama','$tgl_pinjam','$tgl_kembali','pinjam')";

        for ($i = 2; $i <= count($data); $i++) {
            $id_buku = $data[$i][0];

            $buku_pinjam .= "('$id','$id_buku'),";
            $this->db->query($kurangi."id_buku = '$id_buku'");
        }
        $buku_pinjam = rtrim($buku_pinjam, ",");
        $this->db->query($transaksi);
        $this->db->query($buku_pinjam);
        if ($this->db->affected_rows() > 0) {
            echo "true";
        } else {
            echo "false";
        }
    }
    public function CariBukuPinjam($id)
    {
        return $this->db->query("SELECT * FROM tb_buku_transaksi INNER JOIN tb_buku ON
            tb_buku_transaksi.id_buku = tb_buku.id_buku INNER JOIN tb_transaksi ON
            tb_buku_transaksi.id_transaksi = tb_transaksi.id_transaksi WHERE tb_transaksi.id_transaksi = '$id'")
            ->result();
    }
    public function Kembalikan($data)
    {
        $date = date("Y-m-d");
        $transaksi = "UPDATE tb_transaksi SET status = 'ada', tgl_kembali = '$date' WHERE ";
        $tambah = "UPDATE tb_buku SET jumlah = jumlah + 1 WHERE ";
        $id = $data[0];
        $transaksi .= "id_transaksi = '$id'";

        // var_dump($data[2][0]);
        for ($i = 2; $i <= count($data); $i++) {
            $id_buku = $data[$i][0];

            $this->db->query($tambah."id_buku = '$id_buku'");
        }
        $this->db->query($transaksi);
        if ($this->db->affected_rows() > 0) {
            echo "true";
        } else {
            echo "false";
        }
    }
    public function GetAllData($table)
    {
      return $this->db->get($table)->result();
    }

    public function GetData($where, $table)
    {
      return $this->db->where($where)->get($table)->row();
    }
    public function GetListData($where, $table)
    {
      return $this->db->where($where)->get($table)->result();
    }
    public function GetLastId($table, $field) {
        return $this->db->order_by($field, 'desc')->limit(1)->get($table)->row($field);
    }
    public function delete($where, $table)
    {
        $query = $this->db->where($where)->delete($table);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
/* End of file ${TM_FILENAME:${1/(.+)/lAdmin_model.php/}} */
/* Location: ./${TM_FILEPATH/.+((?:application).+)/Admin_model/:application/models/${1/(.+)/lAdmin_model.php/}} */
