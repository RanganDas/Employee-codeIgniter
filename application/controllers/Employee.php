<?php
class Employee extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('logged_in')) {
            redirect('login');
        }
        $this->load->model('employee_model');
        $this->load->helper('form');
    }
    
    public function index() {
        $data['employees'] = $this->employee_model->get_employees();
        $this->load->view('employee_list', $data);
    }
    
    public function add() {
        $this->load->view('employee_add');
    }
    
    public function save() {
        $data = array(
            'name' => $this->input->post('name'),
            'address' => $this->input->post('address'),
            'designation' => $this->input->post('designation'),
            'salary' => $this->input->post('salary')
        );
        
        // Handle file upload
        if(!empty($_FILES['picture']['name'])) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048;
            
            $this->load->library('upload', $config);
            
            if($this->upload->do_upload('picture')) {
                $upload_data = $this->upload->data();
                $data['picture'] = $upload_data['file_name'];
            }
        }
        
        $this->employee_model->add_employee($data);
        redirect('employee');
    }
    
    public function edit($id) {
        $data['employee'] = $this->employee_model->get_employee($id);
        $this->load->view('employee_edit', $data);
    }
    
    public function update($id) {
        $data = array(
            'name' => $this->input->post('name'),
            'address' => $this->input->post('address'),
            'designation' => $this->input->post('designation'),
            'salary' => $this->input->post('salary')
        );
        
        // Handle file upload
        if(!empty($_FILES['picture']['name'])) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048;
            
            $this->load->library('upload', $config);
            
            if($this->upload->do_upload('picture')) {
                $upload_data = $this->upload->data();
                $data['picture'] = $upload_data['file_name'];
            }
        }
        
        $this->employee_model->update_employee($id, $data);
        redirect('employee');
    }
    
    public function delete($id) {
        $this->employee_model->delete_employee($id);
        redirect('employee');
    }
}
?>