<?php
Class Regis extends CI_Controller{
    
    public $table = 'tbl_user';
    
    function index(){
        $this->load->view('auth/regis');
    }
    
    function tambahuser(){
        $email      = $this->input->post('email');
        
        // Periksa apakah email sudah ada di database
        $email_exists = $this->db->get_where($this->table, array('email' => $email))->row();
        
        if ($email_exists) {
            // Jika email sudah ada, set flashdata dan redirect
            $this->session->set_flashdata('status_login', 'Email sudah dipakai sebelumnya');
            redirect('regis');
        }
    
        $full_name  = $this->input->post('nama');
        $password   = $this->input->post('password', TRUE);
        $hashPass = password_hash($password, PASSWORD_DEFAULT);
        
        $data = array(
            'full_name'     => $this->input->post('full_name', TRUE),
            'email'         => $email,
            'password'      => $hashPass,
            'images'        => "default-foto.png"
        );
    
        $this->db->insert($this->table, $data);
        $this->session->set_flashdata('status_login', 'Akun anda sedang diverifikasi, silahkan kembali dan coba login berkala');
        redirect('regis');
    }
    

}
