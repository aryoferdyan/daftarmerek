<?php
Class Auth extends CI_Controller{
    
    
    
    function index(){
        $this->load->view('auth/login');
    }
    
    function cheklogin(){
        $email      = $this->input->post('email');
        //$password   = $this->input->post('password');
        $password = $this->input->post('password',TRUE);
        $hashPass = password_hash($password,PASSWORD_DEFAULT);
        $test     = password_verify($password, $hashPass);
        // query chek users
        $this->db->where('email',$email);
        //$this->db->where('password',  $test);
        $users       = $this->db->get('tbl_user');
        // $isactive    = $this->db->get('tbl_user');
        if($users->num_rows()>0){
            $user = $users->row_array();
            if(password_verify($password,$user['password'])){
                // retrive user data to session
                if($user['is_aktif'] == 'y'){
                    $data = array(
                        'id_user' => $user['id_users'],
                        'tanggal' => date('Y-m-d H:i:s')
                    );
                    $this->db->insert('tbl_log', $data); // Menambahkan insert ke tabel tbl_log
                    $this->session->set_userdata($user);
                    redirect('home'); 
                } else {
                    $this->session->set_flashdata('status_login','Akun anda belum aktif');
                    redirect('auth');
                }
            }else{
                $this->session->set_flashdata('status_login','Email atau password yang anda input salah');
                redirect('auth');
            }
        }else{
            $this->session->set_flashdata('status_login','Email atau password yang anda input salah');
            redirect('auth');
        }
    }  
    
    function logout(){
        $this->session->sess_destroy();
        $this->session->set_flashdata('status_login','Anda sudah berhasil keluar dari aplikasi');
        redirect('auth');
    }
}
