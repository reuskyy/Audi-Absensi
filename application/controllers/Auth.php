<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        if($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');

        } else {
            //validasinya sukses
            $this->_login();
        }
    }
    
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        //dari database tabel user yang field nya email (di mysqlnya) sama dengan $email di codingan ini
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        

        //jika usernya ada
        if($user) {
            //jika usernya aktif
            if($user['is_active'] == 1){
                //cek password (menyamakan, apakah $password yg diambil dari input private function _login sama dengan password yg di tabel user)
                if(password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'id_employee' => $user['id_employee'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if($user['role_id'] <= 1){
                        redirect('user');
                    } else {
                        redirect('user');
                }

                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
            redirect('auth');
                }

            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This Email has not been activated!</div>');
            redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not register</div>');
            redirect('auth');
        }
    
    }
    public function changePassword(){
		if (!$this->session->userdata('reset_email')) {
			redirect('auth');
		}
		$this->form_validation->set_rules('password1','Password', 'trim|required|min_length[6]|matches[password2]');
		$this->form_validation->set_rules('password2','Password', 'trim|required|min_length[6]|matches[password1]');
		if ($this->form_validation->run()==false){
			$data['title'] = 'Change Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/change-password');
			$this->load->view('templates/auth_footer');
		} else {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');
			
			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('user');
			
			$this->session->unset_userdata('reset_email');
			
		$this->db->delete('user_token', ['email' => $email]);
		
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed! Please login</div>');
			redirect('auth');
		}
	}
 
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }


    public function blocked()
    {
        $this->load->view('auth/blocked');
    }

}