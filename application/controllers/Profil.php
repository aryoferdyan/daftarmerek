<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        //$this->load->model('Profil_model');
        //$this->load->library('form_validation');        
    }

}