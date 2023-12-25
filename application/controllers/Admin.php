<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Permohonan_admin_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $data['user_id'] = $this->session->userdata('id_users');
        $this->template->load('template','permohonan_admin/tbl_permohonan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Permohonan_admin_model->json();
    }
 
    public function read($id) 
    {
        $row = $this->Permohonan_admin_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_permohonan' => $row->id_permohonan,
		'tanggal' => $row->tanggal,
		'nama_usaha' => $row->nama_usaha,
		'alamat' => $row->alamat,
		'nama_owner' => $row->nama_owner,
		'logo' => $row->logo,
		'surat' => $row->surat,
		'ttd' => $row->ttd,
		'id_user' => $row->id_user,
		'status' => $row->status,
		'notes' => $row->notes,
    );
    $this->template->load('template','permohonan_admin/tbl_permohonan_read', $data);
} else {
    $this->session->set_flashdata('message', 'Record Not Found');
    redirect(site_url('admin'));
}
}



// public function create() 
// {
//         $data = array(
//             'button' => 'Create',
//             'action' => site_url('permohonan/create_action'),
// 	    'id_permohonan' => set_value('id_permohonan'),
// 	    'tanggal' => set_value('tanggal'),
// 	    'nama_usaha' => set_value('nama_usaha'),
// 	    'alamat' => set_value('alamat'),
// 	    'nama_owner' => set_value('nama_owner'),
// 	    'logo' => set_value('logo'),
// 	    'surat' => set_value('surat'),
// 	    'ttd' => set_value('ttd'),
// 	    'id_user' => set_value('id_user'),
// 	    'status' => set_value('status'),
// 	);
//         $this->template->load('template','permohonan_admin/tbl_permohonan_form', $data);
//     }
    
//     public function create_action() 
//     {
//         $this->_rules();
//         $logo1 = $this->upload_logo();
//         $surat1 = $this->upload_surat();
//         $ttd1 = $this->upload_ttd();
    
//         if ($this->form_validation->run() == FALSE) {
//             $this->create();
//         } else {
//             $data = array(
//                 'tanggal' => $this->input->post('tanggal', TRUE),
//                 'nama_usaha' => $this->input->post('nama_usaha', TRUE),
//                 'alamat' => $this->input->post('alamat', TRUE),
//                 'nama_owner' => $this->input->post('nama_owner', TRUE),
//                 'logo' => $logo1['file_name'],  // menyimpan nama file logo ke dalam database
//                 'surat' => $surat1['file_name'],  // menyimpan nama file surat ke dalam database
//                 'ttd' => $ttd1['file_name'],  // menyimpan nama file ttd ke dalam database
//                 'id_user' => $this->input->post('id_user', TRUE),
//                 'status' => $this->input->post('status', TRUE),
//             );
    
