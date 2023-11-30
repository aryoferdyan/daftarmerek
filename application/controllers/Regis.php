<?php
Class Regis extends CI_Controller{
    
    public $table = 'tbl_user';
    
    function index(){
        $this->load->view('auth/regis');
    }
    
    function tambahuser(){
        $email      = $this->input->post('email');
        $full_name  = $this->input->post('nama');
        $password   = $this->input->post('password',TRUE);
        $hashPass = password_hash($password,PASSWORD_DEFAULT);
        $data = array(
            'full_name'     => $this->input->post('full_name',TRUE),
            'email'         => $this->input->post('email',TRUE),
            'password'      => $hashPass,
            //'images'        => $foto['file_name'],
            //'id_user_level' => $this->input->post('id_user_level',TRUE),
            //'is_aktif'      => $this->input->post('is_aktif',TRUE),
            );
        $this->db->insert($this->table, $data);
        //$this->User_model->insert($data);
        $this->session->set_flashdata('status_login','Akun anda sedang diverifikasi, silahkan cek berkala');
        redirect('regis');
    }

}
