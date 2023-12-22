<?php

// defined('BASEPATH') OR exit('No direct script access allowed');

class Home2 extends CI_Controller {


    
    // function __construct()
    // {
    //     parent::__construct();
    //     is_login();
    //     $this->load->model('Profil_model');
    //    // $this->load->model('Dashboard_model');
    // }

    public function index() {
        //$this->load->view('table');
        // $this->template->load('');
        // $this->load->view('home/index2');
        $this->template->load('template', 'home/index2.php');

       // $data['jsonDataPermohonan'] = $this->Dashboard_model->getPermohonanData();
        //$data['jsonDataLog'] = $this->Dashboard_model->getLogData();
       // $this->load->view('graph_view', );
    }

    public function search() {
        // Logic to fetch data from the API
        $url = "https://pdki-indonesia.dgip.go.id/api/search?keyword=kotoruba&page=1&showFilter=true&type=trademark";
        $pdki_sign = "PDKI/735032dcbdf964d2c4426c1c2442e1650017fab3c979c42bbb390effc39425041625f60d46edfcd88363d4473bda49da967333c6a21ac6da689fc4321d5ed572";

        $data = Http::withHeaders([
            'Pdki-Signature' => $pdki_sign
        ])->get($url)->body();

        // Pass the data to the view
        $this->template->load('home/index2.php', ['data' => $data]);

      //  $this->load->view('search_result', ['data' => $data]);
    }
}
