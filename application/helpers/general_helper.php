<?php defined('BASEPATH') or exit('No direct script access allowed.');


function arr_validation_rules_msg()
{
    $array = array(
        'required' => 'Anda harus mengisikan kolom {field}.',
        'min_length' => 'Isian pada kolom {field} minimal berjumlah {param}',
        'max_length' => 'Isian pada kolom {field} maksimal berjumlah {param}',
        'valid_email' => 'Alamat email yang diisi tidak valid'
    );

    return $array;
}

function konversiBulan($bln)
{
    $bulan = array(
        'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );

    return $bulan[(int)$bln - 1];
}

function konversiTanggal($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

function konversiKet($ket, $opt = '')
{
    if ($opt) {
        $arr = array();
        switch ($ket) {
            case 1:
                array_push($arr, 'bg-success', 'Hadir');
                break;
            case 2:
                array_push($arr, 'bg-info', 'Sakit');
                break;
            case 3:
                array_push($arr, 'bg-warning', 'Cuti');
                break;
            default:
                array_push($arr, 'bg-default', 'Lain-lain');
                break;
        };
    } else {
        switch ($ket) {
            case 0:
                $arr = 'Tidak Hadir';
                break;
            case 1:
                $arr = 'Hadir';
                break;
            case 2:
                $arr = 'Sakit';
                break;
            case 3:
                $arr = 'Cuti';
                break;
            default:
                $arr = 'Lain-lain';
                break;
        };
    }

    return $arr;
}

function daftarHari($date_from, $date_to)
{
    $arr_days = array();
    $day_passed = ($date_to - $date_from); //seconds
    $day_passed = ($day_passed / 86400); //days

    $counter = 0;
    $day_to_display = $date_from;
    while ($counter <= $day_passed) {
        $arr_days[] = date('o-m-d', $day_to_display);
        $day_to_display += 86400;
        $counter++;
    }

    return $arr_days;
}

function isWeekend($date)
{
    if (date('N', strtotime($date)) >= 6) {
        return true;
    }
    return false;
}

function getJenisDataCakap($jenis)
{
    switch ($jenis) {
        case 'total_perkara_banding_tahun_ini':
            return array(
                'title' => 'Perkara Banding Tahun Ini',
                'desc' => 'Data yang ditampilkan merupakan data perkara banding pada PT Bengkulu di tahun ini'
            );
            break;
        case 'total_perkara_banding_selesai_tahun_ini':
            return array(
                'title' => 'Perkara Banding Yang Diselesaikan Tahun Ini',
                'desc' => 'Data yang ditampilkan merupakan data perkara banding pada PT Bengkulu yang diselesaikan pada tahun ini'
            );
            break;
        case 'total_perkara_banding_tahun_lalu':
            return array(
                'title' => 'Perkara Banding Tahun Lalu',
                'desc' => 'Data yang ditampilkan merupakan data perkara banding pada PT Bengkulu tahun lalu'
            );
            break;
        case 'persentase_perkara_banding_tahun_lalu_diselesaikan_tahun_ini':
            return array(
                'title' => 'Perkara Banding Tahun Lalu Yang Diselesaikan Tahun Ini',
                'desc' => 'Data yang ditampilkan merupakan data perkara banding pada PT Bengkulu tahun lalu yang diselesaikan tahun ini'
            );
            break;
        case 'total_perkara_banding_tahun_lalu_diselesaikan_tahun_ini':
            return array(
                'title' => 'Perkara Banding Tahun Lalu Yang Diselesaikan Tahun Ini',
                'desc' => 'Data yang ditampilkan merupakan data perkara banding pada PT Bengkulu tahun lalu yang diselesaikan tahun ini'
            );
            break;
        case 'persentase_perkara_banding_diselesaikan_tepat_waktu':
            return array(
                'title' => 'Perkara Banding Yang Diselesaikan Tepat Waktu',
                'desc' => 'Data yang ditampilkan merupakan data perkara banding pada PT Bengkulu yang diselesaikan tepat waktu'
            );
            break;
        case 'total_perkara_banding_diselesaikan_tepat_waktu':
            return array(
                'title' => 'Perkara Banding Yang Diselesaikan Tepat Waktu',
                'desc' => 'Data yang ditampilkan merupakan data perkara banding pada PT Bengkulu yang diselesaikan tepat waktu'
            );
            break;
        case 'total_perkara_banding_diselesaikan_tidak_tepat_waktu':
            return array(
                'title' => 'Perkara Banding Yang Diselesaikan Tidak Tepat Waktu',
                'desc' => 'Data yang ditampilkan merupakan data perkara banding pada PT Bengkulu yang diselesaikan tidak tepat waktu'
            );
            break;
        case 'persentase_banding_pidana_tidak_kasasi':
            return array(
                'title' => 'Perkara Banding Pidana Yang Tidak Kasasi',
                'desc' => 'Data yang ditampilkan merupakan data perkara banding pidana pada PT Bengkulu yang tidak kasasi'
            );
            break;
        case 'total_banding_pidana_minutasi':
            return array(
                'title' => 'Perkara Banding Pidana Minutasi',
                'desc' => 'Data yang ditampilkan merupakan data perkara banding pidana pada PT Bengkulu yang telah minutasi'
            );
            break;
        case 'total_banding_pidana_tidak_kasasi':
            return array(
                'title' => 'Perkara Banding Pidana Yang Tidak Kasasi',
                'desc' => 'Data yang ditampilkan merupakan data perkara banding pidana pada PT Bengkulu yang tidak kasasi'
            );
            break;
        case 'persentase_banding_pidana_tipikor_tidak_kasasi':
            return array(
                'title' => 'Perkara Banding Pidana Tipikor Yang Tidak Kasasi',
                'desc' => 'Data yang ditampilkan merupakan data perkara banding pidana tindak pidana korupsi pada PT Bengkulu yang tidak kasasi'
            );
            break;
        case 'total_banding_pidana_tipikor_minutasi':
            return array(
                'title' => 'Perkara Banding Pidana Tipikor Minutasi',
                'desc' => 'Data yang ditampilkan merupakan data perkara banding pidana tipikor pada PT Bengkulu yang telah minutasi'
            );
            break;
        case 'total_banding_pidana_tipikor_tidak_kasasi':
            return array(
                'title' => 'Perkara Banding Pidana Tipikor Yang Tidak Kasasi',
                'desc' => 'Data yang ditampilkan merupakan data perkara banding pidana tindak pidana korupsi pada PT Bengkulu yang tidak kasasi'
            );
            break;
        case 'persentase_banding_perdata_tidak_kasasi':
            return array(
                'title' => 'Perkara Banding Perdata Yang Tidak Kasasi',
                'desc' => 'Data yang ditampilkan merupakan data perkara banding perdata pada PT Bengkulu yang tidak kasasi'
            );
            break;
        case 'total_banding_perdata_minutasi':
            return array(
                'title' => 'Perkara Banding Perdata Minutasi',
                'desc' => 'Data yang ditampilkan merupakan data perkara banding perdata pada PT Bengkulu yang telah minutasi'
            );
            break;
        case 'total_banding_perdata_tidak_kasasi':
            return array(
                'title' => 'Perkara Banding Perdata Yang Tidak Kasasi',
                'desc' => 'Data yang ditampilkan merupakan data perkara banding perdata pada PT Bengkulu yang tidak kasasi'
            );
            break;
        default:
            return array(
                'title' => 'Tidak Ada Judul',
                'desc' => 'Tidak Ada Deskripsi'
            );
            break;
    }
}
