<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cakap extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Cakap_model', 'cakap_model');
    }

    public function index()
    {
        $data = [
            'menu' => 'dashboard_cakap',
            'title' => 'Dashboard Cakap'
        ];
        $this->load->view('dashboard/cakap_dashboard', $data);
    }

    private function _curl_data($method, $url)
    {
        $curl = curl_init();
        if ($method === 'GET') {
            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_USERPWD => '4dm1n:p4ssw0rd',
                CURLOPT_URL => $url,
                CURLOPT_CUSTOMREQUEST   => $method,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_HTTPHEADER => array('Content-Type:application/json')
            ));
        }
        $result = curl_exec($curl);
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
            return $error_msg;
        }
        curl_close($curl);
        return $result;
    }

    public function fetch_data()
    {
        $json_curl_data = $this->_curl_data('GET', 'https://cakap.pt-bengkulu.go.id/api/json_banding');
        $arr = json_decode($json_curl_data, true);
        if ($arr['status']['st'] != 1) {
            $response = array('st' => 0, 'msg' => 'Gagal Ambil Data');
            header("HTTP/1.1 500 Internal Server Error");
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($response);
            return 0;
        }

        for ($i = 0; $i < count($arr['data']); $i++) {
            $arr['data'][$i]['list_perkara'] = json_encode($arr['data'][$i]['list_perkara']);
        }

        $query = $this->cakap_model->update_statistik_cakap_banding($arr['data']);
        if ($query) {
            $response = array('st' => 1, 'msg' => 'Berhasil ' . ucwords($query['act']) . ' Data');
            header("HTTP/1.1 200 OK");
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($response);
        } else {
            $response = array('st' => 0, 'msg' => 'Gagal Insert/Update Data');
            header("HTTP/1.1 500 Internal Server Error");
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($response);
            return 0;
        }
    }

    public function get_data($tahun = false)
    {
        if (!$tahun) {
            $response = array('st' => 0, 'msg' => 'Data tahun kosong');
            header("HTTP/1.1 500 Internal Server Error");
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($response);
            return 0;
        }

        $query = $this->cakap_model->get_statistik_cakap_banding($tahun);
        if ($query) {
            $response = array('st' => 1, 'msg' => 'Berhasil Ambil Data', 'data' => $query['data']);
            header("HTTP/1.1 200 OK");
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($response);
        } else {
            $response = array('st' => 0, 'msg' => 'Gagal Ambil Data', 'data' => null);
            header("HTTP/1.1 500 Internal Server Error");
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($response);
            return 0;
        }
    }

    public function get_list_perkara()
    {
        $arr = $this->db->get_where('statistik_cakap_banding', array('id_statistik' => 1, 'tahun' => 2023))->result_array();
        $test = json_decode($arr[0]['list_perkara']);
        echo $test[0]->pn_id;
    }
}
