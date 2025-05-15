<?php
class Login_model extends CI_Model {
    public function validate($username, $password) {
        $this->db->where('user_name', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('login_details');
        
        if($query->num_rows() == 1) {
            return $query->row_array();
        }
        return false;
    }
}
?>