//             $this->Permohonan_admin_model->insert($data);
//             $this->session->set_flashdata('message', 'Create Record Success 2');
//             redirect(site_url('permohonan'));
//         }
//     }
    
    
    public function update($id) 
    {
        $row = $this->Permohonan_admin_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/update_action'),
                'id_permohonan' => set_value('id_permohonan', $row->id_permohonan),
                'tanggal' => set_value('tanggal', $row->tanggal),
                'nama_usaha' => set_value('nama_usaha', $row->nama_usaha),
                'alamat' => set_value('alamat', $row->alamat),
                'nama_owner' => set_value('nama_owner', $row->nama_owner),
                'logo' => set_value('logo', $row->logo),
                'surat' => set_value('surat', $row->surat),
                'ttd' => set_value('ttd', $row->ttd),
                'id_user' => set_value('id_user', $row->id_user),
                'status' => set_value('status', $row->status),
                'notes' => set_value('notes', $row->notes),
	    );
            $this->template->load('template','permohonan_admin/tbl_permohonan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            // redirect(site_url('permohonan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
    
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_permohonan', TRUE));
        } else {
            // Cek apakah file-file tersebut diunggah
            $logo1 = (!empty($_FILES['logo']['name'])) ? $this->upload_logo() : array('file_name' => $this->input->post('logo'));
            $surat1 = (!empty($_FILES['surat']['name'])) ? $this->upload_surat() : array('file_name' => $this->input->post('surat'));
            $ttd1 = (!empty($_FILES['ttd']['name'])) ? $this->upload_ttd() : array('file_name' => $this->input->post('ttd'));
            
            // Mengambil semua data yang akan diupdate
            $data = array(
                // 'tanggal' => $this->input->post('tanggal', TRUE),
                // 'nama_usaha' => $this->input->post('nama_usaha', TRUE),
                // 'alamat' => $this->input->post('alamat', TRUE),
                // 'nama_owner' => $this->input->post('nama_owner', TRUE),
                // 'id_user' => $this->input->post('id_user', TRUE),
                'status' => $this->input->post('status', TRUE),
                'notes' => $this->input->post('notes', TRUE),
                
            );
                

    
            $this->Permohonan_admin_model->update($this->input->post('id_permohonan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin'));
        }
    }
    
    
    
    // public function delete($id) 
    // {
    //     $row = $this->Permohonan_admin_model->get_by_id($id);

    //     if ($row) {
    //         $this->Permohonan_admin_model->delete($id);
    //         $this->session->set_flashdata('message', 'Delete Record Success');
    //         redirect(site_url('admin'));
    //     } else {
    //         $this->session->set_flashdata('message', 'Record Not Found');
    //         redirect(site_url('admin') );
    //     }
    // }

    public function delete($id) 
    {
        $row = $this->Permohonan_admin_model->get_by_id($id);

        if ($row) {
            if ($row->status == 1) {
                $this->session->set_flashdata('message', 'Permohonan disetujui tidak dapat dihapus');
                redirect(site_url('admin'));
            } else {
                $this->Permohonan_admin_model->delete($id);
                $this->session->set_flashdata('message', 'Delete Record Success');
                redirect(site_url('admin'));
            }
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin'));
        }
    }


    // function upload_logo(){
    //     $config['upload_path']   = './uploads/logo';
    //     $config['allowed_types'] = 'jpg|png|jpeg|pdf';
    //     $this->load->library('upload', $config);
    //     $this->upload->do_upload('logo');
    //     return $this->upload->data();
    // }
    
    // function upload_surat(){
    //     $config2['upload_path']   = './uploads/document';
    //     $config2['allowed_types'] = 'jpg|pdf|png|jpeg';
    //     $this->load->library('upload', $config2);
    //     $this->upload->do_upload('surat');
    //     return $this->upload->data();
    // }
    
    // function upload_ttd(){
    //     $config3['upload_path']   = './uploads/ttd';
    //     $config3['allowed_types'] = 'jpg|png|jpeg';
    //     $this->load->library('upload', $config3);
    //     $this->upload->do_upload('ttd');
    //     return $this->upload->data();
    // }
    

    public function _rules() 
    {
	// $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	// $this->form_validation->set_rules('nama_usaha', 'nama usaha', 'trim|required');
	// $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	// $this->form_validation->set_rules('nama_owner', 'nama owner', 'trim|required');
    // $this->form_validation->set_rules('logo', 'Logo', 'callback_check_logo_extension');

	//$this->form_validation->set_rules('logo', 'logo', 'required');
	// $this->form_validation->set_rules('surat', 'surat', 'trim|required');
	//$this->form_validation->set_rules('ttd', 'ttd', 'required');
	// $this->form_validation->set_rules('id_user', 'id user', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id_permohonan', 'id_permohonan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    
    public function check_logo_extension($str) {
        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
        $ext = strtolower(pathinfo($str, PATHINFO_EXTENSION));
        if (!in_array($ext, $allowed_extensions)) {
            $this->form_validation->set_message('check_logo_extension', 'Unsupported file format. Allowed formats are jpg, jpeg, png, and gif.');
            return false;
        }
        return true;
    }
    

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_permohonan.xls";
        $judul = "tbl_permohonan";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Usaha");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Owner");
	xlsWriteLabel($tablehead, $kolomhead++, "Logo");
	xlsWriteLabel($tablehead, $kolomhead++, "Surat");
	xlsWriteLabel($tablehead, $kolomhead++, "Ttd");
	xlsWriteLabel($tablehead, $kolomhead++, "Id User");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Permohonan_admin_model->get_all() as $data) {
        $kolombody = 0;
    
        //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
        xlsWriteLabel($tablebody, $kolombody++, $data->nama_usaha);
        xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
        xlsWriteLabel($tablebody, $kolombody++, $data->nama_owner);
        xlsWriteLabel($tablebody, $kolombody++, $data->logo);
        xlsWriteLabel($tablebody, $kolombody++, $data->surat);
        xlsWriteLabel($tablebody, $kolombody++, $data->ttd);
        xlsWriteNumber($tablebody, $kolombody++, $data->id_user);
    
        if ($data->status == 0) {
            $status = "Diajukan";
        } else if ($data->status == 1) {
            $status = "Disetujui";
        } else if ($data->status == 2) {
            $status = "Perlu Perbaikan";
        } else if ($data->status == 3) {
            $status = "Ditolak";
        }
    
        xlsWriteLabel($tablebody, $kolombody++, $status);
    
        $tablebody++;
        $nourut++;
    }
    
    xlsEOF();
    exit();
}
    

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_permohonan.doc");

        $data = array(
            'tbl_permohonan_data' => $this->Permohonan_admin_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('permohonan/tbl_permohonan_doc',$data);
    }

}

/* End of file Permohonan.php */
/* Location: ./application/controllers/Permohonan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-11-27 14:16:19 */
/* http://harviacode.com */