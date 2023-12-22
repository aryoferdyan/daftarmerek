<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public $table_permohonan = 'tbl_menu';
    public $table_log = 'tbl_menu';

    public function getPermohonanData() {
        // ... (same logic as in your original code)
        return json_encode($dataPermohonan);
    }

    public function getLogData() {
        // ... (same logic as in your original code)
        return json_encode($dataLog);
    }

}
