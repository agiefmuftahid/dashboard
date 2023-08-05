<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Detil extends BaseController
{
    /**
     * This is default constructor of the class
     */
    private $arr_db = null;

    public function __construct()
    {
        parent::__construct();

        // paksa landing page
        if ($this->session->userdata('landing') == NULL) {
            redirect('landing');
        }

        $this->load->model('Iku_model', 'iku');
        $this->arr_db = $this->db->get_where('satker', array('pn_id>' => 0))->result();

        $list_tahun = $this->iku->listTahunKalkulasi();
        $select_tahun = '<select class="custom-select" id="tahunpilih">';
        foreach ($list_tahun as $row) {
            $select_tahun .= '<option value="' . $row->tahun . '"';
            if (intval($this->session->userdata('tahun')) == $row->tahun) {
                $select_tahun .= 'selected';
            }
            $select_tahun .= '>' . $row->tahun . '</option>';
        }
        // $select_tahun .= '<option value="2019">2019</option>'; 
        $select_tahun .= '</select>';

        $this->global['appListTahun'] = $select_tahun;
    }

    public function index($id = false, $satker = false)
    {
        $this->global['pageTitle'] = $this->config->item('app_title') . ' : Dashboard';
        $this->global['appTitle'] = $this->config->item('app_title');
        $this->global['appDesc'] = $this->config->item('app_desc');

        $id         = $this->encrypt->decode(base64_decode($id));
        $satker     = $this->encrypt->decode(base64_decode($satker));
        if ($id === false || $satker === false) {
            $this->pageNotFound();
            exit;
        }
        echo "id:$id | satker:$satker";
        $getLastCalc            = $this->iku->getLastUpdate();
        $getInfoNilai           = $this->iku->getInfoNilai($id, $satker);

        if ($getLastCalc) {
            $this->global['appLastCalc'] = convertDayDateHour($getLastCalc);
        } else {
            $this->global['appLastCalc'] = "Belum ada update data.";
        }

        // handle table column PT Only (satker 0)
        if ($satker <= 0) {
            switch ($id) {
                case '1':
                    $data['thead']  = "<th>#</th>
                        <th>No Perkara Tk.I</th>
                        <th>No Perkara Banding</th>
                        <th>Tgl Daftar Banding</th>
                        <th>Tgl Putus Banding</th>
                        <th>Tgl Minutasi Banding</th>
						<th>Lama Proses</th>";
                    $keterangan = "";
                    $SisaPerkaraLalu           = $this->iku->getInfoNilai('13', $satker);
                    $SisaPerkaraLaluSelesai    = round(($SisaPerkaraLalu->nilai * floatval(str_replace('%', '', $this->iku->getInfoNilai('1', $satker)->nilai))) / 100);
                    $keterangan = "Perkara Selesai Tahun Lalu: $SisaPerkaraLaluSelesai | " . $SisaPerkaraLalu->nama . ": <a href='" . base_url('detil/' . base64_encode($this->encrypt->encode(13)) . '/' . base64_encode($this->encrypt->encode($satker))) . "'>" . $SisaPerkaraLalu->nilai . "</a>";
                    $this->global['appKet'] = $keterangan;
                    break;
                case '2':
                    $data['thead']  = "<th>#</th>
                        <th>No Perkara Tk.I</th>
                        <th>No Perkara Banding</th>
                        <th>Tgl Daftar Banding</th>
                        <th>Tgl Putus Banding</th>
                        <th>Tgl Minutasi Banding</th>
                        <th>Lama Proses</th>";
                    $keterangan = "";
                    $PerkaraPutus    = $this->iku->getInfoNilai('19', $satker)->nilai;
                    $PerkaraTepat   = $this->iku->getInfoNilai('21', $satker)->nilai;
                    $PerkaraTidakTepat   = $this->iku->getInfoNilai('26', $satker)->nilai;
                    $keterangan = "Perkara Tepat Waktu: $PerkaraTepat | Tidak Tepat: " . "<a href='" . base_url('detil/' . base64_encode($this->encrypt->encode(26)) . '/' . base64_encode($this->encrypt->encode($satker))) . "'>$PerkaraTidakTepat</a>" . " | Perkara Putus: <a href='" . base_url('detil/' . base64_encode($this->encrypt->encode(19)) . '/' . base64_encode($this->encrypt->encode($satker))) . "'>$PerkaraPutus</a>";
                    $this->global['appKet'] = $keterangan;
                    break;
                case '3':
                    $data['thead']  = "<th>#</th>
                        <th>No Perkara Tk.I</th>
                        <th>No Perkara Banding</th>
                        <th>Tgl Daftar Banding</th>
                        <th>Tgl Putus Banding</th>
                        <th>Tgl Minutasi Banding</th>";
                    $keterangan = "";
                    $PerkaraPidanaBanding       = $this->iku->CountPTPidanaBanding();
                    $PerkaraPidanaTidakKasasi   = $this->iku->CountPTPidanaTidakKasasi();
                    $keterangan = "Perkara Pidana Tidak Kasasi: <a href='" . base_url('detil/' . base64_encode($this->encrypt->encode(17)) . '/' . base64_encode($this->encrypt->encode($satker))) . "'>$PerkaraPidanaTidakKasasi</a> | Total Perkara Pidana: <a href='" . base_url('detil/' . base64_encode($this->encrypt->encode(15)) . '/' . base64_encode($this->encrypt->encode($satker))) . "'>$PerkaraPidanaBanding</a>";
                    $this->global['appKet'] = $keterangan;
                    break;
                case '4':
                    $data['thead']  = "<th>#</th>
                        <th>No Perkara Tk.I</th>
                        <th>No Perkara Banding</th>
                        <th>Tgl Daftar Banding</th>
                        <th>Tgl Putus Banding</th>
                        <th>Tgl Minutasi Banding</th>";
                    $keterangan = "";
                    $PerkaraPerdataBanding       = $this->iku->CountPTPerdataBanding();
                    $PerkaraPerdataTidakKasasi   = $this->iku->CountPTPerdataTidakKasasi();
                    $keterangan = "Perkara Perdata Tidak Kasasi: <a href='" . base_url('detil/' . base64_encode($this->encrypt->encode(18)) . '/' . base64_encode($this->encrypt->encode($satker))) . "'>$PerkaraPerdataTidakKasasi</a> | Total Perkara Perdata: <a href='" . base_url('detil/' . base64_encode($this->encrypt->encode(16)) . '/' . base64_encode($this->encrypt->encode($satker))) . "'>$PerkaraPerdataBanding</a>";
                    $this->global['appKet'] = $keterangan;
                    break;
                case '19':
                    $data['thead']  = "<th>#</th>
                        <th>No Perkara Tk.I</th>
                        <th>No Perkara Banding</th>
                        <th>Tgl Daftar Banding</th>
                        <th>Tgl Putus Banding</th>
                        <th>Tgl Minutasi Banding</th>
						<th>Lama Proses</th>";
                    break;
                case '26':
                    $data['thead']  = "<th>#</th>
                        <th>No Perkara Tk.I</th>
                        <th>No Perkara Banding</th>
                        <th>Tgl Daftar Banding</th>
                        <th>Tgl Putus Banding</th>
                        <th>Tgl Minutasi Banding</th>
                        <th>Lama Proses</th>";
                    break;

                case '30':
                    $data['thead']  = "<th>#</th>
                        <th>No Perkara Tk.I</th>
                        <th>No Perkara Banding</th>
                        <th>Tgl Daftar Banding</th>
                        <th>Tgl Putus Banding</th>
                        <th>Tgl Minutasi Banding</th>";
                    $keterangan = "";
                    $PerkaraPidanaTipikorBanding       = $this->iku->CountPTPidanaTipikorBandingMinutasi();
                    $PerkaraPidanaTipikorTidakKasasi   = $this->iku->CountPTPidanaTipikorTidakKasasi();
                    $keterangan = "Perkara Pidana Tipikor Tidak Kasasi: <a href='" . base_url('detil/' . base64_encode($this->encrypt->encode(33)) . '/' . base64_encode($this->encrypt->encode($satker))) . "'>$PerkaraPidanaTipikorTidakKasasi</a> | Total Perkara Pidana Tipikor: <a href='" . base_url('detil/' . base64_encode($this->encrypt->encode(30)) . '/' . base64_encode($this->encrypt->encode($satker))) . "'>$PerkaraPidanaTipikorBanding</a>";
                    $this->global['appKet'] = $keterangan;
                    break;

                default:
                    $data['thead']  = "<th>#</th>
                        <th>No Perkara Tk.I</th>
                        <th>No Perkara Banding</th>
                        <th>Tgl Daftar Banding</th>
                        <th>Tgl Putus Banding</th>
                        <th>Tgl Minutasi Banding</th>";
                    break;
            }
        } else {
            switch ($id) {
                case '5':
                    $data['thead']  = "<th>#</th>
                        <th>No Perkara</th>
                        <th>Tgl Pendaftaran</th>
                        <th>Tgl Putusan</th>
                        <th>Tgl Minutasi</th>
						<th>Lama Proses</th>
                        <th>Proses Terakhir</th>";
                    $keterangan = "";
                    $SisaPerkaraLampau        = $this->iku->getInfoNilai('13', $satker);
                    $SelesaiPerkaraLampau   = round(($SisaPerkaraLampau->nilai * floatval(str_replace('%', '', $this->iku->getInfoNilai('5', $satker)->nilai))) / 100);
                    $keterangan = "Perkara Selesai Tahun Lalu: " . $SelesaiPerkaraLampau . " | " . $SisaPerkaraLampau->nama . ": <a href='" . base_url('detil/' . base64_encode($this->encrypt->encode(13)) . '/' . base64_encode($this->encrypt->encode($satker))) . "'>" . $SisaPerkaraLampau->nilai . "</a>";
                    $this->global['appKet'] = $keterangan;
                    break;
                case '6':
                    $data['thead']  = "<th>#</th>
                        <th>No Perkara</th>
                        <th>Tgl Pendaftaran</th>
                        <th>Tgl Putusan</th>
                        <th>Tgl Minutasi</th>
                        <th>Lama Proses</th>
                        <th>Proses Terakhir</th>";
                    $keterangan = "";
                    $PerkaraPutus    = $this->iku->getInfoNilai('19', $satker);
                    $PerkaraTepat   = $this->iku->getInfoNilai('22', $satker);
                    $PerkaraTidakTepat   = $this->iku->getInfoNilai('27', $satker);
                    $keterangan = $PerkaraTepat->nama . ": " . $PerkaraTepat->nilai . " | " . $PerkaraTidakTepat->nama . ": <a href='" . base_url('detil/' . base64_encode($this->encrypt->encode(27)) . '/' . base64_encode($this->encrypt->encode($satker))) . "'>" . $PerkaraTidakTepat->nilai . "</a>" . " | " . $PerkaraPutus->nama . ": <a href='" . base_url('detil/' . base64_encode($this->encrypt->encode(19)) . '/' . base64_encode($this->encrypt->encode($satker))) . "'>" . $PerkaraPutus->nilai . "</a>";
                    $this->global['appKet'] = $keterangan;
                    break;
                case '7':
                    $data['thead']  = "<th>#</th>
                        <th>No Perkara</th>
                        <th>Tgl Pendaftaran</th>
                        <th>Hakim Mediator</th>
                        <th>Tgl Mulai Mediasi</th>
                        <th>Tgl Keputusan Mediasi</th>
                        <th>Proses Terakhir</th>";
                    break;
                case '8':
                    $data['thead']  = "<th>#</th>
                        <th>No Perkara</th>
                        <th>Tgl Pendaftaran</th>
                        <th>Tgl Putusan</th>
                        <th>Tgl Kirim Salinan Putusan</th>
                        <th>Tgl Minutasi</th>
                        <th>Lama Proses</th>";
                    $keterangan = "";
                    $PerkaraPutus    = $this->iku->getInfoNilai('19', $satker);
                    $PerkaraTepat   = $this->iku->getInfoNilai('23', $satker);
                    $PerkaraTidakTepat   = $this->iku->getInfoNilai('28', $satker);
                    $keterangan = $PerkaraTepat->nama . ": " . $PerkaraTepat->nilai . " | " . $PerkaraTidakTepat->nama . ": <a href='" . base_url('detil/' . base64_encode($this->encrypt->encode(28)) . '/' . base64_encode($this->encrypt->encode($satker))) . "'>" . $PerkaraTidakTepat->nilai . "</a>" . " | " . $PerkaraPutus->nama . ": <a href='" . base_url('detil/' . base64_encode($this->encrypt->encode(19)) . '/' . base64_encode($this->encrypt->encode($satker))) . "'>" . $PerkaraPutus->nilai . "</a>";
                    $this->global['appKet'] = $keterangan;
                    break;
                case '9':
                    $data['thead']  = "<th>#</th>
                        <th>No Perkara Tk I</th>
                        <th>No Perkara Banding</th>
                        <th>Tgl Pendaftaran</th>
                        <th>Tgl Putusan</th>
                        <th>Tgl Minutasi</th>
                        <th>Tgl Permohonan Banding</th>
                        <th>Tgl Pengiriman Berkas Banding</th>
                        <th>Lama Proses</th>
                        <th>Proses Terakhir</th>";
                    $keterangan = "";
                    $PerkaraBanding    = $this->iku->getInfoNilai('20', $satker);
                    $PerkaraTepat   = $this->iku->getInfoNilai('24', $satker);
                    $PerkaraTidakTepat   = $this->iku->getInfoNilai('29', $satker);
                    $keterangan = $PerkaraTepat->nama . ": " . $PerkaraTepat->nilai . " | " . $PerkaraTidakTepat->nama . ": <a href='" . base_url('detil/' . base64_encode($this->encrypt->encode(29)) . '/' . base64_encode($this->encrypt->encode($satker))) . "'>" . $PerkaraTidakTepat->nilai . "</a>" . " | " . $PerkaraBanding->nama . ": <a href='" . base_url('detil/' . base64_encode($this->encrypt->encode(20)) . '/' . base64_encode($this->encrypt->encode($satker))) . "'>" . $PerkaraBanding->nilai . "</a>";
                    $this->global['appKet'] = $keterangan;
                    break;
                case '19':
                    $data['thead']  = "<th>#</th>
                        <th>No Perkara</th>
                        <th>Tgl Pendaftaran</th>
                        <th>Tgl Putusan</th>
                        <th>Tgl Minutasi</th>
						<th>Lama Proses</th>
                        <th>Kirim Salput</th>
                        <th>Proses Terakhir</th>";
                    break;
                case '20':
                    $data['thead']  = "<th>#</th>
                        <th>No Perkara Tk I</th>
                        <th>No Perkara Banding</th>
                        <th>Tgl Pendaftaran Banding</th>
                        <th>Tgl Putusan</th>
                        <th>Tgl Minutasi</th>";
                    break;

                case '27':
                    $data['thead']  = "<th>#</th>
                        <th>No Perkara</th>
                        <th>Tgl Pendaftaran</th>
                        <th>Tgl Putusan</th>
                        <th>Tgl Minutasi</th>
                        <th>Lama Proses</th>
                        <th>Proses Terakhir</th>";
                    $keterangan = "";

                    break;
                case '28':
                    $data['thead']  = "<th>#</th>
                        <th>No Perkara</th>
                        <th>Tgl Pendaftaran</th>
                        <th>Tgl Putusan</th>
                        <th>Tgl Minutasi</th>
                        <th>Tgl Kirim Salinan Putusan</th>
                        <th>Lama Proses</th>";
                    break;
                case '29':
                    $data['thead']  = "<th>#</th>
                        <th>No Perkara Tk I</th>
                        <th>No Perkara Banding</th>
                        <th>Tgl Pendaftaran</th>
                        <th>Tgl Putusan</th>
                        <th>Tgl Minutasi</th>
                        <th>Tgl Permohonan Banding</th>
                        <th>Tgl Pengiriman Berkas Banding</th>
                        <th>Lama Proses</th>
                        <th>Proses Terakhir</th>";
                    break;

                default:
                    $data['thead']  = "<th>#</th>
                        <th>No Perkara</th>
                        <th>Tgl Pendaftaran</th>
                        <th>Tgl Putusan</th>
                        <th>Tgl Minutasi</th>
                        <th>Proses Terakhir</th>";
                    break;
            }
        }

        $data['apiURL']         = base_url('detildata/' . base64_encode($this->encrypt->encode($id)) . '/' . base64_encode($this->encrypt->encode($satker)));
        $data['appNamaInfo']    = $getInfoNilai->nama;
        $data['appNamaNilai']   = $getInfoNilai->nilai;
        $data['appNamaSatker']  = $getInfoNilai->pengadilan;


        $this->loadViews("detil", $this->global, $data, NULL);
    }

    public function data($id = false, $satker = false)
    {
        $id         = $this->encrypt->decode(base64_decode($id));
        $satker     = $this->encrypt->decode(base64_decode($satker));
        if ($id === false || $satker === false) {
            $this->pageNotFound();
            exit;
        }

        $no = intval($this->input->post('start'));
        $data = array();

        // handle data PT Only (satker 0)
        if ($satker <= 0) {

            switch ($id) {
                case '1':
                    $Perkara    = $this->iku->ListPTSelesaiTahunLalu();
                    $total      = $this->iku->CountPTSelesaiTahunLalu();

                    foreach ($Perkara as $row) {
                        $no++;
                        $UserData = array();
                        $UserData[] = $no;
                        $UserData[] = $row->nomor_perkara_pn;
                        $UserData[] = $row->nomor_perkara_banding;
                        $UserData[] = convertDate($row->tanggal_pendaftaran_banding);
                        $UserData[] = convertDate($row->putusan_banding);
                        $UserData[] = convertDate($row->tgl_minutasi);
                        $UserData[] = (($row->lama >= 0) ? $row->lama . " Hari" : "<p class=\"text-danger\">UNKNOWN</p>");
                        $data[] = $UserData;
                    }

                    break;

                case '2':
                    $Perkara    = $this->iku->ListPTTepatWaktu();
                    $total      = $this->iku->CountPTTepatWaktu();

                    foreach ($Perkara as $row) {
                        $no++;
                        $UserData = array();
                        $UserData[] = $no;
                        $UserData[] = $row->nomor_perkara_pn;
                        $UserData[] = $row->nomor_perkara_banding;
                        $UserData[] = convertDate($row->tanggal_pendaftaran_banding);
                        $UserData[] = convertDate($row->putusan_banding);
                        $UserData[] = convertDate($row->tgl_minutasi);
                        $UserData[] = (($row->lama >= 0) ? $row->lama . " Hari" : "<p class=\"text-danger\">UNKNOWN</p>");
                        $data[] = $UserData;
                    }
                    break;

                case '3':
                    $Perkara    = $this->iku->ListPTPidanaTidakKasasi();
                    $total      = $this->iku->CountPTPidanaTidakKasasi();

                    foreach ($Perkara as $row) {
                        $no++;
                        $UserData = array();
                        $UserData[] = $no;
                        $UserData[] = $row->nomor_perkara_pn;
                        $UserData[] = $row->nomor_perkara_banding;
                        $UserData[] = convertDate($row->tanggal_pendaftaran_banding);
                        $UserData[] = convertDate($row->putusan_banding);
                        $UserData[] = convertDate($row->tgl_minutasi);
                        $data[] = $UserData;
                    }
                    break;

                case '4':
                    $Perkara    = $this->iku->ListPTPerdataTidakKasasi();
                    $total      = $this->iku->CountPTPerdataTidakKasasi();

                    foreach ($Perkara as $row) {
                        $no++;
                        $UserData = array();
                        $UserData[] = $no;
                        $UserData[] = $row->nomor_perkara_pn;
                        $UserData[] = $row->nomor_perkara_banding;
                        $UserData[] = convertDate($row->tanggal_pendaftaran_banding);
                        $UserData[] = convertDate($row->putusan_banding);
                        $UserData[] = convertDate($row->tgl_minutasi);
                        $data[] = $UserData;
                    }
                    break;

                case '31':
                    $Perkara    = $this->iku->ListPTPidanaTipikorTidakKasasi();
                    $total      = $this->iku->CountPTPidanaTipikorTidakKasasi();

                    foreach ($Perkara as $row) {
                        $no++;
                        $UserData = array();
                        $UserData[] = $no;
                        $UserData[] = $row->nomor_perkara_pn;
                        $UserData[] = $row->nomor_perkara_banding;
                        $UserData[] = convertDate($row->tanggal_pendaftaran_banding);
                        $UserData[] = convertDate($row->putusan_banding);
                        $UserData[] = convertDate($row->tgl_minutasi);
                        $data[] = $UserData;
                    }
                    break;

                case '12':
                    $Perkara    = $this->iku->ListPTBanding();
                    $total      = $this->iku->CountPTBanding();

                    foreach ($Perkara as $row) {
                        $no++;
                        $UserData = array();
                        $UserData[] = $no;
                        $UserData[] = $row->nomor_perkara_pn;
                        $UserData[] = $row->nomor_perkara_banding;
                        $UserData[] = convertDate($row->tanggal_pendaftaran_banding);
                        $UserData[] = convertDate($row->putusan_banding);
                        $UserData[] = convertDate($row->tgl_minutasi);
                        $data[] = $UserData;
                    }
                    break;

                case '13':
                    $Perkara    = $this->iku->ListPTSisaTahunLalu();
                    $total      = $this->iku->CountPTSisaTahunLalu();
                    // var_dump($this->db->last_query());die;
                    foreach ($Perkara as $row) {
                        $no++;
                        $UserData = array();
                        $UserData[] = $no;
                        $UserData[] = $row->nomor_perkara_pn;
                        $UserData[] = $row->nomor_perkara_banding;
                        $UserData[] = convertDate($row->tanggal_pendaftaran_banding);
                        $UserData[] = convertDate($row->putusan_banding);
                        $UserData[] = convertDate($row->tgl_minutasi);
                        $data[] = $UserData;
                    }
                    break;

                case '14':
                    $Perkara    = $this->iku->ListPTPerkaraTahunLalu();
                    $total      = $this->iku->CountPTPerkaraTahunLalu();

                    foreach ($Perkara as $row) {
                        $no++;
                        $UserData = array();
                        $UserData[] = $no;
                        $UserData[] = $row->nomor_perkara_pn;
                        $UserData[] = $row->nomor_perkara_banding;
                        $UserData[] = convertDate($row->tanggal_pendaftaran_banding);
                        $UserData[] = convertDate($row->putusan_banding);
                        $UserData[] = convertDate($row->tgl_minutasi);
                        $data[] = $UserData;
                    }
                    break;

                case '15':
                    $Perkara    = $this->iku->ListPTPidanaBanding();
                    $total      = $this->iku->CountPTPidanaBanding();

                    foreach ($Perkara as $row) {
                        $no++;
                        $UserData = array();
                        $UserData[] = $no;
                        $UserData[] = $row->nomor_perkara_pn;
                        $UserData[] = $row->nomor_perkara_banding;
                        $UserData[] = convertDate($row->tanggal_pendaftaran_banding);
                        $UserData[] = convertDate($row->putusan_banding);
                        $UserData[] = convertDate($row->tgl_minutasi);
                        $data[] = $UserData;
                    }
                    break;

                case '16':
                    $Perkara    = $this->iku->ListPTPerdataBanding();
                    $total      = $this->iku->CountPTPerdataBanding();

                    foreach ($Perkara as $row) {
                        $no++;
                        $UserData = array();
                        $UserData[] = $no;
                        $UserData[] = $row->nomor_perkara_pn;
                        $UserData[] = $row->nomor_perkara_banding;
                        $UserData[] = convertDate($row->tanggal_pendaftaran_banding);
                        $UserData[] = convertDate($row->putusan_banding);
                        $UserData[] = convertDate($row->tgl_minutasi);
                        $data[] = $UserData;
                    }
                    break;



                case '17':
                    $Perkara    = $this->iku->ListPTPidanaTidakKasasi();
                    $total      = $this->iku->CountPTPidanaTidakKasasi();

                    foreach ($Perkara as $row) {
                        $no++;
                        $UserData = array();
                        $UserData[] = $no;
                        $UserData[] = $row->nomor_perkara_pn;
                        $UserData[] = $row->nomor_perkara_banding;
                        $UserData[] = convertDate($row->tanggal_pendaftaran_banding);
                        $UserData[] = convertDate($row->putusan_banding);
                        $UserData[] = convertDate($row->tgl_minutasi);
                        $data[] = $UserData;
                    }
                    break;

                case '18':
                    $Perkara    = $this->iku->ListPTPerdataTidakKasasi();
                    $total      = $this->iku->CountPTPerdataTidakKasasi();

                    foreach ($Perkara as $row) {
                        $no++;
                        $UserData = array();
                        $UserData[] = $no;
                        $UserData[] = $row->nomor_perkara_pn;
                        $UserData[] = $row->nomor_perkara_banding;
                        $UserData[] = convertDate($row->tanggal_pendaftaran_banding);
                        $UserData[] = convertDate($row->putusan_banding);
                        $UserData[] = convertDate($row->tgl_minutasi);
                        $data[] = $UserData;
                    }
                    break;

                case '19':
                    $Perkara    = $this->iku->ListPTSelesaiTahunIni();
                    $total      = $this->iku->CountPTSelesaiTahunIni();

                    foreach ($Perkara as $row) {
                        $no++;
                        $UserData = array();
                        $UserData[] = $no;
                        $UserData[] = $row->nomor_perkara_pn;
                        $UserData[] = $row->nomor_perkara_banding;
                        $UserData[] = convertDate($row->tanggal_pendaftaran_banding);
                        $UserData[] = convertDate($row->putusan_banding);
                        $UserData[] = convertDate($row->tgl_minutasi);
                        $UserData[] = (($row->lama >= 0) ? $row->lama . " Hari" : "<p class=\"text-danger\">UNKNOWN</p>");
                        $data[] = $UserData;
                    }
                    break;

                case '26':
                    $Perkara    = $this->iku->ListPTTidakTepatWaktu();
                    $total      = $this->iku->CountPTTidakTepatWaktu();

                    foreach ($Perkara as $row) {
                        $no++;
                        $UserData = array();
                        $UserData[] = $no;
                        $UserData[] = $row->nomor_perkara_pn;
                        $UserData[] = $row->nomor_perkara_banding;
                        $UserData[] = convertDate($row->tanggal_pendaftaran_banding);
                        $UserData[] = convertDate($row->putusan_banding);
                        $UserData[] = convertDate($row->tgl_minutasi);
                        $UserData[] = (($row->lama >= 0) ? $row->lama . " Hari" : "<p class=\"text-danger\">UNKNOWN</p>");
                        $data[] = $UserData;
                    }
                    break;

                default:
                    var_dump("PT: $id:$satker");
                    die;
                    break;
            }
        } else {
            $db = $this->db->get_where('satker', array('pn_id' => $satker))->row();
            if ($db->db_name != '') {
                switch_database($db->db_name);
            } else {
                die('invalid Database.');
            }
            switch ($id) {
                case '5':
                    $Perkara    = $this->iku->ListPkrSelesaiLampauPN();
                    $total      = $this->iku->CountPkrSelesaiLampauPN();
                    // var_dump($this->db->last_query());die;
                    foreach ($Perkara as $row) {
                        $no++;
                        $UserData = array();
                        $UserData[] = $no;
                        $UserData[] = $row->nomor_perkara;
                        $UserData[] = convertDate($row->tanggal_pendaftaran);
                        $UserData[] = convertDate($row->tanggal_putusan);
                        $UserData[] = convertDate($row->tanggal_minutasi);
                        $UserData[] = (($row->lama >= 0) ? $row->lama . " Hari" : "<p class=\"text-danger\">UNKNOWN</p>");
                        $UserData[] = $row->proses_terakhir_text;
                        $data[] = $UserData;
                    }

                    break;

                case '6':
                    $Perkara    = $this->iku->ListPkrTepatPN();
                    $total      = $this->iku->CountPkrTepatPN();
                    // var_dump($this->db->last_query());die;
                    foreach ($Perkara as $row) {
                        $no++;
                        $UserData = array();
                        $UserData[] = $no;
                        $UserData[] = $row->nomor_perkara;
                        $UserData[] = convertDate($row->tanggal_pendaftaran);
                        $UserData[] = convertDate($row->tanggal_putusan);
                        $UserData[] = convertDate($row->tanggal_minutasi);
                        $UserData[] = (($row->lama >= 0) ? $row->lama . " Hari" : "<p class=\"text-danger\">UNKNOWN</p>");
                        $UserData[] = $row->proses_terakhir_text;
                        $data[] = $UserData;
                    }

                    break;

                case '7':
                    $Perkara    = $this->iku->ListPkrMediasiBerhasil();
                    $total      = $this->iku->CountPkrMediasiBerhasil();
                    // var_dump($this->db->last_query());die;
                    foreach ($Perkara as $row) {
                        $no++;
                        $UserData = array();
                        $UserData[] = $no;
                        $UserData[] = $row->nomor_perkara;
                        $UserData[] = convertDate($row->tanggal_pendaftaran);
                        $UserData[] = $row->nama_gelar;
                        $UserData[] = convertDate($row->dimulai_mediasi);
                        $UserData[] = convertDate($row->keputusan_mediasi);
                        $UserData[] = $row->proses_terakhir_text;
                        $data[] = $UserData;
                    }

                    break;

                case '8':
                    $Perkara    = $this->iku->ListTepatKirimSalput();
                    $total      = $this->iku->CountTepatKirimSalput();
                    // var_dump($this->db->last_query());die;
                    foreach ($Perkara as $row) {
                        $no++;
                        $UserData = array();
                        $UserData[] = $no;
                        $UserData[] = $row->nomor_perkara;
                        $UserData[] = convertDate($row->tanggal_pendaftaran);
                        $UserData[] = convertDate($row->tanggal_putusan);
                        $UserData[] = convertDate($row->tanggal_minutasi);
                        $UserData[] = convertDate($row->tanggal_kirim_salinan_putusan);
                        $UserData[] = (($row->lama >= 0) ? $row->lama . " Hari" : "<p class=\"text-danger\">UNKNOWN</p>");
                        $data[] = $UserData;
                    }

                    break;

                case '9':
                    $Perkara    = $this->iku->ListTepatKirimBanding();
                    $total      = $this->iku->CountTepatKirimBanding();
                    // var_dump($this->db->last_query());die;
                    foreach ($Perkara as $row) {
                        $no++;
                        $UserData = array();
                        $UserData[] = $no;
                        $UserData[] = $row->nomor_perkara;
                        $UserData[] = $row->nomor_perkara_banding;
                        $UserData[] = convertDate($row->tanggal_pendaftaran);
                        $UserData[] = convertDate($row->tanggal_putusan);
                        $UserData[] = convertDate($row->tanggal_minutasi);
                        $UserData[] = convertDate($row->permohonan_banding);
                        $UserData[] = convertDate($row->pengiriman_berkas_banding);
                        $UserData[] = (($row->lama >= 0) ? $row->lama . " Hari" : "<p class=\"text-danger\">UNKNOWN</p>");
                        $UserData[] = $row->proses_terakhir_text;
                        $data[] = $UserData;
                    }
                    break;

                case '12':
                    $Perkara    = $this->iku->ListPNPerkaraTahunIni();
                    $total      = $this->iku->CountPNPerkaraTahunIni();
                    // var_dump($this->db->last_query());die;
                    foreach ($Perkara as $row) {
                        $no++;
                        $UserData = array();
                        $UserData[] = $no;
                        $UserData[] = $row->nomor_perkara;
                        $UserData[] = convertDate($row->tanggal_pendaftaran);
                        $UserData[] = convertDate($row->tanggal_putusan);
                        $UserData[] = convertDate($row->tanggal_minutasi);
                        $UserData[] = $row->proses_terakhir_text;
                        $data[] = $UserData;
                    }

                    break;

                case '13':
                    $Perkara    = $this->iku->ListPNSisaPerkaraLampau();
                    $total      = $this->iku->CountPNSisaPerkaraLampau();
                    // var_dump($this->db->last_query());die;
                    foreach ($Perkara as $row) {
                        $no++;
                        $UserData = array();
                        $UserData[] = $no;
                        $UserData[] = $row->nomor_perkara;
                        $UserData[] = convertDate($row->tanggal_pendaftaran);
                        $UserData[] = convertDate($row->tanggal_putusan);
                        $UserData[] = convertDate($row->tanggal_minutasi);
                        $UserData[] = $row->proses_terakhir_text;
                        $data[] = $UserData;
                    }

                    break;

                case '14':
                    $Perkara    = $this->iku->ListPNPerkaraTahunLalu();
                    $total      = $this->iku->CountPNPerkaraTahunLalu();
                    // var_dump($this->db->last_query());die;
                    foreach ($Perkara as $row) {
                        $no++;
                        $UserData = array();
                        $UserData[] = $no;
                        $UserData[] = $row->nomor_perkara;
                        $UserData[] = convertDate($row->tanggal_pendaftaran);
                        $UserData[] = convertDate($row->tanggal_putusan);
                        $UserData[] = convertDate($row->tanggal_minutasi);
                        $UserData[] = $row->proses_terakhir_text;
                        $data[] = $UserData;
                    }

                    break;

                case '19':
                    $Perkara    = $this->iku->ListPerkaraPutusPN();
                    $total      = $this->iku->CountPerkaraPutusPN();

                    foreach ($Perkara as $row) {
                        $no++;
                        $UserData = array();
                        $UserData[] = $no;
                        $UserData[] = $row->nomor_perkara;
                        $UserData[] = convertDate($row->tanggal_pendaftaran);
                        $UserData[] = convertDate($row->tanggal_putusan);
                        $UserData[] = convertDate($row->tanggal_minutasi);
                        $UserData[] = (($row->lama >= 0) ? $row->lama . " Hari" : "<p class=\"text-danger\">UNKNOWN</p>");
                        $UserData[] = convertDate($row->tanggal_kirim_salinan_putusan);
                        $UserData[] = $row->proses_terakhir_text;
                        $data[] = $UserData;
                    }
                    break;

                case '20':
                    $Perkara    = $this->iku->ListPNBanding();
                    $total      = $this->iku->CountPNBanding();
                    // var_dump($this->db->last_query());die;
                    foreach ($Perkara as $row) {
                        $no++;
                        $UserData = array();
                        $UserData[] = $no;
                        $UserData[] = $row->nomor_perkara_pn;
                        $UserData[] = $row->nomor_perkara_banding;
                        $UserData[] = convertDate($row->tanggal_pendaftaran_banding);
                        $UserData[] = convertDate($row->putusan_banding);
                        $UserData[] = convertDate($row->tgl_minutasi);
                        $data[] = $UserData;
                    }

                    break;

                case '27':
                    $Perkara    = $this->iku->ListPkrTidakTepatPN();
                    $total      = $this->iku->CountPkrTidakTepatPN();
                    // var_dump($this->db->last_query());die;
                    foreach ($Perkara as $row) {
                        $no++;
                        $UserData = array();
                        $UserData[] = $no;
                        $UserData[] = $row->nomor_perkara;
                        $UserData[] = convertDate($row->tanggal_pendaftaran);
                        $UserData[] = convertDate($row->tanggal_putusan);
                        $UserData[] = convertDate($row->tanggal_minutasi);
                        $UserData[] = (($row->lama >= 0) ? $row->lama . " Hari" : "<p class=\"text-danger\">UNKNOWN</p>");
                        $UserData[] = $row->proses_terakhir_text;
                        $data[] = $UserData;
                    }
                    break;

                case '28':
                    $Perkara    = $this->iku->ListTidakTepatKirimSalput();
                    $total      = $this->iku->CountTidakTepatKirimSalput();
                    // var_dump($this->db->last_query());die;
                    foreach ($Perkara as $row) {
                        $no++;
                        $UserData = array();
                        $UserData[] = $no;
                        $UserData[] = $row->nomor_perkara;
                        $UserData[] = convertDate($row->tanggal_pendaftaran);
                        $UserData[] = convertDate($row->tanggal_putusan);
                        $UserData[] = convertDate($row->tanggal_minutasi);
                        $UserData[] = convertDate($row->tanggal_kirim_salinan_putusan);
                        $UserData[] = (($row->lama_kirim >= 0) ? $row->lama_kirim . " Hari" : "<p class=\"text-danger\">UNKNOWN</p>");
                        $data[] = $UserData;
                    }
                    break;

                case '29':
                    $Perkara    = $this->iku->ListTidakTepatKirimBanding();
                    $total      = $this->iku->CountTidakTepatKirimBanding();
                    // var_dump($this->db->last_query());die;
                    foreach ($Perkara as $row) {
                        $no++;
                        $UserData = array();
                        $UserData[] = $no;
                        $UserData[] = $row->nomor_perkara;
                        $UserData[] = $row->nomor_perkara_banding;
                        $UserData[] = convertDate($row->tanggal_pendaftaran);
                        $UserData[] = convertDate($row->tanggal_putusan);
                        $UserData[] = convertDate($row->tanggal_minutasi);
                        $UserData[] = convertDate($row->permohonan_banding);
                        $UserData[] = convertDate($row->pengiriman_berkas_banding);
                        $UserData[] = (($row->lama >= 0) ? $row->lama . " Hari" : "<p class=\"text-danger\">UNKNOWN</p>");
                        $UserData[] = $row->proses_terakhir_text;
                        $data[] = $UserData;
                    }

                    break;


                default:
                    var_dump("$id:$satker");
                    die;
                    break;
            }
        }

        // var_dump($data);die;
        //$output['draw'] = $draw;
        $output['data'] = $data;
        $output['recordsTotal'] = $total;
        $output['recordsFiltered'] = $total;

        echo json_encode(array(
            'st' => 1,
            'msg' => $output
        ));
    }

    public function update_banding()
    {
        foreach ($this->arr_db as $db) {
            $this->db->query("CALL update_perkara('" . $db->db_name . "');");
        }
        $this->kalkulasi();
    }

    public function kalkulasi()
    {
        $data_replace = array();

        var_dump($this->arr_db);
        foreach ($this->arr_db as $db) {
            switch_database($db->db_name);

            /* Sisa Perkara selesai tahun ini */
            $PerkaraSelesaiLampau = $this->iku->CountPkrSelesaiLampauPN();
            $data = array(
                'pn_id'         => $db->pn_id,
                'id_penilaian'  => '5',
                'tahun'         => date('Y'),
                'value'         => $PerkaraSelesaiLampau,
            );
            array_push($data_replace, $data);

            /* Perkara Tepat Waktu */
            $PerkaraTepat = $this->iku->CountPkrTepatPN();
            $data = array(
                'pn_id'         => $db->pn_id,
                'id_penilaian'  => '6',
                'tahun'         => date('Y'),
                'value'         => $PerkaraTepat,
            );
            array_push($data_replace, $data);

            /* Perkara Mediasi Berhasil */
            $PerkaraMediasiBerhasil = $this->iku->CountPkrMediasiBerhasil();
            $data = array(
                'pn_id'         => $db->pn_id,
                'id_penilaian'  => '7',
                'tahun'         => date('Y'),
                'value'         => $PerkaraMediasiBerhasil,
            );
            array_push($data_replace, $data);

            /* Perkara Tepat Kirim Salput */
            $PerkaraTepatKirimSalput = $this->iku->CountTepatKirimSalput();
            $data = array(
                'pn_id'         => $db->pn_id,
                'id_penilaian'  => '8',
                'tahun'         => date('Y'),
                'value'         => $PerkaraTepatKirimSalput,
            );
            array_push($data_replace, $data);

            /* Perkara Tepat Kirim Banding */
            $PerkaraTepatKirimBanding = $this->iku->CountTepatKirimBanding();
            $data = array(
                'pn_id'         => $db->pn_id,
                'id_penilaian'  => '9',
                'tahun'         => date('Y'),
                'value'         => $PerkaraTepatKirimBanding,
            );
            array_push($data_replace, $data);
        }
        reset_database();

        /* 
        KALKULASI BANDING
        */

        /* Total Perkara Tahun lalu yang diselesaikan Tahun ini (PT) */
        $PerkaraTepatKirimBanding = $this->iku->CountPTSelesaiTahunLalu();
        $data = array(
            'pn_id'         => '0',
            'id_penilaian'  => '1',
            'tahun'         => date('Y'),
            'value'         => $PerkaraTepatKirimBanding,
        );
        array_push($data_replace, $data);

        /* Total Perkara yang diselesaikan Tepat Waktu (PT) */
        $PerkaraTepatKirimBanding = $this->iku->CountPTTepatWaktu();
        $data = array(
            'pn_id'         => '0',
            'id_penilaian'  => '2',
            'tahun'         => date('Y'),
            'value'         => $PerkaraTepatKirimBanding,
        );
        array_push($data_replace, $data);

        /* Persentase Pidana yang Tidak Kasasi (PT) */
        $PerkaraPidanaBanding       = $this->iku->CountPTPidanaBanding();
        $PerkaraPidanaTidakKasasi   = $this->iku->CountPTPidanaTidakKasasi();
        $persentase = round(($PerkaraPidanaTidakKasasi / $PerkaraPidanaBanding) * 100, 2);
        $data = array(
            'pn_id'         => '0',
            'id_penilaian'  => '3',
            'tahun'         => date('Y'),
            'value'         => $persentase . " (" . $PerkaraPidanaTidakKasasi . "/" . $PerkaraPidanaBanding . ")",
        );
        array_push($data_replace, $data);

        /* Persentase Perdata yang Tidak Kasasi (PT) */
        $PerkaraPerdataBanding       = $this->iku->CountPTPerdataBanding();
        $PerkaraPerdataTidakKasasi   = $this->iku->CountPTPerdataTidakKasasi();
        $persentase = round(($PerkaraPidanaTidakKasasi / $PerkaraPidanaBanding) * 100, 2);
        $data = array(
            'pn_id'         => '0',
            'id_penilaian'  => '4',
            'tahun'         => date('Y'),
            'value'         => $persentase . " (" . $PerkaraPerdataTidakKasasi . "/" . $PerkaraPerdataBanding . ")",
        );
        array_push($data_replace, $data);


        // UPDATE TABEL NILAI
        foreach ($data_replace as $data) {
            var_dump($data);

            $this->db->replace('iku_nilai', $data);
        }



        //switch_database('arsip');
        //reset_database();
        var_dump($this->db->database);
        die;
    }


    /**
     * This function used to load the first screen of the user
     
    public function index()
    {

        $this->global['pageTitle'] = $this->config->item('app_title').' : Dashboard';
        $this->global['appTitle'] = $this->config->item('app_title');

        
        $satker = $this->db->query('SELECT p.id_penilaian, s.pn_id, s.nama AS nama_pn, p.nama AS jenis, n.tahun, n.value FROM iku_nilai   AS n
LEFT JOIN iku_penilaian AS p ON n.id_penilaian=p.id_penilaian
LEFT JOIN satker AS s ON s.pn_id = n.pn_id
WHERE n.tahun=YEAR(NOW()) 
ORDER BY pn_id ASC;
');

        $data['nilai_satker']  = $satker->result();

        $pt = $this->db->query('SELECT s.pn_id, s.nama AS nama_pn, p.nama AS jenis, n.tahun, n.value FROM iku_nilai   AS n
LEFT JOIN iku_penilaian AS p ON n.id_penilaian=p.id_penilaian
LEFT JOIN satker AS s ON s.pn_id = n.pn_id
WHERE n.tahun=YEAR(NOW()) AND s.pn_id=0;
');

        //$data['nilai_pt']  = $pt->result();

        

        $this->loadViews("dashboard", $this->global, $data , NULL);
    }
     */


    function pageNotFound()
    {
        $this->global['pageTitle'] = 'CodeInsect : 404 - Page Not Found';

        $this->loadViews("404", $this->global, NULL, NULL);
    }
}
