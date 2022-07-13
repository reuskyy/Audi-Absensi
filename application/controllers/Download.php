<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller
{
    public function karyawan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['admin'] = $this->db->get('user')->result('array');
        $query = $this->db->query("SELECT user.*,user_role.* ,gender.*, bagian_shift.*
        FROM user 
        JOIN user_role ON user.role_id = user_role.id
        JOIN gender ON user.id_gender = gender.id_gender
        JOIN bagian_shift ON user.bagian_shift = bagian_shift.id_bagian_shift
        ")->result_array();
        $data['user'] = $query;


        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("CPN");
        $object->getProperties()->setLastModifiedBy("CPN");
        $object->getProperties()->setTitle("Employeeprofile List");

        $object->getActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'ID Employee');
        $object->getActiveSheet()->setCellValue('B1', 'Kode Karyawan');
        $object->getActiveSheet()->setCellValue('C1', 'Nama');
        $object->getActiveSheet()->setCellValue('D1', 'Username');
        $object->getActiveSheet()->setCellValue('E1', 'Email');
        $object->getActiveSheet()->setCellValue('F1', 'Role Akun');
        $object->getActiveSheet()->setCellValue('G1', 'Umur');
        $object->getActiveSheet()->setCellValue('H1', 'jabatan');
        $object->getActiveSheet()->setCellValue('I1', 'instansi');
        $object->getActiveSheet()->setCellValue('J1', 'NPWP');
        $object->getActiveSheet()->setCellValue('K1', 'Tempat Lahir');
        $object->getActiveSheet()->setCellValue('L1', 'Tanggal Lahir');
        $object->getActiveSheet()->setCellValue('M1', 'Gender');
        
        $baris = 2;
        
        foreach ($data['user'] as $c) {
            $object->getActiveSheet()->setCellValue('A'.$baris, $c['id_employee'])
                                    ->setCellValue('B'.$baris, $c['kode_pegawai'] )
                                    ->setCellValue('C'.$baris, $c['name'] )
                                    ->setCellValue('D'.$baris, $c['username'] )
                                    ->setCellValue('E'.$baris, $c['email'] )
                                    ->setCellValue('F'.$baris, $c['role'] )
                                    ->setCellValue('G'.$baris, $c['umur'] )
                                    ->setCellValue('H'.$baris, $c['jabatan'] )
                                    ->setCellValue('I'.$baris, $c['instansi'] )
                                    ->setCellValue('J'.$baris, $c['npwp'] )
                                    ->setCellValue('K'.$baris, $c['tempat_lahir'] )
                                    ->setCellValue('L'.$baris, $c['tgl_lahir'] )
                                    ->setCellValue('M'.$baris, $c['gender'] );
            
            $baris++;
            
        }
        
        $filename="List Karyawan".'.xlsx';

        $object->getActiveSheet()->setTitle("List Karyawan");

        header('Content-Type: application/vnd.opnxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename. '"');
        header('Cache-Control: max-age=0');

        ob_end_clean();
        $writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('php://output');

        exit;
    }
}