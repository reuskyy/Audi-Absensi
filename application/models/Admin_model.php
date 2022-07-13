<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{
    public function tampil_data1()
    {
        return $this->db->get('company');
    }
    public function count($table)
    {
        return $this->db->count_all($table);
    }

    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }

    public function update($table, $pk, $id, $data)
    {
        $this->db->where($pk, $id);
        return $this->db->update($table, $data);
    }

    public function select_idprofile($where){
            $id = $where;
            $table = "SELECT * FROM user WHERE id_employee = '$id' ";
            $query=$this->db->query($table);
            return $query->result_array();
    }

    public function select_idplacement($where){
            $id = $where;
            $table = "SELECT * FROM employeeplacement WHERE id_employee = '$id' ";
            $query=$this->db->query($table);
            return $query->result_array();
    }
    public function select_iduser($where){
            $id = $where;
            $table = "SELECT * FROM user WHERE id_employee = '$id' ";
            $query=$this->db->query($table);
            return $query->result_array();
    }

    public function get_user1()
    {
        $query = "SELECT * FROM user";
        return $this->db->query($query)->result_array();
    }
    public function get_employeeprofile()
    {
        $que = "SELECT * FROM user
        INNER JOIN user_role ON user.role_id = user_role.id
        INNER JOIN gender ON user.id_gender = gender.id_gender
        INNER JOIN bagian_shift ON user.bagian_shift = bagian_shift.id_bagian_shift
        ";
        return $this->db->query($que)->result_array();
    }
    public function get_role()
    {
        $query = "SELECT * FROM user_role";
        return $this->db->query($query)->result_array();
    }
    public function get_gender()
    {
        $query = "SELECT * FROM gender";
        return $this->db->query($query)->result_array();
    }
    public function get_bagian_shift()
    {
        $query = "SELECT * FROM bagian_shift";
        return $this->db->query($query)->result_array();
    }
    public function get_user()
    {
        $que = "SELECT user.*,user_role_admin.role_admin
        FROM user JOIN user_role_admin
        ON user.id_role_admin = user_role_admin.id_role_admin
        ";
        return $this->db->query($que)->result_array();
    }
    
    public function insert($table, $data, $batch = false)
    {
        return $batch ? $this->db->insert_batch($table, $data) : $this->db->insert($table, $data);
    }

    public function delete($table, $pk, $id)
    {
        return $this->db->delete($table, [$pk => $id]);
    }

    public function getMax($table, $field, $kode = null)
    {
        $this->db->select_max($field);
        if ($kode != null) {
            $this->db->like($field, $kode, 'after');
        }
        return $this->db->get($table)->row_array()[$field];
    }

    
    public function getDataEmployeeProfile()
    {
        $query = "SELECT * FROM user";
        return $this->db->query($query)->result_array();
    }
    
    public function tampil_data(){
        return $this->db->get('user');
    }
    
    public function cari($id){
        $query= $this->db->get_where('user',array('id_employee'=>$id));
        return $query;
    }

    public function get_kelolacuti()
    {
        $que = "SELECT * 
        FROM cuti
        INNER JOIN user ON cuti.id_employee = user.id_employee
        INNER JOIN status_cuti ON cuti.id_status = status_cuti.id_status
        INNER JOIN tipe_cuti ON cuti.id_tipe_cuti = tipe_cuti.id_tipe_cuti
        ";
        return $this->db->query($que)->result();
    }
    
    public function get_status_cuti()
    {
        $query = "SELECT * FROM status_cuti";
        return $this->db->query($query)->result_array();
    }
    public function select_kelolacuti($where){
        $id = $where;
        $table = "SELECT cuti.*,tipe_cuti.*, user.*
                    FROM cuti
                    JOIN tipe_cuti ON cuti.id_tipe_cuti = tipe_cuti.id_tipe_cuti
                    JOIN user ON cuti.id_employee = user.id_employee
                    WHERE id_cuti = '$id' ";
        $query=$this->db->query($table);
        return $query->result_array();
    }
    public function get_tipe_cuti()
    {
        $query = "SELECT * FROM tipe_cuti";
        return $this->db->query($query)->result_array();
    }
    public function cuti_user($id)
    {
        $que = "SELECT * 
        FROM cuti
        INNER JOIN user ON cuti.id_employee = user.id_employee
        INNER JOIN status_cuti ON cuti.id_status = status_cuti.id_status
        INNER JOIN tipe_cuti ON cuti.id_tipe_cuti = tipe_cuti.id_tipe_cuti
        WHERE cuti.id_employee= $id
        ";
        return $this->db->query($que)->result();
    }
}