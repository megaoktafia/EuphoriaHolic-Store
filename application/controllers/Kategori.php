<?php

class Kategori extends CI_Controller{
    public function pakaian_pria()
    {
        $data['pakaian_pria'] = $this->ModelKategori->data_pakaian_pria()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pakaian_pria', $data);
        $this->load->view('templates/footer');
    }

    public function pakaian_wanita()
    {
        $data['pakaian_wanita'] = $this->ModelKategori->data_pakaian_wanita()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pakaian_wanita', $data);
        $this->load->view('templates/footer');
    }
}