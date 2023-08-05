<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Iku_model extends CI_Model
{
    private $query = false;

    function getLastUpdate()
    {
        $q = $this->db->query('SELECT * FROM iku_nilai 
WHERE tahun=' . intval($this->session->userdata('tahun')) . '
ORDER BY last_calc DESC LIMIT 1;');
        if (!$q) {
            return false;
        } else {
            return $q->row()->last_calc;
        }
    }

    function getInfoNilai($id_penilaian, $pn_id)
    {
        $q = $this->db->query('SELECT iku.nama, s.nama AS pengadilan, nilai.value AS nilai
FROM iku_nilai AS nilai
LEFT JOIN iku_penilaian AS iku ON iku.id_penilaian=nilai.id_penilaian
LEFT JOIN satker AS s ON s.pn_id=nilai.pn_id
WHERE nilai.tahun=' . intval($this->session->userdata('tahun')) . '
AND nilai.pn_id=' . intval($pn_id) . '
AND nilai.id_penilaian=' . intval($id_penilaian) . ';');
        if (!$q) {
            return false;
        } else {
            return $q->row();
        }
    }

    /*
    Total Perkara PN Tahun Ini
    */
    private function PNPerkaraTahunIni($limit = "", $search = "")
    {
        if (isset($_POST['search']) && $_POST['search']['value']) {
            $search = $this->db->escape("%" . $_POST['search']['value'] . "%");
            $search = " AND (nomor_perkara_pn LIKE $search OR nomor_perkara_banding LIKE $search)";
        }
        if (isset($_POST['length']) && $_POST['length'] != -1 && $limit === "") {
            $limit = "limit " . intval($this->input->post('start')) . "," . intval($this->input->post('length'));
        }
        $this->query = $this->db->query('SELECT p.perkara_id, p.nomor_perkara, p.tanggal_pendaftaran, put.tanggal_putusan, put.tanggal_minutasi, p.proses_terakhir_id, p.proses_terakhir_text
FROM perkara AS p
LEFT JOIN perkara_putusan AS put ON p.perkara_id=put.perkara_id
WHERE LEFT(p.tanggal_pendaftaran,4)= ' . intval($this->session->userdata('tahun')) . '
AND p.alur_perkara_id <> 114 ' . $search . ' ORDER BY p.tanggal_pendaftaran ' . $limit . ';
            ');
    }

    function CountPNPerkaraTahunIni()
    {
        $this->PNPerkaraTahunIni(false);
        if (!$this->query) {
            return "0";
        } else {
            return $this->query->num_rows();
        }
    }

    function ListPNPerkaraTahunIni()
    {
        $this->PNPerkaraTahunIni();
        if (!$this->query) {
            return false;
        } else {
            return $this->query->result();
        }
    }

    function listTahunKalkulasi()
    {
        $qTahun = $this->db->query('SELECT DISTINCT tahun FROM iku_nilai');
        if (!$qTahun && $qTahun->num_rows() < 1) {
            return false;
        } else {
            return $qTahun->result();
        }
    }

    /*
    Total Perkara PN Tahun Lalu
    */
    private function PNPerkaraTahunLalu($limit = "", $search = "")
    {
        if (isset($_POST['search']) && $_POST['search']['value']) {
            $search = $this->db->escape("%" . $_POST['search']['value'] . "%");
            $search = " AND (nomor_perkara_pn LIKE $search OR nomor_perkara_banding LIKE $search)";
        }
        if (isset($_POST['length']) && $_POST['length'] != -1 && $limit === "") {
            $limit = "limit " . intval($this->input->post('start')) . "," . intval($this->input->post('length'));
        }
        $this->query = $this->db->query('SELECT p.perkara_id, p.nomor_perkara, p.tanggal_pendaftaran, put.tanggal_putusan, put.tanggal_minutasi, p.proses_terakhir_id, p.proses_terakhir_text
FROM perkara AS p
LEFT JOIN perkara_putusan AS put ON p.perkara_id=put.perkara_id
WHERE LEFT(p.tanggal_pendaftaran,4)= ' . intval($this->session->userdata('tahun')) . '-1 
AND p.alur_perkara_id <> 114 ' . $search . ' ' . $limit . ';
            ');
    }

    function CountPNPerkaraTahunLalu()
    {
        $this->PNPerkaraTahunLalu(false);
        if (!$this->query) {
            return "0";
        } else {
            return $this->query->num_rows();
        }
    }

    function ListPNPerkaraTahunLalu()
    {
        $this->PNPerkaraTahunLalu();
        if (!$this->query) {
            return false;
        } else {
            return $this->query->result();
        }
    }

    /*
    Total Sisa Perkara Tahun lalu
    */
    private function PNSisaPerkaraLampau($limit = "", $search = "")
    {
        if (isset($_POST['search']) && $_POST['search']['value']) {
            $search = $this->db->escape("%" . $_POST['search']['value'] . "%");
            $search = " AND (nomor_perkara_pn LIKE $search OR nomor_perkara_banding LIKE $search)";
        }
        if (isset($_POST['length']) && $_POST['length'] != -1 && $limit === "") {
            $limit = "limit " . intval($this->input->post('start')) . "," . intval($this->input->post('length'));
        }
        $this->query = $this->db->query('SELECT p.perkara_id, p.nomor_perkara, p.tanggal_pendaftaran, put.tanggal_putusan, put.tanggal_minutasi, p.proses_terakhir_id, p.proses_terakhir_text
FROM perkara AS p
LEFT JOIN perkara_putusan AS put ON p.perkara_id=put.perkara_id
WHERE LEFT(p.tanggal_pendaftaran,4)= ' . intval($this->session->userdata('tahun')) . '-1  
AND (LEFT(put.tanggal_minutasi,4)<> ' . intval($this->session->userdata('tahun')) . '-1 OR put.tanggal_minutasi IS NULL)
AND p.alur_perkara_id <> 114 ' . $search . ' ' . $limit . ';
            ');
    }

    function CountPNSisaPerkaraLampau()
    {
        $this->PNSisaPerkaraLampau(false);
        if (!$this->query) {
            return "0";
        } else {
            return $this->query->num_rows();
        }
    }

    function ListPNSisaPerkaraLampau()
    {
        $this->PNSisaPerkaraLampau();
        if (!$this->query) {
            return false;
        } else {
            return $this->query->result();
        }
    }


    /*
    Total Perkara Tahun lalu yang diselesaikan Tahun ini
    */
    private function PNPerkaraSelesaiLampau($limit = "", $search = "")
    {
        if (isset($_POST['search']) && $_POST['search']['value']) {
            $search = $this->db->escape("%" . $_POST['search']['value'] . "%");
            $search = " AND (nomor_perkara_pn LIKE $search OR nomor_perkara_banding LIKE $search)";
        }
        if (isset($_POST['length']) && $_POST['length'] != -1 && $limit === "") {
            $limit = "limit " . intval($this->input->post('start')) . "," . intval($this->input->post('length'));
        }
        $this->query = $this->db->query('SELECT p.perkara_id, p.nomor_perkara, p.tanggal_pendaftaran, put.tanggal_putusan, put.tanggal_minutasi, p.proses_terakhir_id, p.proses_terakhir_text,
		IF(p.alur_perkara_id<100, 
	( IF( (med.keputusan_mediasi IS NULL OR med.dimulai_mediasi IS NULL),
		DATEDIFF(put.tanggal_minutasi, p.tanggal_pendaftaran),
		(DATEDIFF(put.tanggal_minutasi, p.tanggal_pendaftaran)-DATEDIFF(med.keputusan_mediasi, med.dimulai_mediasi))
	)), 
	DATEDIFF(put.tanggal_minutasi, p.tanggal_pendaftaran) 
) AS lama, p.`alur_perkara_id`,
IF( (med.keputusan_mediasi IS NULL OR med.dimulai_mediasi IS NULL),
	\'Tidak\',
	DATEDIFF(med.keputusan_mediasi, med.dimulai_mediasi)
) AS lama_mediasi
FROM perkara AS p
LEFT JOIN perkara_putusan AS put ON p.perkara_id=put.perkara_id
LEFT JOIN perkara_mediasi AS med ON p.perkara_id=med.perkara_id
WHERE LEFT(p.tanggal_pendaftaran,4)= ' . intval($this->session->userdata('tahun')) . '-1 
AND LEFT(put.tanggal_minutasi,4)= ' . intval($this->session->userdata('tahun')) . ' 
AND p.proses_terakhir_id>200
AND p.alur_perkara_id <> 114 ' . $search . ' ' . $limit . ';
            ');
    }

    function CountPkrSelesaiLampauPN()
    {
        $this->PNPerkaraSelesaiLampau(false);
        if (!$this->query) {
            return "0";
        } else {
            return $this->query->num_rows();
        }
    }

    function ListPkrSelesaiLampauPN()
    {
        $this->PNPerkaraSelesaiLampau();
        if (!$this->query) {
            return false;
        } else {
            return $this->query->result();
        }
    }


    /*
    Total Perkara Tahun ini yang tepat waktu
    */
    private function PNPerkaraTepatTahunIni($limit = "", $search = "")
    {
        if (isset($_POST['search']) && $_POST['search']['value']) {
            $search = $this->db->escape("%" . $_POST['search']['value'] . "%");
            $search = " AND (nomor_perkara_pn LIKE $search OR nomor_perkara_banding LIKE $search)";
        }
        if (isset($_POST['length']) && $_POST['length'] != -1 && $limit === "") {
            $limit = "limit " . intval($this->input->post('start')) . "," . intval($this->input->post('length'));
        }
        $this->query = $this->db->query('SELECT p.perkara_id, p.nomor_perkara, p.tanggal_pendaftaran, put.tanggal_putusan, put.tanggal_minutasi, p.proses_terakhir_id, p.proses_terakhir_text, DATEDIFF(put.tanggal_minutasi, p.tanggal_pendaftaran) AS lama
FROM perkara AS p
LEFT JOIN perkara_putusan AS put ON p.perkara_id=put.perkara_id
WHERE LEFT(p.tanggal_pendaftaran,4)= ' . intval($this->session->userdata('tahun')) . ' 
AND LEFT(put.tanggal_minutasi,4)= ' . intval($this->session->userdata('tahun')) . ' 
AND DATEDIFF(put.tanggal_minutasi, p.tanggal_pendaftaran) <= 150
AND p.proses_terakhir_id>200
AND p.alur_perkara_id <> 114 ' . $search . ' ' . $limit . ';
            ');
    }

    function CountPkrTepatPN()
    {
        $this->PNPerkaraTepatTahunIni(false);
        if (!$this->query) {
            return "0";
        } else {
            return $this->query->num_rows();
        }
    }

    function ListPkrTepatPN()
    {
        $this->PNPerkaraTepatTahunIni();
        if (!$this->query) {
            return false;
        } else {
            return $this->query->result();
        }
    }

    /*
    Total Perkara Tahun ini yang TIDAK tepat waktu
    */
    private function PNPerkaraTidakTepatTahunIni($limit = "", $search = "")
    {
        if (isset($_POST['search']) && $_POST['search']['value']) {
            $search = $this->db->escape("%" . $_POST['search']['value'] . "%");
            $search = " AND (nomor_perkara_pn LIKE $search OR nomor_perkara_banding LIKE $search)";
        }
        if (isset($_POST['length']) && $_POST['length'] != -1 && $limit === "") {
            $limit = "limit " . intval($this->input->post('start')) . "," . intval($this->input->post('length'));
        }
        $this->query = $this->db->query('SELECT p.perkara_id, p.nomor_perkara, p.tanggal_pendaftaran, put.tanggal_putusan, put.tanggal_minutasi, p.proses_terakhir_id, p.proses_terakhir_text, DATEDIFF(put.tanggal_minutasi, p.tanggal_pendaftaran) AS lama
FROM perkara AS p
LEFT JOIN perkara_putusan AS put ON p.perkara_id=put.perkara_id
WHERE LEFT(p.tanggal_pendaftaran,4)= ' . intval($this->session->userdata('tahun')) . ' 
AND LEFT(put.tanggal_minutasi,4)= ' . intval($this->session->userdata('tahun')) . ' 
AND DATEDIFF(put.tanggal_minutasi, p.tanggal_pendaftaran) > 150
AND p.proses_terakhir_id>200
AND p.alur_perkara_id <> 114 ' . $search . ' ' . $limit . ';
            ');
    }

    function CountPkrTidakTepatPN()
    {
        $this->PNPerkaraTidakTepatTahunIni(false);
        // var_dump($this->db->last_query());die;
        if (!$this->query) {
            return "0";
        } else {
            return $this->query->num_rows();
        }
    }

    function ListPkrTidakTepatPN()
    {
        $this->PNPerkaraTidakTepatTahunIni();
        if (!$this->query) {
            return false;
        } else {
            return $this->query->result();
        }
    }

    /*
    Total Perkara Putus Tahun Ini
    */
    private function PNPerkaraPutus($limit = "", $search = "")
    {
        if (isset($_POST['search']) && $_POST['search']['value']) {
            $search = $this->db->escape("%" . $_POST['search']['value'] . "%");
            $search = " AND (nomor_perkara_pn LIKE $search OR nomor_perkara_banding LIKE $search)";
        }
        if (isset($_POST['length']) && $_POST['length'] != -1 && $limit === "") {
            $limit = "limit " . intval($this->input->post('start')) . "," . intval($this->input->post('length'));
        }
        $this->query = $this->db->query('SELECT p.perkara_id, p.nomor_perkara, p.tanggal_pendaftaran, put.tanggal_putusan, put.tanggal_minutasi, p.proses_terakhir_id, p.proses_terakhir_text, pppp.tanggal_kirim_salinan_putusan, DATEDIFF(put.tanggal_minutasi, p.tanggal_pendaftaran) AS lama
FROM perkara AS p
LEFT JOIN perkara_putusan AS put ON p.perkara_id=put.perkara_id
LEFT JOIN perkara_putusan_pemberitahuan_putusan AS pppp ON pppp.perkara_id=p.perkara_id
WHERE LEFT(p.tanggal_pendaftaran,4)= ' . intval($this->session->userdata('tahun')) . ' 
AND LEFT(put.tanggal_putusan,4)= ' . intval($this->session->userdata('tahun')) . ' 
AND p.proses_terakhir_id>200
AND p.alur_perkara_id <> 114 ' . $search . ' GROUP BY p.perkara_id ORDER BY p.perkara_id DESC ' . $limit . ';
            ');
    }

    function CountPerkaraPutusPN()
    {
        $this->PNPerkaraPutus(false);
        if (!$this->query) {
            return "0";
        } else {
            return $this->query->num_rows();
        }
    }

    function ListPerkaraPutusPN()
    {
        $this->PNPerkaraPutus();
        if (!$this->query) {
            return false;
        } else {
            return $this->query->result();
        }
    }


    /*
    Penyelesaian Perkara Mediasi yang berhasil
    */
    private function PNPerkaraMediasiBerhasil($limit = "", $search = "")
    {
        if (isset($_POST['search']) && $_POST['search']['value']) {
            $search = $this->db->escape("%" . $_POST['search']['value'] . "%");
            $search = " AND (nomor_perkara_pn LIKE $search OR nomor_perkara_banding LIKE $search)";
        }
        if (isset($_POST['length']) && $_POST['length'] != -1 && $limit === "") {
            $limit = "limit " . intval($this->input->post('start')) . "," . intval($this->input->post('length'));
        }
        $this->query = $this->db->query('SELECT p.perkara_id, p.nomor_perkara, m.penetapan_tanggal_mediasi, h.nama_gelar, m.dimulai_mediasi, m.keputusan_mediasi, m.hasil_mediasi, p.tanggal_pendaftaran, p.proses_terakhir_id, p.proses_terakhir_text
FROM perkara_mediasi AS m
LEFT JOIN perkara AS p ON p.perkara_id=m.perkara_id
LEFT JOIN mediator AS h ON h.id=m.mediator_id
WHERE LEFT(p.tanggal_pendaftaran,4)= ' . intval($this->session->userdata('tahun')) . '
AND p.alur_perkara_id <> 114 
AND m.hasil_mediasi NOT IN("T","D") ' . $search . ' ' . $limit . ';
            ');
    }

    function CountPkrMediasiBerhasil()
    {
        $this->PNPerkaraMediasiBerhasil(false);
        if (!$this->query) {
            return "0";
        } else {
            return $this->query->num_rows();
        }
    }

    function ListPkrMediasiBerhasil()
    {
        $this->PNPerkaraMediasiBerhasil();
        if (!$this->query) {
            return false;
        } else {
            return $this->query->result();
        }
    }


    /*
    Pengiriman Salput Tahun ini yang tepat waktu
    */
    private function PNTepatKirimSalput($limit = "", $search = "")
    {
        if (isset($_POST['search']) && $_POST['search']['value']) {
            $search = $this->db->escape("%" . $_POST['search']['value'] . "%");
            $search = " AND (nomor_perkara_pn LIKE $search OR nomor_perkara_banding LIKE $search)";
        }
        if (isset($_POST['length']) && $_POST['length'] != -1 && $limit === "") {
            $limit = "limit " . intval($this->input->post('start')) . "," . intval($this->input->post('length'));
        }
        $this->query = $this->db->query('SELECT p.perkara_id, p.nomor_perkara, p.tanggal_pendaftaran, put.tanggal_putusan, put.tanggal_minutasi, pppp.tanggal_kirim_salinan_putusan, p.proses_terakhir_id, p.proses_terakhir_text, DATEDIFF(pppp.tanggal_kirim_salinan_putusan, put.tanggal_putusan) AS lama
FROM perkara_putusan AS put
LEFT JOIN perkara AS p ON p.perkara_id=put.perkara_id
LEFT JOIN perkara_putusan_pemberitahuan_putusan AS pppp ON pppp.perkara_id=put.perkara_id
WHERE LEFT(p.tanggal_pendaftaran,4)= ' . intval($this->session->userdata('tahun')) . '
AND DATEDIFF(pppp.tanggal_kirim_salinan_putusan, put.tanggal_putusan) <= 14
AND p.proses_terakhir_id>200
AND p.alur_perkara_id <> 114 ' . $search . '
GROUP BY put.perkara_id ' . $limit . ';
            ');
    }

    function CountTepatKirimSalput()
    {
        $this->PNTepatKirimSalput(false);
        if (!$this->query) {
            return "0";
        } else {
            return $this->query->num_rows();
        }
    }

    function ListTepatKirimSalput()
    {
        $this->PNTepatKirimSalput();
        if (!$this->query) {
            return false;
        } else {
            return $this->query->result();
        }
    }


    /*
    Pengiriman Salput Tahun ini yang TIDAK tepat waktu
    */
    private function PNTidakTepatKirimSalput($limit = "", $search = "")
    {
        if (isset($_POST['search']) && $_POST['search']['value']) {
            $search = $this->db->escape("%" . $_POST['search']['value'] . "%");
            $search = " AND (nomor_perkara_pn LIKE $search OR nomor_perkara_banding LIKE $search)";
        }
        if (isset($_POST['length']) && $_POST['length'] != -1 && $limit === "") {
            $limit = "limit " . intval($this->input->post('start')) . "," . intval($this->input->post('length'));
        }
        $this->query = $this->db->query('SELECT p.perkara_id, p.nomor_perkara, p.tanggal_pendaftaran, put.tanggal_putusan, put.tanggal_minutasi, pppp.tanggal_kirim_salinan_putusan, p.proses_terakhir_id, p.proses_terakhir_text, DATEDIFF(pppp.tanggal_kirim_salinan_putusan, put.tanggal_putusan) AS lama, DATEDIFF( 
    IF ( (pppp.`tanggal_kirim_salinan_putusan` IS NULL OR pppp.`tanggal_kirim_salinan_putusan` = ""), 
        DATE_FORMAT(NOW(),"%Y-%m-%d"), 
        pppp.`tanggal_kirim_salinan_putusan`
    ), 
    put.tanggal_putusan) as lama_kirim
FROM perkara_putusan AS put
LEFT JOIN perkara AS p ON p.perkara_id=put.perkara_id
LEFT JOIN perkara_putusan_pemberitahuan_putusan AS pppp ON pppp.perkara_id=put.perkara_id
WHERE LEFT(p.tanggal_pendaftaran,4)= ' . intval($this->session->userdata('tahun')) . '
AND DATEDIFF( 
    IF ( (pppp.`tanggal_kirim_salinan_putusan` IS NULL OR pppp.`tanggal_kirim_salinan_putusan` = ""), 
        DATE_FORMAT(NOW(),"%Y-%m-%d"), 
        pppp.`tanggal_kirim_salinan_putusan`
    ), 
    put.tanggal_putusan) > 14
AND p.alur_perkara_id > 100
AND p.proses_terakhir_id>200
AND p.alur_perkara_id <> 114 ' . $search . '
GROUP BY put.perkara_id ' . $limit . ';
            ');
    }

    function CountTidakTepatKirimSalput()
    {
        $this->PNTidakTepatKirimSalput(false);
        if (!$this->query) {
            return "0";
        } else {
            return $this->query->num_rows();
        }
    }

    function ListTidakTepatKirimSalput()
    {
        $this->PNTidakTepatKirimSalput();
        if (!$this->query) {
            return false;
        } else {
            return $this->query->result();
        }
    }


    /*
    Total Perkara Kirim Banding Tahun ini yang tepat waktu
    */
    private function PNTepatKirimBanding($limit = "", $search = "")
    {
        if (isset($_POST['search']) && $_POST['search']['value']) {
            $search = $this->db->escape("%" . $_POST['search']['value'] . "%");
            $search = " AND (nomor_perkara_pn LIKE $search OR nomor_perkara_banding LIKE $search)";
        }
        if (isset($_POST['length']) && $_POST['length'] != -1 && $limit === "") {
            $limit = "limit " . intval($this->input->post('start')) . "," . intval($this->input->post('length'));
        }
        $this->query = $this->db->query('SELECT p.perkara_id, p.nomor_perkara, b.nomor_perkara_banding, p.tanggal_pendaftaran, put.tanggal_putusan, put.tanggal_minutasi, b.permohonan_banding, b.pengiriman_berkas_banding, DATEDIFF(IF(b.pengiriman_berkas_banding IS NULL, CURDATE(), b.pengiriman_berkas_banding), b.permohonan_banding) AS lama, p.proses_terakhir_id, p.proses_terakhir_text, IF(p.alur_perkara_id>=111, DATEDIFF(b.pengiriman_berkas_banding, b.permohonan_banding) <= 14, DATEDIFF(b.pengiriman_berkas_banding, b.permohonan_banding) <= 30) AS valid
FROM perkara_banding AS b
LEFT JOIN perkara_putusan AS put ON b.perkara_id=put.perkara_id
LEFT JOIN perkara AS p ON p.perkara_id=b.perkara_id
WHERE LEFT(p.tanggal_pendaftaran,4)= ' . intval($this->session->userdata('tahun')) . '
AND LEFT(tanggal_putusan,4)= ' . intval($this->session->userdata('tahun')) . '
AND IF(p.alur_perkara_id>=111, DATEDIFF(b.pengiriman_berkas_banding, b.permohonan_banding) <= 14, DATEDIFF(b.pengiriman_berkas_banding, b.permohonan_banding) <= 30)
AND p.proses_terakhir_id>200
AND p.alur_perkara_id <> 114 ' . $search . ' ' . $limit . ';
            ');
    }

    function CountTepatKirimBanding()
    {
        $this->PNTepatKirimBanding(false);
        if (!$this->query) {
            return "0";
        } else {
            return $this->query->num_rows();
        }
    }

    function ListTepatKirimBanding()
    {
        $this->PNTepatKirimBanding();
        if (!$this->query) {
            return false;
        } else {
            return $this->query->result();
        }
    }

    /*
    Total Perkara Kirim Banding Tahun ini yang TIDAK tepat waktu
    */
    private function PNTidakTepatKirimBanding($limit = "", $search = "")
    {
        if (isset($_POST['search']) && $_POST['search']['value']) {
            $search = $this->db->escape("%" . $_POST['search']['value'] . "%");
            $search = " AND (nomor_perkara_pn LIKE $search OR nomor_perkara_banding LIKE $search)";
        }
        if (isset($_POST['length']) && $_POST['length'] != -1 && $limit === "") {
            $limit = "limit " . intval($this->input->post('start')) . "," . intval($this->input->post('length'));
        }
        $this->query = $this->db->query('SELECT p.perkara_id, p.nomor_perkara, b.nomor_perkara_banding, p.tanggal_pendaftaran, put.tanggal_putusan, put.tanggal_minutasi, b.permohonan_banding, b.pengiriman_berkas_banding, DATEDIFF(IF(b.pengiriman_berkas_banding IS NULL, CURDATE(), b.pengiriman_berkas_banding), b.permohonan_banding) AS lama, p.proses_terakhir_id, p.proses_terakhir_text, IF(p.alur_perkara_id>=111, DATEDIFF(b.pengiriman_berkas_banding, b.permohonan_banding) <= 14, DATEDIFF(b.pengiriman_berkas_banding, b.permohonan_banding) <= 30) AS valid
FROM perkara_banding AS b
LEFT JOIN perkara_putusan AS put ON b.perkara_id=put.perkara_id
LEFT JOIN perkara AS p ON p.perkara_id=b.perkara_id
WHERE LEFT(p.tanggal_pendaftaran,4)= ' . intval($this->session->userdata('tahun')) . '
AND LEFT(tanggal_putusan,4)= ' . intval($this->session->userdata('tahun')) . '
AND IF(p.alur_perkara_id>=111, DATEDIFF(b.pengiriman_berkas_banding, b.permohonan_banding) > 14, DATEDIFF(b.pengiriman_berkas_banding, b.permohonan_banding) > 30)
AND p.proses_terakhir_id>200
AND p.alur_perkara_id <> 114 ' . $search . ' ' . $limit . ';
            ');
    }

    function CountTidakTepatKirimBanding()
    {
        $this->PNTidakTepatKirimBanding(false);
        if (!$this->query) {
            return "0";
        } else {
            return $this->query->num_rows();
        }
    }

    function ListTidakTepatKirimBanding()
    {
        $this->PNTidakTepatKirimBanding();
        if (!$this->query) {
            return false;
        } else {
            return $this->query->result();
        }
    }

    /*
    Total Perkara Pidana
    */
    private function PNPidana($limit = "", $search = "")
    {
        if (isset($_POST['search']) && $_POST['search']['value']) {
            $search = $this->db->escape("%" . $_POST['search']['value'] . "%");
            $search = " AND (nomor_perkara LIKE $search OR proses_terakhir_text LIKE $search)";
        }
        if (isset($_POST['length']) && $_POST['length'] != -1 && $limit === "") {
            $limit = "limit " . intval($this->input->post('start')) . "," . intval($this->input->post('length'));
        }
        $this->query = $this->db->query('SELECT p.perkara_id, p.nomor_perkara, p.tanggal_pendaftaran, put.tanggal_putusan, put.tanggal_minutasi, p.proses_terakhir_id, p.proses_terakhir_text
FROM perkara AS p
LEFT JOIN perkara_putusan AS put ON p.perkara_id=put.perkara_id
WHERE LEFT(p.tanggal_pendaftaran,4)= ' . intval($this->session->userdata('tahun')) . ' 
AND p.alur_perkara_id >= 111
AND p.alur_perkara_id <> 114 ' . $search . ' ' . $limit . ';
            ');
    }

    function CountPNPidana()
    {
        $this->PNPidana(false);
        if (!$this->query) {
            return "0";
        } else {
            return $this->query->num_rows();
        }
    }

    function ListPNPidana()
    {
        $this->PNPidana();
        if (!$this->query) {
            return false;
        } else {
            return $this->query->result();
        }
    }

    /*
    Total Perkara Perdata
    */
    private function PNPerdata($limit = "", $search = "")
    {
        if (isset($_POST['search']) && $_POST['search']['value']) {
            $search = $this->db->escape("%" . $_POST['search']['value'] . "%");
            $search = " AND (nomor_perkara LIKE $search OR proses_terakhir_text LIKE $search)";
        }
        if (isset($_POST['length']) && $_POST['length'] != -1 && $limit === "") {
            $limit = "limit " . intval($this->input->post('start')) . "," . intval($this->input->post('length'));
        }
        $this->query = $this->db->query('SELECT p.perkara_id, p.nomor_perkara, p.tanggal_pendaftaran, put.tanggal_putusan, put.tanggal_minutasi, p.proses_terakhir_id, p.proses_terakhir_text
FROM perkara AS p
LEFT JOIN perkara_putusan AS put ON p.perkara_id=put.perkara_id
WHERE LEFT(p.tanggal_pendaftaran,4)= ' . intval($this->session->userdata('tahun')) . ' 
AND p.alur_perkara_id < 111
AND p.alur_perkara_id <> 114 ' . $search . ' ' . $limit . ';
            ');
    }

    function CountPNPerdata()
    {
        $this->PNPerdata(false);
        if (!$this->query) {
            return "0";
        } else {
            return $this->query->num_rows();
        }
    }

    function ListPNPerdata()
    {
        $this->PNPerdata();
        if (!$this->query) {
            return false;
        } else {
            return $this->query->result();
        }
    }

    /*
    Total Perkara Banding PN Tahun Ini
    */
    private function PNBanding($limit = "", $search = "")
    {
        if (isset($_POST['search']) && $_POST['search']['value']) {
            $search = $this->db->escape("%" . $_POST['search']['value'] . "%");
            $search = " AND (nomor_perkara_pn LIKE $search OR nomor_perkara_banding LIKE $search)";
        }
        if (isset($_POST['length']) && $_POST['length'] != -1 && $limit === "") {
            $limit = "limit " . intval($this->input->post('start')) . "," . intval($this->input->post('length'));
        }
        $this->query = $this->db->query('SELECT * FROM perkara_banding 
WHERE LEFT(tanggal_pendaftaran_banding,4)= ' . intval($this->session->userdata('tahun')) . ' ' . $search . ' ' . $limit . ';
            ');
    }

    function CountPNBanding()
    {
        $this->PNBanding(false);
        if (!$this->query) {
            return "0";
        } else {
            return $this->query->num_rows();
        }
    }

    function ListPNBanding()
    {
        $this->PNBanding();
        if (!$this->query) {
            return false;
        } else {
            return $this->query->result();
        }
    }



    // END KALKULASI PN


    // KALKULASI BANDING !!

    /*
    Total Banding Tahun Lalu
    */
    private function PTPerkaraTahunLalu($limit = "", $search = "")
    {
        if (isset($_POST['search']) && $_POST['search']['value']) {
            $search = $this->db->escape("%" . $_POST['search']['value'] . "%");
            $search = " AND (nomor_perkara_pn LIKE $search OR nomor_perkara_banding LIKE $search)";
        }
        if (isset($_POST['length']) && $_POST['length'] != -1 && $limit === "") {
            $limit = "limit " . intval($this->input->post('start')) . "," . intval($this->input->post('length'));
        }
        $this->query = $this->db->query('SELECT * FROM perkara_banding 
WHERE LEFT(tanggal_pendaftaran_banding,4)= ' . intval($this->session->userdata('tahun')) . '-1 ' . $search . ' ' . $limit . ';
            ');
    }

    function CountPTPerkaraTahunLalu()
    {
        $this->PTPerkaraTahunLalu(false);
        if (!$this->query) {
            return "0";
        } else {
            return $this->query->num_rows();
        }
    }

    function ListPTPerkaraTahunLalu()
    {
        $this->PTPerkaraTahunLalu();
        if (!$this->query) {
            return false;
        } else {
            return $this->query->result();
        }
    }


    /*
    Total Banding Minutasi Tahun Lalu
    */
    private function PTPkrMinutasiTahunLalu($limit = "", $search = "")
    {
        if (isset($_POST['search']) && $_POST['search']['value']) {
            $search = $this->db->escape("%" . $_POST['search']['value'] . "%");
            $search = " AND (nomor_perkara_pn LIKE $search OR nomor_perkara_banding LIKE $search)";
        }
        if (isset($_POST['length']) && $_POST['length'] != -1 && $limit === "") {
            $limit = "limit " . intval($this->input->post('start')) . "," . intval($this->input->post('length'));
        }
        $this->query = $this->db->query('SELECT * FROM perkara_banding 
WHERE LEFT(tanggal_pendaftaran_banding,4)= ' . intval($this->session->userdata('tahun')) . '-1 
AND LEFT(tgl_minutasi,4)= ' . intval($this->session->userdata('tahun')) . '-1 ' . $search . ' ' . $limit . ';
            ');
    }

    function CountPTPkrMinutasiTahunLalu()
    {
        $this->PTPkrMinutasiTahunLalu(false);
        if (!$this->query) {
            return "0";
        } else {
            return $this->query->num_rows();
        }
    }

    function ListPTPkrMinutasiTahunLalu()
    {
        $this->PTPkrMinutasiTahunLalu();
        if (!$this->query) {
            return false;
        } else {
            return $this->query->result();
        }
    }


    /*
    Total Banding Sisa Perkara Tahun lalu
    */
    private function PTSisaTahunLalu($limit = "", $search = "")
    {
        if (isset($_POST['search']) && $_POST['search']['value']) {
            $search = $this->db->escape("%" . $_POST['search']['value'] . "%");
            $search = " AND (nomor_perkara_pn LIKE $search OR nomor_perkara_banding LIKE $search)";
        }
        if (isset($_POST['length']) && $_POST['length'] != -1 && $limit === "") {
            $limit = "limit " . intval($this->input->post('start')) . "," . intval($this->input->post('length'));
        }
        $this->query = $this->db->query('SELECT * FROM perkara_banding 
WHERE LEFT(tanggal_pendaftaran_banding,4)= ' . intval($this->session->userdata('tahun')) . '-1 
AND (LEFT(tgl_minutasi,4)<> ' . intval($this->session->userdata('tahun')) . '-1 OR tgl_minutasi IS NULL)
' . $search . ' ' . $limit . ';
            ');
    }

    function CountPTSisaTahunLalu()
    {
        $this->PTSisaTahunLalu(false);
        if (!$this->query) {
            return "0";
        } else {
            return $this->query->num_rows();
        }
    }

    function ListPTSisaTahunLalu()
    {
        $this->PTSisaTahunLalu();
        if (!$this->query) {
            return false;
        } else {
            return $this->query->result();
        }
    }


    /*
    Total Banding Perkara Tahun lalu selesai tahun ini
    */
    private function PTSelesaiTahunLalu($limit = "", $search = "")
    {
        if (isset($_POST['search']) && $_POST['search']['value']) {
            $search = $this->db->escape("%" . $_POST['search']['value'] . "%");
            $search = " AND (nomor_perkara_pn LIKE $search OR nomor_perkara_banding LIKE $search)";
        }
        if (isset($_POST['length']) && $_POST['length'] != -1 && $limit === "") {
            $limit = "limit " . intval($this->input->post('start')) . "," . intval($this->input->post('length'));
        }
        $this->query = $this->db->query('SELECT *, DATEDIFF(tgl_minutasi, tanggal_pendaftaran_banding) AS lama FROM perkara_banding 
WHERE LEFT(tanggal_pendaftaran_banding,4)= ' . intval($this->session->userdata('tahun')) . '-1 
AND LEFT(tgl_minutasi,4)= ' . intval($this->session->userdata('tahun')) . ' ' . $search . ' ' . $limit . ';
            ');
    }

    function CountPTSelesaiTahunLalu()
    {
        $this->PTSelesaiTahunLalu(false);
        if (!$this->query) {
            return "0";
        } else {
            return $this->query->num_rows();
        }
    }

    function ListPTSelesaiTahunLalu()
    {
        $this->PTSelesaiTahunLalu();
        if (!$this->query) {
            return false;
        } else {
            return $this->query->result();
        }
    }

    /*
    Total Banding Perkara selesai tahun ini
    */
    private function PTSelesaiTahunIni($limit = "", $search = "")
    {
        if (isset($_POST['search']) && $_POST['search']['value']) {
            $search = $this->db->escape("%" . $_POST['search']['value'] . "%");
            $search = " AND (nomor_perkara_pn LIKE $search OR nomor_perkara_banding LIKE $search)";
        }
        if (isset($_POST['length']) && $_POST['length'] != -1 && $limit === "") {
            $limit = "limit " . intval($this->input->post('start')) . "," . intval($this->input->post('length'));
        }
        $this->query = $this->db->query('SELECT * , DATEDIFF(tgl_minutasi, tanggal_pendaftaran_banding) AS lama FROM perkara_banding 
WHERE LEFT(tanggal_pendaftaran_banding,4)= ' . intval($this->session->userdata('tahun')) . ' 
AND LEFT(tgl_minutasi,4)= ' . intval($this->session->userdata('tahun')) . ' ' . $search . ' ' . $limit . ';
            ');
    }

    function CountPTSelesaiTahunIni()
    {
        $this->PTSelesaiTahunIni(false);
        if (!$this->query) {
            return "0";
        } else {
            return $this->query->num_rows();
        }
    }

    function ListPTSelesaiTahunIni()
    {
        $this->PTSelesaiTahunIni();
        if (!$this->query) {
            return false;
        } else {
            return $this->query->result();
        }
    }

    /*
    Total Banding Tepat Waktu
    */
    private function PTTepatWaktu($limit = "", $search = "")
    {
        if (isset($_POST['search']) && $_POST['search']['value']) {
            $search = $this->db->escape("%" . $_POST['search']['value'] . "%");
            $search = " AND (nomor_perkara_pn LIKE $search OR nomor_perkara_banding LIKE $search)";
        }
        if (isset($_POST['length']) && $_POST['length'] != -1 && $limit === "") {
            $limit = "limit " . intval($this->input->post('start')) . "," . intval($this->input->post('length'));
        }
        $this->query = $this->db->query('SELECT *, DATEDIFF(tgl_minutasi, tanggal_pendaftaran_banding) AS  minutasi , DATEDIFF(tgl_minutasi, tanggal_pendaftaran_banding) AS lama FROM perkara_banding 
WHERE LEFT(tanggal_pendaftaran_banding,4)= ' . intval($this->session->userdata('tahun')) . '
AND LEFT(tgl_minutasi,4)=' . intval($this->session->userdata('tahun')) . '
AND DATEDIFF(tgl_minutasi, tanggal_pendaftaran_banding) <= 90 ' . $search . ' ' . $limit . ';
            ');
    }

    function CountPTTepatWaktu()
    {
        $this->PTTepatWaktu(false);
        if (!$this->query) {
            return "0";
        } else {
            return $this->query->num_rows();
        }
    }

    function ListPTTepatWaktu()
    {
        $this->PTTepatWaktu();
        if (!$this->query) {
            return false;
        } else {
            return $this->query->result();
        }
    }

    /*
    Total Banding TIDAK Tepat Waktu
    */
    private function PTTidakTepatWaktu($limit = "", $search = "")
    {
        if (isset($_POST['search']) && $_POST['search']['value']) {
            $search = $this->db->escape("%" . $_POST['search']['value'] . "%");
            $search = " AND (nomor_perkara_pn LIKE $search OR nomor_perkara_banding LIKE $search)";
        }
        if (isset($_POST['length']) && $_POST['length'] != -1 && $limit === "") {
            $limit = "limit " . intval($this->input->post('start')) . "," . intval($this->input->post('length'));
        }
        $this->query = $this->db->query('SELECT *, DATEDIFF(tgl_minutasi, tanggal_pendaftaran_banding) AS  minutasi , DATEDIFF(tgl_minutasi, tanggal_pendaftaran_banding) AS lama FROM perkara_banding 
WHERE LEFT(tanggal_pendaftaran_banding,4)= ' . intval($this->session->userdata('tahun')) . '
AND LEFT(tgl_minutasi,4)=' . intval($this->session->userdata('tahun')) . '
AND DATEDIFF(tgl_minutasi, tanggal_pendaftaran_banding) > 90 ' . $search . ' ' . $limit . ';
            ');
    }

    function CountPTTidakTepatWaktu()
    {
        $this->PTTidakTepatWaktu(false);
        if (!$this->query) {
            return "0";
        } else {
            return $this->query->num_rows();
        }
    }

    function ListPTTidakTepatWaktu()
    {
        $this->PTTidakTepatWaktu();
        if (!$this->query) {
            return false;
        } else {
            return $this->query->result();
        }
    }

    /*
    Total Perkara Banding
    */
    private function PTBanding($limit = "", $search = "")
    {
        if (isset($_POST['search']) && $_POST['search']['value']) {
            $search = $this->db->escape("%" . $_POST['search']['value'] . "%");
            $search = " AND (nomor_perkara_pn LIKE $search OR nomor_perkara_banding LIKE $search)";
        }
        if (isset($_POST['length']) && $_POST['length'] != -1 && $limit === "") {
            $limit = "limit " . intval($this->input->post('start')) . "," . intval($this->input->post('length'));
        }
        $this->query = $this->db->query('SELECT *, DATEDIFF(tgl_minutasi, tanggal_pendaftaran_banding) AS  minutasi FROM perkara_banding 
WHERE LEFT(tanggal_pendaftaran_banding,4)= ' . intval($this->session->userdata('tahun')) . ' ' . $search . ' ' . $limit . ';
            ');
    }

    function CountPTBanding()
    {
        $this->PTBanding(false);
        if (!$this->query) {
            return "0";
        } else {
            return $this->query->num_rows();
        }
    }

    function ListPTBanding()
    {
        $this->PTBanding();
        if (!$this->query) {
            return false;
        } else {
            return $this->query->result();
        }
    }

    /*
    Total Perkara Pidana Banding
    */
    private function PTPidanaBanding($limit = "", $search = "")
    {
        if (isset($_POST['search']) && $_POST['search']['value']) {
            $search = $this->db->escape("%" . $_POST['search']['value'] . "%");
            $search = " AND (nomor_perkara_pn LIKE $search OR nomor_perkara_banding LIKE $search)";
        }
        if (isset($_POST['length']) && $_POST['length'] != -1 && $limit === "") {
            $limit = "limit " . intval($this->input->post('start')) . "," . intval($this->input->post('length'));
        }
        $this->query = $this->db->query('SELECT *, DATEDIFF(tgl_minutasi, tanggal_pendaftaran_banding) AS  minutasi FROM perkara_banding 
WHERE LEFT(tanggal_pendaftaran_banding,4)= ' . intval($this->session->userdata('tahun')) . ' 
AND alur_perkara_id>=111 ' . $search . ' ' . $limit . ';
            ');
    }

    function CountPTPidanaBanding()
    {
        $this->PTPidanaBanding(false);
        if (!$this->query) {
            return "0";
        } else {
            return $this->query->num_rows();
        }
    }

    function ListPTPidanaBanding()
    {
        $this->PTPidanaBanding();
        if (!$this->query) {
            return false;
        } else {
            return $this->query->result();
        }
    }

    /*
    Total Perkara Perdata Banding
    */
    private function PTPerdataBanding($limit = "", $search = "")
    {
        if (isset($_POST['search']) && $_POST['search']['value']) {
            $search = $this->db->escape("%" . $_POST['search']['value'] . "%");
            $search = " AND (nomor_perkara_pn LIKE $search OR nomor_perkara_banding LIKE $search)";
        }
        if (isset($_POST['length']) && $_POST['length'] != -1 && $limit === "") {
            $limit = "limit " . intval($this->input->post('start')) . "," . intval($this->input->post('length'));
        }
        $this->query = $this->db->query('SELECT *, DATEDIFF(tgl_minutasi, tanggal_pendaftaran_banding) AS  minutasi FROM perkara_banding 
WHERE LEFT(tanggal_pendaftaran_banding,4)= ' . intval($this->session->userdata('tahun')) . '
AND alur_perkara_id<100 ' . $search . ' ' . $limit . ';
            ');
    }

    function CountPTPerdataBanding()
    {
        $this->PTPerdataBanding(false);
        if (!$this->query) {
            return "0";
        } else {
            return $this->query->num_rows();
        }
    }

    function ListPTPerdataBanding()
    {
        $this->PTPerdataBanding();
        if (!$this->query) {
            return false;
        } else {
            return $this->query->result();
        }
    }

    /*
    Total Perkara Pidana Banding Yang Minutasi
    */
    private function PTPidanaBandingMinutasi($limit = "", $search = "")
    {
        if (isset($_POST['search']) && $_POST['search']['value']) {
            $search = $this->db->escape("%" . $_POST['search']['value'] . "%");
            $search = " AND (nomor_perkara_pn LIKE $search OR nomor_perkara_banding LIKE $search)";
        }
        if (isset($_POST['length']) && $_POST['length'] != -1 && $limit === "") {
            $limit = "limit " . intval($this->input->post('start')) . "," . intval($this->input->post('length'));
        }
        $this->query = $this->db->query('SELECT *, DATEDIFF(tgl_minutasi, tanggal_pendaftaran_banding) AS  minutasi FROM perkara_banding 
WHERE tgl_minutasi IS NOT NULL AND LEFT(tanggal_pendaftaran_banding,4)= ' . intval($this->session->userdata('tahun')) . ' 
AND alur_perkara_id>=111 AND alur_perkara_id != 115' . $search . ' ' . $limit . ';
            ');
    }

    function CountPTPidanaBandingMinutasi()
    {
        $this->PTPidanaBandingMinutasi(false);
        if (!$this->query) {
            return "0";
        } else {
            return $this->query->num_rows();
        }
    }

    function ListPTPidanaBandingMinutasi()
    {
        $this->PTPidanaBandingMinutasi();
        if (!$this->query) {
            return false;
        } else {
            return $this->query->result();
        }
    }

    /*
    Total Perkara Pidana Tipikor Banding Yang Minutasi
    */
    private function PTPidanaTipikorBandingMinutasi($limit = "", $search = "")
    {
        if (isset($_POST['search']) && $_POST['search']['value']) {
            $search = $this->db->escape("%" . $_POST['search']['value'] . "%");
            $search = " AND (nomor_perkara_pn LIKE $search OR nomor_perkara_banding LIKE $search)";
        }
        if (isset($_POST['length']) && $_POST['length'] != -1 && $limit === "") {
            $limit = "limit " . intval($this->input->post('start')) . "," . intval($this->input->post('length'));
        }
        $this->query = $this->db->query('SELECT *, DATEDIFF(tgl_minutasi, tanggal_pendaftaran_banding) AS  minutasi FROM perkara_banding 
WHERE tgl_minutasi IS NOT NULL AND LEFT(tanggal_pendaftaran_banding,4)= ' . intval($this->session->userdata('tahun')) . ' 
AND alur_perkara_id = 115' . $search . ' ' . $limit . ';
            ');
    }

    function CountPTPidanaTipikorBandingMinutasi()
    {
        $this->PTPidanaTipikorBandingMinutasi(false);
        if (!$this->query) {
            return "0";
        } else {
            return $this->query->num_rows();
        }
    }

    function ListPTPidanaTipikorBandingMinutasi()
    {
        $this->PTPidanaTipikorBandingMinutasi();
        if (!$this->query) {
            return false;
        } else {
            return $this->query->result();
        }
    }

    /*
    Total Perkara Perdata Banding Minutasi
    */
    private function PTPerdataBandingMinutasi($limit = "", $search = "")
    {
        if (isset($_POST['search']) && $_POST['search']['value']) {
            $search = $this->db->escape("%" . $_POST['search']['value'] . "%");
            $search = " AND (nomor_perkara_pn LIKE $search OR nomor_perkara_banding LIKE $search)";
        }
        if (isset($_POST['length']) && $_POST['length'] != -1 && $limit === "") {
            $limit = "limit " . intval($this->input->post('start')) . "," . intval($this->input->post('length'));
        }
        $this->query = $this->db->query('SELECT *, DATEDIFF(tgl_minutasi, tanggal_pendaftaran_banding) AS  minutasi FROM perkara_banding 
WHERE tgl_minutasi IS NOT NULL AND LEFT(tanggal_pendaftaran_banding,4)= ' . intval($this->session->userdata('tahun')) . '
AND alur_perkara_id<100 ' . $search . ' ' . $limit . ';
            ');
    }

    function CountPTPerdataBandingMinutasi()
    {
        $this->PTPerdataBandingMinutasi(false);
        if (!$this->query) {
            return "0";
        } else {
            return $this->query->num_rows();
        }
    }

    function ListPTPerdataBandingMinutasi()
    {
        $this->PTPerdataBandingMinutasi();
        if (!$this->query) {
            return false;
        } else {
            return $this->query->result();
        }
    }

    /*
    Total Perkara Banding Pidana Tidak Kasasi
    */
    private function PTPidanaTidakKasasi($limit = "", $search = "")
    {
        if (isset($_POST['search']) && $_POST['search']['value']) {
            $search = $this->db->escape("%" . $_POST['search']['value'] . "%");
            $search = " AND (nomor_perkara_pn LIKE $search OR nomor_perkara_banding LIKE $search)";
        }
        if (isset($_POST['length']) && $_POST['length'] != -1 && $limit === "") {
            $limit = "limit " . intval($this->input->post('start')) . "," . intval($this->input->post('length'));
        }
        $this->query = $this->db->query('SELECT b.pn_id, b.perkara_id, b.nomor_perkara_pn, b.nomor_perkara_banding, b.tanggal_pendaftaran_banding, b.putusan_banding, b.tgl_minutasi
FROM perkara_banding AS b
LEFT JOIN perkara_kasasi AS k ON k.perkara_id=b.perkara_id 
WHERE k.perkara_id IS NULL
AND b.tgl_minutasi IS NOT NULL
AND LEFT(b.tanggal_pendaftaran_banding,4)= ' . intval($this->session->userdata('tahun')) . '
AND b.alur_perkara_id>=111 AND b.alur_perkara_id != 115' . $search . ' ' . $limit . ';
            ');
        //var_dump($this->db->last_query());die;

    }

    function CountPTPidanaTidakKasasi()
    {
        $this->PTPidanaTidakKasasi(false);
        if (!$this->query) {
            return "0";
        } else {
            return $this->query->num_rows();
        }
    }

    function ListPTPidanaTidakKasasi()
    {
        $this->PTPidanaTidakKasasi();
        if (!$this->query) {
            return false;
        } else {
            return $this->query->result();
        }
    }

    /*
    Total Perkara Banding Pidana Tipikor Tidak Kasasi
    */
    private function PTPidanaTipikorTidakKasasi($limit = "", $search = "")
    {
        if (isset($_POST['search']) && $_POST['search']['value']) {
            $search = $this->db->escape("%" . $_POST['search']['value'] . "%");
            $search = " AND (nomor_perkara_pn LIKE $search OR nomor_perkara_banding LIKE $search)";
        }
        if (isset($_POST['length']) && $_POST['length'] != -1 && $limit === "") {
            $limit = "limit " . intval($this->input->post('start')) . "," . intval($this->input->post('length'));
        }
        $this->query = $this->db->query('SELECT b.pn_id, b.perkara_id, b.nomor_perkara_pn, b.nomor_perkara_banding, b.tanggal_pendaftaran_banding, b.putusan_banding, b.tgl_minutasi
FROM perkara_banding AS b
LEFT JOIN perkara_kasasi AS k ON k.perkara_id=b.perkara_id 
WHERE k.perkara_id IS NULL
AND b.tgl_minutasi IS NOT NULL
AND LEFT(b.tanggal_pendaftaran_banding,4)= ' . intval($this->session->userdata('tahun')) . '
AND b.alur_perkara_id=115 ' . $search . ' ' . $limit . ';
            ');
        //var_dump($this->db->last_query());die;

    }

    function CountPTPidanaTipikorTidakKasasi()
    {
        $this->PTPidanaTipikorTidakKasasi(false);
        if (!$this->query) {
            return "0";
        } else {
            return $this->query->num_rows();
        }
    }

    function ListPTPidanaTipikorTidakKasasi()
    {
        $this->PTPidanaTipikorTidakKasasi();
        if (!$this->query) {
            return false;
        } else {
            return $this->query->result();
        }
    }

    /*
    Total Perkara Banding Perdata Tidak Kasasi
    */
    private function PTPerdataTidakKasasi($limit = "", $search = "")
    {
        if (isset($_POST['search']) && $_POST['search']['value']) {
            $search = $this->db->escape("%" . $_POST['search']['value'] . "%");
            $search = " AND (nomor_perkara_pn LIKE $search OR nomor_perkara_banding LIKE $search)";
        }
        if (isset($_POST['length']) && $_POST['length'] != -1 && $limit === "") {
            $limit = "limit " . intval($this->input->post('start')) . "," . intval($this->input->post('length'));
        }
        $this->query = $this->db->query('SELECT b.pn_id, b.perkara_id, b.nomor_perkara_pn, b.nomor_perkara_banding, b.tanggal_pendaftaran_banding, b.putusan_banding, b.tgl_minutasi
FROM perkara_banding AS b
LEFT JOIN perkara_kasasi AS k ON k.perkara_id=b.perkara_id 
WHERE k.perkara_id IS NULL
AND b.tgl_minutasi IS NOT NULL
AND LEFT(b.tanggal_pendaftaran_banding,4)= ' . intval($this->session->userdata('tahun')) . '
AND b.alur_perkara_id<100 ' . $search . ' ' . $limit . ';
            ');
    }

    function CountPTPerdataTidakKasasi()
    {
        $this->PTPerdataTidakKasasi(false);
        if (!$this->query) {
            return "0";
        } else {
            return $this->query->num_rows();
        }
    }

    function ListPTPerdataTidakKasasi()
    {
        $this->PTPerdataTidakKasasi();
        if (!$this->query) {
            return false;
        } else {
            return $this->query->result();
        }
    }
}
