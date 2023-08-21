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

    public function get_data($tahun = false, $id = false)
    {
        if (!$tahun) {
            $response = array('st' => 0, 'msg' => 'Data tahun kosong');
            header("HTTP/1.1 500 Internal Server Error");
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($response);
            return 0;
        }

        if ($id) {
            $id = intval($this->encrypt->decode(base64_decode($id)));
            $query = $this->cakap_model->get_statistik_cakap_banding($tahun, $id);
        } else {
            $query = $this->cakap_model->get_statistik_cakap_banding($tahun);
        }


        $no = intval($this->input->post('start'));
        $data = array();

        if ($query) {
            for ($i = 0; $i < count($query['data']); $i++) {
                if ($id) {
                    $list_perkara = json_decode($query['data'][$i]->list_perkara);
                    for ($j = 0; $j < count($list_perkara); $j++) {
                        switch ($query['data'][$i]->id_statistik) {
                            case 6:
                            case 7:
                                $no++;
                                $UserData = array();
                                $UserData[] = $no;
                                $UserData[] = $list_perkara[$j]->nomor_perkara_pn;
                                $UserData[] = $list_perkara[$j]->nomor_perkara_banding;
                                $UserData[] = $list_perkara[$j]->tanggal_pendaftaran_banding;
                                $UserData[] = $list_perkara[$j]->putusan_banding;
                                $UserData[] = $list_perkara[$j]->tgl_minutasi;
                                $UserData[] = (($list_perkara[$j]->lama >= 0) ? $list_perkara[$j]->lama . " Hari" : "<p class=\"text-danger\">UNKNOWN</p>");
                                $data[] = $UserData;
                                break;
                            case 9:
                            case 11:
                            case 12:
                            case 14:
                            case 15:
                            case 17:
                                $no++;
                                $UserData = array();
                                $UserData[] = $no;
                                $UserData[] = $list_perkara[$j]->nomor_perkara_pn;
                                $UserData[] = $list_perkara[$j]->nomor_perkara_banding;
                                $UserData[] = $list_perkara[$j]->tanggal_pendaftaran_banding;
                                $UserData[] = $list_perkara[$j]->putusan_banding;
                                $UserData[] = $list_perkara[$j]->tgl_minutasi;
                                $data[] = $UserData;
                                break;
                            default:
                                $table_body = '<td colspan="100%" style="text-align: center;">No Data</td>';
                                break;
                        }
                    }
                    $output['draw'] = $this->input->post('draw', true);
                    $output['data'] = $data;
                    $output['recordsTotal'] = count($list_perkara);
                    $output['recordsFiltered'] = count($list_perkara);

                    echo json_encode(array(
                        'st' => 1,
                        'data' => $output
                    ));
                    return 1;
                }
                $query['data'][$i]->id_statistik = base64_encode($this->encrypt->encode($query['data'][$i]->id_statistik));
            }
            $response = array('st' => 1, 'msg' => 'Berhasil Ambil Data', 'data' => $query['data']);
            header("HTTP/1.1 200 OK");
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($response);
            return 1;
        } else {
            $response = array('st' => 0, 'msg' => 'Gagal Ambil Data', 'data' => null);
            header("HTTP/1.1 500 Internal Server Error");
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($response);
            return 0;
        }
    }

    public function detail_data_banding($tahun, $id)
    {
        if ($id) {
            $id_decrypt = intval($this->encrypt->decode(base64_decode($id)));
            $query = $this->cakap_model->get_statistik_cakap_banding($tahun, $id_decrypt);
        } else {
            $response = array('st' => 0, 'msg' => 'Gagal Ambil Data', 'data' => null);
            header("HTTP/1.1 500 Internal Server Error");
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($response);
            return 0;
        }
        $table_head = '';
        if ($query) {
            for ($i = 0; $i < count($query['data']); $i++) {
                if ($id) {
                    $list_perkara = json_decode($query['data'][$i]->list_perkara);
                    for ($j = 0; $j < count($list_perkara); $j++) {
                        switch ($query['data'][$i]->id_statistik) {
                            case 6:
                            case 7:
                                $table_head = '<tr><th class="sort" data-sort="no">#</th><th class="sort" data-sort="no_perkara_tk_i">No Perkara Tk I</th><th class="sort" data-sort="no_perkara_banding">No Perkara Banding</th><th class="sort" data-sort="tgl_daftar_banding">Tanggal Daftar Banding</th><th class="sort" data-sort="tgl_putus_banding">Tanggal Putus Banding</th><th class="sort" data-sort="tgl_minutasi_banding">Tanggal Minutasi Banding</th><th class="sort" data-sort="lama_proses">Lama Proses</th></tr>';
                                break;
                            case 9:
                            case 11:
                            case 12:
                            case 14:
                            case 15:
                            case 17:
                                $table_head = '<tr><th class="sort" data-sort="no">#</th><th class="sort" data-sort="no_perkara_tk_i">No Perkara Tk I</th><th class="sort" data-sort="no_perkara_banding">No Perkara Banding</th><th class="sort" data-sort="tgl_daftar_banding">Tanggal Daftar Banding</th><th class="sort" data-sort="tgl_putus_banding">Tanggal Putus Banding</th><th class="sort" data-sort="tgl_minutasi_banding">Tanggal Minutasi Banding</th></tr>';
                                break;
                            default:
                                $table_head = '<tr><th class="sort" data-sort="no_perkara_tk_i">No Perkara Tk I</th><th class="sort" data-sort="no_perkara_banding">No Perkara Banding</th><th class="sort" data-sort="tgl_daftar_banding">Tanggal Daftar Banding</th><th class="sort" data-sort="tgl_putus_banding">Tanggal Putus Banding</th><th class="sort" data-sort="tgl_minutasi_banding">Tanggal Minutasi Banding</th></tr>';
                                break;
                        }
                    }
                }
                $arr_desc_page = getJenisDataCakap($query['data'][$i]->jenis);
            }
        } else {
            $response = array('st' => 0, 'msg' => 'Gagal Ambil Data', 'data' => null);
            header("HTTP/1.1 500 Internal Server Error");
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($response);
            return 0;
        }

        $data = [
            'menu' => 'detail_data_banding',
            'title' => 'Detail Data',
            'id_statistik' => $id,
            'thead' => $table_head,
            'arr_desc_page' => $arr_desc_page
        ];
        $this->load->view('detail_data/detail_cakap_banding', $data);
    }

    public function get_list_perkara()
    {
        $arr = $this->db->get_where('statistik_cakap_banding', array('id_statistik' => 1, 'tahun' => 2023))->result_array();
        $test = json_decode($arr[0]['list_perkara']);
        echo $test[2]->nomor_perkara_pn;
    }
}
