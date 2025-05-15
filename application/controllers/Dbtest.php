<?php
class Dbtest extends CI_Controller {
    public function index() {
        $this->load->database();
        if ($this->db->conn_id) {
            echo "Database connected successfully!";
        } else {
            echo "Database connection failed";
        }
    }
}