<?php

class Auth extends CI_Controller{

    public function login()
    {
        $this->form_validation->set_rules('username','Username','required',[
            'required' => 'Username wajib diisi!'
        ]);
        $this->form_validation->set_rules('password','Password','required',[
            'required' => 'Password wajib diisi!'
        ]);
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header');
            $this->load->view('form_login');
            $this->load->view('templates/footer');
        } else {
            $auth = $this->ModelAuth->cek_login();

            if($auth == FALSE)
            {
                $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">Username atau Password Anda Salah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>');
                redirect('index.php/auth/login');
            } else {
                $this->session->set_userdata('username',$auth->username);
                $this->session->set_userdata('role_id',$auth->role_id);

                switch($auth->role_id){
                    case 1 :    redirect('index.php/admin/dash_admin');
                                break;
                    case 2 :    redirect('index.php/welcome');
                                break;
                    default: break;
                }
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('index.php/auth/login');
    }
}