<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('authentication_model', 'authentication');
    }

    public function index()
    {
        $data = [
            'menu' => 'dashboard',
            'title' => 'Dashboard'
        ];
        $this->load->view('dashboard/cakap_dashboard', $data);
    }
}
