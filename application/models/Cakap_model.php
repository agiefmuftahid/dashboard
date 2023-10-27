<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cakap_model extends CI_Model
{

    public function update_statistik_cakap_banding($data)
    {
        if ($this->_check_tahun_statistik_cakap_banding($data[0]['tahun']) <= 0) {
            $query = $this->db->insert_batch('statistik_cakap_banding', $data);
            $act = 'insert';
        } else {
            $this->db->where('tahun', $data[0]['tahun']);
            $query = $this->db->update_batch('statistik_cakap_banding', $data, 'id_statistik');
            $act = 'update';
        }

        if (!$query) {
            return false;
        }
        return array('st' => 1, 'act' => $act);
    }

    private function _check_tahun_statistik_cakap_banding($tahun)
    {
        $this->db->where(array('tahun' => $tahun));
        return $this->db->count_all_results('statistik_cakap_banding');
    }

    public function get_statistik_cakap_banding($tahun, $id_statistik = false)
    {
        $this->db->select('*');
        $this->db->where('tahun', $tahun);
        if ($id_statistik) {
            $this->db->where('id_statistik', $id_statistik);
        }
        $this->db->from('statistik_cakap_banding');
        $query = $this->db->get();

        if (!$query) {
            return false;
        }

        return array('st' => 1, 'data' => $query->result());
    }

    public function get_tahun_cakap_banding()
    {
        $this->db->distinct();
        $this->db->select('tahun');
        $this->db->from('statistik_cakap_banding');
        $this->db->order_by('tahun', 'DESC');
        $query = $this->db->get();

        if (!$query) {
            return false;
        }

        return array('st' => 1, 'data' => $query->result());
    }
}
