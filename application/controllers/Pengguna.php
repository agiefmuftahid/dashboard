<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengguna_model', 'pengguna_model');
    }

    public function index()
    {
        $data = [
            'menu' => 'data_pengguna',
            'title' => 'Data Pengguna'
        ];
        $this->load->view('pengguna/data_pengguna', $data);
    }

    public function get_pengguna()
    {
        $query = $this->pengguna_model->get_datatables('*');
        $data = array();
        $no = $this->input->post('start');
        foreach ($query as $row) {
            $table_data = array();
            $table_data[] = $no++;
            $table_data[] = $row->username;
            $table_data[] = $row->email;
            $table_data[] =
                '<div class="btn-group"><button onclick="location.href=' . "'" . base_url('detail_pengguna/' . base64_encode($this->encrypt->encode($row->id))) . "'" .
                '" class="btn btn-primary btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"><span class="fas fa-eye" data-fa-transform="shrink-3"></span></button><button onclick="location.href=' . "'" . base_url('hapus_pengguna/' . base64_encode($this->encrypt->encode($row->id))) . "'" . '" class="btn btn-danger btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus"><span class="fas fa-trash" data-fa-transform="shrink-3"></span></button></div>';


            $data[] = $table_data;
        }

        $total_record = $this->pengguna_model->count_filtered();
        $json_data = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $total_record,
            "recordsFiltered" => $total_record,
            "data" => $data,
        );
        echo json_encode($json_data);
    }

    private function _get_pengguna_curl()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => 'http://localhost:8056/kepenggunaan/pengguna/json_pengguna', //change soon
            CURLOPT_CONNECTTIMEOUT => 120,
            CURLOPT_TIMEOUT => 120,
            CURLOPT_MAXREDIRS => 1,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_HTTPHEADER => array('Content-Type:application/json')
        ));
        $json = curl_exec($curl);
        curl_close($curl);
        return $json;
    }

    public function update_data_pengguna()
    {
        $json = $this->_get_pengguna_curl();
        $arr = json_decode(json_decode($json)->data);
        $removed_keys = ['id_pengguna_sikep', 'nip_baru', 'jabatan', 'nip_lama', 'foto_pengguna', 'pendidikan_instansi', 'pendidikan_tahun_lulus', 'aktif'];
        for ($i = 0; $i < count($arr); $i++) {
            $arr[$i] = (array) $arr[$i];
            $arr[$i]['nip'] = $arr[$i]['nip_baru'];
            $arr[$i]['jabatan_sikep'] = $arr[$i]['jabatan'];
            for ($j = 0; $j < count($removed_keys); $j++) {
                unset($arr[$i][$removed_keys[$j]]);
            }
        }
        $query = $this->db->on_duplicate('pengguna', $arr);
        if ($query) {
            echo json_encode(array('st' => 1, 'msg' => 'Update data berhasil'));
        } else {
            echo json_encode(array('st' => 0, 'msg' => 'Update data gagal'));
        }
    }

    public function detail_pengguna($id = false)
    {
        $data = [
            'menu' => 'detail_pengguna',
            'title' => 'Data Detail pengguna'
        ];
        $this->load->view('pengguna/detail_pengguna', $data);
    }

    public function print_data_pengguna()
    {
        $data = [
            'menu' => 'print_data_pengguna',
            'title' => 'Cetak Data pengguna'
        ];
        $query = $this->pengguna_model->get_data_from_table('*', 'pengguna.nama asc');
        if ($query) {
            $data['query'] = $query;
            $this->load->view('pengguna/print_data_pengguna', $data);
        } else {
            return false;
        }
    }
}
