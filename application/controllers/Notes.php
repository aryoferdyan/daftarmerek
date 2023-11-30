<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Notes extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Notes_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','notes/tbl_notes_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Notes_model->json();
    }

    public function read($id) 
    {
        $row = $this->Notes_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_notes' => $row->id_notes,
		'id_permohonan' => $row->id_permohonan,
		'tgl_notes' => $row->tgl_notes,
		'isi_notes' => $row->isi_notes,
	    );
            $this->template->load('template','notes/tbl_notes_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('notes'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('notes/create_action'),
	    'id_notes' => set_value('id_notes'),
	    'id_permohonan' => set_value('id_permohonan'),
	    'tgl_notes' => set_value('tgl_notes'),
	    'isi_notes' => set_value('isi_notes'),
	);
        $this->template->load('template','notes/tbl_notes_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_permohonan' => $this->input->post('id_permohonan',TRUE),
		'tgl_notes' => $this->input->post('tgl_notes',TRUE),
		'isi_notes' => $this->input->post('isi_notes',TRUE),
	    );

            $this->Notes_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('notes'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Notes_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('notes/update_action'),
		'id_notes' => set_value('id_notes', $row->id_notes),
		'id_permohonan' => set_value('id_permohonan', $row->id_permohonan),
		'tgl_notes' => set_value('tgl_notes', $row->tgl_notes),
		'isi_notes' => set_value('isi_notes', $row->isi_notes),
	    );
            $this->template->load('template','notes/tbl_notes_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('notes'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_notes', TRUE));
        } else {
            $data = array(
		'id_permohonan' => $this->input->post('id_permohonan',TRUE),
		'tgl_notes' => $this->input->post('tgl_notes',TRUE),
		'isi_notes' => $this->input->post('isi_notes',TRUE),
	    );

            $this->Notes_model->update($this->input->post('id_notes', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('notes'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Notes_model->get_by_id($id);

        if ($row) {
            $this->Notes_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('notes'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('notes'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_permohonan', 'id permohonan', 'trim|required');
	$this->form_validation->set_rules('tgl_notes', 'tgl notes', 'trim|required');
	$this->form_validation->set_rules('isi_notes', 'isi notes', 'trim|required');

	$this->form_validation->set_rules('id_notes', 'id_notes', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_notes.xls";
        $judul = "tbl_notes";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Permohonan");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Notes");
	xlsWriteLabel($tablehead, $kolomhead++, "Isi Notes");

	foreach ($this->Notes_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_permohonan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_notes);
	    xlsWriteLabel($tablebody, $kolombody++, $data->isi_notes);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Notes.php */
/* Location: ./application/controllers/Notes.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-11-30 14:36:38 */
/* http://harviacode.com */