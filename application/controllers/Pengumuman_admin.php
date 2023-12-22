<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengumuman_admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Pengumuman_admin_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','pengumuman_admin/tbl_pengumuman_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Pengumuman_admin_model->json();
    }

    public function read($id) 
    {
        $row = $this->Pengumuman_admin_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pengumuman' => $row->id_pengumuman,
		'tgl_pengumuman' => $row->tgl_pengumuman,
		'isi_pengumuman' => $row->isi_pengumuman,
		'id_user' => $row->id_user,
	    );
            $this->template->load('template','pengumuman_admin/tbl_pengumuman_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengumuman_admin'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pengumuman_admin/create_action'),
	    'id_pengumuman' => set_value('id_pengumuman'),
	    'tgl_pengumuman' => set_value('tgl_pengumuman'),
	    'isi_pengumuman' => set_value('isi_pengumuman'),
	    'id_user' => set_value('id_user'),
	);
        $this->template->load('template','pengumuman_admin/tbl_pengumuman_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tgl_pengumuman' => $this->input->post('tgl_pengumuman',TRUE),
		'isi_pengumuman' => $this->input->post('isi_pengumuman',TRUE),
		'id_user' => $this->input->post('id_user',TRUE),
	    );

            $this->Pengumuman_admin_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('pengumuman_admin'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pengumuman_admin_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pengumuman_admin/update_action'),
		'id_pengumuman' => set_value('id_pengumuman', $row->id_pengumuman),
		'tgl_pengumuman' => set_value('tgl_pengumuman', $row->tgl_pengumuman),
		'isi_pengumuman' => set_value('isi_pengumuman', $row->isi_pengumuman),
		'id_user' => set_value('id_user', $row->id_user),
	    );
            $this->template->load('template','pengumuman_admin/tbl_pengumuman_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengumuman_admin'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pengumuman', TRUE));
        } else {
            $data = array(
		'tgl_pengumuman' => $this->input->post('tgl_pengumuman',TRUE),
		'isi_pengumuman' => $this->input->post('isi_pengumuman',TRUE),
		'id_user' => $this->input->post('id_user',TRUE),
	    );

            $this->Pengumuman_admin_model->update($this->input->post('id_pengumuman', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pengumuman'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pengumuman_admin_model->get_by_id($id);

        if ($row) {
            $this->Pengumuman_admin_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pengumuman'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengumuman'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tgl_pengumuman', 'tgl pengumuman', 'trim|required');
	$this->form_validation->set_rules('isi_pengumuman', 'isi pengumuman', 'trim|required');
	$this->form_validation->set_rules('id_user', 'id user', 'trim|required');

	$this->form_validation->set_rules('id_pengumuman', 'id_pengumuman', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_pengumuman.xls";
        $judul = "tbl_pengumuman";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Pengumuman");
	xlsWriteLabel($tablehead, $kolomhead++, "Isi Pengumuman");
	xlsWriteLabel($tablehead, $kolomhead++, "Id User");

	foreach ($this->Pengumuman_admin_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_pengumuman);
	    xlsWriteLabel($tablebody, $kolombody++, $data->isi_pengumuman);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_user);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Pengumuman.php */
/* Location: ./application/controllers/Pengumuman.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-11-30 14:36:52 */
/* http://harviacode.com */