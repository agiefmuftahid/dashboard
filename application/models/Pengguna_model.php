<?php
class Pengguna_model extends CI_Model
{

    var $table = 'pengguna';

    public function get_datatables($select, $where = false)
    {
        $this->db->select($select);
        $this->db->order_by('pengguna.id', 'asc');
        if ($where) {
            $this->db->where($where);
        }
        $this->_get_query();

        if (isset($_POST['length']) && $_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    private function _get_query()
    {
        $this->db->from($this->table);
        if (isset($_POST['search']['value'])) {
            $this->db->group_start();
            $this->db->like('username', $_POST['search']['value']);
            $this->db->or_like('email', $_POST['search']['value']);
            $this->db->group_end();
        }
    }

    public function count_filtered()
    {
        $this->_get_query();
        $query = $this->db->get();
        if ($query) {
            return $query->num_rows();
        } else {
            return array();
        }
    }

    public function get_data_from_table($select, $order_by, $where = false)
    {
        $this->db->select($select);
        $this->db->order_by($order_by);
        if ($where) {
            $this->db->where($where);
        }
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result();
    }
}
