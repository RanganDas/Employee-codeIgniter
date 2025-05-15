<?php
class Employee_model extends CI_Model {
    public function get_employees() {
        return $this->db->get('emp_details')->result_array();
    }
    
    public function add_employee($data) {
        return $this->db->insert('emp_details', $data);
    }
    
    public function get_employee($id) {
        $this->db->where('id', $id);
        return $this->db->get('emp_details')->row_array();
    }
    
    public function update_employee($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('emp_details', $data);
    }
    
    public function delete_employee($id) {
        $this->db->where('id', $id);
        return $this->db->delete('emp_details');
    }
}
?>