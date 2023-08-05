<?php
class Authentication_model extends CI_Model
{
    public function check_login($username)
    {
        if (!$username) {
            return false;
        }

        return $this->db->get_where('user', array('username' => $username))->result_array();
    }
}
