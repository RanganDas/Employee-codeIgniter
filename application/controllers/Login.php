<?php
class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
    }
    
    public function index() {
        if($this->session->userdata('logged_in')) {
            redirect('employee');
        }
        
        $this->load->view('login_view');
    }
    
    public function authenticate() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $user = $this->login_model->validate($username, $password);
        
        if($user) {
            $user_data = array(
                'user_id' => $user['id'],
                'username' => $user['user_name'],
                'name' => $user['name'],
                'logged_in' => true
            );
            
            $this->session->set_userdata($user_data);
            redirect('employee');
        } else {
            $this->session->set_flashdata('error', 'Invalid username or password');
            redirect('login');
        }
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}
?>