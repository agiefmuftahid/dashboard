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
