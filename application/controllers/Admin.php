<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
        $hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
        $this->get_today_date = $hari[(int)date("w")] . ', ' . date("j ") . $bulan[(int)date('m')] . date(" Y");
        is_logged_in();
    }
        

    public function hitungjumlahdata($typehitung)
    {
        if ($typehitung == 'jmlpgw') {

            $query = $this->db->get('user');
            if ($query->num_rows() > 0) {
                return $query->num_rows();
            } else {
                return 0;
            }
        }
    }

    public function employeeprofile()
    {
        $data['title'] = 'Employee';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['employeeprofile'] = $this->admin->get_employeeprofile();
        $data['role'] = $this->admin->get_role();
        $data['gender'] = $this->admin->get_gender();
        $data['bagian_shift'] = $this->admin->get_bagian_shift();
        $data['admin'] = $this->db->get('user')->result_array();

        // $this->form_validation->set_rules('id_employee', 'Id_employee', 'required');
        $this->form_validation->set_rules('kode_pegawai', 'kode_pegawai', 'required');
        $this->form_validation->set_rules('image', 'image', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('role_id', 'ID Agama', 'required');
        $this->form_validation->set_rules('umur', 'umur', 'required');
        $this->form_validation->set_rules('instansi', 'instansi', 'required');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
        $this->form_validation->set_rules('npwp', 'Npwp', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl_lahir', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat_lahir', 'required');
        $this->form_validation->set_rules('id_gender', 'ID Gender', 'required');
        $this->form_validation->set_rules('bagian_shift', 'bagian_shift', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/employeeprofile', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'kode_pegawai' => $this->input->post('kode_pegawai'),
            'image' => $this->input->post('image'),
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'role_id' => $this->input->post('role_id'),
            'umur' => $this->input->post('umur'),
            'instansi' => $this->input->post('instansi'),
            'jabatan' => $this->input->post('jabatan'),
            'npwp' => $this->input->post('npwp'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'id_gender' => $this->input->post('id_gender'),
            'bagian_shift' => $this->input->post('bagian_shift'),
            'is_active' => $this->input->post('is_active'),
            'date_created' => $this->input->post('date_created')
        ];
        $this->db->insert('user', $data);
        redirect('admin/employeeprofile');
    }
    }
    public function toggle($getId)
    {
        $id = encode_php_tags($getId);
        $this->load->model('Admin_model', 'admin');
        $this->form_validation->set_rules('id_employee', 'id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('no_telp', 'no_telp', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('role_id', 'role_id', 'required');

        $status = $this->admin->get('user', ['id_employee' => $id])['is_active'];
        $toggle = $status ? 0 : 1; //Jika user aktif maka nonaktifkan, begitu pula sebaliknya
        $pesan = $toggle ? 'user diaktifkan.' : 'user dinonaktifkan.';

        if ($this->admin->update('user', 'id_employee', $id, ['is_active' => $toggle])) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User berhasil dinonaktifkan</div>');
        }
        redirect('admin/employeeprofile');
    }
    public function employeeprofile_lihat()
    {
        $data['title'] = 'Employee';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', "admin");

        $id = $this->input->get('id');
        $data['employeeprofile'] = $this->admin->select_iduser($id);
        // $data['employeeprofile1'] = $this->admin->get_employeeprofile();
        $data['role'] = $this->admin->get_role();
        $data['gender'] = $this->admin->get_gender();
        $data['bagian_shift'] = $this->admin->get_bagian_shift();
        $data['admin'] = $this->db->get('user')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/lihat', $data);
        $this->load->view('templates/footer');
    }


    public function employeeprofile_add()
    {
        $data['title'] = 'Add Employee Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['employeeprofile'] = $this->admin->get_employeeprofile();
        $data['role'] = $this->admin->get_role();
        $data['gender'] = $this->admin->get_gender();
        $data['bagian_shift'] = $this->admin->get_bagian_shift();
        $data['admin'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('id_employee', 'Id_employee', 'required');
        $this->form_validation->set_rules('kode_pegawai', 'kode_pegawai', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
        $this->form_validation->set_rules('instansi', 'instansi', 'required');
        $this->form_validation->set_rules('npwp', 'npwp', 'required');
        $this->form_validation->set_rules('umur', 'umur', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat_lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl_lahir', 'required');
        $this->form_validation->set_rules('role_id', 'role_id', 'required');
        $this->form_validation->set_rules('id_gender', 'id_gender', 'required');
        $this->form_validation->set_rules('bagian_shift', 'bagian_shift', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/add', $data);
        $this->load->view('templates/footer', $data);
        } else {
            $id_employee = $this->input->post('id_employee', true);
            $kode_pegawai = $this->input->post('kode_pegawai', true);
            $name = $this->input->post('name', true);
            $username = $this->input->post('username', true);
            $email = $this->input->post('email', true);
            $jabatan = $this->input->post('jabatan', true);
            $instansi = $this->input->post('instansi', true);
            $npwp = $this->input->post('npwp', true);
            $umur = $this->input->post('umur', true);
            $tempat_lahir = $this->input->post('tempat_lahir', true);
            $tgl_lahir = $this->input->post('tgl_lahir', true);
            $role_id = $this->input->post('role_id', true);
            $id_gender = $this->input->post('id_gender', true);
            $bagian_shift = $this->input->post('bagian_shift', true);
            $is_active = $this->input->post('is_active', true);
            $data = [
                'id_employee' => htmlspecialchars($id_employee),
                'kode_pegawai' => htmlspecialchars($kode_pegawai),
                'name' => htmlspecialchars($name),
                'username' => htmlspecialchars($username),
                'email' => htmlspecialchars($email),
                'jabatan' => htmlspecialchars($jabatan),
                'instansi' => htmlspecialchars($instansi),
                'npwp' => htmlspecialchars($npwp),
                'umur' => htmlspecialchars($umur),
                'tempat_lahir' => htmlspecialchars($tempat_lahir),
                'tgl_lahir' => htmlspecialchars($tgl_lahir),
                'role_id' => htmlspecialchars($role_id),
                'id_gender' => htmlspecialchars($id_gender),
                'bagian_shift' => htmlspecialchars($bagian_shift),
                'password' => '$2y$10$IT58Zx8GjoTM9L039vsLEee5DQy32zVXMAGv0Z9njUBxyE/DoKMjW',
                'is_active' => 0,
                'image' => 'default.png',
                'qr_code_image' => 'no-qrcode.png',
                'qr_code_use' => 0,
                'last_login' => 1655138599,
                'date_created' => time()
            ];


            
            $save = $this->admin->insert('user', $data);
            if ($save) {
                set_pesan('Data added successfully');
                redirect('admin/employeeprofile');
            } else {
                set_pesan('Data failed to add', false);
                redirect('admin/');
            }
        }
    

    }

    public function employeeprofile_edit()
    {
        $data['title'] = 'Employee';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model');

        $id = $this->input->get('id');
        $data['employeeprofile'] = $this->Admin_model->select_idprofile($id);
        $data['role'] = $this->Admin_model->get_role();
        $data['gender'] = $this->Admin_model->get_gender();
        $data['bagian_shift'] = $this->Admin_model->get_bagian_shift();
        $data['admin'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('id_employee', 'Id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
        $this->form_validation->set_rules('instansi', 'instansi', 'required');
        $this->form_validation->set_rules('npwp', 'npwp', 'required');
        $this->form_validation->set_rules('umur', 'umur', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat_lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl_lahir', 'required');
        $this->form_validation->set_rules('role_id', 'role_id', 'required');
        $this->form_validation->set_rules('id_gender', 'id_gender', 'required');
        $this->form_validation->set_rules('bagian_shift', 'bagian_shift', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/edit', $data);
        $this->load->view('templates/footer', $data);


        } else {
            $id_employee = $this->input->post('id_employee');
            $name = $this->input->post('name');
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $jabatan = $this->input->post('jabatan');
            $instansi = $this->input->post('instansi');
            $npwp = $this->input->post('npwp');
            $umur = $this->input->post('umur');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $role_id = $this->input->post('role_id');
            $id_gender = $this->input->post('id_gender');
            $bagian_shift = $this->input->post('bagian_shift');

            $this->db->where('id_employee', $id_employee);
            $this->db->set('name', $name);
            $this->db->set('username', $username);
            $this->db->set('email', $email);
            $this->db->set('jabatan', $jabatan);
            $this->db->set('instansi', $instansi);
            $this->db->set('npwp', $npwp);
            $this->db->set('umur', $umur);
            $this->db->set('tempat_lahir', $tempat_lahir);
            $this->db->set('tgl_lahir', $tgl_lahir);
            $this->db->set('role_id', $role_id);
            $this->db->set('id_gender', $id_gender);
            $this->db->set('bagian_shift', $bagian_shift);
            $this->db->update('user');

            set_pesan('Data changed successfully');
            redirect('admin/employeeprofile');
        }
    

    }

    public function employeeprofile_delete($getId)
    {
        $this->load->model('Admin_model', 'admin');
        $id = encode_php_tags($getId);
        if ($this->admin->delete('user', 'id_employee', $id)) {
            set_pesan('Data deleted successfully');
        } else {
            set_pesan('Data failed to delete', false);
        }
        redirect('admin/employeeprofile');
    }

    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard ',
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()
            // 'dataapp' => $this->get_datasetupapp
        ];
        $data['jmlpegawai'] = $this->hitungjumlahdata('jmlpgw');
        // $data['pegawaitelat'] = $this->M_Admin->hitungjumlahdata('pgwtrl');
        // $data['pegawaimasuk'] = $this->M_Admin->hitungjumlahdata('pgwmsk');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer', $data);
    }

    public function absenkaryawan()
    {
        $data['title'] = 'Employee';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/absenkaryawan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function settingapp()
    {
        $data['title'] = 'Setting';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/settingapp', $data);
        $this->load->view('templates/footer', $data);
    }

    public function kelolacuti()
    {
        $data['title'] = ' ';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['cuti'] = $this->admin->get_kelolacuti();
        $data['status_cuti'] = $this->admin->get_status_cuti();
        $data['admin'] = $this->db->get('cuti')->result_array();

        $this->form_validation->set_rules('id_employee', 'id_employee', 'required');
        $this->form_validation->set_rules('tipe_cuti', 'tipe_cuti', 'required');
        $this->form_validation->set_rules('alasan_cuti', 'alasan_cuti', 'required');
        $this->form_validation->set_rules('tgl_mulai', 'tgl_mulai', 'required');
        $this->form_validation->set_rules('tgl_akhir', 'tgl_akhir', 'required');
        $this->form_validation->set_rules('id_status', 'id_status', 'required');
        $this->form_validation->set_rules('catatan', 'catatan', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kelolacuti', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'tipe_cuti' => $this->input->post('tipe_cuti'),
            'alasan_cuti' => $this->input->post('alasan_cuti'),
            'tgl_mulai' => $this->input->post('tgl_mulai'),
            'tgl_akhir' => $this->input->post('tgl_akhir'),
            'id_status' => $this->input->post('id_status'),
            'catatan' => $this->input->post('catatan')
        ];
        $this->db->insert('cuti', $data);
        redirect('admin/kelolacuti');
    }
    }
public function kelolacuti_detail()
    {
        $data['title'] = ' ';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model');

        $id = $this->input->get('id');
        $data['cuti'] = $this->Admin_model->select_kelolacuti($id);
        $data['status_cuti'] = $this->Admin_model->get_status_cuti();
        $data['tipe_cuti'] = $this->Admin_model->get_tipe_cuti();
        $data['admin'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('id_cuti', 'id_cuti');
        $this->form_validation->set_rules('id_employee', 'id_employee', 'required');
        $this->form_validation->set_rules('id_tipe_cuti', 'id_tipe_cuti', 'required');
        $this->form_validation->set_rules('alasan_cuti', 'alasan_cuti', 'required');
        $this->form_validation->set_rules('tgl_mulai', 'tgl_mulai', 'required');
        $this->form_validation->set_rules('tgl_akhir', 'tgl_akhir', 'required');
        $this->form_validation->set_rules('id_status', 'id_status', 'required');
        $this->form_validation->set_rules('catatan', 'catatan');

        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kelolacuti_detail', $data);
        $this->load->view('templates/footer');


        } else {
        $id_cuti = $this->input->post('id_cuti');
        $id_status = $this->input->post('id_status');
        $catatan = $this->input->post('catatan');

        $this->db->where('id_cuti', $id_cuti);
        $this->db->set('id_status', $id_status);
        $this->db->set('catatan', $catatan);
        $this->db->update('cuti');
        set_pesan('Data changed successfully');
        redirect('admin/kelolacuti');
        }
    

    }
    
    
}