<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();   
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model', 'admin');
        $data['employeeprofile'] = $this->admin->count('user');
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function profile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('templates/footer');
    }
    
    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');

        if($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar2', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');

        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $email = $this->input->post('email');

            //cek jika ada gambar yang akan diuplad
            $upload_image = $_FILES['image']['name'];
            
            if($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 10000;
                $config['upload_path'] = './assets/img/profile/';
                
                $this->load->library('upload', $config);
                
                if($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
                
            }

            $this->db->set('name', $name);
            $this->db->set('tgl_lahir', $tgl_lahir);
            $this->db->set('tempat_lahir', $tempat_lahir);
            $this->db->where('email', $email);
            $this->db->update('user');

            set_pesan('Your profile has been changed!');
            redirect('user');
        }

    }
    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[6]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[6]|matches[new_password1]');

        if($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar2', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');

        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if(!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password! /div>');
                redirect('user/changepassword');
            } else {
                if($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password! /div>');
                    redirect('user/changepassword');
                } else {
                    //passwordnya sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    set_pesan('Password changed successfully');
                    redirect('user/changepassword');
                    }
                
            }
        }
    }

    
    public function cuti()
    {
        $data['title'] = ' ';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model');
        
        $id = $this->session->userdata('id_employee');
        $data['cuti'] = $this->Admin_model->cuti_user($id);
        $data['status_cuti'] = $this->Admin_model->get_status_cuti();
        $data['tipe_cuti'] = $this->Admin_model->get_tipe_cuti();
        $data['admin'] = $this->db->get('cuti')->result_array();

        $this->form_validation->set_rules('id_tipe_cuti', 'id_tipe_cuti', 'required');
        $this->form_validation->set_rules('alasan_cuti', 'alasan_cuti', 'required');
        $this->form_validation->set_rules('tgl_mulai', 'tgl_mulai', 'required');
        $this->form_validation->set_rules('tgl_akhir', 'tgl_akhir', 'required');
        $this->form_validation->set_rules('id_status', 'id_status', 'required');
        $this->form_validation->set_rules('catatan', 'catatan', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('/cuti', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_tipe_cuti' => $this->input->post('id_tipe_cuti'),
            'alasan_cuti' => $this->input->post('alasan_cuti'),
            'tgl_mulai' => $this->input->post('tgl_mulai'),
            'tgl_akhir' => $this->input->post('tgl_akhir'),
            'id_status' => $this->input->post('id_status'),
            'catatan' => $this->input->post('catatan')
        ];
        $this->db->insert('cuti', $data);
        redirect('user/cuti');
    }
    }

    public function cuti_add()
    {
        $data['title'] = ' ';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');
        $userlogin = $this -> session ->userdata ('id_employee');
        $data['usernya'] =  $this->db->query("SELECT user.*
                                    FROM user
                                    WHERE user.id_employee = $userlogin")->row_array();

        $data['cuti'] = $this->admin->get_kelolacuti();
        $data['status_cuti'] = $this->admin->get_status_cuti();
        $data['tipe_cuti'] = $this->admin->get_tipe_cuti();
        $data['admin'] = $this->db->get('cuti')->result_array();

        $this->form_validation->set_rules('id_tipe_cuti', 'id_tipe_cuti', 'required');
        $this->form_validation->set_rules('alasan_cuti', 'alasan_cuti', 'required');
        $this->form_validation->set_rules('tgl_mulai', 'tgl_mulai', 'required');
        $this->form_validation->set_rules('tgl_akhir', 'tgl_akhir', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/cuti/add', $data);
        $this->load->view('templates/footer', $data);
        } else {
            $id_employee = $this->input->post('id_employee', true);
            $id_tipe_cuti = $this->input->post('id_tipe_cuti', true);
            $alasan_cuti = $this->input->post('alasan_cuti', true);
            $tgl_mulai = $this->input->post('tgl_mulai', true);
            $tgl_akhir = $this->input->post('tgl_akhir', true);
            $data = [
                'id_employee' => htmlspecialchars($id_employee),
                'id_tipe_cuti' => htmlspecialchars($id_tipe_cuti),
                'alasan_cuti' => htmlspecialchars($alasan_cuti),
                'tgl_mulai' => htmlspecialchars($tgl_mulai),
                'tgl_akhir' => htmlspecialchars($tgl_akhir),
                'id_status' => 1,
                'catatan' => '-'
            ];
            $save = $this->admin->insert('cuti', $data);

            if ($save) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New employeeprofile added! /div>');
                redirect('user/cuti');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal! /div>');
                redirect('user/cuti_add');
            }
        }
    

    }
}