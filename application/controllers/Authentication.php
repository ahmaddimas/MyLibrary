<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Authentication extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in') == true) {
            redirect('Admin');
        } else {
            redirect('Authentication/Login');
        }
    }
    public function Login(){
        if ($this->session->userdata('logged_in') == true) {
            redirect('Admin');
        } else {
            if ($this->input->post('submit')) {
                $this->form_validation->set_rules('username', 'Username', 'trim|required');
                $this->form_validation->set_rules('password', 'Password', 'trim|required');

                if ($this->form_validation->run() == TRUE ) {
                    if ($this->user_model->cek_user() == TRUE) {
                        // jika sukses
                        redirect('Admin');
                    } else {
                        $data['notif'] = 'Login gagal';
                        $this->load->view('v_login', $data);
                    }
                } else {
                    // jika gagal
                    $data['notif'] = validation_errors();
                    $this->load->view('v_login', $data);
                }
            } else {
                $data['notif'] = '';
                $this->load->view('v_login',$data);
            }
        }
    }
    public function SignUp(){
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
            $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
            $this->form_validation->set_rules('telp', 'Nomor Telepon', 'trim|required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('password2', 'Second Password', 'trim|required');

            if ($this->form_validation->run() == TRUE ) {
                $password = $this->input->post('password');
                $password2 = $this->input->post('password2');

                if ($password == $password2) {
                    if ($this->user_model->add_user() == TRUE) {
                        // jika sukses
                        redirect('Admin');
                    } else {
                        $data['notif'] = 'Login gagal';
                        $this->load->view('v_signup', $data);
                    }
                } else {
                    $data['notif'] = "Password didn't match";
                    $this->load->view('v_signup', $data);
                }
            } else {
                // jika gagal
                $data['notif'] = validation_errors();
                $this->load->view('v_signup', $data);
            }
        } else {
            $data['notif'] = '';
            $this->load->view('v_signup', $data);
        }
    }
    public function Logout() {
        $this->session->sess_destroy();
        redirect('Admin');
    }
}
/* End of file ${TM_FILENAME:${1/(.+)/lAuthentication.php/}} */
/* Location: ./${TM_FILEPATH/.+((?:application).+)/Authentication/:application/controllers/${1/(.+)/lAuthentication.php/}} */
