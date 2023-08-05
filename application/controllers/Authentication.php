<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authentication extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('authentication_model', 'authentication');
    }

    public function index()
    {
        $data = [
            'menu' => 'login',
            'title' => 'Login'
        ];
        $this->load->view('authentication/login', $data);
    }

    public function validate_login()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required', arr_validation_rules_msg());
        $this->form_validation->set_rules('password', 'Kata Sandi', 'trim|required', arr_validation_rules_msg());

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('st' => 0, 'msg' => validation_errors()));
            return false;
        }

        $user = $this->authentication->check_login($this->input->post('username', true));
        if ($user) {
            if (base64_decode($user[0]['password']) == $this->input->post('password', true)) {
                $data = [
                    'username'  => $user[0]['username'],
                    'logged_in' => true,
                ];
                $this->session->set_userdata($data);
                echo json_encode(array('st' => 1, 'msg' => 'Login berhasil'));
            } else {
                echo json_encode(array('st' => 0, 'msg' => 'Login gagal'));
            }
        } else {
            echo json_encode(array('st' => 0, 'msg' => 'Error'));
            return false;
        }
    }
}
