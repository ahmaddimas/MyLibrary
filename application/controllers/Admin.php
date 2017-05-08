<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('user_model');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in') == true) {
            $data = [
                'main_view'     => 'v_dashboard',
                'nama'          => $this->session->userdata('logged_name'),
                'jml_buku'      => count($this->admin_model->GetAllData('tb_buku')),
                'jml_anggota'   => count($this->admin_model->GetAllData('tb_anggota')),
                'jml_pinjam'    => count($this->admin_model->GetListData(['status'=>'pinjam'], 'tb_transaksi')),
                'active'        => 'dashboard'
            ];
            $this->load->view('layout', $data);
        } else {
            redirect('Authentication');
        }
    }
    public function Buku()
    {
        if ($this->session->userdata('logged_in') == TRUE) {
            $data = [
                'main_view' => 'v_buku',
                'nama'      => $this->session->userdata('logged_name'),
                'list_buku' => $this->admin_model->GetAllData('tb_buku'),
                'active'    => 'buku'
            ];
            $this->load->view('layout', $data);
        } else {
            redirect('Admin');
        }
    }
    public function Tambah_Buku()
    {
        if ($this->session->userdata('logged_in') == TRUE) {
            $id = $this->uri->segment(3);
            $data = [
                'main_view' => 'v_tambah_buku',
                'nama'      => $this->session->userdata('logged_name'),
                'id'        => '',
                'active'    => 'buku',
                'judul'     => '',
                'penerbit'  => '',
                'pengarang' => '',
                'jumlah'    => '',
                'foto'      => '',
                'btn'       => 'submit'
            ];
            if ($id != "") {
                $data['id'] = $id;
                $record = $this->admin_model->GetData(array("id_buku"=>$id),'tb_buku');
                $data['judul'] = $record->judul;
                $data['penerbit'] = $record->penerbit;
                $data['pengarang'] = $record->pengarang;
                $data['jumlah'] = $record->jumlah;
                $data['foto'] = $record->foto;
                $data['btn'] = 'update';
            } else {
                $id = $this->admin_model->GetLastId('tb_buku', 'id_buku');
                $int = (int) substr($id, -3);
                $nowid = $int + 1;
                $id = "BK".date('ymd').sprintf("%03d", $nowid);
                $data['id'] = $id;
            }

            if ($this->input->post('submit')) {
                $this->form_validation->set_rules('id', 'ID BUKU', 'trim|required');
                $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
                $this->form_validation->set_rules('penerbit', 'Penerbit', 'trim|required');
                $this->form_validation->set_rules('pengarang', 'Pengarang', 'trim|required');
                $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required|numeric');

                if ($this->form_validation->run() == TRUE ) {
                    // Konfigurasi upload foto
                    $config['upload_path'] = './assets/images/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = '2000';

                    // Load library upload file
                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('foto')){
                        if ($this->admin_model->add_buku($this->upload->data()) == TRUE) {
                            // jika sukses
                            redirect('Admin/Buku');
                        } else {
                            // jika gagal
                            $data['notif'] = 'Tambah Buku gagal';
                            $this->load->view('layout', $data);
                        }
                    }
                    else{
                        // jika gagal upload
                        $data['notif'] = $this->upload->display_errors();
                        $this->load->view('layout', $data);
                    }
                } else {
                    // jika gagal
                    $data['notif'] = validation_errors();
                    $this->load->view('layout', $data);
                }
            } else if ($this->input->post('update')) {
                $this->form_validation->set_rules('id', 'ID BUKU', 'trim|required');
                $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
                $this->form_validation->set_rules('penerbit', 'Penerbit', 'trim|required');
                $this->form_validation->set_rules('pengarang', 'Pengarang', 'trim|required');
                $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required|numeric');

                if ($this->form_validation->run() == TRUE ) {
                    // Konfigurasi upload foto
                    $config['upload_path'] = './assets/images/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = '2000';

                    // Load library upload file
                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('foto')){
                        if ($this->admin_model->edit_buku($this->upload->data()) == TRUE) {
                            // jika sukses
                            redirect('Admin/Buku');
                        } else {
                            // jika gagal
                            $data['notif'] = 'Edit Buku gagal';
                            $this->load->view('layout', $data);
                        }
                    }
                    else{
                        // jika gagal upload
                        $data['notif'] = $this->upload->display_errors();
                        $this->load->view('layout', $data);
                    }
                } else {
                    // jika gagal
                    $data['notif'] = validation_errors();
                    $this->load->view('layout', $data);
                }
            } else {
                $this->load->view('layout', $data);
            }
        } else {
            redirect('Admin');
        }
    }
    public function Anggota()
    {
        if ($this->session->userdata('logged_in') == TRUE) {
            $data = [
                'main_view'     => 'v_anggota',
                'nama'          => $this->session->userdata('logged_name'),
                'list_anggota'  => $this->admin_model->GetAllData('tb_anggota'),
                'active'        => 'anggota'
            ];
            $this->load->view('layout', $data);
        } else {
            redirect('Admin');
        }
    }
    public function Tambah_Anggota()
    {
        $id = $this->uri->segment(3);
        $data = [
            'main_view' => 'v_tambah_anggota',
            'nama'      => $this->session->userdata('logged_name'),
            'id'        => '',
            'active'    => 'anggota',
            'nama'      => '',
            'jk'        => '',
            'telp'      => '',
            'alamat'    => '',
            'foto'      => '',
            'btn'       => 'submit'
        ];
        if ($id != "") {
            $data['id'] = $id;
            $record = $this->admin_model->GetData(array("id_anggota"=>$id),'tb_anggota');
            $data['nama'] = $record->nama;
            $data['jk'] = $record->jk;
            $data['telp'] = $record->telp;
            $data['alamat'] = $record->alamat;
            $data['foto'] = $record->foto;
            $data['btn'] = 'update';
        } else {
            $int = (int) $this->admin_model->GetLastId('tb_anggota', 'id_anggota');
            $nowid = $int + 1;
            $id = sprintf("%011d", $nowid);
            $data['id'] = $id;
        }

        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('id', 'ID Anggota', 'trim|required');
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
            $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
            $this->form_validation->set_rules('telp', 'Telepon', 'trim|required|numeric');
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

            if ($this->form_validation->run() == TRUE ) {
                // Konfigurasi upload foto
                $config['upload_path'] = './assets/images/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2000';

                // Load library upload file
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')){
                    if ($this->admin_model->add_anggota($this->upload->data()) == TRUE) {
                        // jika sukses
                        redirect('Admin/Anggota');
                    } else {
                        // jika gagal
                        $data['notif'] = 'Tambah Anggota gagal';
                        $this->load->view('layout', $data);
                    }
                }
                else{
                    // jika gagal upload
                    $data['notif'] = $this->upload->display_errors();
                    $this->load->view('layout', $data);
                }
            } else {
                // jika gagal
                $data['notif'] = validation_errors();
                $this->load->view('layout', $data);
            }
        } else if ($this->input->post('update')) {
            $this->form_validation->set_rules('id', 'ID Anggota', 'trim|required');
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
            $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
            $this->form_validation->set_rules('telp', 'Telepon', 'trim|required|numeric');
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

            if ($this->form_validation->run() == TRUE ) {
                // Konfigurasi upload foto
                $config['upload_path'] = './assets/images/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2000';

                // Load library upload file
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')){
                    if ($this->admin_model->edit_anggota($this->upload->data()) == TRUE) {
                        // jika sukses
                        redirect('Admin/Anggota');
                    } else {
                        // jika gagal
                        $data['notif'] = 'Tambah Anggota gagal';
                        $this->load->view('layout', $data);
                    }
                }
                else{
                    // jika gagal upload
                    $data['notif'] = $this->upload->display_errors();
                    $this->load->view('layout', $data);
                }
            } else {
                // jika gagal
                $data['notif'] = validation_errors();
                $this->load->view('layout', $data);
            }
        } else {
            $this->load->view('layout', $data);
        }
    }
    public function Petugas()
    {
        if ($this->session->userdata('logged_in') == TRUE) {
            $data = [
                'main_view'     => 'v_petugas',
                'nama'          => $this->session->userdata('logged_name'),
                'list_anggota'  => $this->admin_model->GetAllData('tb_admin'),
                'active'        => 'anggota'
            ];
            $this->load->view('layout', $data);
        } else {
            redirect('Admin');
        }
    }
    public function Profile()
    {
        if ($this->session->userdata('logged_in') == TRUE) {
            $id = $this->session->userdata('logged_id');
            $record = $this->admin_model->GetData(array("id"=>$id),'tb_admin');
            $data = [
                'main_view' => 'v_edit_profile',
                'nama'      => $this->session->userdata('logged_name'),
                'id'        => $id,
                'active'    => 'anggota',
                'nama'      => $record->nama,
                'jk'        => $record->jk,
                'telp'      => $record->telp,
                'alamat'    => $record->alamat
            ];

            if ($this->input->post('submit')) {
                $this->form_validation->set_rules('id', 'ID Anggota', 'trim|required');
                $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
                $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
                $this->form_validation->set_rules('telp', 'Telepon', 'trim|required|numeric');
                $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

                if ($this->form_validation->run() == TRUE ) {
                    if ($this->user_model->edit_admin() == TRUE) {
                        // jika sukses
                        redirect('Admin');
                    } else {
                        // jika gagal
                        $data['notif'] = 'Edit Profile gagal';
                        $this->load->view('layout', $data);
                    }
                } else {
                    // jika gagal
                    $data['notif'] = validation_errors();
                    $this->load->view('layout', $data);
                }
            } else {
                $this->load->view('layout', $data);
            }
        } else {
            redirect('Admin');
        }

    }
    public function Peminjaman()
    {
        if ($this->session->userdata('logged_in') == TRUE) {
            $date = substr($this->admin_model->GetLastId('tb_transaksi', 'id_transaksi'), -9);
            $date = substr($date, 0, 6);
            $int = (int) substr($this->admin_model->GetLastId('tb_transaksi', 'id_transaksi'), -3);
            $id = $date === date('ymd') ? $int + 1 : 1;
            $id = 'PJ'.date('ymd').sprintf("%03d", $id);
            $data = [
                'main_view'     => 'v_peminjaman',
                'nama'          => $this->session->userdata('logged_name'),
                'list_anggota'  => $this->admin_model->GetAllData('tb_anggota'),
                'list_buku'     => $this->admin_model->GetAllData('tb_buku'),
                'id'            => $id,
                'tgl_pinjam'    => date('Y-m-d'),
                'tgl_kembali'   => date('Y-m-d', strtotime("+1 week")),
                'active'        => 'transaksi'
            ];
            $this->load->view('layout', $data);
        } else {
            redirect('Admin');
        }
    }
    public function CariAnggota()
    {
        $id = $this->input->post('id');
        $data = $this->admin_model->GetData(array('id_anggota' => $id), 'tb_anggota');
        echo $data->nama;
    }
    public function CariBuku()
    {
        $id = $this->input->post('id');
        $data = $this->admin_model->GetData(array('id_buku' => $id), 'tb_buku');
        echo $data->judul."|".$data->pengarang."|".$data->jenis;
    }
    public function Pinjam()
    {
        $data = $this->input->post('data');
        $result = $this->admin_model->Pinjam($data);
        echo $result;
    }
    public function Pengembalian()
    {
        if ($this->session->userdata('logged_in') == TRUE) {
            $data = [
                'main_view'     => 'v_pengembalian',
                'list_transaksi'=> $this->admin_model->GetListData(array('status' => 'pinjam'), 'tb_transaksi'),
                'active'        => 'transaksi'
            ];
            $this->load->view('layout', $data);
        } else {
            redirect('Admin');
        }
    }
    public function CariPinjam()
    {
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
            $data = $this->admin_model->GetData(array('id_transaksi' => $id), 'tb_transaksi');
            $buku = $this->admin_model->CariBukuPinjam($id);
            $kembali = strtotime($data->tgl_kembali);
            $now = strtotime(date('Y-m-d'));
            $telat = $now - $kembali;
            $telat = floor($telat / (60 * 60 * 24));
            $telat = $telat > 0 ? $telat : 0;
            $denda = $telat * 10000;
            $list = "";
            foreach ($buku as $b) {
                $list .= $b->id_buku."|".$b->judul."|".$b->pengarang."|".$b->jenis."|".$b->foto."|";
            }
            $list = rtrim($list, "|");
            echo $data->id_anggota."|".count($buku)."|".$data->nama."|".$data->tgl_pinjam."|".$data->tgl_kembali."|".$denda."|".$list;
        } else {
            redirect('NotFound');
        }
    }
    public function BukuKembali()
    {
        if ($this->input->post('data')) {
            $data = $this->input->post('data');
            $result = $this->admin_model->Kembalikan($data);
            echo $result;
        } else {
            redirect('NotFound');
        }
    }
    public function Laporan_Pinjam()
    {
        if ($this->session->userdata('logged_in') == TRUE) {
            $data = [
                'main_view'     => 'v_laporan_pinjam',
                'nama'          => $this->session->userdata('logged_name'),
                'list_pinjam'   => $this->admin_model->GetListData(['status'=>'pinjam'], 'tb_transaksi'),
                'active'        => 'laporan'
            ];
            $this->load->view('layout', $data);
        } else {
            redirect('Admin');
        }
    }
    public function Laporan_Kembali()
    {
        if ($this->session->userdata('logged_in') == TRUE) {
            $data = [
                'main_view'     => 'v_laporan_pengembalian',
                'nama'          => $this->session->userdata('logged_name'),
                'list_pinjam'   => $this->admin_model->GetListData(['status'=>'ada'], 'tb_transaksi'),
                'active'        => 'laporan'
            ];
            $this->load->view('layout', $data);
        } else {
            redirect('Admin');
        }
    }
    public function Delete()
    {
        if ($this->session->userdata('logged_in') == TRUE) {
            $table = $this->uri->segment(3);
            $id = $this->uri->segment(4);
            $where = array();
            if ($table == 'Buku') {
                $table = 'tb_buku';
                $where = ['id_buku' => $id];
                $redir = 'Admin/Buku';
            }
            elseif ($table == 'Anggota') {
                $table = 'tb_anggota';
                $where = ['id_anggota' => $id];
                $redir = 'Admin/Anggota';
            }

            if ($this->admin_model->delete($where, $table) == TRUE) {
                // memberi kiriman menggunakan session yang sementara
                $this->session->set_flashdata('notif', 'Hapus Berhasil!');
                redirect($redir);
            } else {
                // memberi kiriman menggunakan session yang sementara
                $this->session->set_flashdata('notif', 'Hapus Gagal!');
                redirect('Admin/Buku');
            }
        } else {
            redirect('Admin');
        }
    }
}
/* End of file ${TM_FILENAME:${1/(.+)/lAdmin.php/}} */
/* Location: ./${TM_FILEPATH/.+((?:application).+)/Admin/:application/controllers/${1/(.+)/lAdmin.php/}} */
